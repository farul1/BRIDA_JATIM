@extends('public_front.include_berita')

@section('title', 'Pengumuman')

@section('content')
<!-- Header -->
<section id="subheader" class="text-light" data-stellar-background-ratio=".2" style="background-image: url('img/bgprovheader.jpg');">
    <div class="center-y relative text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1 style="color:blackhamdi;">PENGUMUMAN</h1>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Pengumuman -->
<section aria-label="section" class="py-5 bg-light">
    <div class="container">
        <div class="row g-4 justify-content-center">
            @forelse($pengumuman as $b)
                @php $tgl = \Carbon\Carbon::parse($b->tanggal); @endphp
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card shadow-sm border-0 h-100 rounded-4 overflow-hidden hover-card">
                        <!-- Gambar dengan tanggal -->
                        <div class="position-relative">
                            <img class="card-img-top img-fluid"
                                 src="{{ asset('file_upload/pengumuman/gambar/'.$b->gambar) }}"
                                 alt="{{ $b->judul }}">
                            <div class="date-modern position-absolute text-center">
                                <div class="day">{{ $tgl->format('d') }}</div>
                                <div class="month">{{ $tgl->format('M') }}</div>
                            </div>
                        </div>

                        <!-- Konten -->
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title fw-bold mb-3 fs-5">
                                <a href="{{ route('detailpost_pengumuman',$b->id) }}" class="stretched-link text-dark text-decoration-none">
                                    {{ $b->judul }}
                                </a>
                            </h5>
                            <p class="card-text text-muted flex-grow-1 fs-6 lh-lg">
                                {{ Str::limit(strip_tags($b->description), 150, '...') }}
                            </p>

                            <!-- Tombol -->
                            <div class="mt-3 d-flex gap-2 flex-wrap">
                                <a href="{{ route('detailpost_pengumuman',$b->id) }}" class="btn btn-primary btn-sm px-3">
                                    📖 Baca
                                </a>
                                @if($b->file)
                                    <a href="{{ asset('file_upload/pengumuman/file/'.$b->file) }}" class="btn btn-outline-secondary btn-sm px-3">
                                        ⬇️ Unduh
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <p class="text-muted fs-5">Belum ada pengumuman tersedia.</p>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-center mt-5">
            {{ $pengumuman->links('vendor.pagination.custom') }}
        </div>
    </div>
</section>

@push('styles')
<style>
/* Card hover effect */
.hover-card {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}
.hover-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 12px 24px rgba(0,0,0,0.15);
}

/* Tanggal modern */
.date-modern {
    top: 15px;
    left: 15px;
    padding: 6px 8px;
    border-radius: 10px;
    background: rgba(0, 0, 0, 0.65);
    color: #fff;
    width: 50px;
}
.date-modern .day {
    font-size: 1.5rem;
    font-weight: 700;
    color: #ffc107;
    line-height: 1;
}
.date-modern .month {
    font-size: 0.75rem;
    font-weight: 600;
    text-transform: uppercase;
}

/* Card Image */
.card-img-top {
    max-height: 230px;
    width: 100%;
    object-fit: cover;
}

/* Typography */
h1, h5 { color: #222; }
.btn { border-radius: 8px; font-weight: 600; }
.btn-sm { font-size: 0.95rem; }

/* Responsive */
@media (max-width: 576px) {
    .card-body { padding: 1rem; }
    h5.card-title { font-size: 1.1rem; }
    .btn-sm { font-size: 0.9rem; padding: 0.5rem 0.9rem; }
}
</style>
@endpush
@endsection
