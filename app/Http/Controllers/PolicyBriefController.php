<?php

namespace App\Http\Controllers;

use App\Models\PolicyBrief;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Exception;

class PolicyBriefController extends Controller
{
    /**
     * Tampilkan semua policy brief.
     */
    public function index()
    {
        $policyBriefs = PolicyBrief::latest()->paginate(10);
        return view('public_admin.master_policybrief.index', compact('policyBriefs'));
    }

    /**
     * Form tambah policy brief.
     */
    public function create()
    {
        return view('public_admin.master_policybrief.create');
    }

    /**
     * Simpan policy brief baru.
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'judul' => 'required|string|max:255',
                'deskripsi' => 'nullable|string',
                'file' => 'nullable|file|mimes:pdf|max:2048',
                'gambar' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            ]);

            $policybrief = new PolicyBrief();
            $policybrief->judul = $validated['judul'];
            $policybrief->deskripsi = $validated['deskripsi'] ?? null;

            if ($request->hasFile('file')) {
                $policybrief->file = $request->file('file')->store('policybrief/files', 'public');
            }

            if ($request->hasFile('gambar')) {
                $policybrief->gambar = $request->file('gambar')->store('policybrief/images', 'public');
            }

            $policybrief->save();

            return redirect()->back()->with('status', 'Data Policy Brief berhasil ditambahkan!');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Gagal menambahkan data: ' . $e->getMessage());
        }
    }

    /**
     * Form edit policy brief.
     */
    public function edit($id)
    {
        $policyBrief = PolicyBrief::findOrFail($id);
        return view('public_admin.master_policybrief.edit', compact('policyBrief'));
    }

    /**
     * Update policy brief.
     */
    public function update(Request $request, $id)
    {
        try {
            $validated = $request->validate([
                'judul' => 'required|string|max:255',
                'deskripsi' => 'nullable|string',
                'file' => 'nullable|file|mimes:pdf|max:2048',
                'gambar' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            ]);

            $policybrief = PolicyBrief::findOrFail($id);
            $policybrief->judul = $validated['judul'];
            $policybrief->deskripsi = $validated['deskripsi'] ?? null;

            if ($request->hasFile('file')) {
                if ($policybrief->file && Storage::disk('public')->exists($policybrief->file)) {
                    Storage::disk('public')->delete($policybrief->file);
                }
                $policybrief->file = $request->file('file')->store('policybrief/files', 'public');
            }

            if ($request->hasFile('gambar')) {
                if ($policybrief->gambar && Storage::disk('public')->exists($policybrief->gambar)) {
                    Storage::disk('public')->delete($policybrief->gambar);
                }
                $policybrief->gambar = $request->file('gambar')->store('policybrief/images', 'public');
            }

            $policybrief->save();

            return redirect()->back()->with('status', 'Data Policy Brief berhasil diperbarui!');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Gagal memperbarui data: ' . $e->getMessage());
        }
    }

    /**
     * Hapus policy brief.
     */
public function destroy($id, Request $request)
{
    try {
        $policyBrief = PolicyBrief::findOrFail($id);

        if ($policyBrief->file && Storage::disk('public')->exists($policyBrief->file)) {
            Storage::disk('public')->delete($policyBrief->file);
        }
        if ($policyBrief->gambar && Storage::disk('public')->exists($policyBrief->gambar)) {
            Storage::disk('public')->delete($policyBrief->gambar);
        }

        $policyBrief->delete();

        if ($request->ajax()) {
            return response()->json([
                'status' => 'success',
                'message' => 'Policy Brief berhasil dihapus!'
            ]);
        }

        return redirect()->back()->with('status', 'Policy Brief berhasil dihapus!');
    } catch (Exception $e) {
        if ($request->ajax()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Gagal menghapus data: ' . $e->getMessage()
            ], 500);
        }

        return redirect()->back()->with('error', 'Gagal menghapus data: ' . $e->getMessage());
    }
}

}
