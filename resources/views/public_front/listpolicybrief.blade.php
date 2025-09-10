@extends('public_front.include_berita')

@section('title', 'Policy Brief BRIDA Jawa Timur')

@section('content')

<section id="subheader" class="text-light" data-stellar-background-ratio=".2" style="background-image: url('img/bgprovheader.jpg');">
    <div class="center-y relative text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1 style="color:blackhamdi;">Policy Brief BRIDA Jawa Timur</h1>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</section>

<section aria-label="section" class="pt-5">
    <div class="container">
        <div class="row">
            <!-- Notifikasi -->
            <div class="col-md-12">
                @if(session('status'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('status') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="text-center mb-5">
                    <h2>Dokumen Policy Brief</h2>
                    <p>Berikut adalah kumpulan policy brief yang diterbitkan oleh BRIDA Jawa Timur</p>
                </div>
            </div>
        </div>

        <div class="row">
            @forelse($policyBriefs as $pb)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100 shadow-sm">
                    @if($pb->gambar)
                    <img src="{{ asset('storage/'.$pb->gambar) }}" class="card-img-top" alt="{{ $pb->judul }}" style="height: 200px; object-fit: cover;">
                    @else
                    <div class="card-img-top bg-light d-flex align-items-center justify-content-center" style="height: 200px;">
                        <i class="fas fa-file-alt fa-3x text-muted"></i>
                    </div>
                    @endif
                    
                    <div class="card-body">
                        <h5 class="card-title">{{ $pb->judul }}</h5>
                        <p class="card-text">
                            {{ Str::limit($pb->deskripsi, 100) }}
                        </p>
                    </div>
                    
                    <div class="card-footer bg-white">
                        <div class="d-flex justify-content-between align-items-center">
                            @if($pb->file)
                            <a href="{{ asset('storage/'.$pb->file) }}" target="_blank" class="btn btn-primary btn-sm">
                                <i class="fas fa-download"></i> Download PDF
                            </a>
                            @else
                            <span class="text-muted">Tidak ada file</span>
                            @endif
                            
                            <small class="text-muted">
                                {{ $pb->created_at->format('d M Y') }}
                            </small>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-md-12">
                <div class="text-center py-5">
                    <i class="fas fa-inbox fa-3x text-muted mb-3"></i>
                    <h4>Belum ada Policy Brief</h4>
                    <p class="text-muted">Tidak ada dokumen policy brief yang tersedia saat ini.</p>
                </div>
            </div>
            @endforelse
        </div>

        <!-- Pagination -->
        @if($policyBriefs->hasPages())
        <div class="row">
            <div class="col-md-12">
                <nav aria-label="Page navigation">
                    <ul class="pagination justify-content-center">
                        {{ $policyBriefs->links() }}
                    </ul>
                </nav>
            </div>
        </div>
        @endif
    </div>
</section>

@endsection

@section('styles')
<style>
.card {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    border: none;
    border-radius: 10px;
}

.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.1);
}

.card-img-top {
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
}

.btn-primary {
    background-color: #007bff;
    border-color: #007bff;
}

.btn-primary:hover {
    background-color: #0056b3;
    border-color: #0056b3;
}
</style>
@endsection