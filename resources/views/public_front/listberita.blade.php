@extends('public_front.include_berita')
@section('title', 'Berita & Artikel')

@section('content')
<style>
:root {
    --day-bg: #e09e23;
    --month-bg: #8f6923;
    --text-color: #fff;
    --dark: #2a2d34;
}

.news-card {
    background: #fff;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 4px 12px rgba(0,0,0,0.05);
    display: flex;
    flex-direction: column;
    height: 100%;
    transition: transform 0.3s, box-shadow 0.3s;
}

.news-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 20px rgba(0,0,0,0.15);
}

.news-image-container {
    position: relative;
    height: 180px;
    overflow: hidden;
}

.news-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s ease;
}

.news-card:hover .news-image {
    transform: scale(1.05);
}

/* Tanggal dan bulan dengan background berbeda */
.news-date-wrapper {
    position: absolute;
    top: 10px;
    left: 15px;
    display: flex;
    flex-direction: column;
    align-items: flex-start;
}

.news-date-day {
    font-size: 1.8rem;
    font-weight: 700;
    background: var(--day-bg);
    color: var(--text-color);
    padding: 5px 8px;
    border-radius: 4px;
    line-height: 1;
    margin-bottom: 2px;
}

.news-date-month {
    font-size: 0.85rem;
    font-weight: 600;
    background: var(--month-bg);
    color: var(--text-color);
    padding: 3px 6px;
    border-radius: 4px;
    line-height: 1;
}

.news-content {
    padding: 20px;
    display: flex;
    flex-direction: column;
    flex-grow: 1;
}

.news-title {
    font-size: 1.25rem;
    font-weight: 700;
    margin-bottom: 10px;
    color: var(--dark);
    transition: color 0.3s;
}

.news-card:hover .news-title {
    color: var(--day-bg);
}

.news-excerpt {
    font-size: 0.95rem;
    color: #555;
    margin-bottom: 15px;
    flex-grow: 1;
}

.read-more {
    font-weight: 600;
    color: var(--day-bg);
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    transition: all 0.3s ease;
}

.read-more i {
    margin-left: 5px;
    transition: transform 0.3s ease;
}

.read-more:hover {
    color: var(--month-bg);
}

.read-more:hover i {
    transform: translateX(3px);
}

.pagination-container {
    margin-top: 40px;
    display: flex;
    justify-content: center;
}

/* Responsive */
@media (max-width: 991px) {
    .news-image-container {
        height: 160px;
    }
}

@media (max-width: 767px) {
    .news-image-container {
        height: 140px;
    }
}
</style>

<section id="subheader" class="text-light" style="background-image: url('img/bgprovheader.jpg');">
    <div class="center-y relative text-center">
        <div class="container">
            <h1 style="color:blackhamdi;">Berita & Artikel</h1>
        </div>
    </div>
</section>

<section class="py-5" style="background-color: #f8f9fa;">
    <div class="container">
        <div class="row">
            @foreach($berita as $b)
            <div class="col-lg-4 col-md-6 mb-4 d-flex">
                <div class="news-card">
                    <div class="news-image-container">
                        <img src="{{ asset('file_upload/berita/'.$b->gambar) }}" alt="{{ $b->judul }}" class="news-image">
                        <div class="news-date-wrapper">
                            <div class="news-date-day">{{ \Carbon\Carbon::parse($b->tanggal)->format('d') }}</div>
                            <div class="news-date-month">{{ \Carbon\Carbon::parse($b->tanggal)->format('m') }}</div>
                        </div>
                    </div>
                    <div class="news-content">
                        <h3 class="news-title">
                            <a href="{{ route('detailpost', $b->id) }}">{{ $b->judul }}</a>
                        </h3>
                        <div class="news-excerpt">
                            <?php
                            $str = strip_tags($b->description);
                            echo strlen($str) > 150 ? substr($str,0,150).'...' : $str;
                            ?>
                        </div>
                        <a href="{{ route('detailpost', $b->id) }}" class="read-more">
                            Baca Selengkapnya <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="pagination-container">
            {{ $berita->links('vendor.pagination.custom') }}
        </div>
    </div>
</section>  
@endsection
