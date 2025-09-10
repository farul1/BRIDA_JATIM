<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SosialMedia;
use Illuminate\Support\Facades\File;

class SosialMediaController extends Controller
{
    public function index()
    {
        $sosmed = SosialMedia::orderBy('id', 'desc')->get();
        return view('public_admin.master_sosmed.index', compact('sosmed'));
    }

    public function create()
    {
        return view('public_admin.master_sosmed.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'link' => 'required|url',
            'file' => 'required|image|mimes:png,jpg,svg,webp|max:1024',
        ]);

        $fileName = null;
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = 'sosmed_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('file_upload/icon'), $fileName);
        }

        SosialMedia::create([
            'nama' => $validatedData['nama'],
            'link' => $validatedData['link'],
            'icon' => $fileName,
        ]);

        session()->put('status', 'Sosial Media Berhasil Ditambahkan');
        return redirect()->back();
    }


public function edit($id)
{
    $sosmed = SosialMedia::findOrFail($id);
    return view('public_admin.master_sosmed.edit', compact('sosmed'));
}

public function update(Request $request, $id)
{
    $validated = $request->validate([
        'nama' => 'required|string|max:255',
        'link' => 'required|url',
        'file' => 'nullable|image|mimes:png,jpg,svg,webp|max:1024'
    ]);

    $sosmed = SosialMedia::findOrFail($id);
    $data = $request->only(['nama', 'link']);

    if ($request->hasFile('file')) {
        // Hapus file lama
        if($sosmed->icon && file_exists(public_path('file_upload/icon/'.$sosmed->icon))) {
            unlink(public_path('file_upload/icon/'.$sosmed->icon));
        }

        // Upload file baru
        $file = $request->file('file');
        $filename = 'sosmed_'.$id.'_'.time().'.'.$file->getClientOriginalExtension();
        $file->move(public_path('file_upload/icon'), $filename);
        $data['icon'] = $filename;
    }

    $sosmed->update($data);

    return redirect()->back()->with('success', 'Data berhasil diperbarui');
}
    public function destroy($id)
    {
        $sosmed = SosialMedia::findOrFail($id);

        if (File::exists(public_path('file_upload/icon/' . $sosmed->icon))) {
            File::delete(public_path('file_upload/icon/' . $sosmed->icon));
        }

        $sosmed->delete();
        return redirect()->back()->with('status', 'Sosial Media Berhasil Dihapus');
    }
}
