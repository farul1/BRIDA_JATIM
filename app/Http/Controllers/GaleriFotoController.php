<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GaleriFoto;
use Illuminate\Support\Facades\File; // Untuk mengelola file

class GaleriFotoController extends Controller
{
    public function index()
    {
        $foto = GaleriFoto::orderBy('id','desc')->get();
        return view('public_admin.master_galeri_foto.index', compact('foto'));
    }

    public function create()
    {
        return view('public_admin.master_galeri_foto.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'file' => 'required|image|mimes:jpeg,png,jpg,gif|max:200048', // Validasi file
        ]);

        $new_name = null;
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            // Membuat nama file yang unik dan aman
            $new_name = "thumbnail_" . time() . "." . $file->getClientOriginalExtension();
            $file->move(public_path('file_upload/thumbnail/foto'), $new_name);
        }

        GaleriFoto::create([
            'judul' => $request->judul,
            'description' => $request->deskripsi,
            'thumbnail' => $new_name,
        ]);

        return redirect()->route('foto')->with('status', 'Galeri Foto baru berhasil ditambahkan!');
    }

    public function show($id)
    {
        // Biasanya tidak digunakan untuk admin panel, tapi bisa diisi jika perlu
        $galeri = GaleriFoto::findOrFail($id);
        // return view('...', compact('galeri'));
    }

// GaleriFotoController.php
public function edit(Request $request)
{
    $foto = GaleriFoto::find($request->id);
    if (!$foto) {
        return response()->json(['error' => 'Data tidak ditemukan'], 404);
    }

    // Sesuaikan dengan path blade yang benar
    return view('public_admin.master_galeri_foto.edit', compact('foto'));
}




    public function update(Request $request, $id)
    {
        $foto = GaleriFoto::findOrFail($id);

        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'file' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:200048',
        ]);

        $new_name = $foto->thumbnail;
        if ($request->hasFile('file')) {
            // 1. Hapus thumbnail lama jika ada
            $old_path = public_path('file_upload/thumbnail/foto/' . $foto->thumbnail);
            if (File::exists($old_path)) {
                File::delete($old_path);
            }

            // 2. Unggah thumbnail baru
            $file = $request->file('file');
            $new_name = "thumbnail_" . $id . "_" . time() . "." . $file->getClientOriginalExtension();
            $file->move(public_path('file_upload/thumbnail/foto'), $new_name);
        }

        $foto->update([
            'judul' => $request->judul,
            'description' => $request->deskripsi,
            'thumbnail' => $new_name,
        ]);

        return redirect()->route('foto')->with('status', 'Galeri Foto berhasil diubah!');
    }

    public function destroy($id)
    {
        $foto = GaleriFoto::findOrFail($id);

        // Hapus file thumbnail dari storage sebelum menghapus data
        $path = public_path('file_upload/thumbnail/foto/' . $foto->thumbnail);
        if (File::exists($path)) {
            File::delete($path);
        }

        // Hapus juga semua foto di dalamnya (jika ada relasi)
        // Foto::where('id_galeri', $id)->delete(); // Tambahkan ini jika perlu

        $foto->delete();
        return redirect()->back()->with('status', 'Galeri Foto berhasil dihapus!');
    }
}
