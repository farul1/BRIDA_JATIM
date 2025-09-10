<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SakipKategori;

class SakipController extends Controller
{
    public function index()
    {
        $sakip_kategori = SakipKategori::all();
        return view('public_admin.sakip.kategori_sakip.index', compact('sakip_kategori'));
    }

    public function create()
    {
        return view('public_admin.sakip.kategori_sakip.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul' => 'required|string|max:255',
            'link' => 'nullable|url',
        ]);

        SakipKategori::create([
            'nama_kategori' => $validatedData['judul'],
            'link' => $validatedData['link'],
            'status' => 1, // Default status
        ]);

        session()->put('status', 'Kategori baru berhasil ditambahkan!');  
        return redirect()->back();
    }

    public function edit($id)
    {
        $sakip_kategori = SakipKategori::findOrFail($id);
        return view('public_admin.sakip.kategori_sakip.edit', compact('sakip_kategori'));
    }

    public function update(Request $request, $id)
    {
        $sakip_kategori = SakipKategori::findOrFail($id);

        $validatedData = $request->validate([
            'judul' => 'required|string|max:255',
            'link' => 'nullable|url',
        ]);

        $sakip_kategori->update([
            'nama_kategori' => $validatedData['judul'],
            'link' => $validatedData['link'],
        ]);

        session()->put('status', 'Kategori berhasil diubah!');  
        return redirect()->back();
    }

public function destroy($id)
{
    $data = SakipKategori::findOrFail($id);
    $data->delete();

    return response()->json(['success' => true]);
}


}
