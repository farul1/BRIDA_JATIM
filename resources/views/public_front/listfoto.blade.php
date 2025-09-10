@extends('public_front.include_berita')
@section('title', 'Galeri - ' . $galeri->judul)

@section('content')
<div class="no-bottom no-top" id="content">
    <div id="top"></div>

<section id="subheader" class="text-light" data-stellar-background-ratio=".2" style="background-image: url('/img/bgprovheader.jpg');">
    <div class="center-y relative text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1 style="color:blackhamdi;">{{$galeri->judul}}</h1>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</section>

    <!-- PHOTO GALLERY -->
    <section aria-label="section" class="py-12 bg-gray-900">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center mb-8">
                <h2 class="text-2xl font-bold text-orange-400">Koleksi Foto</h2>
            </div>

            <div class="photo-gallery">
                @foreach($foto as $a)
                <div class="photo-item">
                    <a href="{{asset('file_upload/foto/'.$a->gambar)}}" class="glightbox" data-gallery="gallery-{{$galeri->id}}" data-title="{{$a->judul}}">
                        <img src="{{asset('file_upload/foto/'.$a->gambar)}}"
                             alt="{{$a->judul}}"
                             class="photo-image">
                        <div class="photo-overlay">
                            <div class="zoom-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#ff8c00" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="11" cy="11" r="8"></circle>
                                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                </svg>
                            </div>
                            <div class="photo-title">{{$a->judul}}</div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </section>
</div>

<!-- GLightbox CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css">

<style>
/* GALLERY LAYOUT */
.photo-gallery {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
    gap: 1.5rem;
}

.photo-item {
    border-radius: 8px;
    overflow: hidden;
    position: relative;
    box-shadow: 0 4px 12px rgba(0,0,0,0.15);
    transition: all 0.3s ease;
    background: #1e1e1e;
}

.photo-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(255, 140, 0, 0.4);
}

.photo-image {
    width: 100%;
    height: 250px;
    object-fit: cover;
    display: block;
    transition: transform 0.5s ease;
}

.photo-item:hover .photo-image {
    transform: scale(1.05);
}

.photo-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0,0,0,0.6);
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    opacity: 0;
    transition: opacity 0.3s ease;
    padding: 1rem;
    text-align: center;
}

.photo-item:hover .photo-overlay {
    opacity: 1;
}

.zoom-icon {
    margin-bottom: 10px;
}

.zoom-icon svg {
    width: 32px;
    height: 32px;
}

.photo-title {
    color: white;
    font-size: 1rem;
    font-weight: 500;
    margin-top: 8px;
    text-shadow: 1px 1px 3px rgba(0,0,0,0.8);
}

/* RESPONSIVE DESIGN */
@media (max-width: 768px) {
    .photo-gallery {
        grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
        gap: 1rem;
    }

    .photo-image {
        height: 180px;
    }

    .photo-title {
        font-size: 0.9rem;
    }
}

/* LIGHTBOX STYLING */
.gslide-title {
    font-size: 1.1rem;
    color: #ff8c00 !important;
    font-weight: 600;
}
</style>

<!-- GLightbox JS -->
<script src="https://cdn.jsdelivr.net/gh/mcstudios/glightbox/dist/js/glightbox.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const lightbox = GLightbox({
            selector: '.glightbox',
            touchNavigation: true,
            loop: true,
            openEffect: 'zoom',
            closeEffect: 'fade',
            zoomable: true,
            draggable: true
        });
    });
</script>
@endsection
