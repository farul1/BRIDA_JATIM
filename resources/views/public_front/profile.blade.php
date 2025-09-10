@extends('public_front.include_berita')

@section('title', 'Profil BRIDA')

@section('content')
<!-- Header -->
<section id="subheader" class="text-light" data-stellar-background-ratio=".2" style="background-image: url('img/bgprovheader.jpg');">
    <div class="center-y relative text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1 style="color:blackhamdi;">PROFIL BRIDA</h1>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</section>
<!-- Content -->
<section aria-label="section" class="py-5">
    <div class="container">
        <div class="row">
            <!-- Sidebar Tabs -->
            <div class="col-lg-3 col-md-4 mb-4">
                <div class="nav flex-column nav-pills custom-tabs shadow-sm p-3 rounded" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" data-toggle="pill" href="#sejarah" role="tab">
                         Sejarah
                    </a>
                    <a class="nav-link" data-toggle="pill" href="#visi-misi" role="tab">
                         Visi, Misi & Motto
                    </a>
                    <a class="nav-link" data-toggle="pill" href="#tujuan" role="tab">
                         Tujuan & Sasaran
                    </a>
                    <a class="nav-link" data-toggle="pill" href="#struktur" role="tab">
                         Struktur Organisasi
                    </a>
                </div>
            </div>

            <!-- Tab Content -->
            <div class="col-lg-9 col-md-8">
                <div class="tab-content" id="v-pills-tabContent">

                    <!-- Sejarah -->
                    <div class="tab-pane fade show active animate__animated animate__fadeIn" id="sejarah" role="tabpanel">
                        <div class="card shadow-sm p-4">
                            <h3 class="fw-bold text-orange mb-3">Sejarah</h3>
                            {!! $profil->profil ?? '<p class="text-muted">Belum ada informasi sejarah.</p>' !!}
                        </div>
                    </div>

<!-- Visi, Misi, Moto -->
<div class="tab-pane fade animate__animated animate__fadeIn" id="visi-misi" role="tabpanel">
    <div class="card shadow-sm p-4">
        @if(!empty($profil->tugas_pokok))
            {!! $profil->tugas_pokok !!}
        @else
            <p class="text-muted">Belum ada informasi visi, misi, dan motto.</p>
        @endif
    </div>
</div>



                    <!-- Tujuan & Sasaran -->
                    <div class="tab-pane fade animate__animated animate__fadeIn" id="tujuan" role="tabpanel">
                        <div class="card shadow-sm p-4">
                            <h3 class="fw-bold text-orange mb-3">Tujuan & Sasaran</h3>
                            {!! $profil->tujuan ?? '<p class="text-muted">Belum ada informasi tujuan & sasaran.</p>' !!}
                        </div>
                    </div>

<!-- Struktur Organisasi -->
<div class="tab-pane fade animate__animated animate__fadeIn" id="struktur" role="tabpanel">
    <div class="card shadow-sm p-4 text-center">
        <h3 class="fw-bold text-orange mb-3">Struktur Organisasi</h3>

        @if(!empty($profil->struktur_organisasi))
            {{-- Tampilkan konten dari admin (CKEditor atau link gambar) --}}
            {!! $profil->struktur_organisasi !!}
        @else
            {{-- Tampilkan gambar default lokal --}}
            <a href="{{ asset('img/struktur_organisasi.png') }}" target="_blank">
                <img src="{{ asset('img/struktur_organisasi.png') }}" alt="Struktur Organisasi BRIDA" class="img-fluid rounded shadow-sm">
            </a>
            <p class="text-muted mt-2 small">Klik gambar untuk memperbesar</p>
        @endif

    </div>
</div>


                </div>
            </div>
        </div>
    </div>
</section>

<!-- Custom Style -->
<style>
/* Orange brand color */
.text-orange { color: #fd7e14 !important; }

/* Sidebar tabs */
.custom-tabs .nav-link {
    border-radius: 10px;
    margin-bottom: 12px;
    background: #ffffff;
    color: #444 !important;   /* pastikan abu default */
    font-weight: 500;
    padding: 14px 18px;
    transition: all 0.25s ease-in-out;
    border: 1px solid #e6e6e6;
    display: flex;
    align-items: center;
    text-shadow: none !important; /* cegah efek glow */
}

/* Active state */
.custom-tabs .nav-link.active {
    background: linear-gradient(135deg, #fd7e14, #ff944d);
    color: #fff !important;   /* putih pas aktif */
    font-weight: 600;
    border: none;
    box-shadow: 0 6px 14px rgba(253, 126, 20, 0.4);
    transform: translateY(-1px);
}

/* Hover state */
.custom-tabs .nav-link:hover {
    background: linear-gradient(135deg, #ff944d, #fd7e14);
    color: #fff !important;   /* putih pas hover */
    border: none;
    transform: translateY(-2px);
    box-shadow: 0 6px 16px rgba(253, 126, 20, 0.4);
}


/* Card content */
.card {
    border: none;
    border-radius: 14px;
    box-shadow: 0 6px 16px rgba(0,0,0,0.08);
}
/* Hapus garis biru saat aktif/focus */
.tab-content, .tab-pane, .card {
    outline: none !important;
    border: none !important;
    box-shadow: 0 4px 8px rgba(0,0,0,0.08); /* shadow halus */
    border-radius: 12px;
    background: #fff;
}

/* Style tombol tab */
.nav-pills .nav-link {
    border-radius: 10px;
    margin-bottom: 10px;
    font-weight: 600;
    color: #444;
    background: #fff;
    border: 1px solid #eee;
    transition: all 0.3s ease;
}

/* Tombol aktif */
.nav-pills .nav-link.active {
    background: linear-gradient(135deg, #ff7a18, #ffb347);
    color: white !important;
    box-shadow: 0 4px 12px rgba(255,122,24,0.4);
    border: none;
}

</style>
@endsection
