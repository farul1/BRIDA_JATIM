@extends('public_front.include_berita')

@section('title', $berita->judul)

@section('content')

<style>
/* ===== Typography ===== */
h1 { font-size: 42px; line-height: 1.2; max-height: 2.4em; overflow: hidden; font-weight:700; color:#222; }
.blog-title { font-size: 1.9rem; font-weight:700; margin-bottom:15px; color:#333; }

/* ===== Blog Card ===== */
.blog-card {
    background: #fff;
    border-radius: 20px;
    max-width: 100%;          /* full width for responsiveness */
    overflow: hidden;
    box-shadow: 0 10px 30px rgba(0,0,0,0.08);
    transition: transform 0.4s ease, box-shadow 0.4s ease;
    margin: 0 auto;           /* center horizontally */
}
.blog-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 20px 40px rgba(0,0,0,0.15);
}

/* ===== Blog Image ===== */
.blog-card-image img {
    width: 100%;
    height: auto;            /* height auto agar proporsional */
    object-fit: cover;
    border-bottom-left-radius:20px;
    border-bottom-right-radius:20px;
    transition: transform 0.5s ease, box-shadow 0.5s ease;
    cursor: zoom-in;
}
.blog-card-image img:hover {
    transform: scale(1.05);
    box-shadow: 0 10px 25px rgba(0,0,0,0.15);
}

/* ===== Date Badge ===== */
.date-modern {
    position: absolute;
    top: 15px; left: 15px;
    width: 50px; height: 50px;
    border-radius: 50%;
    background: linear-gradient(135deg,#f6b93b,#e58e26);
    color: #fff; font-weight:700;
    display:flex; flex-direction:column;
    justify-content:center; align-items:center;
    box-shadow:0 5px 15px rgba(0,0,0,0.3);
    font-family:sans-serif;
}
.date-modern .day { font-size:1.2rem; line-height:1; }
.date-modern .month { font-size:.75rem; line-height:1; }

/* ===== Description & Meta ===== */
.blog-description { line-height:1.6; color:#444; }
.post-date { font-size: 0.85rem; color: #666; margin-top:10px; display:block; }

/* ===== Download Button ===== */
.btn-gradient {
    display:inline-block;
    padding: 8px 20px;
    border-radius:50px;
    font-weight:600;
    color:#fff;
    background: linear-gradient(90deg,#f6b93b,#e58e26);
    transition: all 0.3s ease;
}
.btn-gradient:hover { transform: scale(1.05); box-shadow:0 8px 20px rgba(230,142,38,0.5); }

/* ===== Sidebar ===== */
#sidebar .widget {
    background:#fff;
    border-radius:15px;
    padding:20px;
    box-shadow:0 10px 25px rgba(0,0,0,0.05);
    transition: transform .3s, box-shadow .3s;
    margin-bottom:20px;
}
#sidebar .widget:hover {
    transform:translateY(-5px);
    box-shadow:0 20px 40px rgba(0,0,0,0.1);
}
.widget-post ul { list-style:none; padding:0; margin:0; }
.widget-post li { margin-bottom:12px; font-size:.9rem; transition:.3s; }
.widget-post li:hover a { color:#e58e26; }
.widget-post .date { font-size:.8rem; color:#888; margin-right:6px; }

/* ===== Responsive ===== */
@media(max-width:991px){
    .blog-card { max-width: 90%; margin: 0 auto; }
    .blog-title { font-size:1.7rem; }
    h1 { font-size:36px; }
    .btn-gradient { padding:7px 18px; font-size:0.9rem; }
    .date-modern { width:45px; height:45px; }
    .date-modern .day { font-size:1.1rem; }
    .date-modern .month { font-size:.7rem; }
}

@media(max-width:576px){
    .blog-card { max-width: 100%; }
    .blog-title { font-size:1.5rem; }
    h1 { font-size:28px; }
    .btn-gradient { padding:6px 16px; font-size:0.85rem; }
    .date-modern { width:40px; height:40px; }
    .date-modern .day { font-size:1rem; }
    .date-modern .month { font-size:.65rem; }
}

</style>

<!-- ===== Header ===== -->
<section id="subheader" class="text-light" data-stellar-background-ratio=".2" style="background-image: url('/img/bgprovheader2.jpg');">
    <div class="center-y relative text-center">
    <div class="center-y relative text-center" style="position: relative; z-index: 2;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="text-white fw-bold" data-aos="fade-down" data-aos-duration="1000">{{ $berita->judul }}</h1>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5 bg-light">
    <div class="container">
        <div class="row g-4">
            <div class="col-md-8">
                <div class="blog-read" data-aos="fade-up" data-aos-duration="1000">
                    <div class="blog-card">
                        <div class="blog-card-image position-relative overflow-hidden">
                            <img src="{{ asset('file_upload/pengumuman/gambar/'.$berita->gambar) }}" alt="{{ $berita->judul }}">
                            @php $tgl = \Carbon\Carbon::parse($berita->tanggal); @endphp
                            <div class="date-modern">
                                <div class="day">{{ $tgl->format('d') }}</div>
                                <div class="month">{{ $tgl->format('M') }}</div>
                            </div>
                        </div>

                        <div class="blog-card-body p-4">
                            <h2 class="blog-title">{{ $berita->judul }}</h2>
                            <div class="blog-description">{!! $berita->description !!}</div>
                            @if(!empty($berita->file))
                                <a class="btn btn-gradient mt-4" target="_blank" href="{{ asset('file_upload/pengumuman/file/'.$berita->file) }}">Download File</a>
                            @endif
                            <span class="post-date">{{ $tgl->translatedFormat('d F Y') }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <div id="sidebar" class="col-md-4">
                <div class="widget widget-post mb-4" data-aos="fade-left" data-aos-duration="1000">
                    <h4>Berita Terbaru</h4>
                    <div class="small-border mb-3"></div>
                    <ul>
                        @foreach($beritasamping as $s)
                            @php $tgls = \Carbon\Carbon::parse($s->tanggal); @endphp
                            <li class="mb-2"><span class="date">{{ $tgls->format('d-m-Y') }}</span> <a href="{{ route('detailpost', $s->id) }}">{{ $s->judul }}</a></li>
                        @endforeach
                    </ul>
                </div>
                <div class="widget widget-text" data-aos="fade-left" data-aos-duration="1200" data-aos-delay="150">
                    <h4>Tentang Kami</h4>
                    <div class="small-border mb-3"></div>
                    {!! $profil->tentang_kami !!}
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
