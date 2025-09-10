<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log; // ✅ Diperbaiki
use App\Models\Gap;
use App\Models\Pag;
use App\Models\Kak;
use App\Models\RencanaAksi;
use App\Models\Pejabat;
use App\Models\PelaksanaanKegiatan;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class PprgController extends Controller
{
    /**
     * Membersihkan string format mata uang (e.g., "Rp 1.000.000") menjadi integer.
     */
    private function cleanCurrency(?string $string): ?int
    {
        if ($string === null || trim($string) === '') {
            return null;
        }
        return (int) preg_replace("/[^0-9]/", "", $string);
    }

    /**
     * Format bulan dan tahun menjadi string "bulan-tahun"
     */
    private function formatMonthYear($bulan, $tahun): string
    {
        return $bulan . "-" . $tahun;
    }

    // ==================== HALAMAN UTAMA & HAPUS ====================

    public function index()
    {
        $gap = Gap::with(['pag', 'pag.kak'])->orderBy('id', 'desc')->get();
        return view('public_admin.master_pprg.index', compact('gap'));
    }

    public function hapus_pprg($idgap)
    {
        $gap = Gap::findOrFail($idgap);
        
        DB::beginTransaction();
        try {
            // Hapus semua relasi secara berurutan dari yang paling dalam
            if ($gap->pag) {
                if ($gap->pag->kak) {
                    $gap->pag->kak->pelaksanaanKegiatan()->delete();
                    $gap->pag->kak()->delete();
                }
                $gap->pag()->delete();
            }
            $gap->rencanaAksi()->delete();
            $gap->delete();
            
            DB::commit();
            return redirect()->route('pprg')->with('status', 'PPRG berhasil dihapus!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Gagal menghapus PPRG: ' . $e->getMessage());
        }
    }

    // ==================== PROSES GAP ====================

    public function create()
    {
        return view('public_admin.master_pprg.create');
    }

    public function simpan_gap(Request $request)
    {
        if ($request->button == "batal") {
            return redirect()->route('pprg');
        }

        $validator = Validator::make($request->all(), [
            'kebijakan' => 'required|string|max:255',
            'program' => 'required|string|max:255',
            'tujuan' => 'required|string',
            'sasaran' => 'required|string',
            'datawawasan' => 'nullable|string',
            'akses' => 'nullable|string',
            'partisipasi' => 'nullable|string',
            'kontrol' => 'nullable|string',
            'manfaat' => 'nullable|string',
            'faktorinternal' => 'nullable|string',
            'faktoreksternal' => 'nullable|string',
            'reformulasitujuan' => 'nullable|string',
            'basisdata' => 'nullable|string',
            'indikatoroutput' => 'nullable|string',
            'indikatoroutcome' => 'nullable|string',
            'rencanaaksi' => 'required|array|min:1',
            'rencanaaksi.*' => 'required|string|min:3',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        DB::beginTransaction();
        try {
            $gapData = $request->only([
                'kebijakan', 'program', 'tujuan', 'sasaran', 'datawawasan', 
                'akses', 'partisipasi', 'kontrol', 'manfaat', 'faktorinternal',
                'faktoreksternal', 'reformulasitujuan', 'basisdata', 
                'indikatoroutput', 'indikatoroutcome'
            ]);
            
            // Rename fields to match database
            $gapData['data_pembukaan_wawasan'] = $gapData['datawawasan'];
            $gapData['sebab_faktor_internal'] = $gapData['faktorinternal'];
            $gapData['sebab_faktor_eksternal'] = $gapData['faktoreksternal'];
            $gapData['reformulasi_tujuan'] = $gapData['reformulasitujuan'];
            $gapData['basis_data'] = $gapData['basisdata'];
            $gapData['indikator_output'] = $gapData['indikatoroutput'];
            $gapData['indikator_outcome'] = $gapData['indikatoroutcome'];
            $gapData['status'] = 1;
            
            unset(
                $gapData['datawawasan'], $gapData['faktorinternal'], 
                $gapData['faktoreksternal'], $gapData['reformulasitujuan'],
                $gapData['basisdata'], $gapData['indikatoroutput'], 
                $gapData['indikatoroutcome']
            );
            
            $gap = Gap::create($gapData);

            foreach ($request->rencanaaksi as $uraian) {
                if (!empty(trim($uraian))) {
                    $gap->rencanaAksi()->create(['uraian' => trim($uraian)]);
                }
            }
            
            DB::commit();

            if ($request->button == "simpanlanjut") {
                return redirect()->route('pag', $gap->id);
            }
            return redirect()->route('pprg')->with('status', 'GAP berhasil ditambahkan!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()
                ->with('error', 'Gagal menyimpan GAP: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function ubah_gap($id)
    {
        $gap = Gap::with('rencanaAksi')->findOrFail($id);
        $aksi = $gap->rencanaAksi;
        return view('public_admin.master_pprg.editgap', compact('gap', 'aksi'));
    }

    public function simpan_ubah_gap(Request $request, $id)
    {
        $gap = Gap::findOrFail($id);
        
        $validator = Validator::make($request->all(), [
            'kebijakan' => 'required|string|max:255',
            'program' => 'required|string|max:255',
            'tujuan' => 'required|string',
            'sasaran' => 'required|string',
            'rencanaaksi' => 'required|array|min:1',
            'rencanaaksi.*' => 'required|string|min:3',
            'idrencana.*' => 'nullable|exists:rencana_aksis,id',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        
        DB::beginTransaction();
        try {
            $gapData = $request->only([
                'kebijakan', 'program', 'tujuan', 'sasaran', 'datawawasan', 
                'akses', 'partisipasi', 'kontrol', 'manfaat', 'faktorinternal',
                'faktoreksternal', 'reformulasitujuan', 'basisdata', 
                'indikatoroutput', 'indikatoroutcome'
            ]);
            
            // Rename fields to match database
            $gapData['data_pembukaan_wawasan'] = $gapData['datawawasan'];
            $gapData['sebab_faktor_internal'] = $gapData['faktorinternal'];
            $gapData['sebab_faktor_eksternal'] = $gapData['faktoreksternal'];
            $gapData['reformulasi_tujuan'] = $gapData['reformulasitujuan'];
            $gapData['basis_data'] = $gapData['basisdata'];
            $gapData['indikator_output'] = $gapData['indikatoroutput'];
            $gapData['indikator_outcome'] = $gapData['indikatoroutcome'];
            
            unset(
                $gapData['datawawasan'], $gapData['faktorinternal'], 
                $gapData['faktoreksternal'], $gapData['reformulasitujuan'],
                $gapData['basisdata'], $gapData['indikatoroutput'], 
                $gapData['indikatoroutcome']
            );
            
            $gap->update($gapData);

            // Update existing rencana aksi
            if ($request->has('idrencana')) {
                foreach ($request->idrencana as $key => $idAksi) {
                    if (!empty($idAksi)) {
                        $aksi = RencanaAksi::find($idAksi);
                        if ($aksi && $aksi->gap_id == $gap->id) {
                            $aksi->update(['uraian' => $request->rencanaaksi[$key]]);
                        }
                    }
                }
            }

            // Add new rencana aksi
            $existingCount = count($request->idrencana ?? []);
            $totalCount = count($request->rencanaaksi);
            
            if ($totalCount > $existingCount) {
                for ($i = $existingCount; $i < $totalCount; $i++) {
                    if (!empty(trim($request->rencanaaksi[$i]))) {
                        $gap->rencanaAksi()->create(['uraian' => trim($request->rencanaaksi[$i])]);
                    }
                }
            }
            
            DB::commit();

            if ($request->button == "simpanlanjut") {
                return redirect()->route('ubah_pag', $gap->id);
            }
            return redirect()->route('pprg')->with('status', 'GAP berhasil diubah!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()
                ->with('error', 'Gagal mengubah GAP: ' . $e->getMessage())
                ->withInput();
        }
    }

    // ==================== PROSES PAG ====================

    public function buka_pag($id)
    {
        $gap = Gap::with('rencanaAksi')->findOrFail($id);
        return view('public_admin.master_pprg.create_pag', compact('gap'));
    }

    public function simpan_pag(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'gap_id' => 'required|exists:gaps,id',
            'tahun' => 'required|integer|min:2000|max:2100',
            'kode_program' => 'required|string|max:50',
            'jumlah_anggaran' => 'required|string',
            'aksiid' => 'required|array',
            'aksiid.*' => 'exists:rencana_aksis,id',
            'input.*' => 'nullable|string',
            'output.*' => 'nullable|string',
            'outcome.*' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $gap = Gap::findOrFail($request->gap_id);

        DB::beginTransaction();
        try {
            $pag = Pag::create([
                'gap_id' => $request->gap_id,
                'tahun' => $request->tahun,
                'kode_program' => $request->kode_program,
                'jumlah_anggaran' => $this->cleanCurrency($request->jumlah_anggaran),
            ]);

            foreach ($request->aksiid as $key => $idAksi) {
                $rencanaAksi = RencanaAksi::find($idAksi);
                if ($rencanaAksi && $rencanaAksi->gap_id == $gap->id) {
                    $rencanaAksi->update([
                        'input' => $request->input[$key] ?? null,
                        'output' => $request->output[$key] ?? null,
                        'outcome' => $request->outcome[$key] ?? null,
                    ]);
                }
            }

            $gap->update(['status' => 2]);
            DB::commit();

            if ($request->button == "simpanlanjut") {
                return redirect()->route('kak', $pag->id);
            }
            return redirect()->route('pprg')->with('status', 'PAG berhasil ditambahkan!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()
                ->with('error', 'Gagal menyimpan PAG: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function ubah_pag($idgap)
    {
        $gap = Gap::with(['rencanaAksi', 'pag'])->findOrFail($idgap);
        
        if (!$gap->pag) {
            return redirect()->route('pag', $gap->id);
        }
        
        return view('public_admin.master_pprg.editpag', compact('gap'));
    }

    public function simpan_ubah_pag(Request $request, $id)
    {
        $pag = Pag::with('gap')->findOrFail($id);
        
        $validator = Validator::make($request->all(), [
            'gap_id' => 'required|exists:gaps,id',
            'tahun' => 'required|integer|min:2000|max:2100',
            'kode_program' => 'required|string|max:50',
            'jumlah_anggaran' => 'required|numeric',
            'aksiid' => 'required|array',
            'aksiid.*' => 'exists:rencana_aksis,id',
            'input.*' => 'nullable|string',
            'output.*' => 'nullable|string',
            'outcome.*' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        
        DB::beginTransaction();
        try {
            $pag->update([
                'gap_id' => $request->gap_id,
                'tahun' => $request->tahun,
                'kode_program' => $request->kode_program,
                'jumlah_anggaran' => $this->cleanCurrency($request->jumlah_anggaran),
            ]);

            foreach ($request->aksiid as $key => $idAksi) {
                $rencanaAksi = RencanaAksi::find($idAksi);
                if ($rencanaAksi && $rencanaAksi->gap_id == $request->gap_id) {
                    $rencanaAksi->update([
                        'input' => $request->input[$key] ?? null,
                        'output' => $request->output[$key] ?? null,
                        'outcome' => $request->outcome[$key] ?? null,
                    ]);
                }
            }

            DB::commit();

            if ($request->button == "simpanlanjut") {
                return redirect()->route('ubah_kak', $pag->id);
            }
            return redirect()->route('pprg')->with('status', 'PAG berhasil diubah!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()
                ->with('error', 'Gagal mengubah PAG: ' . $e->getMessage())
                ->withInput();
        }
    }

// ==================== PROSES KAK ====================

public function buka_kak($id)
{
    $pag = Pag::with(['gap', 'gap.rencanaAksi'])->findOrFail($id);
    return view('public_admin.master_pprg.create_kak', compact('pag'));
}

public function simpan_kak(Request $request)
{
    // Debug: Cek input yang diterima
    Log::info('KAK Request Data:', $request->all());
    
    $validator = Validator::make($request->all(), [
        'idpag' => 'required|exists:pags,id',
        'dasar_hukum' => 'required|string',
        'gambaran_umum' => 'required|string',
        'pembukaan_wawasan' => 'nullable|string',
        'akses' => 'nullable|string',
        'partisipasi' => 'nullable|string',
        'kontrol' => 'nullable|string',
        'manfaat' => 'nullable|string',
        'kesenjangan_internal' => 'nullable|string',
        'kesenjangan_eksternal' => 'nullable|string',
        'tujuan_kegiatan' => 'required|string',
        'penerima_manfaat' => 'required|string',
        'tempat_pelaksanaan' => 'required|string',
        'tahun_mulai' => 'required|integer|min:2000|max:2100',
        'bulan_mulai' => 'required|integer|min:1|max:12',
        'tahun_selesai' => 'required|integer|min:2000|max:2100',
        'bulan_selesai' => 'required|integer|min:1|max:12',
        'penjelasan1' => 'required|string',
        'batasan' => 'required|array|min:1',
        'batasan.*' => 'string',
        'durasi' => 'required|string|max:100',
        'biaya' => 'required|numeric',
        'penanggung_jawab' => 'required|string|max:255',
        'pelaksana' => 'required|string|max:255',
        'label' => 'required|array|min:1',
        'label.*' => 'required|string|max:100',
        'uraian' => 'required|array|min:1',
        'uraian.*' => 'required|string',
    ]);

    if ($validator->fails()) {
        Log::error('KAK Validation Failed:', $validator->errors()->toArray());
        return redirect()->back()
            ->withErrors($validator)
            ->withInput();
    }

    // Cek apakah PAG ada
    $pag = Pag::with('gap')->find($request->idpag);
    if (!$pag) {
        Log::error('PAG not found with ID: ' . $request->idpag);
        return redirect()->back()
            ->with('error', 'PAG tidak ditemukan!')
            ->withInput();
    }

    DB::beginTransaction();
    try {
        $kakData = $request->only([
            'dasar_hukum', 'gambaran_umum', 'pembukaan_wawasan', 
            'akses', 'partisipasi', 'kontrol', 'manfaat',
            'kesenjangan_internal', 'kesenjangan_eksternal',
            'tujuan_kegiatan', 'penerima_manfaat', 'tempat_pelaksanaan',
            'penjelasan1', 'durasi', 'penanggung_jawab', 'pelaksana'
        ]);
        
        // Rename fields to match database
        $kakData['data_pembukaan_wawasan'] = $kakData['pembukaan_wawasan'] ?? null;
        $kakData['internal'] = $kakData['kesenjangan_internal'] ?? null;
        $kakData['eksternal'] = $kakData['kesenjangan_eksternal'] ?? null;
        $kakData['subkegiatan'] = $kakData['penjelasan1'] ?? null;
        $kakData['pag_id'] = $request->idpag; // ✅ DIUBAH: id_pag → pag_id
        $kakData['biaya'] = $this->cleanCurrency($request->biaya);
        $kakData['batasan_kegiatan'] = implode(";", $request->batasan ?? []);
        $kakData['waktu_mulai'] = $this->formatMonthYear($request->bulan_mulai, $request->tahun_mulai);
        $kakData['waktu_selesai'] = $this->formatMonthYear($request->bulan_selesai, $request->tahun_selesai);
        
        unset(
            $kakData['pembukaan_wawasan'], $kakData['kesenjangan_internal'],
            $kakData['kesenjangan_eksternal'], $kakData['penjelasan1']
        );
        
        // ✅ DEBUG: Lihat data yang akan di-create
        Log::info('KAK Data to be created:', $kakData);
        
        $kak = Kak::create($kakData);

        // Simpan kegiatan
        if ($request->has('label')) {
            foreach ($request->label as $key => $label) {
                if (!empty(trim($label)) && isset($request->uraian[$key]) && !empty(trim($request->uraian[$key]))) {
                    $kak->pelaksanaanKegiatan()->create([
                        'label' => trim($label),
                        'uraian' => trim($request->uraian[$key]),
                    ]);
                }
            }
        }
        
        // Update status gap
        if ($pag->gap) {
            $pag->gap->update(['status' => 3]);
        }
        
        DB::commit();
        
        Log::info('KAK created successfully for PAG ID: ' . $request->idpag);
        return redirect()->route('pprg')->with('status', 'KAK berhasil ditambahkan!');
    } catch (\Exception $e) {
        DB::rollBack();
        Log::error('Failed to save KAK: ' . $e->getMessage(), [
            'trace' => $e->getTraceAsString()
        ]);
        return redirect()->back()
            ->with('error', 'Gagal menyimpan KAK: ' . $e->getMessage())
            ->withInput();
    }
}

public function ubah_kak($id)
{
    $kak = Kak::with(['pag', 'pag.gap', 'pag.gap.rencanaAksi', 'pelaksanaanKegiatan'])
             ->findOrFail($id);
    return view('public_admin.master_pprg.editkak', compact('kak'));
}

public function simpan_ubah_kak(Request $request, $id)
{
    $kak = Kak::with('pag')->findOrFail($id);
    
    $validator = Validator::make($request->all(), [
        'dasar_hukum' => 'required|string',
        'gambaran_umum' => 'required|string',
        'pembukaan_wawasan' => 'nullable|string',
        'akses' => 'nullable|string',
        'partisipasi' => 'nullable|string',
        'kontrol' => 'nullable|string',
        'manfaat' => 'nullable|string',
        'kesenjangan_internal' => 'nullable|string',
        'kesenjangan_eksternal' => 'nullable|string',
        'tujuan_kegiatan' => 'required|string',
        'penerima_manfaat' => 'required|string',
        'tempat_pelaksanaan' => 'required|string',
        'tahun_mulai' => 'required|integer|min:2000|max:2100',
        'bulan_mulai' => 'required|integer|min:1|max:12',
        'tahun_selesai' => 'required|integer|min:2000|max:2100',
        'bulan_selesai' => 'required|integer|min:1|max:12',
        'penjelasan1' => 'required|string',
        'batasan' => 'required|array|min:1',
        'batasan.*' => 'string',
        'durasi' => 'required|string|max:100',
        'biaya' => 'required|numeric',
        'penanggung_jawab' => 'required|string|max:255',
        'pelaksana' => 'required|string|max:255',
        'label' => 'required|array|min:1',
        'label.*' => 'required|string|max:100',
        'uraian' => 'required|array|min:1',
        'uraian.*' => 'required|string',
        'idkegiatan.*' => 'nullable|exists:pelaksanaan_kegiatans,id',
    ]);

    if ($validator->fails()) {
        return redirect()->back()
            ->withErrors($validator)
            ->withInput();
    }
    
    DB::beginTransaction();
    try {
        $kakData = $request->only([
            'dasar_hukum', 'gambaran_umum', 'pembukaan_wawasan', 
            'akses', 'partisipasi', 'kontrol', 'manfaat',
            'kesenjangan_internal', 'kesenjangan_eksternal',
            'tujuan_kegiatan', 'penerima_manfaat', 'tempat_pelaksanaan',
            'penjelasan1', 'durasi', 'penanggung_jawab', 'pelaksana'
        ]);
        
        // Rename fields to match database
        $kakData['data_pembukaan_wawasan'] = $kakData['pembukaan_wawasan'] ?? null;
        $kakData['internal'] = $kakData['kesenjangan_internal'] ?? null;
        $kakData['eksternal'] = $kakData['kesenjangan_eksternal'] ?? null;
        $kakData['subkegiatan'] = $kakData['penjelasan1'] ?? null;
        $kakData['biaya'] = $this->cleanCurrency($request->biaya);
        $kakData['batasan_kegiatan'] = implode(";", $request->batasan ?? []);
        $kakData['waktu_mulai'] = $this->formatMonthYear($request->bulan_mulai, $request->tahun_mulai);
        $kakData['waktu_selesai'] = $this->formatMonthYear($request->bulan_selesai, $request->tahun_selesai);
        
        unset(
            $kakData['pembukaan_wawasan'], $kakData['kesenjangan_internal'],
            $kakData['kesenjangan_eksternal'], $kakData['penjelasan1']
        );
        
        $kak->update($kakData);

        // Update existing kegiatan
        if ($request->has('idkegiatan')) {
            foreach ($request->idkegiatan as $key => $idKegiatan) {
                if (!empty($idKegiatan)) {
                    $kegiatan = PelaksanaanKegiatan::find($idKegiatan);
                    if ($kegiatan && $kegiatan->id_kak == $kak->id) {
                        $kegiatan->update([
                            'label' => $request->label[$key] ?? '',
                            'uraian' => $request->uraian[$key] ?? '',
                        ]);
                    }
                }
            }
        }

        // Add new kegiatan if any
        $existingCount = count($request->idkegiatan ?? []);
        $totalCount = count($request->label);
        
        if ($totalCount > $existingCount) {
            for ($i = $existingCount; $i < $totalCount; $i++) {
                if (!empty(trim($request->label[$i] ?? '')) && !empty(trim($request->uraian[$i] ?? ''))) {
                    $kak->pelaksanaanKegiatan()->create([
                        'label' => trim($request->label[$i]),
                        'uraian' => trim($request->uraian[$i]),
                    ]);
                }
            }
        }
        
        DB::commit();
        return redirect()->route('pprg')->with('status', 'KAK berhasil diubah!');
    } catch (\Exception $e) {
        DB::rollBack();
        return redirect()->back()
            ->with('error', 'Gagal mengubah KAK: ' . $e->getMessage())
            ->withInput();
    }
}
    // ==================== PROSES CETAK ====================

    public function cetak_gap($id)
    {
        $gap = Gap::with('rencanaAksi')->findOrFail($id);
        $rencana_aksi = $gap->rencanaAksi;
        return view('public_admin.master_pprg.cetak.cetak_gap', compact('gap', 'rencana_aksi'));
    }
    
    public function cetak_pag($id)
    {
        $pag = Pag::with('gap')->findOrFail($id);
        $pejabat = Pejabat::all();
        return view('public_admin.master_pprg.pre-print-pag', compact('pejabat', 'pag'));
    }

    public function cetak_final_pag(Request $request)
    {
        $request->validate([
            'idpejabat' => 'required|exists:pejabats,id',
            'idgap' => 'required|exists:gaps,id',
            'tahun' => 'required|integer',
            'bulan' => 'required|integer|min:1|max:12',
        ]);
        
        $pejabat = Pejabat::findOrFail($request->idpejabat);
        $gap = Gap::with(['rencanaAksi', 'pag'])->findOrFail($request->idgap);
        
        return view('public_admin.master_pprg.cetak.cetak_pag', compact('request', 'gap', 'pejabat'));
    }

    public function cetak_kak($id)
    {
        $kak = Kak::with(['pag', 'pag.gap'])->findOrFail($id);
        $pejabat = Pejabat::all();
        return view('public_admin.master_pprg.pre-print-kak', compact('pejabat', 'kak'));
    }

    public function cetak_final_kak(Request $request)
    {
        $request->validate([
            'idpejabat' => 'required|exists:pejabats,id',
            'idgap' => 'required|exists:gaps,id',
            'tahun' => 'required|integer',
            'bulan' => 'required|integer|min:1|max:12',
        ]);
        
        $pejabat = Pejabat::findOrFail($request->idpejabat);
        $gap = Gap::with(['rencanaAksi', 'pag', 'pag.kak', 'pag.kak.pelaksanaanKegiatan'])
                 ->findOrFail($request->idgap);
        
        return view('public_admin.master_pprg.cetak.cetak_kak', compact('request', 'gap', 'pejabat'));
    }
}