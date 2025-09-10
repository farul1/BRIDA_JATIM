<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\LogoHeaders;
use Illuminate\Support\Facades\File;

class LogoHeaderController extends Controller
{
    public function index()
    {
        $logo = LogoHeaders::all();
        return view('public_admin.logo_header.index', compact('logo'));
    }

    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'file_upload' => 'required|mimes:jpeg,png,jpg,svg|max:5000'
        ]);

        if ($validation->fails()) {
            return redirect()->back()->with('statusT', 'Gagal upload logo!');
        }

        $image = $request->file('file_upload');
        $new_name = 'logo_header_' . time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('file_upload/logo header'), $new_name);

        LogoHeaders::create([
            'gambar' => $new_name
        ]);

        return redirect()->back()->with('status', 'Logo Header berhasil ditambahkan!');
    }

public function edit(Request $request)
{
    $logo = LogoHeaders::find($request->id);
    if (!$logo) {
        return response('Data tidak ditemukan', 404);
    }
    return view('public_admin.logo_header.edit', compact('logo'));
}


public function update(Request $request, $id)
{
    $validation = Validator::make($request->all(), [
        'file_upload' => 'required|mimes:jpeg,png,jpg,svg|max:51200', // max 50MB
    ]);

    if ($validation->fails()) {
        return redirect()->back()->with('statusT', 'Gagal update logo! ' . implode(", ", $validation->errors()->all()));
    }

    $logo_header = LogoHeaders::findOrFail($id);

    // Upload file baru
    if ($request->hasFile('file_upload')) {
        $old_path = public_path('file_upload/logo header/' . $logo_header->gambar);
        if ($logo_header->gambar && File::exists($old_path)) {
            File::delete($old_path);
        }

        $image = $request->file('file_upload');
        $new_name = 'logo_header_' . $id . '_' . time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('file_upload/logo header'), $new_name);
        $logo_header->gambar = $new_name;
    }

    $logo_header->save();

    return redirect()->back()->with('status', 'Logo Header berhasil diubah!');
}

}
