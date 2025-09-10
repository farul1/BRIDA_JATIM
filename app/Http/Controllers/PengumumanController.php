<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengumuman;
use Illuminate\Support\Facades\File;

class PengumumanController extends Controller
{
    public function index()
    {
        $pg = Pengumuman::orderBy('id', 'desc')->get();
        return view('public_admin.master_pengumuman.index', compact('pg'));
    }

    public function create()
    {
        return view('public_admin.master_pengumuman.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'tanggal' => 'required|date',
            'lokasi' => 'nullable|string',
            'file' => 'nullable|file|mimes:pdf,doc,docx|max:102400',   // 100 MB
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:102400', // 100 MB

        ]);

        $filePath = null;
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = 'pengumuman_file_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('file_upload/pengumuman/file'), $fileName);
            $filePath = $fileName;
        }

        $gambarPath = null;
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $gambarName = 'pengumuman_gambar_' . time() . '.' . $gambar->getClientOriginalExtension();
            $gambar->move(public_path('file_upload/pengumuman/gambar'), $gambarName);
            $gambarPath = $gambarName;
        }

        Pengumuman::create([
            'judul' => $validatedData['judul'],
            'description' => $validatedData['deskripsi'],
            'tanggal' => $validatedData['tanggal'],
            'location' => $validatedData['lokasi'],
            'file' => $filePath,
            'gambar' => $gambarPath,
        ]);

    session()->put('status', 'Pengumuman Berhasil Ditambahkan');
    return redirect()->back();
    }

public function edit(Request $request)
{
    $id = $request->id;
    $peng = Pengumuman::find($id); // Ambil data pengumuman

    return view('public_admin.master_pengumuman.edit', compact('peng'));
}



    public function update(Request $request, $id)
    {
        $peng = Pengumuman::findOrFail($id);

        $validatedData = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'tanggal' => 'required|date',
            'lokasi' => 'nullable|string',
            'file' => 'nullable|file|mimes:pdf,doc,docx|max:102400',   // 100 MB
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:102400', // 100 MB

        ]);

        $filePath = $peng->file;
        if ($request->hasFile('file')) {
            if (File::exists(public_path('file_upload/pengumuman/file/' . $filePath))) {
                File::delete(public_path('file_upload/pengumuman/file/' . $filePath));
            }
            $file = $request->file('file');
            $fileName = 'pengumuman_file_' . $id . '_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('file_upload/pengumuman/file'), $fileName);
            $filePath = $fileName;
        }

        $gambarPath = $peng->gambar;
        if ($request->hasFile('gambar')) {
            if (File::exists(public_path('file_upload/pengumuman/gambar/' . $gambarPath))) {
                File::delete(public_path('file_upload/pengumuman/gambar/' . $gambarPath));
            }
            $gambar = $request->file('gambar');
            $gambarName = 'pengumuman_gambar_' . $id . '_' . time() . '.' . $gambar->getClientOriginalExtension();
            $gambar->move(public_path('file_upload/pengumuman/gambar'), $gambarName);
            $gambarPath = $gambarName;
        }

        $peng->update([
            'judul' => $validatedData['judul'],
            'description' => $validatedData['deskripsi'],
            'tanggal' => $validatedData['tanggal'],
            'location' => $validatedData['lokasi'],
            'file' => $filePath,
            'gambar' => $gambarPath,
        ]);
        return redirect()->back()->with('status', 'Pengumuman Berhasil Diperbarui!');
    }

    public function destroy($id)
    {
        $peng = Pengumuman::findOrFail($id);

        // Hapus file dan gambar terkait
        if (File::exists(public_path('file_upload/pengumuman/file/' . $peng->file))) {
            File::delete(public_path('file_upload/pengumuman/file/' . $peng->file));
        }
        if (File::exists(public_path('file_upload/pengumuman/gambar/' . $peng->gambar))) {
            File::delete(public_path('file_upload/pengumuman/gambar/' . $peng->gambar));
        }

        $peng->delete();
        return redirect()->back()->with('status', 'Pengumuman berhasil dihapus!');
    }
}
