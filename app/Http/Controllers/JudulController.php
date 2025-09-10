<?php

// File: app/Http/Controllers/JudulController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Judul;
use App\Models\Subbidang;
use App\Models\Bidang;

class JudulController extends Controller
{
    public function index()
    {
        $judul = Judul::with(['bidang', 'subBidang'])->orderBy('id', 'desc')->get();
        return view('public_admin.master_judul.index', compact('judul'));
    }
    public function create()
    {
        $bidang = Bidang::all();
        return view('public_admin.master_judul.create', compact('bidang'));
    }

    public function getSubBidangByBidang(Request $request)
    {
        $subBidang = Subbidang::where('id_bidang', $request->id_bidang)->get();
        return response()->json($subBidang);
    }

public function store(Request $request)
{
    $validatedData = $request->validate([
        'judul' => 'required|string|max:255',
        'id_bidang' => 'required|exists:bidangs,id',
        'sub_bidang_id' => 'required|exists:subbidangs,id',
        'uraian' => 'required|string',
    ]);

    Judul::create([
        'judul' => $validatedData['judul'],
        'id_bidang' => $validatedData['id_bidang'],
        'id_subbidang' => $validatedData['sub_bidang_id'], // Pastikan nama kolom sesuai database
        'uraian' => $validatedData['uraian'],
        'tanggal' => now(),
    ]);

    return redirect()->back()->with('success', 'Judul Berhasil Ditambahkan');
}
public function edit($id)
{
    $judul = Judul::findOrFail($id);
    $bidang = Bidang::all();
    return view('public_admin.master_judul.edit', compact('judul', 'bidang'));
}


public function update(Request $request, $id)
{
    $judul = Judul::findOrFail($id);

    $validatedData = $request->validate([
        'judul' => 'required|string',
        'id_bidang' => 'required|exists:bidangs,id',
        'sub_bidang_id' => 'required|exists:subbidangs,id',
        'uraian' => 'required|string',
    ]);

    $judul->update($validatedData);

    return redirect()->back()->with('status', 'Judul Berhasil Diubah');
}
public function destroy($id)
{
    $judul = Judul::findOrFail($id);
    $judul->delete();
    return response()->json(['success' => true]);
}

public function divSubbidang(Request $request)
{
    $id_bidang = $request->id_bidang;
    $subbidangs = Subbidang::where('id_bidang', $id_bidang)->orderBy('nama')->get();

    // Buat option HTML
    $options = '<option value="0">-- PILIH SUB JENIS --</option>';
    foreach ($subbidangs as $sub) {
        $options .= '<option value="'.$sub->id.'">'.$sub->nama.'</option>';
    }

    return $options;
}

}
