<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BidangController;
use App\Http\Controllers\SubBidangController;
use App\Http\Controllers\ProfilKategoriController;
use App\Http\Controllers\JudulController;
use App\Http\Controllers\ProfilDataController;
use App\Http\Controllers\PeriodeKegiatanController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\FooterController;
use App\Http\Controllers\PejabatController;
use App\Http\Controllers\GaleriVideoController;
use App\Http\Controllers\GaleriFotoController;
use App\Http\Controllers\FotoController;
use App\Http\Controllers\BackgroundMenuController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\SakipController;
use App\Http\Controllers\SakipDataController;
use App\Http\Controllers\LogoHeaderController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\KomentarController;
use App\Http\Controllers\SosialMediaController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PprgController;
use App\Http\Controllers\ProposalController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ProgramEvaluasiController;
use App\Http\Controllers\AksiEvaluasiController;
use App\Http\Controllers\IndikatorEvaluasiController;
use App\Http\Controllers\KegiatanEvaluasiController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DataProfileController;
use App\Http\Controllers\PortalBalitbangController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\BridaDataController;
use App\Http\Controllers\BridaKategoriController;
use App\Http\Controllers\LinkTerkaitController;
use App\Http\Controllers\LinkBypassController;
use App\Http\Controllers\PortalBridaController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\PolicyBriefController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('public_front.index');
// });
Route::get('/', [FrontendController::class, "index"]);
Route::get('/profil', [FrontendController::class, "profil"]);
Route::get('/beritaartikel', [FrontendController::class, "page_berita"]);
Route::get('/pengumuman', [FrontendController::class, "page_pengumuman"]);
Route::get('/galerifoto', [FrontendController::class, "galeri_foto"]);
Route::get('/galerifoto/{id}', [FrontendController::class, "galeri_foto_detail"])->name('galeri_foto_detail');
Route::get('/galerivideo', [FrontendController::class, "galeri_video"]);
Route::get('/sakip', [FrontendController::class, "sakip"]);
Route::get('/produk/{id}', [FrontendController::class, "lihatproduk"])->name('lihatproduk');
// --- Policy Brief ---
Route::get('/policybrief', [FrontendController::class, 'policybrief'])->name('policybrief');
Route::get('/policybrief/{id}', [FrontendController::class, 'policybrief_detail'])->name('policybrief.detail');


Route::get('/detailpost/{id}', [FrontendController::class, "detailpost"])->name('detailpost');
Route::get('/detailpost_pengumuman/{id}', [FrontendController::class, "detailpost_pengumuman"])->name('detailpost_pengumuman');

// Auth Routes
Route::get('/logouted', [LoginController::class, "logout"]);
Route::get('/logout', [LoginController::class, "logout"]);
Route::post('inputnilai', [FrontendController::class, "input_nilai"])->name('inputnilai');
Route::post('komentarkirim/{id}', [FrontendController::class, "komentarkirim"])->name('komentar.kirim');


Auth::routes([
    'register' => false, // Registration Routes...
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
]);

Route::group([ "middleware" => ['auth:sanctum', 'verified'] ], function() {
    Route::prefix('admin')->group(function () {
        Route::get('/home', [HomeController::class,"index"])->name('home');

        Route::get('/rating', [RatingController::class,"index"])->name('rating');

                // --- START MASTER SUB BIDANG ---
        Route::get('/master_subbidang', [SubBidangController::class,"index"])->name('subbidang');
        Route::get('/data-subbidang/create', [SubBidangController::class,"create"]);
        Route::post('/data-subbidang/store', [SubBidangController::class,"store"])->name('simpan_subbidang');
        Route::get('/data-subbidang/{id}/edit', [SubBidangController::class,"edit"]);
        Route::post('/data-subbidang/update/{id}', [SubBidangController::class,"update"])->name('simpan_subbidang_ubah');
        Route::post('/data-subbidang/{id}/delete', [SubBidangController::class,"destroy"])->name('delete_subbidang');
        // --- END MASTER SUB BIDANG ---


        // --- START PROGRAM EVALUASI ---
Route::get('/admin/kegiatan_evaluasi/create', [KegiatanEvaluasiController::class, 'create'])->name('kegiatan_evaluasi.create');

    Route::post('/kegiatan_evaluasi/store', [KegiatanEvaluasiController::class,"store"])->name('simpan_kegiatan_evaluasi');
        Route::post('/kegiatan_evaluasi/edit', [KegiatanEvaluasiController::class,"edit"]);
        Route::post('/kegiatan_evaluasi/update/{id}', [KegiatanEvaluasiController::class,"update"])->name('simpan_kegiatan_evaluasi_ubah');
        Route::post('/kegiatan_evaluasi/{id}/delete', [KegiatanEvaluasiController::class,"destroy"])->name('delete_kegiatan_evaluasi_data');
        Route::get('master_kegiatan/indikator_evaluasi/{key}',  [IndikatorEvaluasiController::class,"index"])->name('indikator_evaluasi');
        // --- END PROGRAM EVALUASI ---

                // --- START PROGRAM EVALUASI ---
        Route::get('/program_evaluasi', [ProgramEvaluasiController::class,"index"])->name('program_evaluasi');
        Route::post('/program_evaluasi/create', [ProgramEvaluasiController::class,"create"]);
        Route::post('/program_evaluasi/store', [ProgramEvaluasiController::class,"store"])->name('simpan_program_evaluasi');
        Route::post('/program_evaluasi/edit', [ProgramEvaluasiController::class,"edit"]);
        Route::post('/program_evaluasi/update/{id}', [ProgramEvaluasiController::class,"update"])->name('simpan_program_evaluasi_ubah');
        Route::post('/program_evaluasi/{id}/delete', [ProgramEvaluasiController::class,"delete"])->name('delete_program_evaluasi_data');
		Route::get('program_evaluasi/master_kegiatan/{key}',  [KegiatanEvaluasiController::class,"index"])->name('kegiatan_evaluasi');

        // --- END PROGRAM EVALUASI  ---

        // --- START INDIKATOR EVALUASI ---
        Route::post('/indikator_evaluasi/create', [IndikatorEvaluasiController::class,"create"]);
        Route::post('/indikator_evaluasi/store', [IndikatorEvaluasiController::class,"store"])->name('simpan_indikator_evaluasi');
        Route::post('/indikator_evaluasi/edit', [IndikatorEvaluasiController::class,"edit"]);
        Route::post('/indikator_evaluasi/update/{id}', [IndikatorEvaluasiController::class,"update"])->name('simpan_indikator_evaluasi_ubah');
        Route::post('/indikator_evaluasi/{id}/delete', [IndikatorEvaluasiController::class,"delete"])->name('delete_indikator_evaluasi_data');

        // --- END INDIKATOR EVALUASI  ---


        // --- START AKSI EVALUASI ---
		Route::get('indikator_evaluasi/aksi_evaluasi/{key}',  [AksiEvaluasiController::class,"index"])->name('aksi_evaluasi');
        Route::post('/aksi_evaluasi/create', [AksiEvaluasiController::class,"create"]);
        Route::post('/aksi_evaluasi/store', [AksiEvaluasiController::class,"store"])->name('simpan_aksi_evaluasi');
        Route::post('/aksi_evaluasi/edit', [AksiEvaluasiController::class,"edit"]);
        Route::post('/aksi_evaluasi/update/{id}', [AksiEvaluasiController::class,"update"])->name('simpan_aksi_evaluasi_ubah');
        Route::post('/aksi_evaluasi/{id}/delete', [AksiEvaluasiController::class,"delete"])->name('delete_aksi_evaluasi_data');

        // --- END AKSI EVALUASI  ---



        // --- START MASTER POLICY BRIEF ---
        Route::get('/policybrief', [PolicyBriefController::class, 'index'])->name('policybrief.index');
        Route::get('/policybrief/create', [PolicyBriefController::class, 'create'])->name('policybrief.create');
        Route::post('/policybrief/store', [PolicyBriefController::class, 'store'])->name('policybrief.store');
        Route::get('/policybrief/edit/{id}', [PolicyBriefController::class, 'edit'])->name('policybrief.edit');
        Route::put('/policybrief/update/{id}', [PolicyBriefController::class, 'update'])->name('policybrief.update');
        Route::delete('/policybrief/delete/{id}', [PolicyBriefController::class, 'destroy'])->name('policybrief.delete');
        // --- END MASTER POLICY BRIEF ---

        // --- START MASTER BIDANG ---
        Route::get('/master_bidang', [BidangController::class, "index"])->name('bidang.index');
        Route::get('/data-bidang/create', [BidangController::class, "create"])->name('bidang.create');
        Route::post('/data-bidang/store', [BidangController::class, "store"])->name('bidang.store');
        Route::get('/data-bidang/edit/{id}', [BidangController::class, "edit"])->name('bidang.edit');
        Route::put('/data-bidang/update/{id}', [BidangController::class, "update"])->name('bidang.update');
        Route::delete('/data-bidang/delete/{id}', [BidangController::class, "destroy"])->name('bidang.destroy');
        // --- END MASTER BIDANG ---


        // START MY-PROFILE
        Route::get('/myprofile', [ProfileController::class,"my_profile"])->name('myprofile');
        Route::post('/myprofile/{id}/ganti_username_email_admin', [ProfileController::class,"ganti_username_email_admin"])->name('simpan_ganti_username_email_admin');
        Route::post('/myprofile/{id}/ganti_password_admin', [ProfileController::class,"ganti_password_admin"])->name('simpan_ganti_password_admin');
        // END MY-PROFILE

        // --- START MASTER PROFIL KATEGORI ---
        Route::get('/master_profilkategori', [ProfilKategoriController::class,"index"])->name('profilkat');
        Route::post('/data-profilkategori/create', [ProfilKategoriController::class,"create"]);
        Route::post('/data-profilkategori/store', [ProfilKategoriController::class,"store"])->name('simpan_profilkat');
        Route::get('/data-profilkategori/{id}/edit', [ProfilKategoriController::class,"edit"])->name('edit_profilkat');

        Route::post('/data-profilkategori/update/{id}', [ProfilKategoriController::class,"update"])->name('simpan_profilkat_ubah');
Route::delete('/data-profilkategori/{id}', [ProfilKategoriController::class,"destroy"]);

        // --- END MASTER PROFIL KATEGORI  ---

        // --- START MASTER PROFIL DATA ---
        Route::get('/master_profildata', [ProfilDataController::class,"index"])->name('profildata');
        Route::post('/data-profildata/create', [ProfilDataController::class,"create"]);
        Route::post('/data-profildata/store', [ProfilDataController::class,"store"])->name('simpan_profildata');
        Route::get('/data-profildata/edit', [ProfilDataController::class,"edit"]);
        Route::post('/data-profildata/update/{id}', [ProfilDataController::class,"update"])->name('simpan_profildata_ubah');
        Route::post('/data-profildata/{id}/delete', [ProfilDataController::class,"destroy"])->name('delete_profildata');
        // --- END MASTER PROFIL DATA  ---

        // --- START PERIODE KEGIATAN ---
        Route::get('/periodekegiatan', [PeriodeKegiatanController::class,"index"])->name('periodekegiatan');
        Route::post('/periodekegiatan/create', [PeriodeKegiatanController::class,"create"]);
        Route::post('simpan_periodekegiatan', [PeriodeKegiatanController::class,"store"])->name('simpan_periodekegiatan');
        Route::post('/periodekegiatan/edit', [PeriodeKegiatanController::class,"edit"]);
        Route::post('/periodekegiatan/update/{id}', [PeriodeKegiatanController::class,"update"])->name('update_periodekegiatan');
        // --- END PERIODE KEGIATAN  ---

        // --- START MASTER USER ---
        Route::get('/master_user', [UsersController::class, 'index'])->name('user.index');
        Route::get('/data-user/create', [UsersController::class, 'create'])->name('user.create');
        Route::post('/data-user/store', [UsersController::class, 'store'])->name('user.store');
        Route::get('/data-user/edit/{id}', [UsersController::class, 'edit'])->name('user.edit');
        Route::put('/data-user/update/{id}', [UsersController::class, 'update'])->name('user.update');
        Route::delete('/data-user/{id}', [UsersController::class, 'destroy'])->name('user.destroy');
        // --- END MASTER USER  ---

        // --- START DATA SLIDER ---
        Route::get('/data_slider', [SliderController::class,"index"])->name('slider');
        Route::post('/data_slider/create', [SliderController::class,"create"]);
        Route::post('/data_slider/store', [SliderController::class,"store"])->name('simpan_slider');
        Route::get('/data_slider/{id}/edit', [SliderController::class,"edit"]);
        Route::post('/data_slider/update/{id}', [SliderController::class,"update"])->name('simpan_slider_ubah');
        Route::post('/data_slider/{id}/delete', [SliderController::class,"destroy"])->name('delete_slider');
        // --- END DATA SLIDER ---

        // --- START DATA FOOTER ---
        Route::get('/data_footer', [FooterController::class,"index"])->name('footer.slider');
        Route::post('simpanfooter', [FooterController::class,"store"])->name('simpanfooter');


        // --- END DATA FOOTER---

        // --- START MASTER PEJABAT ---
        Route::get('/master_pejabat', [PejabatController::class, 'index'])->name('pejabat.index');
        Route::get('/data-pejabat/create', [PejabatController::class, 'create'])->name('pejabat.create');
        Route::post('/data-pejabat/store', [PejabatController::class, 'store'])->name('pejabat.store');
        Route::get('/data-pejabat/edit/{id}', [PejabatController::class, 'edit'])->name('pejabat.edit');
        Route::put('/data-pejabat/update/{id}', [PejabatController::class, 'update'])->name('pejabat.update');
        Route::delete('/data-pejabat/delete/{id}', [PejabatController::class, 'destroy'])->name('pejabat.destroy');

        // --- END MASTER PEJABAT  ---

        // --- START MASTER GALERI VIDEO ---
        Route::get('/master_video', [GaleriVideoController::class, "index"])->name('video');
        Route::get('/data-video/create', [GaleriVideoController::class, "create"]);
        Route::post('/data-video/store', [GaleriVideoController::class, "store"])->name('simpan_video');
        Route::get('/data-video/{id}/edit', [GaleriVideoController::class, "edit"]);
        Route::put('/data-video/update/{id}', [GaleriVideoController::class, "update"])->name('simpan_video_ubah');
        Route::post('/data-video/{id}/delete', [GaleriVideoController::class, "destroy"])->name('delete_video');

        // --- END MASTER GALERI VIDEO  ---

        // --- START MASTER GALERI FOTO ---
    Route::get('/master_galerifoto', [GaleriFotoController::class,"index"])->name('foto');
    Route::post('/data-galerifoto/create', [GaleriFotoController::class,"create"]);
    Route::post('/data-galerifoto/store', [GaleriFotoController::class,"store"])->name('simpan_galerifoto');
    Route::post('/data-galerifoto/edit', [GaleriFotoController::class,"edit"]);
    Route::post('/data-galerifoto/update/{id}', [GaleriFotoController::class,"update"])->name('simpan_galerifoto_ubah');
    Route::post('/data-galerifoto/{id}/delete', [GaleriFotoController::class,"destroy"])->name('delete_galerifoto');
        // --- END MASTER GALERI FOTO  ---


        // --- START MASTER FOTO ---
        Route::get('/master_foto', [FotoController::class,"index"])->name('galerifoto');
        Route::post('/data-foto/create', [FotoController::class,"create"]);
        Route::post('/data-foto/store', [FotoController::class,"store"])->name('simpan_foto');
        Route::get('/data-foto/edit/{id}', [FotoController::class,"edit"])->name('edit_foto');
        Route::post('/data-foto/update/{id}', [FotoController::class,"update"])->name('simpan_foto_ubah');
        Route::post('/data-foto/{id}/delete', [FotoController::class,"destroy"])->name('delete_foto');
        // --- END MASTER FOTO ---


        // --- START MASTER JUDUL ---
        Route::get('/master_judul', [JudulController::class,"index"])->name('judul');
        Route::post('/data-judul/create', [JudulController::class,"create"]);
        Route::post('/data-judul/store', [JudulController::class,"store"])->name('simpan_judul');
       Route::get('/data-judul/{id}/edit', [JudulController::class,"edit"]); // GET
        Route::post('/data-judul/update/{id}', [JudulController::class,"update"])->name('simpan_judul_ubah');
Route::delete('/data-judul/{id}', [JudulController::class,"destroy"])->name('delete_judul');

        Route::post('/data-judul/div_subbidang', [JudulController::class,"divSubbidang"]); // POST
        // --- END MASTER JUDUL  ---

         // --- START MASTER FOTO ---
         Route::get('/master_bgmenu', [BackgroundMenuController::class,"index"])->name('bgmenu');
         Route::post('/data-bgmenu/create', [BackgroundMenuController::class,"create"]);
         Route::get('/data-bgmenu/{id}/edit', [BackgroundMenuController::class, 'edit']);
         Route::post('/data-bgmenu/update/{id}', [BackgroundMenuController::class,"update"])->name('simpan_bgmenu_ubah');
         Route::post('/data-bgmenu/{id}/delete', [BackgroundMenuController::class,"destroy"])->name('delete_bgmenu');
         // --- END MASTER FOTO  ---

          // --- START MASTER PENGUMUMAN ---
        Route::get('/master_pengumuman', [PengumumanController::class,"index"])->name('pengumuman');
        Route::post('/data-pengumuman/create', [PengumumanController::class,"create"]);
        Route::post('/data-pengumuman/store', [PengumumanController::class,"store"])->name('simpan_pengumuman');
        Route::post('/data-pengumuman/edit', [PengumumanController::class,"edit"]);
        Route::post('/data-pengumuman/update/{id}', [PengumumanController::class,"update"])->name('simpan_pengumuman_ubah');
        Route::post('/data-pengumuman/{id}/delete', [PengumumanController::class,"destroy"])->name('delete_pengumuman');
        // --- END MASTER PENGUMUMAN  ---

        // --- START LINK TERKAIT---
        Route::get('/master_link_linkterkait', [LinkTerkaitController::class, "index_linkterkait"])->name('linkterkait');
        Route::get('/data-link_linkterkait/create', [LinkTerkaitController::class, "create_linkterkait"])->name('linkterkait.create');
        Route::post('/data-link_linkterkait/store', [LinkTerkaitController::class, "store_linkterkait"])->name('simpan_linkterkait');
        Route::get('/data-link_linkterkait/{id}/edit', [LinkTerkaitController::class, "edit_linkterkait"])->name('linkterkait.edit');
        Route::put('/data-link_linkterkait/update/{id}', [LinkTerkaitController::class, "update_linkterkait"])->name('simpan_linkterkait_ubah');
        Route::post('/data-link_linkterkait/{id}/delete', [LinkTerkaitController::class, "destroy_linkterkait"])->name('link-terkait.delete');
        // --- END LINK TERKAIT---

        // --- START LINK BYPASS---
        Route::get('/master_link_linkbypass', [LinkBypassController::class, "index_linkbypass"])->name('linkbypass');
        Route::get('/data-link_linkbypass/create', [LinkBypassController::class, "create_linkbypass"])->name('linkbypass.create');
        Route::post('/data-link_linkbypass/store', [LinkBypassController::class, "store_linkbypass"])->name('simpan_linkbypass');
        Route::get('/data-link_linkbypass/{id}/edit', [LinkBypassController::class, "edit_linkbypass"])->name('linkbypass.edit');
        Route::put('/data-link_linkbypass/update/{id}', [LinkBypassController::class, "update_linkbypass"])->name('simpan_linkbypass_ubah');
        Route::post('/data-link_linkbypass/{id}/delete', [LinkBypassController::class, "destroy_linkbypass"])->name('delete_linkbypass');

        // --- END MASTER JUDUL  ---
        // --- START MASTER SAKIP KATEGORI ---
        Route::get('/sakip_kategori', [SakipController::class, "index"])->name('sakip.index');
        Route::get('/sakip_kategori/create', [SakipController::class, "create"])->name('sakip.kategori.create');
        Route::post('/sakip_kategori/store', [SakipController::class, "store"])->name('sakip.store');
        Route::get('/sakip_kategori/{id}/edit', [SakipController::class, "edit"])->name('sakip.edit');
        Route::put('/sakip_kategori/update/{id}', [SakipController::class, 'update'])->name('sakip.update');
        Route::delete('/sakip_kategori/{id}', [SakipController::class, "destroy"])->name('sakip.destroy');
        // --- END MASTER SAKIP KATEGORI ---


        // --- START DATA SAKIP ---
        Route::get('/sakip_data', [SakipDataController::class, "index"])->name('sakip');
Route::get('/sakip_data/create', [SakipDataController::class, "create"])->name('sakip.data.create');
        Route::post('/sakip_data/store', [SakipDataController::class, "store"])->name('simpan_sakip_data');
        Route::get('/sakip_data/{id}/edit', [SakipDataController::class, "edit"])->name('simpan_sakip_data_edit');
        Route::post('/sakip_data/update/{id}', [SakipDataController::class, "update"])->name('simpan_sakip_data_ubah');
        Route::post('/sakip_data/delete/{id}', [SakipDataController::class, "destroy"])->name('delete_sakip_data');
        Route::post('/sakip_data/div_subbidang', [SakipDataController::class,"div_subbidang"]);

        // --- END DATA SAKIP  ---

        // --- START MASTER LOGO HEADER ---
        Route::get('/logo_header', [LogoHeaderController::class,"index"])->name('logo_header');
        Route::post('/logo_header/edit', [LogoHeaderController::class,"edit"]);
        Route::post('/logo_header/update/{id}', [LogoHeaderController::class,"update"])->name('simpan_logo_header_ubah');
        // --- END MASTER LOGO HEADER  ---
         // --- START DATA BERITA ---
         Route::get('/master_berita', [BeritaController::class,"index"])->name('berita');
         Route::post('/data-berita/create', [BeritaController::class,"create"]);
         Route::post('/data-berita/store', [BeritaController::class,"store"])->name('simpan_berita');
            // Modal edit: gunakan GET agar bisa langsung akses data form
          Route::get('/data-berita/{id}/edit', [BeritaController::class,"edit"])->name('berita.edit');

            // Update berita
            Route::post('/data-berita/{id}/update', [BeritaController::class,"update"])->name('simpan_berita_ubah');

         Route::post('/data-berita/{id}/delete', [BeritaController::class,"destroy"])->name('delete_berita');
         // --- END DATA BERITA  ---

         // --- START DATA KOMENTAR ---
         Route::get('/master_komen', [KomentarController::class,"index"])->name('komentar');
         Route::post('/data-komentar/{id}/ubah', [KomentarController::class,"ubahstatus"])->name('ubahstatus');
         Route::post('/data-komentar/{id}/delete', [KomentarController::class,"destroy"])->name('delete_komen');

         // --- END DATA KOMENTAR  ---

         // --- START DATA SOSMED ---
         Route::get('/sosmed', [SosialMediaController::class,"index"])->name('sosmed');
         Route::post('/data-sosmed/create', [SosialMediaController::class,"create"]);
         Route::post('/data-sosmed/store', [SosialMediaController::class,"store"])->name('simpan_sosmed');
         Route::get('/data-sosmed/{id}/edit', [SosialMediaController::class,"edit"])->name('sosmed.edit');
         Route::put('/data-sosmed/{id}/update', [SosialMediaController::class,"update"])->name('sosmed.update');
         Route::post('/data-sosmed/{id}/delete', [SosialMediaController::class,"destroy"])->name('delete_sosmed');
         // --- END DATA SOSMED  ---

        // --- START DATA BRIDA ---
        Route::get('/brida_data', [BridaDataController::class, 'index'])->name('brida_data.index');
        Route::get('/brida_data/create', [BridaDataController::class, 'create'])->name('brida_data.create');
        Route::post('/brida_data', [BridaDataController::class, 'store'])->name('brida_data.store');
        Route::get('/brida_data/{id}/edit', [BridaDataController::class, 'edit'])->name('brida_data.edit');
        Route::put('/brida_data/{id}', [BridaDataController::class, 'update'])->name('brida_data.update');
        Route::delete('/brida_data/{id}', [BridaDataController::class, 'destroy'])->name('brida_data.destroy');


        // --- END DATA BRIDA  ---

        // --- START MASTER BRIDA KATEGORI ---
        Route::get('/brida_kategori', [BridaKategoriController::class, 'index'])->name('brida_kategori.index');
        Route::get('/brida_kategori/create', [BridaKategoriController::class, 'create'])->name('brida_kategori.create');
        Route::post('/brida_kategori', [BridaKategoriController::class, 'store'])->name('brida_kategori.store');
        Route::get('/brida_kategori/{id}/edit', [BridaKategoriController::class, 'edit'])->name('brida_kategori.edit');
        Route::put('/brida_kategori/{id}', [BridaKategoriController::class, 'update'])->name('brida_kategori.update');
        Route::delete('/brida_kategori/{id}', [BridaKategoriController::class, 'destroy'])->name('brida_kategori.destroy');
        // --- END MASTER BRIDA KATEGORI ---

        // --- START MASTER PPRG ---
        Route::get('/pprg', [PprgController::class,"index"])->name('pprg');
        Route::get('/pprg/create', [PprgController::class,"create"])->name('tambahgap');
        Route::post('simpan_gap', [PprgController::class,"simpan_gap"])->name('simpan_gap');
        Route::get('/cetak-gap/{id}', [PprgController::class,"cetak_gap"])->name('cetak_gap');

        Route::get('/cetak-pag/{id}', [PprgController::class,"cetak_pag"])->name('cetak_pag');
        Route::get('/cetak-kak/{id}', [PprgController::class,"cetak_kak"])->name('cetak_kak');
        Route::post('/cetak_final_pag', [PprgController::class,"cetak_final_pag"])->name('cetak_final_pag');
        Route::post('/cetak_final_kak', [PprgController::class,"cetak_final_kak"])->name('cetak_final_kak');

        Route::post('simpan_pag', [PprgController::class,"simpan_pag"])->name('simpan_pag');
        Route::post('simpan_kak', [PprgController::class,"simpan_kak"])->name('simpan_kak');
        Route::get('/pag/{id}', [PprgController::class,"buka_pag"])->name('pag');
        Route::get('/kak/{id}', [PprgController::class,"buka_kak"])->name('kak');

        Route::get('/ubah_gap/{id}', [PprgController::class,"ubah_gap"])->name('ubah_gap');
        Route::get('/ubah_pag/{idgap}', [PprgController::class,"ubah_pag"])->name('ubah_pag');
        Route::get('/ubah_kak/{id}', [PprgController::class,"ubah_kak"])->name('ubah_kak');

        Route::post('/hapus_pprg/{idgap}', [PprgController::class,"hapus_pprg"])->name('hapus_pprg');

        Route::post('/simpan_ubah_gap/{id}', [PprgController::class,"simpan_ubah_gap"])->name('simpan_ubah_gap');
        Route::post('/simpan_ubah_pag/{id}', [PprgController::class,"simpan_ubah_pag"])->name('simpan_ubah_pag');
        Route::post('/simpan_ubah_kak/{id}', [PprgController::class,"simpan_ubah_kak"])->name('simpan_ubah_kak');
        // --- END MASTER PPRG ---

        // --- START DATA PROPOSAL ---
        Route::get('/proposal_data', [ProposalController::class,"index"])->name('proposal');
        Route::post('/proposal_data/create', [ProposalController::class,"create"]);
        Route::post('/proposal_data/store', [ProposalController::class,"store"])->name('simpan_proposal_data');
        Route::post('/proposal_data/edit', [ProposalController::class,"edit"]);
        Route::post('/proposal_data/update/{id}', [ProposalController::class,"update"])->name('simpan_proposal_data_ubah');
        Route::post('/proposal_data/{id}/delete', [ProposalController::class,"delete"])->name('delete_proposal_data');
        Route::post('/data-proposal/div_judul', [ProposalController::class,"div_judul"]);
		Route::get('/proposal_data/timeline_dokumen/{key}',  [ProposalController::class,"timeline_dokumen"])->name('timeline_dokumen');
        Route::post('/proposal_data/simpan_verifikasi/{id}', [ProposalController::class,"simpan_verifikasi_proposal"])->name('simpan_verifikasi_proposal');
        Route::post('/proposal_data/modal_verifikasi', [ProposalController::class,"modal_verifikasi"]);
        Route::post('/proposal_data/modal_perbaikan_data', [ProposalController::class,"modal_perbaikan_data"]);
        Route::post('/proposal_data/simpan_perbaikan_data/{id}', [ProposalController::class,"simpan_perbaikan_data"])->name('simpan_perbaikan_data');
        Route::post('/revisi_data/{id}/delete', [ProposalController::class,"delete"])->name('delete_revisi_data');
        // --- END DATA PROPOSAL  ---

        // --- START DATA PROFILE ---
        Route::get('/data_profile', [DataProfileController::class,"index"])->name('profile');
        Route::post('/data_profile/simpan_data_profile', [DataProfileController::class,"store"])->name('simpan_data_profile');
        // --- END DATA PROFILE ---

        // --- START MASTER PORTAL BRIDA ---
        Route::get('/master_portal_brida', [PortalBridaController::class, "index"])->name('portal_brida');
        Route::get('/data-portal_brida/create', [PortalBridaController::class, "create"])->name('portal_brida.create');
        Route::post('/data-portal_brida/store', [PortalBridaController::class, "store"])->name('simpan_portal_brida');
        Route::get('/data-portal_brida/{id}/edit', [PortalBridaController::class, "edit"])->name('portal_brida.edit');
        Route::post('/data-portal_brida/update/{id}', [PortalBridaController::class, "update"])->name('simpan_portal_brida_ubah');
        Route::post('/data-portal_brida/{id}/delete', [PortalBridaController::class, "destroy"])->name('delete_portal_brida');
        // --- END MASTER PORTAL BRIDA  ---

        // --- START MASTER SETTING ---
        Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
        Route::post('/settings', [SettingController::class, 'update'])->name('settings.update');
        // --- END MASTER SETTING ---


    });
});
