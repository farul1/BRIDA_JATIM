<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BridaKategori; // DIUBAH

class BridaKategoriController extends Controller
{
    public function index()
    {
        $bridaKategori = BridaKategori::all();
        return view('public_admin.brida.brida_kategori.index', compact('bridaKategori'));
    }

    public function create()
    {
        return view('public_admin.brida.brida_kategori.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_kategori' => 'required|string|max:255',
            'link' => 'nullable|url',
        ]);

        BridaKategori::create([
            'nama_kategori' => $validatedData['nama_kategori'],
            'link' => $validatedData['link'],
            'status' => 1,
        ]);

        return redirect()->route('brida_kategori.index')->with('status', 'Kategori BRIDA baru berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $bridaKategori = BridaKategori::findOrFail($id);
        return view('public_admin.brida.brida_kategori.edit', compact('bridaKategori'));
    }

    public function update(Request $request, $id)
    {
        $bridaKategori = BridaKategori::findOrFail($id);

        $validatedData = $request->validate([
            'nama_kategori' => 'required|string|max:255',
            'link' => 'nullable|url',
        ]);

        $bridaKategori->update([
            'nama_kategori' => $validatedData['nama_kategori'],
            'link' => $validatedData['link'],
        ]);

        return redirect()->route('brida_kategori.index')->with('status', 'Kategori BRIDA berhasil diubah!');
    }

    public function destroy($id)
    {
        $bridaKategori = BridaKategori::findOrFail($id);
        $bridaKategori->delete();
        return redirect()->route('brida_kategori.index')->with('status', 'Kategori BRIDA berhasil dihapus!');
    }
}
