<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proposal;
use App\Models\Subbidang;
use App\Models\Judul;
use App\Models\Revisi;
use App\Models\Dokumen;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate; // Untuk otorisasi

class ProposalController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $query = Proposal::with(['subbidang', 'judul', 'user'])->orderBy('id', 'desc');

        if ($user->id_role != 1) {
            $query->where('id_user', $user->id);
        }

        $proposal = $query->get();
        return view('public_admin.proposal.index', compact('proposal'));
    }

    public function create()
    {
        $subbidang = Subbidang::all();
        return view('public_admin.proposal.create', compact('subbidang'));
    }

    public function getJudulBySubBidang(Request $request)
    {
        $judul = Judul::where('id_subbidang', $request->id_subbidang)->get();
        return response()->json($judul);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul_proposal' => 'required|string|max:255',
            'id_subbidang' => 'required|exists:subbidangs,id',
            'judul_id' => 'required|exists:judul,id',
            'file_upload' => 'required|file|mimes:pdf,doc,docx|max:2048',
        ]);

        DB::beginTransaction();
        try {
            $proposal = Proposal::create([
                'judul_proposal' => $validatedData['judul_proposal'],
                'id_subbidang' => $validatedData['id_subbidang'],
                'id_judul' => $validatedData['judul_id'],
                'id_user' => Auth::id(),
                'status' => 1, // Status awal: Diajukan
            ]);

            $dokumen = $proposal->dokumen()->create(['user_id' => Auth::id(), 'jenis_dokumen' => 0]);

            $file = $request->file('file_upload');
            $fileName = 'proposal_' . $proposal->id . '_' . time() . '.' . $file->getClientOriginalExtension();
            $filePath = 'file_upload/proposal/file/' . $fileName;
            $file->move(public_path('file_upload/proposal/file'), $fileName);

            $dokumen->revisi()->create([
                'proposal_id' => $proposal->id,
                'revision_by' => Auth::id(),
                'link_revisi' => $filePath,
                'nama_dokumen' => $file->getClientOriginalName(),
            ]);

            DB::commit();
            return redirect()->route('admin.proposal.index')->with('status', 'Proposal berhasil diajukan!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Gagal mengajukan proposal: ' . $e->getMessage())->withInput();
        }
    }


    public function show(Proposal $proposal)
    {
        if (Auth::user()->id_role != 1 && Auth::id() != $proposal->id_user) {
            abort(403, 'Anda tidak memiliki akses.');
        }

        $proposal->load(['dokumen.revisi.user']);
        return view('public_admin.proposal.timeline_dokumen.index', compact('proposal'));
    }

    public function edit(Proposal $proposal)
    {
        if (Auth::user()->id_role != 1 && Auth::id() != $proposal->id_user) {
            abort(403);
        }
        $subbidang = Subbidang::all();
        return view('public_admin.proposal.edit', compact('proposal', 'subbidang'));
    }

    public function update(Request $request, Proposal $proposal)
    {
        if (Auth::user()->id_role != 1 && Auth::id() != $proposal->id_user) {
            abort(403);
        }
        $validatedData = $request->validate([
            'judul_proposal' => 'required|string|max:255',
            'id_subbidang' => 'required|exists:subbidangs,id',
            'judul_id' => 'required|exists:judul,id',
        ]);
        $proposal->update($validatedData);
        return redirect()->route('admin.proposal.index')->with('status', 'Proposal berhasil diperbarui!');
    }

    public function destroy(Proposal $proposal)
    {
        if (Auth::user()->id_role != 1) {
            abort(403);
        }
        DB::beginTransaction();
        try {
            foreach($proposal->dokumen as $dokumen) {
                foreach($dokumen->revisi as $revisi) {
                    if ($revisi->link_revisi && File::exists(public_path($revisi->link_revisi))) {
                        File::delete(public_path($revisi->link_revisi));
                    }
                }
            }
            $proposal->dokumen()->delete();
            $proposal->delete();
            DB::commit();
            return redirect()->route('admin.proposal.index')->with('status', 'Proposal berhasil dihapus!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Gagal menghapus proposal: ' . $e->getMessage());
        }
    }

    /**
     * Menampilkan modal untuk verifikasi oleh admin.
     */
    public function modal_verifikasi(Request $request)
    {
        $revisi = Revisi::findOrFail($request->id_revisi);
        return view('public_admin.proposal.timeline_dokumen.modal_verifikasi', compact('revisi'));
    }

    /**
     * Menyimpan hasil verifikasi dari admin.
     */
    public function simpan_verifikasi_proposal(Request $request, Revisi $revisi)
    {
        if (Auth::user()->id_role != 1) { // Hanya admin
            abort(403);
        }

        DB::beginTransaction();
        try {
            if ($request->has('setuju')) {
                // Jika disetujui
                $revisi->update(['status' => 1]); // Status revisi: Disetujui
                $revisi->proposal->update(['status' => 2]); // Status proposal: Disetujui
            } else {
                // Jika ditolak (butuh revisi)
                $request->validate([
                    'keterangan' => 'required|string',
                    'file_verifikasi' => 'nullable|file|max:2048',
                ]);

                $revisi->update(['status' => 2]); // Status revisi lama: Ditolak
                $revisi->proposal->update(['status' => 3]); // Status proposal: Perlu Revisi

                $dokumen = $revisi->proposal->dokumen()->create([
                    'user_id' => Auth::id(),
                    'jenis_dokumen' => 0,
                    'status' => 2, // Status dokumen: Revisi
                ]);

                $filePath = null;
                if ($request->hasFile('file_verifikasi')) {
                    $file = $request->file('file_verifikasi');
                    $fileName = 'revisi_' . $dokumen->id . '_' . time() . '.' . $file->getClientOriginalExtension();
                    $filePath = 'file_upload/revisi/file/' . $fileName;
                    $file->move(public_path('file_upload/revisi/file'), $fileName);
                }

                $dokumen->revisi()->create([
                    'proposal_id' => $revisi->proposal_id,
                    'revision_by' => Auth::id(),
                    'catatan' => $request->keterangan,
                    'link_revisi' => $filePath,
                    'nama_dokumen' => $request->hasFile('file_verifikasi') ? $request->file('file_verifikasi')->getClientOriginalName() : null,
                    'status' => 3, // Status revisi baru: Menunggu Perbaikan dari User
                ]);
            }
            DB::commit();
            return redirect()->route('admin.proposal.show', $revisi->proposal_id)->with('status', 'Data berhasil diverifikasi!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Gagal verifikasi: ' . $e->getMessage());
        }
    }

    /**
     * Menyimpan file perbaikan dari user.
     */
    public function simpan_perbaikan_data(Request $request, Proposal $proposal)
    {
        if (Auth::id() != $proposal->id_user) { // Hanya pemilik
            abort(403);
        }

        $request->validate(['file_revisi' => 'required|file|max:2048']);

        DB::beginTransaction();
        try {
            $dokumen = $proposal->dokumen()->create(['user_id' => Auth::id(), 'jenis_dokumen' => 0]);

            $file = $request->file('file_revisi');
            $fileName = 'perbaikan_' . $proposal->id . '_' . time() . '.' . $file->getClientOriginalExtension();
            $filePath = 'file_upload/revisi/file/' . $fileName;
            $file->move(public_path('file_upload/revisi/file'), $fileName);

            $dokumen->revisi()->create([
                'proposal_id' => $proposal->id,
                'revision_by' => Auth::id(),
                'link_revisi' => $filePath,
                'nama_dokumen' => $file->getClientOriginalName(),
                'status' => 0, // Status: Menunggu verifikasi admin
            ]);

            $proposal->update(['status' => 1]); // Status proposal kembali ke: Diajukan
            DB::commit();
            return redirect()->route('admin.proposal.show', $proposal->id)->with('status', 'Data perbaikan berhasil diunggah!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Gagal mengunggah perbaikan: ' . $e->getMessage());
        }
    }

    /**
     * Menghapus data revisi.
     */
    public function delete_revisi_data(Revisi $revisi)
    {
        if (Auth::user()->id_role != 1) { // Hanya admin
            abort(403);
        }

        DB::beginTransaction();
        try {
            $dokumen = $revisi->dokumen;
            if (File::exists(public_path($revisi->link_revisi))) {
                File::delete(public_path($revisi->link_revisi));
            }
            $revisi->delete();
            $dokumen->delete();
            DB::commit();
            return redirect()->back()->with('status', 'Data revisi berhasil dihapus.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Gagal menghapus revisi: ' . $e->getMessage());
        }
    }
}
