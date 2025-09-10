<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GaleriVideo;

class GaleriVideoController extends Controller
{
    public function index()
    {
        $video = GaleriVideo::orderBy('id','desc')->get();
        return view('public_admin.master_video.index', compact('video'));
    }

    public function create()
    {
        return view('public_admin.master_video.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'link' => 'required|url',
        ]);

        GaleriVideo::create([
            'judul' => $request->judul,
            'description' => $request->deskripsi,
            'link' => $request->link,
        ]);

        return redirect()->route('video')->with('status', 'Video baru berhasil ditambahkan!');
    }

    public function show($id)
    {
        //
    }

        public function edit($id)
        {
            $video = GaleriVideo::findOrFail($id);
            // dd($video); // Uncomment ini untuk debug, pastikan data muncul
            return view('public_admin.master_video.edit', compact('video'));
        }

    public function update(Request $request, $id)
    {
        $video = GaleriVideo::findOrFail($id);

        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'link' => 'required|url',
        ]);

        $video->update([
            'judul' => $request->judul,
            'description' => $request->deskripsi,
            'link' => $request->link,
        ]);

        return redirect()->route('video')->with('status', 'Video berhasil diubah!');
    }

    public function destroy($id)
    {
        $video = GaleriVideo::findOrFail($id);
        $video->delete();
        return redirect()->back()->with('status', 'Video berhasil dihapus!');
    }
}
