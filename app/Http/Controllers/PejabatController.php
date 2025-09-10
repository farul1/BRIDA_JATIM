<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pejabat;

class PejabatController extends Controller
{
    public function index()
    {
        $pejabat = Pejabat::all();
        return view('public_admin.master_pejabat.index', compact('pejabat'));
    }

    public function create()
    {
        return view('public_admin.master_pejabat.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'pangkat' => 'nullable|string|max:255',
            'nip' => 'nullable|string|max:50',
        ]);

        Pejabat::create($validatedData);

        return redirect()->route('pejabat.index')->with('status', 'Pejabat baru berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $pejabat = Pejabat::findOrFail($id);
        return view('public_admin.master_pejabat.edit', compact('pejabat'));
    }

    public function update(Request $request, $id)
    {
        $pejabat = Pejabat::findOrFail($id);

        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'pangkat' => 'nullable|string|max:255',
            'nip' => 'nullable|string|max:50',
        ]);

        $pejabat->update($validatedData);

        return redirect()->route('pejabat.index')->with('status', 'Data Pejabat berhasil diubah!');
    }

    public function destroy($id)
    {
        try {
            $pejabat = Pejabat::findOrFail($id);
            $pejabat->delete();

            return response()->json(['success' => true, 'message' => 'Data Pejabat berhasil dihapus!']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Gagal menghapus data!'], 500);
        }
    }

}
