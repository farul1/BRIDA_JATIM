<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IndikatorEvaluasi;
use App\Models\KegiatanEvaluasi;

class IndikatorEvaluasiController extends Controller
{
    public function index($kegiatanId)
    {
        try {
            $kegiatanEvaluasi = KegiatanEvaluasi::findOrFail($kegiatanId);
            $indikator_evaluasi = IndikatorEvaluasi::where('id_kegiatan', $kegiatanId)->get();
            
            return view('public_admin.evaluasi_capaian_kerja.master_indikator.index', 
                compact('kegiatanEvaluasi', 'indikator_evaluasi'));
        } catch (\Exception $e) {
            return redirect()->back()
                             ->with('statusT', 'Kegiatan tidak ditemukan: ' . $e->getMessage());
        }
    }

    public function create($kegiatanId)
    {
        try {
            $kegiatanEvaluasi = KegiatanEvaluasi::findOrFail($kegiatanId);
            return view('public_admin.evaluasi_capaian_kerja.master_indikator.create', compact('kegiatanEvaluasi'));
        } catch (\Exception $e) {
            return redirect()->back()
                             ->with('statusT', 'Kegiatan tidak ditemukan: ' . $e->getMessage());
        }
    }

    public function store(Request $request, $kegiatanId)
    {
        $validatedData = $request->validate([
            'uraian' => 'required|string',
            'target' => 'required|string',
        ]);

        try {
            IndikatorEvaluasi::create([
                'uraian' => $validatedData['uraian'],
                'target' => $validatedData['target'],
                'id_kegiatan' => $kegiatanId,
            ]);

            return redirect()->route('admin.indikator-evaluasi.index', $kegiatanId)
                             ->with('status', 'Indikator Evaluasi Berhasil Ditambahkan');
        } catch (\Exception $e) {
            return redirect()->back()
                             ->withInput()
                             ->with('statusT', 'Gagal menambahkan indikator evaluasi: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        try {
            $indikatorEvaluasi = IndikatorEvaluasi::findOrFail($id);
            $kegiatanEvaluasi = KegiatanEvaluasi::findOrFail($indikatorEvaluasi->id_kegiatan);
            
            return view('public_admin.evaluasi_capaian_kerja.master_indikator.edit', 
                compact('indikatorEvaluasi', 'kegiatanEvaluasi'));
        } catch (\Exception $e) {
            return redirect()->back()
                             ->with('statusT', 'Data tidak ditemukan: ' . $e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'uraian' => 'required|string',
            'target' => 'required|string',
        ]);

        try {
            $indikatorEvaluasi = IndikatorEvaluasi::findOrFail($id);
            $indikatorEvaluasi->update($validatedData);

            return redirect()->route('admin.indikator-evaluasi.index', $indikatorEvaluasi->id_kegiatan)
                             ->with('status', 'Indikator Evaluasi Berhasil Diubah');
        } catch (\Exception $e) {
            return redirect()->back()
                             ->withInput()
                             ->with('statusT', 'Gagal mengubah indikator evaluasi: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $indikatorEvaluasi = IndikatorEvaluasi::findOrFail($id);
            $id_kegiatan = $indikatorEvaluasi->id_kegiatan;
            $indikatorEvaluasi->delete();
            
            return redirect()->route('admin.indikator-evaluasi.index', $id_kegiatan)
                             ->with('status', 'Indikator Evaluasi Berhasil Dihapus');
        } catch (\Exception $e) {
            return redirect()->back()
                             ->with('statusT', 'Gagal menghapus indikator evaluasi: ' . $e->getMessage());
        }
    }
}