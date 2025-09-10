<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProfilKategori;

class ProfilKategoriController extends Controller
{
    // Tampilkan semua data
    public function index()
    {
        $profilkat = ProfilKategori::orderBy('id', 'desc')->get();
        return view('public_admin.master_profilkat.index', compact('profilkat'));
    }

    // Tampilkan form tambah
    public function create()
    {
        return view('public_admin.master_profilkat.create');
    }

    // Simpan data baru
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_kategori' => 'required|string|max:255',
            'link' => 'nullable|url',
            'status' => 'required|in:0,1', // 0 = Non-Aktif, 1 = Aktif
        ]);

        ProfilKategori::create($validatedData);

        session()->flash('status', 'Profil Kategori Berhasil Ditambahkan');
        return redirect()->back();
    }

    // Tampilkan form edit
    public function edit($id)
    {
        $profilkat = ProfilKategori::findOrFail($id);
        return view('public_admin.master_profilkat.edit', compact('profilkat'));
    }

    // Update data
    public function update(Request $request, $id)
    {
        $profilkat = ProfilKategori::findOrFail($id);

        $validatedData = $request->validate([
            'nama_kategori' => 'required|string|max:255',
            'link' => 'nullable|url',
            'status' => 'required|in:0,1',
        ]);

        $profilkat->update($validatedData);

        session()->flash('status', 'Profil Kategori Berhasil Diubah');
        return redirect()->back();
    }

    // Hapus data (AJAX)
    public function destroy($id)
    {
        try {
            $profilkat = ProfilKategori::findOrFail($id);
            $profilkat->delete();
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false, 
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
