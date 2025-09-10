<!-- footer begin -->
@php
    $footer = App\Models\Footer::first();
@endphp

<footer style="background: linear-gradient(135deg, #fd7e14, #ffa958); color: #fff; padding: 40px 0 0; position: relative; overflow: hidden;">

    <!-- Background pattern -->
    <div style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; z-index: 0; background: transparent;"></div>

    <div class="container" style="position: relative; z-index: 1;">
        <div class="row" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 30px; margin-bottom: 30px;">
            <!-- Kolom 1 - Company Info -->
            <div class="footer-col" style="background: rgba(255, 255, 255, 0.05); border-radius: 10px; padding: 25px; box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1); border: 1px solid rgba(255, 255, 255, 0.1);">
                <div class="widget" style="padding-top: 0; margin-top: 0;">
                    @php
                        $logoheader = App\Models\LogoHeaders::latest()->first();
                    @endphp

                    <div id="logo" style="margin-bottom: 20px;">
                        <a href="{{ url('/') }}">
                            @if($logoheader && $logoheader->gambar)
                                <img alt="Logo" class="img-fluid" src="{{ asset('file_upload/logo header/' . $logoheader->gambar) }}" style="max-width: 180px;">
                            @else
                                {{-- fallback jika logo belum ada di database --}}
                                <img alt="Logo" class="img-fluid" src="{{ asset('img/default-logo.png') }}" style="max-width: 180px;">
                            @endif
                        </a>
                    </div>
                    <address class="s1" style="display: flex; flex-direction: column; row-gap: 15px; font-size: 15px; color: #fff; margin: 0;">
                        <div style="display: flex; align-items: flex-start;">
                            <div style="background: rgba(231, 76, 60, 0.2); width: 36px; height: 36px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-right: 15px; flex-shrink: 0;">
                                <i class="fa fa-map-marker" style="color: #e74c3c;"></i>
                            </div>
                            <span style="line-height: 1.5;">{{ $footer?->alamat ?? '-' }}</span>
                        </div>
                        <div style="display: flex; align-items: center;">
                            <div style="background: rgba(37, 211, 102, 0.2); width: 36px; height: 36px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-right: 15px; flex-shrink: 0;">
                                <i class="fa fa-whatsapp" style="color: #25D366;"></i>
                            </div>
                            <span>{{ $footer?->telepon ?? '-' }}</span>
                        </div>
                        <div style="display: flex; align-items: center;">
                            <div style="background: rgba(243, 156, 18, 0.2); width: 36px; height: 36px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-right: 15px; flex-shrink: 0;">
                                <i class="fa fa-envelope" style="color: #f39c12;"></i>
                            </div>
                            <a href="mailto:{{ $footer?->email ?? '' }}" style="color: #fff; text-decoration: none; transition: color 0.3s;">
                                {{ $footer?->email ?? '-' }}
                            </a>
                        </div>
                    </address>
                </div>
            </div>

@php
    $bridaKat = \App\Models\BridaKategori::all();
    $linkterkait = \App\Models\LinkTerkaits::all();
@endphp

<!-- Kolom 2 - Quick Links -->
<div class="footer-col" style="background: rgba(255, 255, 255, 0.05); border-radius: 10px; padding: 25px; box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1); border: 1px solid rgba(255, 255, 255, 0.1);">
    <div class="widget">
        <h3 style="color: #fff; font-size: 20px; margin-bottom: 25px; padding-bottom: 10px; border-bottom: 2px solid rgba(255, 255, 255, 0.1); position: relative;">
            Tautan Cepat
            <span style="position: absolute; bottom: -2px; left: 0; width: 50px; height: 2px; background: linear-gradient(90deg, #3498db, #2ecc71);"></span>
        </h3>
        <ul style="list-style: none; padding: 0; margin: 0; display: grid; grid-template-columns: repeat(2, 1fr); gap: 12px;">
            <li><a href="{{ url('/') }}" style="color: #ddd;">Beranda</a></li>
            <li><a href="{{ url('/profil') }}" style="color: #ddd;">Profil</a></li>
            <li><a href="{{ url('/pengumuman') }}" style="color: #ddd;">Pengumuman</a></li>
            <li><a href="{{ url('/beritaartikel') }}" style="color: #ddd;">Berita & Artikel</a></li>

            @if($bridaKat && $bridaKat->count() > 0)
                @foreach($bridaKat as $kategori)
                    <li><a href="{{ url('/produk', $kategori->id) }}" style="color: #ddd;">{{ $kategori->nama_kategori }}</a></li>
                @endforeach
            @endif

            <li><a href="{{ route('policybrief') }}" style="color: #ddd;">Policy Brief</a></li>


            <li><a href="{{ url('/galerifoto') }}" style="color: #ddd;">Galeri Foto</a></li>
            <li><a href="{{ url('/galerivideo') }}" style="color: #ddd;">Galeri Video</a></li>
            <li><a href="{{ url('/sakip') }}" style="color: #ddd;">Sakip</a></li>
            <li><a target="_blank" href="https://ppid.brida.jatimprov.go.id/" style="color: #ddd;">PPID</a></li>
        </ul>
    </div>
</div>



            <!-- Kolom 3 - Visitor Stats -->
            <div class="footer-col" style="background: rgba(255, 255, 255, 0.05); border-radius: 10px; padding: 25px; box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1); border: 1px solid rgba(255, 255, 255, 0.1);">
                <div class="widget">
                    <div class="stat-box">
                        <h3 style="color: #fff; font-size: 20px; margin-bottom: 25px; padding-bottom: 10px; border-bottom: 2px solid rgba(255, 255, 255, 0.1); position: relative;">
                            <span class="statistik-text">
                                <i class="fa fa-chart-bar" style="margin-right: 10px;"></i> Statistik Pengunjung
                            </span>
                            <span style="position: absolute; bottom: -2px; left: 0; width: 50px; height: 2px; background: linear-gradient(90deg, #3498db, #2ecc71);"></span>
                        </h3>

                        @php
                            $jumlah_pengunjung_hari_ini = App\Models\Visitor::count_pengunjung_hari_ini();
                            $jumlah_pengunjung_kemarin = App\Models\Visitor::count_pengunjung_kemarin();
                            $jumlah_total_pengunjung = App\Models\Visitor::count_total_pengunjung();
                        @endphp

                        <table style="width: 100%; color: #fff; font-size: 15px; border-collapse: collapse;">
                            <tr style="border-bottom: 1px solid rgba(255,255,255,0.1);">
                                <td style="padding: 12px 0;"><i class="fa fa-calendar-day" style="margin-right: 12px; color: #3498db;"></i> Hari Ini</td>
                                <td style="text-align: right; padding: 12px 0; font-weight: 500;"><span class="statistik-angka">{{ $jumlah_pengunjung_hari_ini }}</span></td>
                            </tr>
                            <tr style="border-bottom: 1px solid rgba(255,255,255,0.1);">
                                <td style="padding: 12px 0;"><i class="fa fa-history" style="margin-right: 12px; color: #9b59b6;"></i> Kemarin</td>
                                <td style="text-align: right; padding: 12px 0; font-weight: 500;"><span class="statistik-angka">{{ $jumlah_pengunjung_kemarin }}</span></td>
                            </tr>
                            <tr>
                                <td style="padding: 12px 0;"><i class="fa fa-users" style="margin-right: 12px; color: #2ecc71;"></i> Total</td>
                                <td style="text-align: right; padding: 12px 0; font-weight: bold;"><span class="statistik-angka">{{ $jumlah_total_pengunjung }}</span></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Subfooter -->
    <div class="subfooter" style="border-top: 1px solid rgba(255, 255, 255, 0.1); padding: 20px 0; background: rgba(0, 0, 0, 0.2);">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap;">
                        <div style="color: #ccc; font-size: 14px;">
                            © 2021 Copyright - BRIDA Jatim
                        </div>
                        <div>
                            <div class="social-icons" style="display: flex; gap: 15px;">
                                <a target="_blank" href="#" style="display: flex; align-items: center; justify-content: center; width: 36px; height: 36px; border-radius: 50%; background: rgba(255, 255, 255, 0.1); transition: all 0.3s;">
                                    <i class="fa fa-facebook" style="color: #fff;"></i>
                                </a>
                                <a target="_blank" href="https://twitter.com/balitbangjatim" style="display: flex; align-items: center; justify-content: center; width: 36px; height: 36px; border-radius: 50%; background: rgba(255, 255, 255, 0.1); transition: all 0.3s;">
                                    <i class="fa fa-twitter" style="color: #fff;"></i>
                                </a>
                                <a target="_blank" href="https://instagram.com/balitbangprovjatim" style="display: flex; align-items: center; justify-content: center; width: 36px; height: 36px; border-radius: 50%; background: rgba(255, 255, 255, 0.1); transition: all 0.3s;">
                                    <i class="fa fa-instagram" style="color: #fff;"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<style>
/* Hover effects */
.footer-col {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.footer-col:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15) !important;
}

.statistik-text {
    transition: transform 0.2s ease, color 0.2s ease;
    display: inline-block;
}

.statistik-text:hover {
    transform: scale(1.05);
    color: #ffe082 !important;
}

tr:hover td:first-child,
tr:hover td:last-child .statistik-angka {
    transform: scale(1.05);
    color: #ffe082;
}

tr:hover td:first-child i {
    color: #ffe082 !important;
}

.social-icons a:hover {
    transform: translateY(-3px);
    background: rgba(255, 255, 255, 0.2) !important;
}

.social-icons a:hover i {
    color: #ffe082 !important;
}

.quick-links li a:hover {
    color: #fff !important;
    border-left: 3px solid #3498db !important;
    padding-left: 20px !important;
}


/* Responsive adjustments */
@media (max-width: 992px) {
    .row {
        grid-template-columns: repeat(2, 1fr) !important;
    }
}

@media (max-width: 768px) {
    .row {
        grid-template-columns: 1fr !important;
    }

    .subfooter > .container > .row > .col-md-12 > div {
        flex-direction: column;
        text-align: center;
        gap: 15px;
    }
}

@media (max-width: 576px) {
    footer address.s1 {
        font-size: 14px;
    }

    .footer-col {
        padding: 20px !important;
    }

    .stat-box p {
        font-size: 16px;
    }

    footer table {
        font-size: 14px;
    }

    .social-icons {
        justify-content: center !important;
    }
}
</style>

<!-- footer close -->


{{-- @php
    $footer = \App\Models\Footer::first();
@endphp

<footer class="pt-4">
    <div class="container">
        <div class="row gy-4">

            <div class="col-lg-7 col-md-6">
                <div class="widget">
                    <a href="/"><img alt="" class="img-fluid mb0" src="{{asset('/img/logo 1.png')}}"></a>
                    @if($footer)
                        <address class="text-light">
                            <p><i class="fa fa-map-marker fa-fw text-warning"></i> {{ $footer->alamat }}</p>
                            <p><i class="fa fa-phone fa-fw text-warning"></i> {{ $footer->telepon }}</p>
                            <p><i class="fa fa-envelope fa-fw text-warning"></i>
                                <a href="mailto:{{ $footer->email }}" class="text-light">{{ $footer->email }}</a>
                            </p>
                        </address>

                        <div class="mt-3 rounded overflow-hidden shadow-sm position-relative" style="width: 300px; height: 100px;">
                            <a href="{{ route('peta.inovasi') }}" target="_self"
                            style="position: absolute; inset: 0; z-index: 10;"></a>
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d989.3043588115015!2d112.72716832154784!3d-7.32945915132382!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fb5d36645755%3A0xb014eb04c5c298eb!2sBadan%20Penelitian%20dan%20Pengembangan%20Provinsi%20Jawa%20Timur!5e0!3m2!1sid!2sid!4v1751021735383!5m2!1sid!2sid"
                                width="100%" height="100%" style="border:0; pointer-events: none;" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade">
                            </iframe>
                        </div>

                    @else
                        <p>Informasi kontak belum tersedia.</p>
                    @endif
                </div>
            </div>

            <div class="col-lg-5 col-md-8">
                <div class="widget">
                    <h5 class="text-white mb-3">Statistik Pengunjung</h5>
                    @php
                        $pengunjung_hari_ini = \App\Models\Visitor::count_pengunjung_hari_ini();
                        $pengunjung_kemarin = \App\Models\Visitor::count_pengunjung_kemarin();
                        $total_pengunjung = \App\Models\Visitor::count_total_pengunjung();
                    @endphp
                    <table>
                        <tr>
                            <td width="200">Hari Ini</td>
                            <td>: {{ $pengunjung_hari_ini }}</td>
                        </tr>
                        <tr>
                            <td> Pengunjung Kemarin </td>
                            <td>: {{ $pengunjung_kemarin }}</td>
                        </tr>
                        <tr>
                            <td>Total Pengunjung</td>
                            <td>: {{ $total_pengunjung }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="subfooter">
        <div class="container">
            <div class="row">
            <div class="col-12 text-start">
                <div class="d-flex flex-column flex-md-row justify-content-md-start align-items-md-center gap-3">
                    <div class="text-light">
                    © {{ date('Y') }} Copyright - BRIDA Jatim
                </div>
                <div class="col-md-8 d-flex justify-content-md-end justify-content-center">
                    <div class="social-icons d-flex gap-3">
                        <a href="{{ route('peta.inovasi') }}" class="text-warning" title="Peta Inovasi"><i class="fa fa-map fa-lg"></i></a>
                        <a href="#" class="text-warning" target="_blank"><i class="fa fa-facebook fa-lg"></i></a>
                        <a href="https://twitter.com/balitbangjatim" class="text-warning" target="_blank"><i class="fa fa-twitter fa-lg"></i></a>
                        <a href="https://instagram.com/balitbangprovjatim" class="text-warning" target="_blank"><i class="fa fa-instagram fa-lg"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer> --}}
