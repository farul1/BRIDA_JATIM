@extends('front_index')
@section('title') BRIDA JATIM @endsection

@section('logo-header')
    <!-- logo begin -->
    <!-- logo close -->
@endsection

@section('slider')
@php
// Slider: ambil 1 video pertama jika ada
$videoSlider = $slider ? $slider->first(function($s){
    $ext = strtolower(pathinfo($s->gambar, PATHINFO_EXTENSION));
    return in_array($ext, ['mp4','webm','mov']);
}) : null;

// Tab Video: ambil semua video
$videoTab = $slider ? $slider->filter(function($s){
    $ext = strtolower(pathinfo($s->gambar, PATHINFO_EXTENSION));
    return in_array($ext, ['mp4','webm','mov']);
}) : collect();
@endphp

<div class="header-carousel">
    @if($videoSlider)
        <!-- Video statis, autoplay, loop, no controls -->
        <video autoplay muted loop playsinline class="w-100 h-100" style="object-fit:cover;">
            <source src="{{ asset('file_upload/slider/' . $videoSlider->gambar) }}" type="video/mp4">
            Browser Anda tidak mendukung video.
        </video>
    @elseif($slider && $slider->count() > 0)
        <!-- Slider gambar/gif -->
        <div class="swiper-wrapper">
            @foreach ($slider as $s)
                <div class="swiper-slide">
                    <img src="{{ asset('file_upload/slider/' . $s->gambar) }}" alt="Slide {{ $loop->iteration }}" class="img-fluid w-100">
                </div>
            @endforeach
        </div>
    @else
        <!-- Default placeholder jika tidak ada slider -->
        <div class="swiper-slide">
            <img src="{{ asset('img/placeholder-slider.jpg') }}" alt="Default Slide" class="img-fluid w-100">
        </div>
    @endif
</div>
@endsection

@push('styles')
<style>
.header-carousel video {
    width: 100%;
    height: 400px; /* sama dengan slider */
    object-fit: cover;
    display: block; /* pastikan tidak ikut slide */
}

.header-carousel {
    width: 100%;
    height: 400px; /* Turunin tinggi biar lebih ringan */
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1); /* Shadow lebih ringan */
    margin: auto;
}

.header-carousel .swiper-slide {
    display: flex;
    justify-content: center;
    align-items: center;
}

.header-carousel img {
    object-fit: cover;
    width: 100%;
    height: 100%;
}

.trofi {
    position: absolute;
    width: 10%; /* lebih kecil */
    bottom: 10%;
}

.trofi.kiri {
    left: 5%;
}

.trofi.kanan {
    right: 5%;
}
</style>
@endpush

@push('scripts')
<script>
document.addEventListener("DOMContentLoaded", function() {
    new Swiper(".header-carousel", {
        loop: true,
        autoplay: {
            delay: 4000,
            disableOnInteraction: false
        },
        effect: "slide", // slide lebih ringan dari fade
        speed: 600,
        lazy: {
            loadPrevNext: true,
        },
    });
});
</script>
@endpush

@section('blog')
@if($link && $link->count() > 0)
<section aria-label="section" class="application-section" style="background: url({{ asset('img/back1.jpg') }}); background-size: cover; background-position: center;">
    <div class="containerhamdi" style="position: relative; overflow: hidden; padding: 20px 0;">
        <!-- Tombol panah besar -->
        <button id="prevBtn" class="slider-arrow left"><span class="arrow-left"></span></button>
        <button id="nextBtn" class="slider-arrow right"><span class="arrow-right"></span></button>

        <div class="slider-wrapper1" id="slider">
            @foreach ($link as $li)
                <div class="mask2-slide">
                    <div class="mask2">
                        <img src="{{ asset($li->logo) }}" alt="{{ $li->nama }}">
                        <h3>{{ $li->nama }}</h3>
                        <a href="{{ $li->link }}" class="btn-selengkapnya1">Selengkapnya</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<style>
/* Slider wrapper */
.slider-wrapper1 {
    display: flex;
    gap: 15px;
    overflow-x: auto;
    scroll-behavior: smooth;
    padding: 10px 0;
    scrollbar-width: none; /* Firefox */
}
.slider-wrapper1::-webkit-scrollbar { display: none; }

/* Item slider */
/* Card mask2 modern */
.mask2 {
    background: #fff;                /* putih bersih */
    border-radius: 12px;             /* lebih smooth */
    padding: 15px;
    text-align: center;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);  /* shadow lembut */
    transition: transform 0.3s, box-shadow 0.3s;
}

.mask2 img {
    width: 100%;
    height: 150px;
    object-fit: cover;
    border-radius: 10px;
    margin-bottom: 10px;
    transition: transform 0.3s;
}

.mask2 h3 {
    margin: 10px 0;
    font-size: 16px;
    font-weight: 600;
    color: #333;
}

.mask2:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 20px rgba(0,0,0,0.15);
}

.mask2:hover img {
    transform: scale(1.05);
}


/* Tombol Selengkapnya */
.btn-selengkapnya1{
    display: inline-block;
    margin: 14px auto 16px;
    padding: 8px 18px;
    border-radius: 999px;
    border: 2px solid #FF7300;
    color: #FF7300;
    background: #FFF5EB;
    font-weight: 600;
    text-decoration: none;
    transition: all .25s ease;
}
.btn-selengkapnya1:hover {
    background:#FF7300;
    color:#fff;
}

/* Tombol panah besar & tebal */
.slider-arrow {
    position: absolute;
    top: 50%;
    width: 50px;
    height: 50px;
    background: none;
    border: none;
    cursor: pointer;
    z-index: 10;
    transform: translateY(-50%);
    display: flex;
    align-items: center;
    justify-content: center;
    transition: transform 0.3s; /* animasi smooth */
}

/* Panah menggunakan span */
.arrow-left, .arrow-right {
    display: block;
    width: 25px;
    height: 25px;
    border-top: 5px solid #eaa636;
    border-left: 5px solid #eaa636;
    transition: transform 0.3s; /* animasi zoom */
}

.arrow-left { transform: rotate(-45deg); }
.arrow-right { transform: rotate(135deg); }

/* Posisi tombol */
.slider-arrow.left { left: 10px; }
.slider-arrow.right { right: 10px; }

.slider-arrow:hover {
    transform: translateY(-50%) scale(1.2); /* zoom out efek */
}

/* Responsif */
@media (max-width: 1200px) { .mask2-slide { flex: 0 0 calc(33.33% - 15px); } }
@media (max-width: 768px) { .mask2-slide { flex: 0 0 calc(50% - 15px); } }
@media (max-width: 480px) { .mask2-slide { flex: 0 0 100%; } }
</style>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const slider = document.getElementById('slider');
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');

    if (slider && prevBtn && nextBtn) {
        function getScrollAmount() {
            const slide = slider.querySelector('.mask2-slide');
            return slide ? slide.offsetWidth + 15 : 300;
        }

        prevBtn.addEventListener('click', () => {
            slider.scrollBy({ left: -getScrollAmount(), behavior: 'smooth' });
        });
        nextBtn.addEventListener('click', () => {
            slider.scrollBy({ left: getScrollAmount(), behavior: 'smooth' });
        });
    }
});
</script>
@endsection

@section('berita')
@if($berita && $berita->count() > 0)
<div class="position-relative">
    <div class="background-absolute">
        <img src="{{ asset('img/back3terbaru.png') }}" alt="" class="back">
    </div>
    <section class="afu-berita-section container">
        <div class="col-3">
            <h1>Berita<br><b>Terkini</b>.</h1>
            <div class="small-border bg-white sm-left"></div>
        </div>
        <div class="grid-berita col-9">
            @foreach ($berita as $b)
                <div class="wow fadeInRight mt-200 afu-item" data-wow-delay=".2s">
                    <div class="mask rounded">
                        <div class="bloglist item">
                            <div class="post-content">
                                <div class="date-box">
                                    <div class="m">{{ \Carbon\Carbon::parse($b->tanggal)->format('d') }}</div>
                                    <div class="d">{{ \Carbon\Carbon::parse($b->tanggal)->format('M Y') }}</div>
                                </div>
                                <div class="post-image" style="height: 200px; text-align:center;">
                                    <img alt="" src="{{ asset('file_upload/berita/' . $b->gambar) }}"
                                         style="height: 200px; width: auto;">
                                </div>
                                <div class="post-text" style="height:150px; overflow-y: auto; line-height: normal !important; text-align:center">
                                    <a href="{{ route('detailpost', $b->id) }}">{{ $b->judul }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
</div>
@endif
@endsection

@section('pengumuman')
@if($pengumuman && $pengumuman->count() > 0)
<section aria-label="section" class="application-section section-pengumuman">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-12 text-center align-items-center">
        <h1 class="section-title">Pengumuman</h1>
      </div>
    </div>

    <div class="slider-wrapper">
      <!-- panah kiri -->
      <button class="btnslide-pengumuman left" onclick="slideLeft('slider-pengumuman')"></button>

      <!-- list items -->
      <div class="slider-container" id="slider-pengumuman">
        @foreach ($pengumuman as $p)
          <div class="slide-item">
            <div class="pengumuman-card">
              <div class="pengumuman-image">
                <img src="{{ asset('file_upload/pengumuman/gambar/' . $p->gambar) }}"
                     alt="{{ $p->judul }}" loading="lazy">
              </div>

              <div class="pengumuman-title">{{ $p->judul }}</div>

              <a href="{{ route('detailpost_pengumuman', $p->id) }}"
                 class="btn-selengkapnya">Selengkapnya</a>
            </div>
          </div>
        @endforeach
      </div>

      <!-- panah kanan -->
      <button class="btnslide-pengumuman right" onclick="slideRight('slider-pengumuman')"></button>
    </div>
  </div>
</section>
@endif
@endsection

@section('galeri')
<section class="text-light">
    <div class="container">
        <!-- Judul Slider -->
        <div class="row align-items-center">
            <div class="col-lg-12 text-center">
                <h1 style="color:#FE7301;">Galeri</h1>
            </div>
        </div>

        <!-- Slider -->
        @if($galeriFoto && $galeriFoto->count() > 0)
        <div class="carousel-container">
            @foreach ($galeriFoto as $gal)
                @if($gal->foto && $gal->foto->count() > 0)
                    @foreach ($gal->foto as $f)
                        <div class="mySlides animate">
                            <a href="{{ route('galeri_foto_detail', $gal->id) }}">
                                <img src="{{ asset('file_upload/foto/' . $f->gambar) }}" alt="{{ $f->judul }}" />
                                <div class="text">{{ $f->judul }}</div>
                            </a>
                        </div>
                    @endforeach
                @endif
            @endforeach

            <!-- Next/Prev -->
            <a class="prev">&#10094;</a>
            <a class="next">&#10095;</a>

            <!-- Dots -->
            <div class="dots-container">
                @if($foto && $foto->count() > 0)
                    @foreach ($foto as $index => $f)
                        <span class="dots" onclick="currentSlide({{ $index + 1 }})"></span>
                    @endforeach
                @endif
            </div>
        </div>
        @endif

        <div class="spacer-single"></div>

        <!-- Tabs Foto & Video -->
        <div class="row justify-content-center">
            <div class="col-lg-12 text-center">
                <h1 style="color:#FE7301;">Galeri Foto & Video</h1>
            </div>
        </div>

        <ul class="nav nav-pills mb-5 justify-content-center" id="pills-tab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active btn btn-orange mx-2 px-4 py-2 rounded-pill shadow-sm"
                   id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab"
                   aria-controls="pills-home" aria-selected="true">
                   <i class="fas fa-camera mr-2"></i>Foto
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link btn btn-orange mx-2 px-4 py-2 rounded-pill shadow-sm"
                   id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab"
                   aria-controls="pills-profile" aria-selected="false">
                   <i class="fas fa-video mr-2"></i>Video
                </a>
            </li>
        </ul>
        
        <div class="tab-content" id="pills-tabContent">
            <!-- Foto -->
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <div class="row" style="background-color: white;">
                    @if($foto && $foto->count() > 0)
                        @foreach ($foto as $f)
                            <div class="col-md-4 mb-3">
                                <div class="de-image-hover rounded" style="height:150px;">
                                    <a href="{{ asset('file_upload/foto/' . $f->gambar) }}" class="image-popup">
                                        <span class="dih-title-wrap"><span class="dih-title">{{ $f->judul }}</span></span>
                                        <span class="dih-overlay"></span>
                                        <img src="{{ asset('file_upload/foto/' . $f->gambar) }}" class="img-fluid" alt="{{ $f->judul }}">
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="col-12 text-center py-5">
                            <p>Tidak ada data foto</p>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Video -->
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                <div class="row" style="background-color: white;">
                    @if($video && $video->count() > 0)
                        @foreach ($video as $f)
                            <div class="col-md-6 mb-3">
                                <div class="rounded" style="height:250px;">
                                    <iframe width="100%" height="100%" src="{{ $f->link }}" frameborder="0" allowfullscreen></iframe>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="col-12 text-center py-5">
                            <p>Tidak ada data video</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('link polling')
<div class="tech-split-section">
  <!-- Situs Terkait - Left Side -->
  @if($linkterkait && count($linkterkait) > 0)
  <div class="tech-situs-container">
    <h2 class="tech-section-title">
      <span class="tech-title-text">Situs Terkait</span>
      <span class="tech-title-underline"></span>
    </h2>

    <div class="tech-situs-grid">
      @foreach ($linkterkait as $l)
      <div class="tech-situs-card" data-name="{{ $l['name'] }}">
        <a href="{{ $l['link'] }}" target="_blank" class="tech-situs-link">
          <div class="tech-logo-container">
            <img src="{{ asset('file_upload/link_terkait/' . $l['gambar_logo']) }}"
                 alt="{{ $l['name'] }}" class="tech-situs-logo">
            <div class="tech-logo-halo"></div>
            <div class="tech-logo-particles"></div>
          </div>
          <span class="tech-situs-name">{{ $l['name'] }}</span>
        </a>
      </div>
      @endforeach
    </div>
  </div>
  @endif

  <!-- Polling - Right Side -->
  <div class="polling-container">
      <!-- Header -->
      <div class="polling-header">
          <h1 class="polling-title">POLLING</h1>
          <div class="pulse-line"></div>
      </div>

      <p class="polling-subtitle">Berikan penilaian untuk kami :</p>

      <!-- Star Rating -->
      <div class="polling-rating">
          <div class="stars-grid">
              <!-- Floating Particles -->
              <div class="polling-particles">
                  <div class="particle p1"></div>
                  <div class="particle p2"></div>
                  <div class="particle p3"></div>
              </div>

              <!-- Interactive Stars -->
              <div class="stars-input">
              <input type="radio" id="pstar5" name="rating" value="5" />
              <label for="pstar5" data-value="5">
                  <div class="star-core"></div>
                  <div class="star-glow"></div>
                  <div class="star-pulse"></div>
              </label>

              <input type="radio" id="pstar4" name="rating" value="4" />
              <label for="pstar4" data-value="4">
                  <div class="star-core"></div>
                  <div class="star-glow"></div>
                  <div class="star-pulse"></div>
              </label>

              <input type="radio" id="pstar3" name="rating" value="3" />
              <label for="pstar3" data-value="3">
                  <div class="star-core"></div>
                  <div class="star-glow"></div>
                  <div class="star-pulse"></div>
              </label>

              <input type="radio" id="pstar2" name="rating" value="2" />
              <label for="pstar2" data-value="2">
                  <div class="star-core"></div>
                  <div class="star-glow"></div>
                  <div class="star-pulse"></div>
              </label>

              <input type="radio" id="pstar1" name="rating" value="1" />
              <label for="pstar1" data-value="1">
                  <div class="star-core"></div>
                  <div class="star-glow"></div>
                  <div class="star-pulse"></div>
              </label>
              </div>
          </div>
          <div class="polling-message" id="pollingMessage">Pilih bintang untuk memberikan rating</div>
      </div>

      <!-- Comment Box -->
      <div class="polling-comment">
          <div class="input-container">
              <textarea id="pollingKomentar" placeholder="Berikan Komentar"></textarea>
              <div class="input-border">
                  <div class="scan-line"></div>
              </div>
          </div>
      </div>

      <!-- Submit Button -->
      <button class="polling-button" id="pollingSubmit">
          <span class="btn-text">KIRIM PENILAIAN</span>
          <span class="btn-gradient"></span>
          <span class="btn-particles">
              <span class="particle"></span>
              <span class="particle"></span>
              <span class="particle"></span>
          </span>
      </button>

      <!-- Submission Effects -->
      <div class="polling-effects">
          <div class="energy-wave"></div>
          <div class="confetti-particle"></div>
          <div class="confetti-particle"></div>
          <div class="confetti-particle"></div>
          <div class="thank-you-message">TERIMA KASIH!</div>
      </div>
  </div>
</div>
@endsection

@section('content')
<section id="main-map" class="peta-section">
    <div class="container">
        <div class="peta-container">
            <div class="row g-0">
                
                <!-- Kalender -->
                <div class="col-lg-6">
                    <div class="peta-content">
                        <h2 class="peta-title">Kalender Kegiatan</h2>
                        <div class="calendar-embed">
                            <iframe 
                                src="https://calendar.google.com/calendar/embed?src=id.indonesian%23holiday%40group.v.calendar.google.com&ctz=Asia%2FJakarta"
                                frameborder="0" 
                                scrolling="no">
                            </iframe>
                        </div>
                    </div>
                </div>

                <!-- Peta Lokasi -->
                <div class="col-lg-6">
                    <div class="peta-content">
                        <h2 class="peta-title">Lokasi BRIDA Jawa Timur</h2>
                        <div class="peta-box">
                            @if ($footer && $footer->embed_url)
                                @if (Str::contains($footer->embed_url, '<iframe'))
                                    {!! $footer->embed_url !!}
                                @else
                                    <iframe 
                                        src="{{ $footer->embed_url }}"
                                        allowfullscreen
                                        loading="lazy"
                                        referrerpolicy="no-referrer-when-downgrade">
                                    </iframe>
                                @endif
                            @else
                                <div class="text-center py-5">
                                    <p>Peta tidak tersedia</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection