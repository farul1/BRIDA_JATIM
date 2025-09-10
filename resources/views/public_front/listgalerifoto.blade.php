@extends('public_front.include_berita')
@section('title', 'Galeri Foto')

@section('content')
<div class="no-bottom no-top" id="content">
    <div id="top"></div>

    <!-- HEADER -->
<section id="subheader" class="text-light" data-stellar-background-ratio=".2" style="background-image: url('img/bgprovheader.jpg');">
    <div class="center-y relative text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1 style="color:blackhamdi;">GALERI FOTO</h1>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</section>
    <!-- PHOTO GRID -->
    <section aria-label="section" class="py-12 bg-gray-900">
        <div class="container mx-auto px-4">
            <div class="photo-grid">
                @foreach($galeri as $a)
                <div class="photo-item group">
                    <a href="{{ route('galeri_foto_detail',$a->id) }}" class="photo-link">
                        <div class="photo-wrapper">
                            <img src="{{asset('file_upload/thumbnail/foto/'.$a->thumbnail)}}"
                                 alt="{{$a->judul}}"
                                 class="photo-image">
                            <div class="photo-overlay">
                                <div class="photo-title">{{$a->judul}}</div>
                                <div class="photo-action">
                                    <span class="view-btn">Lihat Album</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>

            <!-- PAGINATION -->
            <div class="pagination-container mt-8">
                {{ $galeri->links('vendor.pagination.custom') }}
            </div>
        </div>
    </section>
</div>
<style>
/* GRID LAYOUT */
.photo-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 1.5rem;
}

.photo-item {
    border-radius: 12px;
    overflow: hidden;
    transition: all 0.3s ease;
    box-shadow: 0 4px 12px rgba(0,0,0,0.15);
    background: #1e1e1e;
}

.photo-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(255, 140, 0, 0.4);
}

.photo-link {
    display: block;
    height: 100%;
}

.photo-wrapper {
    position: relative;
    height: 250px;
    overflow: hidden;
}

.photo-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s ease;
}

.photo-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0,0,0,0.7);
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

.photo-item:hover .photo-image {
    transform: scale(1.05);
}

.photo-title {
    color: white;
    font-size: 1.25rem;
    font-weight: 600;
    margin-bottom: 1rem;
    text-align: center;
    transition: color 0.2s ease;
}

.photo-action {
    margin-top: 1rem;
}

.view-btn {
    display: inline-block;
    padding: 0.5rem 1.5rem;
    background: #ff8c00;
    color: white;
    border-radius: 30px;
    font-weight: 600;
    transition: all 0.3s ease;
}

.view-btn:hover {
    background: #ff6d00;
    transform: scale(1.05);
}

/* PAGINATION STYLING */
.pagination-container {
    display: flex;
    justify-content: center;
    margin-top: 3rem;
}

/* RESPONSIVE DESIGN */
@media (max-width: 768px) {
    .photo-grid {
        grid-template-columns: 1fr;
        gap: 1rem;
    }

    .photo-wrapper {
        height: 200px;
    }

    .photo-title {
        font-size: 1.1rem;
    }
}

/* THEME COLORS */
.photo-item:hover .photo-title {
    color: #ff8c00;
}
</style>
@endsection
