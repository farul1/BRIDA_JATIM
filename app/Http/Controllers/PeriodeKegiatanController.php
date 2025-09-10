<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PeriodeKegiatan;

class PeriodeKegiatanController extends Controller
{

    public function index()
    {
        $periodekegiatan = PeriodeKegiatan::firstOrCreate(['id' => 1]);
        return view('public_admin.master_periode_kegiatan.index', compact('periodekegiatan'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'periode' => 'required|date'
        ]);

        PeriodeKegiatan::updateOrCreate(
            ['id' => 1],
            ['periode_akhir' => $validatedData['periode']]
        );

        return redirect()->back()->with('status', 'Periode kegiatan berhasil disimpan.');
    }
}
