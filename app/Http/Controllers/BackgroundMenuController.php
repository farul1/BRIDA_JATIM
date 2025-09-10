<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BackgroundMenu;
use Illuminate\Support\Facades\File;

class BackgroundMenuController extends Controller
{
    public function index()
    {
        $bg = BackgroundMenu::orderBy('id')->get();
        return view('public_admin.master_backgroundmenu.index', compact('bg'));
    }

    public function edit($id)
    {
        $bg = BackgroundMenu::findOrFail($id);
        return view('public_admin.master_backgroundmenu.edit', compact('bg'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'file' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $bg = BackgroundMenu::findOrFail($id);

        if ($request->hasFile('file')) {
            // Hapus file lama jika ada
            $old_path = public_path('file_upload/bg/' . $bg->gambar);
            if (File::exists($old_path)) {
                File::delete($old_path);
            }

            // Upload file baru
            $file = $request->file('file');
            $new_name = "bg_" . $bg->id . "_" . time() . "." . $file->getClientOriginalExtension();
            $file->move(public_path('file_upload/bg'), $new_name);
            $bg->gambar = $new_name;
            $bg->save();

            // Redirect balik ke halaman sebelumnya dengan pesan sukses
            return redirect()->back()->with('status', 'Background Menu berhasil diperbarui!');
        }

        // Jika tidak ada file baru, tetap redirect balik
        return redirect()->back();
    }
}
