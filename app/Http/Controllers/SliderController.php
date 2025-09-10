<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use Illuminate\Support\Facades\File;


class SliderController extends Controller
{
    public function index()
    {
        $slider = Slider::orderBy('id', 'desc')->get();
        return view('public_admin.master_dataslider.index', compact('slider'));
    }

    public function create()
    {
        return view('public_admin.master_dataslider.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'file' => 'required|mimes:jpeg,png,jpg,webp,gif,mp4,webm,mov|max:512000',
        ]);

        $fileName = null;
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = 'slider_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('file_upload/slider'), $fileName);
        }

        Slider::create([
            'nama' => $validatedData['nama'],
            'gambar' => $fileName,
        ]);

        return redirect()->back()->with('status', 'Slider Berhasil Ditambahkan');

    }

public function edit($id) {
    $slider = Slider::findOrFail($id);
    return view('public_admin.master_dataslider.edit', compact('slider'));
}


    public function update(Request $request, $id)
    {
        $slider = Slider::findOrFail($id);

        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'file' => 'nullable|mimes:jpeg,png,jpg,webp,gif,mp4,webm,mov|max:512000',
        ]);

        $fileName = $slider->gambar;
        if ($request->hasFile('file')) {
            // Hapus gambar lama
            if (File::exists(public_path('file_upload/slider/' . $fileName))) {
                File::delete(public_path('file_upload/slider/' . $fileName));
            }
            // Upload gambar baru
            $file = $request->file('file');
            $fileName = 'slider_' . $id . '_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('file_upload/slider'), $fileName);
        }

        $slider->update([
            'nama' => $validatedData['nama'],
            'gambar' => $fileName,
        ]);

        return redirect()->back()->with('status', 'Slider Berhasil Diperbarui');
    }

    public function destroy($id)
    {
        $slider = Slider::findOrFail($id);

        // Hapus file gambar dari storage
        if (File::exists(public_path('file_upload/slider/' . $slider->gambar))) {
            File::delete(public_path('file_upload/slider/' . $slider->gambar));
        }

        $slider->delete();
        return redirect()->back()->with('status', 'Slider berhasil dihapus!');
    }
}
