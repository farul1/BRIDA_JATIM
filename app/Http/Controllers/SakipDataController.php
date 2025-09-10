<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SakipData;
use App\Models\SakipKategori;
use Illuminate\Support\Facades\File;

class SakipDataController extends Controller
{
    public function index()
    {
        $sakip = SakipData::with('kategori')->orderBy('id', 'desc')->get();
        return view('public_admin.sakip.data_sakip.index', compact('sakip'));
    }

    public function create()
    {
        $sakip_kategori = SakipKategori::all();
        return view('public_admin.sakip.data_sakip.create', compact('sakip_kategori'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul' => 'required|string|max:255',
            'id_kategori' => 'required|exists:sakip_kategoris,id',
            'keterangan' => 'nullable|string|max:1000', 
            'file_upload' => 'nullable|file|mimes:pdf,doc,docx|max:100000',
            'gambar_upload' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:50000',
        ]);

        $filePath = null;
        if ($request->hasFile('file_upload')) {
            $file = $request->file('file_upload');
            $fileName = 'sakip_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('file_upload/sakip'), $fileName);
            $filePath = 'file_upload/sakip/' . $fileName;
        }

        $gambarPath = null;
        if ($request->hasFile('gambar_upload')) {
            $gambar = $request->file('gambar_upload');
            $gambarName = 'gambar_' . time() . '.' . $gambar->getClientOriginalExtension();
            $gambar->move(public_path('gambar/sakip'), $gambarName);
            $gambarPath = 'gambar/sakip/' . $gambarName;
        }

        SakipData::create([
            'judul' => $validatedData['judul'],
            'id_kategori' => $validatedData['id_kategori'],
            'keterangan' => $validatedData['keterangan'] ?? null, 
            'file' => $filePath,
            'gambar' => $gambarPath,
        ]);

        session()->put('status', 'Data berhasil Ditambahkan!');
        return redirect()->back();
    }

    public function edit($id)
    {
        $sakip = SakipData::findOrFail($id);
        $sakip_kategori = SakipKategori::all();
        return view('public_admin.sakip.data_sakip.edit', compact('sakip', 'sakip_kategori'));
    }


    public function update(Request $request, $id)
    {
        $sakip_data = SakipData::findOrFail($id);

        $validatedData = $request->validate([
            'judul' => 'required|string|max:255',
            'id_kategori' => 'required|exists:sakip_kategoris,id',
            'keterangan' => 'nullable|string|max:1000',
            'file_upload' => 'nullable|file|mimes:pdf,doc,docx|max:100000',
            'gambar_upload' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:50000',
            'hapus_gambar' => 'nullable|boolean',
        ]);

        // Handle file upload (pdf/doc)
        $filePath = $sakip_data->file;
        if ($request->hasFile('file_upload')) {
            if ($filePath && File::exists(public_path($filePath))) {
                File::delete(public_path($filePath));
            }
            $file = $request->file('file_upload');
            $fileName = 'sakip_' . $id . '_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('file_upload/sakip'), $fileName);
            $filePath = 'file_upload/sakip/' . $fileName;
        }

        // Handle gambar upload dan hapus gambar lama jika checkbox dicentang
        $gambarPath = $sakip_data->gambar;

        // Jika checkbox hapus gambar dicentang
        if ($request->has('hapus_gambar') && $request->hapus_gambar) {
            if ($gambarPath && File::exists(public_path($gambarPath))) {
                File::delete(public_path($gambarPath));
            }
            $gambarPath = null;
        }

        // Jika ada gambar baru diupload, hapus gambar lama dan simpan gambar baru
        if ($request->hasFile('gambar_upload')) {
            if ($gambarPath && File::exists(public_path($gambarPath))) {
                File::delete(public_path($gambarPath));
            }
            $gambar = $request->file('gambar_upload');
            $gambarName = 'gambar_' . $id . '_' . time() . '.' . $gambar->getClientOriginalExtension();
            $gambar->move(public_path('gambar/sakip'), $gambarName);
            $gambarPath = 'gambar/sakip/' . $gambarName;
        }

        // Update data
        $sakip_data->update([
            'judul' => $validatedData['judul'],
            'id_kategori' => $validatedData['id_kategori'],
            'keterangan' => $validatedData['keterangan'] ?? null,
            'file' => $filePath,
            'gambar' => $gambarPath,
        ]);

        session()->flash('status', 'Data berhasil Diupdate!');
        return redirect()->back();
    }

    public function destroy($id)
    {
        $sakip = SakipData::findOrFail($id);

        if ($sakip->file && File::exists(public_path($sakip->file))) {
            File::delete(public_path($sakip->file));
        }
        if ($sakip->gambar && File::exists(public_path($sakip->gambar))) {
            File::delete(public_path($sakip->gambar));
        }

        $sakip->delete();

        return redirect()->back()->with('status', 'Data SAKIP berhasil dihapus!');
    }
}
