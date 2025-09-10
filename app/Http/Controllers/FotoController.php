<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Foto;
use App\Models\GaleriFoto;
use Illuminate\Support\Facades\File; // Untuk menghapus file

class FotoController extends Controller
{
    public function index()
    {
        $foto = Foto::with('galeriFoto')->orderBy('id', 'desc')->get(); // Eager load relasi
        return view('public_admin.master_foto.index', compact('foto'));
    }

    public function create()
    {
        $galeri = GaleriFoto::all();
        return view('public_admin.master_foto.create', compact('galeri'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'galeri' => 'required|exists:galeri_fotos,id',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'file' => 'required|image|mimes:jpeg,png,jpg,gif|max:200048',
        ]);

        $new_name = null;
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $new_name = "foto_" . time() . "." . $file->getClientOriginalExtension();
            $file->move(public_path('file_upload/foto'), $new_name);
        }

        Foto::create([
            'id_galeri' => $request->galeri,
            'judul' => $request->judul,
            'description' => $request->deskripsi,
            'gambar' => $new_name,
        ]);

        return redirect()->route('galerifoto')->with('status', 'Foto Berhasil Ditambahkan');
    }

public function edit($id)
{
    $foto = Foto::findOrFail($id);
    $galeri = GaleriFoto::all();
    return view('public_admin.master_foto.edit', compact('foto', 'galeri'));
}

    public function update(Request $request, $id)
    {
        $foto = Foto::findOrFail($id);

        $request->validate([
            'galeri' => 'required|exists:galeri_fotos,id',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'file' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:200048',
        ]);

        $new_name = $foto->gambar;
        if ($request->hasFile('file')) {
            $old_path = public_path('file_upload/foto/' . $foto->gambar);
            if (File::exists($old_path)) {
                File::delete($old_path);
            }
            $file = $request->file('file');
            $new_name = "foto_" . $id . "_" . time() . "." . $file->getClientOriginalExtension();
            $file->move(public_path('file_upload/foto'), $new_name);
        }

        $foto->update([
            'id_galeri' => $request->galeri,
            'judul' => $request->judul,
            'description' => $request->deskripsi,
            'gambar' => $new_name,
        ]);

        return redirect()->route('galerifoto')->with('status', 'Perubahan Foto berhasil');
    }
    public function destroy($id)
    {
        $foto = Foto::findOrFail($id);

        // Hapus file dari storage
        $path = public_path('file_upload/foto/' . $foto->gambar);
        if (File::exists($path)) {
            File::delete($path);
        }

        $foto->delete();
        return redirect()->back()->with('status', 'Foto berhasil dihapus!');
    }
}
