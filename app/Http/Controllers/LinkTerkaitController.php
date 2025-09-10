<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LinkTerkaits;
use Illuminate\Support\Facades\File;

class LinkTerkaitController extends Controller
{
    public function index_linkterkait()
    {
        $link = LinkTerkaits::orderBy('id', 'desc')->get();
        return view('public_admin.master_link_terkait.index', compact('link'));
    }

    public function create_linkterkait()
    {
        return view('public_admin.master_link_terkait.create');
    }

    public function store_linkterkait(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'link' => 'required|url',
            'gambar_logo' => 'nullable|image|mimes:jpeg,png,jpg,svg,webp|max:20048'
        ]);

        $fileName = null;
        if ($request->hasFile('gambar_logo')) {
            $file = $request->file('gambar_logo');
            $fileName = 'logo_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('file_upload/link_terkait'), $fileName);
        }

        LinkTerkaits::create([
            'name' => $request->nama,
            'link' => $request->link,
            'gambar_logo' => $fileName,
        ]);

        return redirect()->route('linkterkait')->with('status', 'Link Terkait Berhasil Ditambahkan!');

    }

    public function edit_linkterkait($id)
    {
        $link = LinkTerkaits::findOrFail($id);
        return view('public_admin.master_link_terkait.edit', compact('link'));
    }

    public function update_linkterkait(Request $request, $id)
    {
        $link = LinkTerkaits::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:255',
            'link' => 'required|url',
            'gambar_logo' => 'nullable|image|mimes:jpeg,png,jpg,svg,webp|max:20048'
        ]);

        $fileName = $link->gambar_logo;
        if ($request->hasFile('gambar_logo')) {
            $old_path = public_path('file_upload/link_terkait/' . $link->gambar_logo);
            if (File::exists($old_path)) {
                File::delete($old_path);
            }

            $file = $request->file('gambar_logo');
            $fileName = 'logo_' . $id . '_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('file_upload/link_terkait'), $fileName);
        }

        $link->update([
            'name' => $request->nama,
            'link' => $request->link,
            'gambar_logo' => $fileName,
        ]);

        return redirect()->route('linkterkait')->with('status', 'Link Terkait Berhasil Diubah!');
    }

public function destroy_linkterkait($id)
    {
        $link = LinkTerkaits::findOrFail($id);

        $path = public_path('file_upload/link_terkait/' . $link->gambar_logo);
        if (File::exists($path)) {
            File::delete($path);
        }

        $link->delete();

        return redirect()->back()->with('status', 'Link Terkait Berhasil Dihapus!');
    }
}
