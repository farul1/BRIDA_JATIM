<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KegiatanEvaluasi;
use App\Models\ProgramEvaluasi;

class KegiatanEvaluasiController extends Controller
{
public function index(ProgramEvaluasi $programEvaluasi)
{
    $kegiatan_evaluasi = KegiatanEvaluasi::where('id_program', $programEvaluasi->id)->get();
    return view('public_admin.evaluasi_capaian_kerja.master_kegiatan.index', 
        compact('programEvaluasi', 'kegiatan_evaluasi'));
}

public function create(Request $request)
{
    $programEvaluasi = ProgramEvaluasi::find($request->programId);
    if(!$programEvaluasi) {
        return response('Program tidak ditemukan', 404);
    }
    return view('kegiatan_evaluasi.create', compact('programEvaluasi'));
}


public function store(Request $request)
{
    $validatedData = $request->validate([
        'uraian' => 'required|string',
        'id_program' => 'required|exists:program_evaluasis,id'
    ]);

    KegiatanEvaluasi::create([
        'uraian' => $validatedData['uraian'],
        'id_program' => $validatedData['id_program'],
    ]);

    session()->put('status', 'Kegiatan Evaluasi Berhasil Ditambahkan');
    return redirect()->back(); 
}


public function edit(Request $request)
{
    $kegiatanEvaluasi = KegiatanEvaluasi::find($request->id);
    $programEvaluasi = ProgramEvaluasi::find($kegiatanEvaluasi->id_program);
    return view('public_admin.evaluasi_capaian_kerja.master_kegiatan.edit', compact('kegiatanEvaluasi', 'programEvaluasi'));
}


    public function update(Request $request, KegiatanEvaluasi $kegiatanEvaluasi)
    {
        $validatedData = $request->validate(['uraian' => 'required|string']);
        $kegiatanEvaluasi->update($validatedData);

        session()->put('status', 'Kegiatan Evaluasi Berhasil Diubah');
        return redirect()->back(); 
    }

    public function destroy(KegiatanEvaluasi $kegiatanEvaluasi)
    {
        $id_program = $kegiatanEvaluasi->id_program;
        $kegiatanEvaluasi->delete();
        
        session()->put('status', 'Kegiatan Evaluasi Berhasil Dihapus');
        return redirect()->back();
    }
}