<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IndikatorEvaluasi;
use App\Models\AksiEvaluasi;

class AksiEvaluasiController extends Controller
{
    public function index($indikatorId)
    {
        try {
            $indikatorEvaluasi = IndikatorEvaluasi::findOrFail($indikatorId);
            $aksi_evaluasi = AksiEvaluasi::where('id_indikator', $indikatorId)->get();
            
            return view('public_admin.evaluasi_capaian_kerja.master_aksi.index', [
                'indikator_evaluasi' => $indikatorEvaluasi,
                'aksi_evaluasi' => $aksi_evaluasi,
            ]);
        } catch (\Exception $e) {
            return redirect()->back()
                             ->with('statusT', 'Indikator tidak ditemukan: ' . $e->getMessage());
        }
    }

    public function create($indikatorId)
    {
        try {
            $indikatorEvaluasi = IndikatorEvaluasi::findOrFail($indikatorId);
            return view('public_admin.evaluasi_capaian_kerja.master_aksi.create', [
                'indikator_evaluasi' => $indikatorEvaluasi
            ]);
        } catch (\Exception $e) {
            return redirect()->back()
                             ->with('statusT', 'Indikator tidak ditemukan: ' . $e->getMessage());
        }
    }

    public function store(Request $request, $indikatorId)
    {
        $request->validate(['aksi' => 'required|string']);

        try {
            AksiEvaluasi::create([
                'uraian' => $request->aksi,
                'id_indikator' => $indikatorId,
            ]);

            return redirect()->route('admin.aksi-evaluasi.index', $indikatorId)
                             ->with('status', 'Aksi Evaluasi Berhasil Ditambahkan');
        } catch (\Exception $e) {
            return redirect()->back()
                             ->withInput()
                             ->with('statusT', 'Gagal menambahkan aksi evaluasi: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        try {
            $aksiEvaluasi = AksiEvaluasi::findOrFail($id);
            $indikator_evaluasi = IndikatorEvaluasi::findOrFail($aksiEvaluasi->id_indikator);

            return view('public_admin.evaluasi_capaian_kerja.master_aksi.edit', [
                'aksi_evaluasi' => $aksiEvaluasi,
                'indikator_evaluasi' => $indikator_evaluasi,
            ]);
        } catch (\Exception $e) {
            return redirect()->back()
                             ->with('statusT', 'Data tidak ditemukan: ' . $e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate(['aksi' => 'required|string']);

        try {
            $aksiEvaluasi = AksiEvaluasi::findOrFail($id);
            $aksiEvaluasi->update([
                'uraian' => $request->aksi,
            ]);

            return redirect()->route('admin.aksi-evaluasi.index', $aksiEvaluasi->id_indikator)
                             ->with('status', 'Aksi Evaluasi Berhasil Diubah');
        } catch (\Exception $e) {
            return redirect()->back()
                             ->withInput()
                             ->with('statusT', 'Gagal mengubah aksi evaluasi: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $aksiEvaluasi = AksiEvaluasi::findOrFail($id);
            $id_indikator = $aksiEvaluasi->id_indikator;
            $aksiEvaluasi->delete();
            
            return redirect()->route('admin.aksi-evaluasi.index', $id_indikator)
                             ->with('status', 'Aksi Evaluasi Berhasil Dihapus');
        } catch (\Exception $e) {
            return redirect()->back()
                             ->with('statusT', 'Gagal menghapus aksi evaluasi: ' . $e->getMessage());
        }
    }
}