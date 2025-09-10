<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProfilData;
use App\Models\ProfilKategori;
use Illuminate\Support\Facades\File;

class ProfilDataController extends Controller
{
    // Tampilkan semua data
    public function index()
    {
        $profildata = ProfilData::with('profilkategori')->orderByDesc('id')->get();
        return view('public_admin.master_profildata.index', compact('profildata'));
    }

    // Tampilkan form tambah
    public function create()
    {
        // Hanya kategori Aktif
        $profilkat = ProfilKategori::where('status', 1)->get();
        return view('public_admin.master_profildata.create', compact('profilkat'));
    }

    // Simpan data baru
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'kategori' => 'required|exists:profil_kategoris,id',
            'file' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        ]);

        // Pastikan kategori Aktif
        if (!ProfilKategori::where('id', $validatedData['kategori'])->where('status', 1)->exists()) {
            return redirect()->back()->with('statusT', 'Kategori tidak valid atau Non-Aktif');
        }

        $filePath = $this->handleFileUpload($request->file('file'));

        ProfilData::create([
            'judul' => $validatedData['judul'],
            'description' => $validatedData['deskripsi'],
            'id_kategori' => $validatedData['kategori'],
            'file' => $filePath,
        ]);

        return redirect()->back()->with('status', 'Profil Data Berhasil Ditambahkan');
    }

    // Tampilkan form edit
public function edit(Request $request)
{
    $id = $request->id; // Ambil dari query string
    $profildata = ProfilData::findOrFail($id);

    // Tampilkan kategori Aktif + kategori lama jika Non-Aktif
    $profilkat = ProfilKategori::where('status', 1)
                    ->orWhere('id', $profildata->id_kategori)
                    ->get();

    return view('public_admin.master_profildata.edit', compact('profildata', 'profilkat'));
}


    // Update data
    public function update(Request $request, $id)
    {
        $profildata = ProfilData::findOrFail($id);

        $validatedData = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'kategori' => 'required|exists:profil_kategoris,id',
            'file' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        ]);

        // Pastikan kategori Aktif atau kategori lama
        if (!ProfilKategori::where('id', $validatedData['kategori'])
                            ->where(function($q) use ($profildata) {
                                $q->where('status', 1)
                                  ->orWhere('id', $profildata->id_kategori);
                            })->exists()) {
            return redirect()->back()->with('statusT', 'Kategori tidak valid atau Non-Aktif');
        }

        $filePath = $profildata->file;
        if ($request->hasFile('file')) {
            $this->deleteFile($profildata->file);
            $filePath = $this->handleFileUpload($request->file('file'), $id);
        }

        $profildata->update([
            'judul' => $validatedData['judul'],
            'description' => $validatedData['deskripsi'],
            'id_kategori' => $validatedData['kategori'],
            'file' => $filePath,
        ]);

        return redirect()->back()->with('status', 'Perubahan data profil berhasil');
    }

    // Hapus data
    public function destroy($id)
    {
        $profildata = ProfilData::findOrFail($id);
        $this->deleteFile($profildata->file);
        $profildata->delete();

        return redirect()->back()->with('status', 'Profil Data berhasil dihapus!');
    }

    // Upload file
    private function handleFileUpload($file, $id = null)
    {
        if (!$file) return null;

        $fileName = 'profildata_' . ($id ? $id . '_' : '') . time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('file_upload/profil_data/file'), $fileName);

        return $fileName;
    }

    // Hapus file
    private function deleteFile($filename)
    {
        if ($filename && File::exists(public_path('file_upload/profil_data/file/' . $filename))) {
            File::delete(public_path('file_upload/profil_data/file/' . $filename));
        }
    }
}
