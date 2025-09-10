@extends('public_front.include_berita')
@section('title', 'SAKIP')

@section('content')
<style>
/* Sidebar Tab */
.nav-pills .nav-link {
    border-radius: 14px;
    margin-bottom: 12px;
    font-weight: 600;
    color: #555;
    background: #fff;
    border: 1px solid #eee;
    transition: all 0.3s ease;
    padding: 14px 18px;
    box-shadow: 0 2px 6px rgba(0,0,0,0.04);
}
.nav-pills .nav-link:hover {
    background: #fef5f0;
    color: #ff7a18;
    border-color: #ffb347;
    transform: translateX(6px);
    box-shadow: 0 4px 10px rgba(255,122,24,0.15);
}
.nav-pills .nav-link.active {
    background: linear-gradient(135deg, #ff7a18, #ffb347);
    color: #fff !important;
    box-shadow: 0 6px 14px rgba(255,122,24,0.35);
    border: none;
    transform: translateX(6px);
}

/* Card */
.sakip-card {
    background: #fff;
    padding: 28px;
    border-radius: 18px;
    box-shadow: 0 2px 12px rgba(0,0,0,0.05);
    margin-bottom: 2rem;
    transition: all 0.35s ease;
}
.sakip-card:hover {
    box-shadow: 0 10px 28px rgba(0,0,0,0.12);
    transform: translateY(-6px);
}

/* Content Layout */
.sakip-content {
    display: flex;
    align-items: center; /* ubah dari flex-start ke center */
    gap: 28px;
}

.sakip-text {
    flex: 1;
}

/* Image */
.sakip-image {
    max-height: 160px;
    object-fit: contain;
    border-radius: 14px;
    border: 1px solid #eee;
    padding: 8px;
    background: #fafafa;
    box-shadow: 0 2px 8px rgba(0,0,0,0.06);
    transition: transform 0.35s ease, box-shadow 0.35s ease;
}
.sakip-image:hover {
    transform: scale(1.07);
    box-shadow: 0 8px 20px rgba(0,0,0,0.15);
}

/* Button */
.sakip-download-btn {
    font-weight: 600;
    border-radius: 40px;
    padding: 9px 26px;
    transition: all 0.3s ease;
    background: linear-gradient(135deg, #ff7a18, #ffb347);
    border: none;
    box-shadow: 0 3px 8px rgba(255,122,24,0.25);
}
.sakip-download-btn:hover {
    background: linear-gradient(135deg, #e96a00, #ff9a3b);
    box-shadow: 0 6px 16px rgba(255,122,24,0.35);
    transform: translateY(-2px);
}

/* Responsive */
@media (max-width: 767px) {
    .sakip-content {
        flex-direction: column;
        gap: 18px;
    }
    .sakip-image {
        max-height: 220px;
        width: 100%;
    }
}

/* Tab Content */
.tab-content,
.tab-pane {
    background-color: transparent !important;
    padding: 0 !important;
}
</style>

<!-- Header -->
<section id="subheader" class="text-light" data-stellar-background-ratio=".2" style="background-image: url('img/bgprovheader.jpg');">
    <div class="center-y relative text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1 style="color:white;">SAKIP</h1>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</section>

<!-- Content -->
<section aria-label="section" class="my-5">
    <div class="container">
        <div class="row">
            <!-- Sidebar nav -->
            <div class="col-md-3 mb-4 mb-md-0">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist">
                    @foreach($sakipKat as $index => $sk)
                        <a class="nav-link {{ $index == 0 ? 'active' : '' }}"
                           id="v-pills-{{ $sk->id }}-tab"
                           data-toggle="pill"
                           href="#v-pills-{{ $sk->id }}"
                           role="tab"
                           aria-selected="{{ $index == 0 ? 'true' : 'false' }}">
                            {{ $sk->nama_kategori }}
                        </a>
                    @endforeach
                </div>
            </div>

            <!-- Content area -->
            <div class="col-md-9">
                <div class="tab-content" id="v-pills-tabContent">
                    @foreach($sakipKat as $index => $sk)
                        <div class="tab-pane fade {{ $index == 0 ? 'show active' : '' }}"
                             id="v-pills-{{ $sk->id }}"
                             role="tabpanel">

                            @forelse($sakipDat->where('id_kategori', $sk->id)->sortByDesc('id') as $sd)
                                <div class="sakip-card">
                                    <div class="sakip-content">
                                        <!-- Gambar -->
                                        @if($sd->gambar)
                                            <div>
                                                <img src="{{ asset($sd->gambar) }}" alt="{{ $sd->judul }}" class="sakip-image">
                                            </div>
                                        @endif

                                        <!-- Teks -->
                                        <div class="sakip-text">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <h5 class="mb-2 fw-bold text-dark">{{ $sd->judul }}</h5>
                                                @if($sd->file)
                                                    <a target="_blank" href="{{ asset($sd->file) }}" class="btn btn-sm text-white sakip-download-btn">
                                                        📥 Unduh Dokumen
                                                    </a>
                                                @else
                                                    <button class="btn btn-secondary btn-sm rounded-pill" disabled>File tidak tersedia</button>
                                                @endif
                                            </div>
                                            @if($sd->keterangan)
                                                <p class="text-muted mt-2" style="font-size: 0.95rem;">{{ $sd->keterangan }}</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <p class="text-muted fst-italic">Belum ada data pada kategori ini.</p>
                            @endforelse

                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
