<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subbidang;
use App\Models\Bidang;

class SubBidangController extends Controller
{
    // Tampilkan semua Sub Bidang
    public function index()
    {
        $subbidang = Subbidang::with('bidang')->latest()->get();
        return view('public_admin.master_subbidang.index', compact('subbidang'));
    }

    // Form Tambah Sub Bidang
    public function create()
    {
        // Ganti 'nama' menjadi 'nama_bidang'
        $bidang = Bidang::orderBy('nama_bidang')->get();
        return view('public_admin.master_subbidang.create', compact('bidang'));
    }

    // Simpan Sub Bidang Baru
// Simpan Sub Bidang Baru
public function store(Request $request)
{
    $validatedData = $request->validate([
        'nama' => 'required|string|max:255',
        'id_bidang' => 'required|exists:bidangs,id',
    ]);

    try {
        Subbidang::create($validatedData);

        // Redirect ke halaman subbidang (index) dengan pesan sukses
       return redirect()->route('subbidang')->with('status', 'Sub Bidang Berhasil Ditambahkan');

    } catch (\Exception $e) {
        // Redirect kembali ke form dengan pesan error
        return redirect()->back()->with('statusT', 'Gagal menambahkan Sub Bidang: ' . $e->getMessage());
    }
}


    // Form Ubah Sub Bidang
    public function edit($id)
    {
        $subbidang = Subbidang::findOrFail($id);
        // Ganti 'nama' menjadi 'nama_bidang'
        $bidang = Bidang::orderBy('nama_bidang')->get();
        return view('public_admin.master_subbidang.edit', compact('subbidang', 'bidang'));
    }

    // Update Sub Bidang
    // Update Sub Bidang
public function update(Request $request, $id)
{
    $subbidang = Subbidang::findOrFail($id);

    $validatedData = $request->validate([
        'nama' => 'required|string|max:255',
        'id_bidang' => 'required|exists:bidangs,id',
    ]);

    try {
        $subbidang->update($validatedData);

        // Redirect ke index dengan pesan sukses
        return redirect()->route('subbidang')->with('status', 'Sub Bidang Berhasil Diperbarui');

    } catch (\Exception $e) {
        // Redirect kembali ke form edit dengan pesan error
        return redirect()->back()->with('statusT', 'Gagal memperbarui Sub Bidang: ' . $e->getMessage());
    }
}

public function destroy($id)
{
    $subbidang = Subbidang::findOrFail($id);
    try {
        $subbidang->delete();
        return response()->json([
            'success' => true,
            'message' => 'Sub Bidang berhasil dihapus'
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'Gagal menghapus Sub Bidang: ' . $e->getMessage()
        ], 500);
    }
}

}