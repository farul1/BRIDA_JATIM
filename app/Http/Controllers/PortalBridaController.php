<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PortalBrida;
use Illuminate\Support\Facades\File;

class PortalBridaController extends Controller
{
    public function index()
    {
        $portalBrida = PortalBrida::all();
        return view('public_admin.master_portal_brida.index', compact('portalBrida'));
    }

    public function create()
    {
        return view('public_admin.master_portal_brida.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'link' => 'required|url',
            'deskripsi' => 'nullable|string',
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $filePath = null;
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $fileName = 'portal_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('file_upload/portal_brida/file'), $fileName);
            $filePath = 'file_upload/portal_brida/file/' . $fileName;
        }

        PortalBrida::create([
            'nama' => $request->nama,
            'link' => $request->link,
            'deskripsi' => $request->deskripsi,
            'logo' => $filePath,
        ]);

        // DIUBAH: Menggunakan nama rute manual
        return redirect()->route('portal_brida')->with('status', 'Data Portal BRIDA berhasil ditambahkan!');
    }

    public function edit($id) // DIUBAH: Tanda tangan method disesuaikan
    {
        $portalBrida = PortalBrida::findOrFail($id);
        return view('public_admin.master_portal_brida.edit', compact('portalBrida'));
    }

    public function update(Request $request, $id)
    {
        $portalBrida = PortalBrida::findOrFail($id);
        $request->validate([
            'nama' => 'required|string|max:255',
            'link' => 'required|url',
            'deskripsi' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $filePath = $portalBrida->logo;
        if ($request->hasFile('foto')) {
            if ($filePath && File::exists(public_path($filePath))) {
                File::delete(public_path($filePath));
            }
            $file = $request->file('foto');
            $fileName = 'portal_' . $id . '_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('file_upload/portal_brida/file'), $fileName);
            $filePath = 'file_upload/portal_brida/file/' . $fileName;
        }

        $portalBrida->update([
            'nama' => $request->nama,
            'link' => $request->link,
            'deskripsi' => $request->deskripsi,
            'logo' => $filePath,
        ]);

        // DIUBAH: Menggunakan nama rute manual
        return redirect()->route('portal_brida')->with('status', 'Data Portal BRIDA berhasil diubah!');
    }

    public function destroy($id)
    {
        $portalBrida = PortalBrida::findOrFail($id);
        if ($portalBrida->logo && File::exists(public_path($portalBrida->logo))) {
            File::delete(public_path($portalBrida->logo));
        }
        $portalBrida->delete();
        return redirect()->back()->with('status', 'Data Portal BRIDA berhasil dihapus!');
    }
}
