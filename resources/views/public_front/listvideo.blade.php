@extends('public_front.include_berita')
@section('title', 'Galeri Video')

@section('content')
<div class="no-bottom no-top" id="content">
    <div id="top"></div>

    <!-- HEADER -->
    <section id="subheader" class="text-light" data-stellar-background-ratio=".2" style="background-image: url('img/bgprovheader.jpg');">
    <div class="center-y relative text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1 style="color:blackhamdi;">Galeri Video</h1>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
</section>

    <!-- VIDEO GRID -->
    <section aria-label="section" class="py-12 bg-gray-900">
        <div class="container mx-auto px-4">
            <div class="video-grid">
                @foreach($video as $f)
                <div class="video-item group">
                    <div class="video-wrapper">
                        <iframe class="video-iframe"
                                src="{{ str_replace('youtube.com/watch?v=', 'youtube.com/embed/', $f->link) }}?rel=0&modestbranding=1&controls=1"
                                frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>
                    </div>
                    <div class="video-info">
                        <h3 class="video-title">{{ $f->judul }}</h3>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- PAGINATION -->
            <div class="pagination-container mt-8">
                {{ $video->links('vendor.pagination.custom') }}
            </div>
        </div>
    </section>
</div>
<style>
/* GRID LAYOUT */
.video-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(480px, 1fr));
    gap: 1.5rem;
}

.video-item {
    background: #1e1e1e;
    border-radius: 12px;
    overflow: hidden;
    transition: all 0.3s ease;
    box-shadow: 0 4px 12px rgba(0,0,0,0.15);
}

.video-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(255, 140, 0, 0.4);
}

.video-wrapper {
    position: relative;
    padding-bottom: 56.25%; /* 16:9 aspect ratio */
    height: 0;
    overflow: hidden;
}

.video-iframe {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    border: none;
}

.video-info {
    padding: 1.25rem;
    background: #252525;
    border-top: 2px solid #ff8c00;
}

.video-title {
    font-size: 1.25rem;
    font-weight: 600;
    color: white;
    margin: 0;
    line-height: 1.4;
    transition: color 0.2s ease;
}

/* HOVER EFFECTS */
.video-item:hover .video-title {
    color: #ff8c00;
}

/* PAGINATION STYLING */
.pagination-container {
    display: flex;
    justify-content: center;
    margin-top: 3rem;
}

/* RESPONSIVE DESIGN */
@media (max-width: 768px) {
    .video-grid {
        grid-template-columns: 1fr;
        gap: 1rem;
    }

    .video-title {
        font-size: 1.1rem;
        padding: 1rem;
    }

    .video-info {
        padding: 0.75rem;
    }
}

/* YOUTUBE PLAYER OPTIMIZATION */
.video-iframe {
    background: #000; /* Black background while loading */
}
</style>
@endsection
