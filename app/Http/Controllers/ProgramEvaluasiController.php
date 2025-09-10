<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProgramEvaluasi;
use App\Models\Bidang;

class ProgramEvaluasiController extends Controller
{
    public function index()
    {
        $program_evaluasi = ProgramEvaluasi::with('bidang')->get();
        return view('public_admin.evaluasi_capaian_kerja.program_evaluasi.index', compact('program_evaluasi'));
    }

    public function create()
    {
        $bidang = Bidang::all();
        return view('public_admin.evaluasi_capaian_kerja.program_evaluasi.create', compact('bidang'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'uraian' => 'required|string',
            'id_bidang' => 'required|exists:bidangs,id',
        ]);

        ProgramEvaluasi::create($validatedData);

session()->put('status', 'Evaluasi Program Berhasil Ditambahkan');
        return redirect()->back(); 
    }

public function show($id)
{
    $program_evaluasi = ProgramEvaluasi::with(['bidang', 'kegiatanEvaluasi'])->findOrFail($id);
    $kegiatan_evaluasi = $program_evaluasi->kegiatanEvaluasi; // Assuming you have a relationship
    $bidang = Bidang::all();
    
    return view('public_admin.evaluasi_capaian_kerja.program_evaluasi.show', 
        compact('program_evaluasi', 'kegiatan_evaluasi', 'bidang', 'id'));
}

    public function edit($id)
    {
        $program_evaluasi = ProgramEvaluasi::findOrFail($id);
        $bidang = Bidang::all();
        return view('public_admin.evaluasi_capaian_kerja.program_evaluasi.edit', compact('program_evaluasi', 'bidang'));
    }

    public function update(Request $request, $id)
    {
        $program_evaluasi = ProgramEvaluasi::findOrFail($id);

        $validatedData = $request->validate([
            'uraian' => 'required|string',
            'id_bidang' => 'required|exists:bidangs,id',
        ]);

        $program_evaluasi->update($validatedData);

session()->put('status', 'Evaluasi Program Berhasil Diubah');
        return redirect()->back(); 
    }

    public function destroy($id) // DIUBAH: Nama method diperbaiki
    {
        $program_evaluasi = ProgramEvaluasi::findOrFail($id);
        $program_evaluasi->delete();
        return redirect()->route('admin.program-evaluasi.index')->with('status', 'Evaluasi Program Berhasil Dihapus');
    }
}
