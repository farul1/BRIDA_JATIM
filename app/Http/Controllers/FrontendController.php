<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use GuzzleHttp\Client;

// Model
use App\Models\{
    BridaData, BridaKategori, PortalBrida, Slider, LogoHeaders, Berita,
    LinkBypass, LinkTerkaits, Foto, GaleriVideo, Rating, Komentar,
    Pengumuman, Visitor, GaleriFoto, InfoWeb, SakipKategori, SakipData,
    Footer, Setting, SosialMedia, Form, PolicyBrief
};

class FrontendController extends Controller
{
   public function index()
{
    ini_set('max_execution_time', '120'); // Batasi eksekusi max 120 detik

    // --- Ambil Instagram Data ---
    $data_ig = [];
    $accessToken = env('INSTAGRAM_TOKEN', '');
    if (!empty($accessToken)) {
        try {
            $url = "https://graph.instagram.com/me/media?fields=id,caption,media_url,permalink,username&access_token={$accessToken}";
            $client = new Client(['timeout' => 10]);
            $response = $client->get($url);
            $data = json_decode($response->getBody(), true);
            
            // Pastikan key 'data' ada
            if (isset($data['data']) && is_array($data['data'])) {
                $data_ig = $data;
            }
        } catch (\Throwable $e) {
            Log::warning("Instagram API error: " . $e->getMessage());
            $data_ig = [];
        }
    }

    // --- Ambil Pengaturan Website ---
    $settings = Setting::all()->pluck('value', 'key')->toArray();

    // --- Siapkan Audio ---
    $audioFile = $settings['welcome_audio_file'] ?? null;
    $audioText = $settings['welcome_audio_text'] ?? null;
    $audioSettings = [
        'has_audio'  => !empty($audioFile) || !empty($audioText),
        'audio_file' => $audioFile,
        'audio_text' => $audioText,
    ];

    // --- Siapkan Data Halaman ---
    $data = [
        'settings'      => $settings,
        'sosmed'        => SosialMedia::orderBy('id', 'desc')->get(),
        'slider'        => Slider::all(),
        'logoheader'    => LogoHeaders::first(),
        'linkbypass'    => LinkBypass::all(),
        'linkterkait'   => LinkTerkaits::all(),
        'link'          => PortalBrida::all(),
        'footer'        => Footer::first(),
        'berita'        => Berita::orderBy('tanggal', 'desc')->limit(3)->get(),
        'bridaKat'      => BridaKategori::all(),
        'foto'          => Foto::latest()->take(6)->get(),
        'video'         => GaleriVideo::latest()->take(4)->get(),
        'galeriFoto'    => GaleriFoto::with('foto')->latest()->take(6)->get(),
        'pengumuman'    => Pengumuman::orderBy('tanggal', 'desc')->take(6)->get(),
        'data_ig'       => $data_ig,
        'audioSettings' => $audioSettings,
    ];

    // --- Catat Visitor ---
    Visitor::hit();

    // --- Tampilkan View ---
    return view('public_front.index', $data);
}

    public function profil()
    {
        $profil = InfoWeb::firstOrCreate(['id' => 1]);
        return view('public_front.profile', compact('profil'));
    }

    public function lihatproduk($id)
    {
        $data = BridaData::where('id_kategori', $id)->get();
        $kategori = BridaKategori::findOrFail($id);
        $profil = InfoWeb::first(); // ambil data profil admin
        Visitor::hit();
        return view('public_front.listproduk', compact('data', 'kategori', 'profil'));
    }


    public function sakip()
    {
        Visitor::hit();
        return view('public_front.sakip', [
            'sakipKat' => SakipKategori::all(),
            'sakipDat' => SakipData::orderBy('id_kategori', 'asc')->get()
        ]);
    }

    public function halaman_peta()
    {
        return view('public_front.peta', ['footer' => Footer::first()]);
    }

    public function page_berita()
    {
        Visitor::hit();
        $berita = Berita::orderBy('tanggal', 'desc')->paginate(9);
        return view('public_front.listberita', compact('berita'));
    }

    public function page_pengumuman()
    {
        Visitor::hit();
        $pengumuman = Pengumuman::orderBy('tanggal','desc')->paginate(6);
        return view('public_front.listpengumuman', compact('pengumuman'));
    }

public function policybrief()
{
    Visitor::hit();

    $policyBriefs = PolicyBrief::latest()->paginate(9); // tampilkan 9 per halaman
    $profil = InfoWeb::first(); // untuk identitas di footer/profil

    return view('public_front.listpolicybrief', compact('policyBriefs', 'profil'));
}

public function policybrief_detail($id)
{
    Visitor::hit();

    $policyBrief = PolicyBrief::findOrFail($id);
    $profil = InfoWeb::first(); // untuk identitas di footer/profil
    $terbaru = PolicyBrief::latest()->take(5)->get(); // sidebar data terbaru

    return view('public_front.detailpolicybrief', compact('policyBrief', 'profil', 'terbaru'));
}


    public function detailpost($id)
    {
        Visitor::hit();
        $berita = Berita::findOrFail($id);
        $komentar = Komentar::where('id_berita', $id)->where('status', 1)->get();
        $beritasamping = Berita::orderBy('tanggal', 'desc')->take(5)->get();
        $profil = InfoWeb::first(); // ambil data profil admin

        return view('public_front.detailpost', compact(
            'berita',
            'komentar',
            'beritasamping',
            'profil'
        ));
    }


public function detailpost_pengumuman($id)
{
    Visitor::hit();
    $berita = Pengumuman::findOrFail($id);
    $beritasamping = Berita::orderBy('tanggal', 'desc')->take(5)->get();
    $profil = InfoWeb::first(); // ambil data profil admin

    return view('public_front.detailpengumuman', compact(
        'berita',
        'beritasamping',
        'profil'
    ));
}

    public function input_nilai(Request $request)
    {
        $request->validate([
            'nilai'    => 'required|integer|min:1|max:5',
            'komentar' => 'nullable|string|max:500',
        ]);

        Rating::create($request->only('nilai', 'komentar'));

        return response()->json([
            'status'  => 'success',
            'message' => 'Terima kasih atas penilaian Anda!'
        ]);
    }

public function komentarkirim(Request $request, $id)
{
    // Validasi input + reCAPTCHA
    $validated = $request->validate([
        'name'    => 'required|string|max:255',
        'email'   => 'required|email|max:255',
        'message' => 'required|string|max:1000',
        'g-recaptcha-response' => 'required|captcha'
    ]);

    // Pastikan berita yang dikomentari ada
    $berita = Berita::findOrFail($id);

    // Simpan komentar
    Komentar::create([
        'id_berita' => $berita->id,
        'name'      => $validated['name'],
        'email'     => $validated['email'],
        'comment'   => $validated['message'],
        'status'    => 1, // default status aktif
    ]);

    // Redirect kembali dengan pesan sukses
    return redirect()->back()->with('status', 'Komentar Anda berhasil dikirim.');
}



    public function galeri_foto()
    {
        return view('public_front.listgalerifoto', [
            'galeri' => GaleriFoto::orderBy('id', 'desc')->paginate(6)
        ]);
    }

    public function galeri_video()
    {
        return view('public_front.listvideo', [
            'video' => GaleriVideo::orderBy('id', 'desc')->paginate(6)
        ]);
    }

    public function galeri_foto_detail($id)
    {
        return view('public_front.listfoto', [
            'galeri' => GaleriFoto::findOrFail($id),
            'foto'   => Foto::where('id_galeri', $id)->get()
        ]);
    }

}
