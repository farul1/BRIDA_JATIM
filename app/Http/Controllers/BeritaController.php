<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use Carbon\Carbon;

class BeritaController extends Controller
{
    public function index()
    {
        $berita = Berita::orderBy('id','desc')->get();
        return view('public_admin.master_berita.index', compact('berita'));
    }

    public function create()
    {
        return view('public_admin.master_berita.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'tanggal' => 'required|date',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $new_name = null;
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $new_name = "br_" . time() . "_" . $file->getClientOriginalName();
            $file->move(public_path('file_upload/berita'), $new_name);
        }

        Berita::create([
            'judul' => $request->judul,
            'description' => $request->deskripsi,
            'tanggal' => $request->tanggal,
            'gambar' => $new_name,
        ]);

        return redirect()->route('berita')->with('success', 'Berita Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        $berita = Berita::findOrFail($id);
        return view('public_admin.master_berita.edit', compact('berita'));
    }

    public function update(Request $request, $id)
    {
        $berita = Berita::findOrFail($id);

        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'tanggal' => 'required|date',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $new_name = $berita->gambar;
        if ($request->hasFile('gambar')) {
            if ($new_name && file_exists(public_path('file_upload/berita/' . $new_name))) {
                unlink(public_path('file_upload/berita/' . $new_name));
            }
            $file = $request->file('gambar');
            $new_name = "br_" . $id . "_" . time() . "_" . $file->getClientOriginalName();
            $file->move(public_path('file_upload/berita'), $new_name);
        }

        $berita->update([
            'judul' => $request->judul,
            'description' => $request->deskripsi,
            'tanggal' => $request->tanggal,
            'gambar' => $new_name,
        ]);

        return redirect()->route('berita')->with('success', 'Berita Berhasil Diperbarui');
    }

    public function destroy($id)
    {
        $berita = Berita::findOrFail($id);
        if ($berita->gambar && file_exists(public_path('file_upload/berita/' . $berita->gambar))) {
            unlink(public_path('file_upload/berita/' . $berita->gambar));
        }
        $berita->delete();
        return redirect()->route('berita')->with('success', 'Berita Berhasil Dihapus');
    }
}
