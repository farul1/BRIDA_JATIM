<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Footer;

class FooterController extends Controller
{
    public function index()
    {
        $footerdata = Footer::firstOrCreate(
            ['id' => 1],
            [
                'alamat' => '',
                'email' => '',
                'telepon' => '',
                'map_url' => '',
                'embed_url' => ''
            ]
        );

        return view('public_admin.master_footer.index', compact('footerdata'));
    }

    public function store(Request $request)
    {
        $footer = Footer::firstOrFail();
        $footer->alamat = $request->alamat;
        $footer->telepon = $request->telepon;
        $footer->email = $request->email;
        $footer->map_url = $request->map_url;
        $footer->embed_url = $this->generateEmbedUrl($request->map_url);
        $footer->save();

        return back()->with('success', 'Footer berhasil diperbarui!');
    }

    public function update(Request $request, $id)
    {
        $footer = Footer::findOrFail($id);
        $footer->alamat = $request->alamat;
        $footer->telepon = $request->telepon;
        $footer->email = $request->email;
        $footer->map_url = $request->map_url;
        $footer->embed_url = $this->generateEmbedUrl($request->map_url);
        $footer->save();

        return redirect()->back()->with('success', 'Data footer berhasil diperbarui');
    }
private function generateEmbedUrl($mapUrl)
{
    if (empty($mapUrl)) {
        return null;
    }

    // Kalau sudah embed format resmi pb=...
    if (strpos($mapUrl, '/maps/embed?pb=') !== false) {
        return $mapUrl;
    }

    // Resolve shortlink maps.app.goo.gl ke URL panjang
    if (preg_match('/goo\.gl|maps\.app\.goo\.gl/', $mapUrl)) {
        $ch = curl_init($mapUrl);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, true);
        $response = curl_exec($ch);
        $mapUrl = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);
        curl_close($ch);
    }

    // Kalau URL panjang punya `@lat,lng` → ubah ke embed
    if (preg_match('/@(-?\d+\.\d+),(-?\d+\.\d+)/', $mapUrl, $m)) {
        $lat = $m[1];
        $lng = $m[2];
        return "https://www.google.com/maps?q={$lat},{$lng}&z=17&output=embed";
    }

    // Fallback: pakai q=... + output=embed
    return "https://www.google.com/maps?q=" . urlencode($mapUrl) . "&output=embed";
}


}
