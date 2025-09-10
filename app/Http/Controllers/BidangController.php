<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bidang;

class BidangController extends Controller
{
    public function index()
    {
        $bidang = Bidang::orderBy('id', 'desc')->get();
        return view('public_admin.master_bidang.index', compact('bidang'));
    }

    public function create()
    {
        return view('public_admin.master_bidang.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_bidang' => 'required|string|max:255',
        ]);

        Bidang::create($validated);

        return redirect()->route('bidang.index')->with('status', 'Bidang berhasil ditambahkan');
    }

    public function edit($id)
    {
        $bidang = Bidang::findOrFail($id);
        return view('public_admin.master_bidang.edit', compact('bidang'));
    }


    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_bidang' => 'required|string|max:255',
        ]);

        $bidang = Bidang::findOrFail($id);
        $bidang->update($validated);

        return redirect()->route('bidang.index')->with('status', 'Bidang berhasil diubah');
    }

public function destroy($id)
{
    $bidang = Bidang::findOrFail($id);
    $bidang->delete();

    return response()->json(['success' => true, 'message' => 'Bidang berhasil dihapus']);
}

}
