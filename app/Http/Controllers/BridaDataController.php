<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BridaData;
use App\Models\BridaKategori;
use Illuminate\Support\Facades\File;

class BridaDataController extends Controller
{
    public function index()
    {
        $bridaData = BridaData::with('kategori')->orderBy('id', 'desc')->get();
        return view('public_admin.brida.data_brida.index', compact('bridaData'));
    }

    public function create()
    {
        $bridaKategori = BridaKategori::all();
        return view('public_admin.brida.data_brida.create', compact('bridaKategori'));
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'judul' => 'required|string|max:255',
                'nama' => 'required|string|max:255',
                'keterangan' => 'nullable|string',
                'description' => 'nullable|string',
                'id_kategori' => 'required|exists:brida_kategori,id',
                'file_upload' => 'nullable|file|max:50240',
                'file_upload_gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:50240',
            ]);

            $filePath = null;
            $gambarPath = null;

            if ($request->hasFile('file_upload')) {
                $file = $request->file('file_upload');
                $fileName = 'brida_file_' . time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('file_upload/brida/file'), $fileName);
                $filePath = 'file_upload/brida/file/' . $fileName;
            }

            if ($request->hasFile('file_upload_gambar')) {
                $gambar = $request->file('file_upload_gambar');
                $gambarName = 'brida_gambar_' . time() . '.' . $gambar->getClientOriginalExtension();
                $gambar->move(public_path('file_upload/brida/gambar'), $gambarName);
                $gambarPath = 'file_upload/brida/gambar/' . $gambarName;
            }

            BridaData::create([
                'judul' => $validatedData['judul'],
                'nama' => $validatedData['nama'],
                'keterangan' => $validatedData['keterangan'] ?? null,
                'description' => $validatedData['description'] ?? null,
                'id_kategori' => $validatedData['id_kategori'],
                'file' => $filePath,
                'gambar' => $gambarPath,
            ]);

            return redirect()->route('brida_data.index')->with('status', 'Data BRIDA berhasil ditambahkan!');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('statusT', 'Gagal menyimpan data: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $brida = BridaData::findOrFail($id);
        $bridaKategori = BridaKategori::all();
        return view('public_admin.brida.data_brida.edit', compact('brida', 'bridaKategori'));

    }

    public function update(Request $request, $id)
    {
        try {
            $bridaData = BridaData::findOrFail($id);

            $validatedData = $request->validate([
                'judul' => 'required|string|max:255',
                'nama' => 'required|string|max:255',
                'keterangan' => 'nullable|string',
                'description' => 'nullable|string',
                'id_kategori' => 'required|exists:brida_kategori,id',
                'file_upload' => 'nullable|file|max:50240',
                'file_upload_gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:50240',
            ]);

            $filePath = $bridaData->file;
            $gambarPath = $bridaData->gambar;

            if ($request->hasFile('file_upload')) {
                if ($filePath && File::exists(public_path($filePath))) {
                    File::delete(public_path($filePath));
                }
                $file = $request->file('file_upload');
                $fileName = 'brida_file_' . $id . '_' . time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('file_upload/brida/file'), $fileName);
                $filePath = 'file_upload/brida/file/' . $fileName;
            }

            if ($request->hasFile('file_upload_gambar')) {
                if ($gambarPath && File::exists(public_path($gambarPath))) {
                    File::delete(public_path($gambarPath));
                }
                $gambar = $request->file('file_upload_gambar');
                $gambarName = 'brida_gambar_' . $id . '_' . time() . '.' . $gambar->getClientOriginalExtension();
                $gambar->move(public_path('file_upload/brida/gambar'), $gambarName);
                $gambarPath = 'file_upload/brida/gambar/' . $gambarName;
            }

            $bridaData->update([
                'judul' => $validatedData['judul'],
                'nama' => $validatedData['nama'],
                'keterangan' => $validatedData['keterangan'] ?? null,
                'description' => $validatedData['description'] ?? null,
                'id_kategori' => $validatedData['id_kategori'],
                'file' => $filePath,
                'gambar' => $gambarPath,
            ]);

            return redirect()->route('brida_data.index')->with('status', 'Data BRIDA berhasil diubah!');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('statusT', 'Gagal mengubah data: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $bridaData = BridaData::findOrFail($id);

            if ($bridaData->file && File::exists(public_path($bridaData->file))) {
                File::delete(public_path($bridaData->file));
            }
            if ($bridaData->gambar && File::exists(public_path($bridaData->gambar))) {
                File::delete(public_path($bridaData->gambar));
            }

            $bridaData->delete();

            return redirect()->route('brida_data.index')->with('status', 'Data BRIDA berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->back()->with('statusT', 'Gagal menghapus data: ' . $e->getMessage());
        }
    }
}
