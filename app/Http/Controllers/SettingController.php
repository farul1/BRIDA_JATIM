<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use Illuminate\Support\Facades\File;

class SettingController extends Controller
{
    /* ===================== INDEX ===================== */
    public function index()
    {
        $settings = Setting::all()->pluck('value', 'key');
        return view('public_admin.master_settings.index', compact('settings'));
    }

    /* ===================== UPDATE ===================== */
public function update(Request $request)
{
    $request->validate([
        'welcome_video_file'   => 'nullable|file|mimetypes:video/mp4,video/avi,video/mpeg,video/quicktime|max:102400',
        'welcome_video_url'    => 'nullable|url',
        'welcome_audio_file'   => 'nullable|file|mimetypes:audio/mpeg,audio/wav,audio/mp3|max:10240',
        'welcome_audio_text'   => 'nullable|string|max:255',
        'aksesoris_kiri_atas'  => 'nullable|image|max:5120',
        'aksesoris_kanan_atas' => 'nullable|image|max:5120',
        'aksesoris_kiri_bawah' => 'nullable|image|max:5120',
        'aksesoris_kanan_bawah'=> 'nullable|image|max:5120',
        'instagram_link'        => 'nullable|url',
    ]);

    // Hanya salah satu audio dipilih: file atau text
    if ($request->filled('welcome_audio_file') && $request->filled('welcome_audio_text')) {
        return back()->withErrors(['welcome_audio' => 'Pilih salah satu: file audio atau teks TTS, tidak boleh keduanya.']);
    }

    $this->handleVideoSettings($request);
    $this->handleAudioSettings($request);
    $this->handleDecorationImages($request);
    $this->handleTextSettings($request);

    // Simpan Instagram
    if ($request->filled('instagram_link')) {
        Setting::updateOrCreate(
            ['key' => 'instagram_link'],
            ['value' => $request->instagram_link]
        );
    }

    return back()->with('success', 'Pengaturan berhasil diperbarui!');
}


    /* ===================== VIDEO ===================== */
    private function handleVideoSettings(Request $request): void
    {
        $videoFile = Setting::firstOrCreate(['key' => 'welcome_video_file']);
        $videoUrl  = Setting::firstOrCreate(['key' => 'welcome_video_url']);

        if ($request->has('remove_welcome_video_file')) {
            $this->deleteFileIfExists($videoFile->value);
            $videoFile->update(['value' => null]);
        }

        if ($request->has('remove_welcome_video_url')) {
            $videoUrl->update(['value' => null]);
        }

        if ($request->hasFile('welcome_video_file')) {
            $this->deleteFileIfExists($videoFile->value);
            $path = $this->storeFile($request->file('welcome_video_file'), 'settings', 'welcome_video_');
            $videoFile->update(['value' => $path]);
            $videoUrl->update(['value' => null]);
        } elseif ($request->filled('welcome_video_url')) {
            $this->deleteFileIfExists($videoFile->value);
            $videoFile->update(['value' => null]);
            $videoUrl->update(['value' => $request->welcome_video_url]);
        }
    }

    /* ===================== AUDIO ===================== */
    private function handleAudioSettings(Request $request): void
    {
        $audioText = Setting::firstOrCreate(['key' => 'welcome_audio_text']);
        $audioFile = Setting::firstOrCreate(['key' => 'welcome_audio_file']);

        if ($request->has('remove_welcome_audio')) {
            $this->deleteFileIfExists($audioFile->value);
            $audioFile->update(['value' => null]);
            $audioText->update(['value' => null]);
            return;
        }

        if ($request->hasFile('welcome_audio_file')) {
            $this->deleteFileIfExists($audioFile->value);
            $path = $this->storeFile($request->file('welcome_audio_file'), 'settings', 'welcome_audio_');
            $audioFile->update(['value' => $path]);
            $audioText->update(['value' => null]);
        } elseif ($request->filled('welcome_audio_text')) {
            $this->deleteFileIfExists($audioFile->value);
            $text = $request->welcome_audio_text;
            $ttsPath = $this->generateTTS($text);
            $audioFile->update(['value' => $ttsPath]);
            $audioText->update(['value' => $text]);
        }
    }

    /* ===================== DEKORASI ===================== */
    private function handleDecorationImages(Request $request): void
    {
        foreach (['kiri_atas', 'kanan_atas', 'kiri_bawah', 'kanan_bawah'] as $pos) {
            $this->handleFileUpload($request, 'aksesoris_' . $pos);
        }
    }

    /* ===================== TEXT SETTINGS LAIN ===================== */
    private function handleTextSettings(Request $request): void
    {
        $excluded = [
            '_token', '_method',
            'welcome_video_file', 'welcome_video_url',
            'remove_welcome_video_file', 'remove_welcome_video_url',
            'welcome_audio_file', 'welcome_audio_text', 'remove_welcome_audio',
            'aksesoris_kiri_atas','aksesoris_kanan_atas','aksesoris_kiri_bawah','aksesoris_kanan_bawah'
        ];

        $excluded = array_merge($excluded, array_map(fn($k) => "remove_$k", [
            'aksesoris_kiri_atas','aksesoris_kanan_atas','aksesoris_kiri_bawah','aksesoris_kanan_bawah'
        ]));

        foreach ($request->except($excluded) as $key => $value) {
            Setting::updateOrCreate(['key' => $key], ['value' => $value]);
        }
    }

    /* ===================== FILE HANDLER ===================== */
    private function handleFileUpload(Request $request, string $key): void
    {
        $setting = Setting::firstOrCreate(['key' => $key]);

        if ($request->has("remove_$key")) {
            $this->deleteFileIfExists($setting->value);
            $setting->update(['value' => null]);
            return;
        }

        if ($request->hasFile($key)) {
            $this->deleteFileIfExists($setting->value);
            $path = $this->storeFile($request->file($key), 'settings', $key . '_');
            $setting->update(['value' => $path]);
        }
    }

    private function storeFile($file, string $directory, string $prefix = ''): string
    {
        $this->ensureDirectoryExists($directory);
        $fileName = $prefix . time() . '.' . $file->getClientOriginalExtension();
        $path = "file_upload/$directory/";
        $file->move(public_path($path), $fileName);
        return $path . $fileName;
    }

    private function deleteFileIfExists(?string $filePath): void
    {
        if ($filePath && File::exists(public_path($filePath))) {
            File::delete(public_path($filePath));
        }
    }

    private function ensureDirectoryExists(string $directory): void
    {
        $path = public_path("file_upload/$directory");
        if (!File::exists($path)) {
            File::makeDirectory($path, 0755, true);
        }
    }

    /* ===================== GOOGLE TTS ===================== */
    private function generateTTS(string $text): string
    {
        $this->ensureDirectoryExists('settings');

        $query = urlencode($text);
        $lang = 'id';
        $url = "https://translate.google.com/translate_tts?ie=UTF-8&q={$query}&tl={$lang}&client=tw-ob";

        $ch = curl_init();
        curl_setopt_array($ch, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_USERAGENT => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)',
            CURLOPT_HTTPHEADER => [
                'Referer: https://translate.google.com/',
            ],
            CURLOPT_TIMEOUT => 15,
        ]);

        // ✅ Bypass SSL hanya kalau lokal
        if (config('app.env') === 'local') {
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        }

        $audioContent = curl_exec($ch);

        if (curl_errno($ch)) {
            throw new \Exception('cURL Error: ' . curl_error($ch));
        }

        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($httpCode !== 200 || !$audioContent) {
            throw new \Exception("Gagal mengambil audio dari Google TTS (HTTP Code: {$httpCode})");
        }

        $fileName = 'welcome_audio_' . time() . '.mp3';
        $path = public_path("file_upload/settings/{$fileName}");

        file_put_contents($path, $audioContent);

        return "file_upload/settings/{$fileName}";
    }

}
