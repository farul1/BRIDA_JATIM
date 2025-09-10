<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InfoWeb;

class DataProfileController extends Controller
{

    public function index()
    {
        $info_web = InfoWeb::firstOrCreate(
            ['id' => 1],
            [
                'profil' => 'Tulis profil di sini...',
                'tugas_pokok' => 'Tulis tugas pokok di sini...'
            ]
        );

        return view('public_admin.master_profile_web.index', compact('info_web'));
    }


    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'profil' => 'required|string',
            'tugas_pokok' => 'required|string',
            'tujuan' => 'nullable|string',
            'tentang_kami' => 'nullable|string',
            'struktur_organisasi' => 'nullable|string',
        ]);

        $info_web = InfoWeb::find(1);

        if ($info_web) {
            $info_web->update($validatedData);
        } else {
            InfoWeb::create($validatedData);
        }

        return redirect()->back()->with('status', 'Data profil berhasil diperbarui!');
    }

}
