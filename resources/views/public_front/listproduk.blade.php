@extends('public_front.include_berita')
@section('content')

{{-- Subheader --}}
<section id="subheader" class="text-light" data-stellar-background-ratio=".2" style="background-image: url('/img/bgprovheader.jpg');">
    <div class="center-y relative text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1 style="color:white;">{{ $kategori->nama_kategori }}</h1>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Konten Utama --}}
<section aria-label="section">
    <div class="container">
        <div class="row">
<!-- List Berita -->
<div class="col-md-8">
    <?php $num = 0; ?>
    @foreach($data->reverse() as $d)
        <?php $num++; ?>
        <div class="brida-card card mb-4 shadow-sm">
            @if($d->gambar)
                <div class="brida-thumb">
                    <img src="{{ asset($d->gambar) }}"
                         alt="Gambar {{ $d->judul }}"
                         class="img-fluid rounded-top">
                </div>
            @endif
            <div class="card-body">
                <h3 class="card-title brida-title text-orange">
                  {{ $d->judul }}
                </h3>

                @if($d->keterangan)
                    <p class="card-text text-muted">
                        {{ $d->keterangan }}
                    </p>
                @endif

                @if($d->file)
                    <div class="d-flex gap-2 mt-3 flex-wrap">
                        <button class="btn btn-primary brida-read-btn"
                                data-file-url="{{ asset($d->file) }}"
                                data-brida-title="{{ $d->judul }}">
                            <i class="fas fa-book-open me-2"></i> Baca
                        </button>
                        <a href="{{ asset($d->file) }}" class="btn btn-orange-outline" target="_blank">
                            <i class="fas fa-download me-2"></i> Download
                        </a>
                    </div>
                @endif
            </div>
        </div>
    @endforeach
</div>




            <!-- Sidebar -->
            <div id="sidebar" class="col-md-4">
                <div class="widget widget-text">
                    <h4>Tentang Kami</h4>
                    <div class="small-border"></div>
                    {!! $profil->tentang_kami !!}
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Modal PDF Viewer --}}
<div class="modal fade" id="pdfViewerModal" tabindex="-1" aria-labelledby="pdfViewerLabel" aria-hidden="true" role="dialog" aria-modal="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header d-flex justify-content-between align-items-center">
    <h5 class="modal-title mb-0" id="pdfViewerLabel">Pembaca Dokumen</h5>
    <button type="button" class="btn btn-light btn-sm brida-close-btn"
        data-bs-dismiss="modal" aria-label="Tutup">
    ✕
</button>

</div>

            <div class="modal-body">
                <div class="pdf-controls mb-3 d-flex justify-content-between align-items-center">
                    <div>
                        <button class="btn btn-sm btn-outline-secondary" id="prev-page" aria-label="Halaman sebelumnya" disabled>
                            <i class="fas fa-chevron-left"></i> Sebelumnya
                        </button>
                        <div class="mx-2 d-inline-flex align-items-center">
                            Halaman
                            <input type="number" id="page-input" value="1" min="1" style="width:60px;" class="form-control form-control-sm mx-1">
                            dari&nbsp;<span id="page-count">0</span>
                        </div>

                        <button class="btn btn-sm btn-outline-secondary" id="next-page" aria-label="Halaman berikutnya" disabled>
                            Selanjutnya <i class="fas fa-chevron-right"></i>
                        </button>
                    </div>
                    <div>
                        <button class="btn btn-sm btn-outline-secondary" id="zoom-out" aria-label="Perkecil PDF">
                            <i class="fas fa-search-minus"></i>
                        </button>
                        <button class="btn btn-sm btn-outline-secondary" id="zoom-in" aria-label="Perbesar PDF">
                            <i class="fas fa-search-plus"></i>
                        </button>
                        <button class="btn btn-sm btn-outline-secondary" id="download-pdf" aria-label="Unduh PDF">
                            <i class="fas fa-download"></i>
                        </button>
                    </div>
                </div>

                <!-- Kontainer PDF -->
                <div class="pdf-container border text-center">
                    <canvas id="pdf-canvas" class="mx-auto d-block"></canvas>
                </div>
                <div id="pdf-error" class="alert alert-danger mt-3 d-none">Gagal memuat dokumen.</div>
            </div>
        </div>
    </div>
</div>

{{-- Styling --}}
<style>
.brida-item {
    transition: transform 0.3s ease;
}
.brida-item:hover {
    transform: translateY(-5px);
}
.brida-description {
    background: #f8f9fa;
    padding: 15px;
    border-radius: 5px;
    margin-top: 15px;
}

/* Biar modal bisa scroll enak */
.modal-dialog-scrollable .modal-body {
    max-height: 80vh;
    overflow-y: auto !important;
    -webkit-overflow-scrolling: touch;
}

.pdf-container {
    background: #fdfdfd;
    padding: 10px;
    max-height: 70vh;
    overflow-y: auto !important;
    cursor: grab;
    text-align: center; /* supaya canvas center */
}

/* Biar PDF tidak terlalu ngezoom */
.pdf-container canvas {
    display: inline-block;
    margin: 0 auto 20px;
    max-width: 90%;   /* biar ada ruang kiri-kanan */
    height: auto;     /* jaga proporsi */
    box-shadow: 0 2px 6px rgba(0,0,0,0.15);
}
.btn-orange-outline {
    background: transparent;
    color: #e58e26;          /* teks oranye */
    border: 2px solid #e58e26; /* border oranye */
    border-radius: 8px;
    font-weight: 600;
    padding: 8px 18px;
    transition: all 0.3s ease;
}
.btn-orange-outline:hover {
    background: linear-gradient(90deg,#f6b93b,#e58e26); /* background oranye */
    color: #fff;
    transform: scale(1.05);
    box-shadow: 0 8px 20px rgba(230,142,38,0.5);
}
/* Tombol kontrol PDF */
.pdf-controls button {
    pointer-events: auto;
}

/* Backdrop transparan */
.modal-backdrop {
    pointer-events: none;
    background-color: transparent !important;
}

/* Tombol close custom */
.brida-close-btn {
    position: absolute;
    top: 15px;
    right: 15px;
    z-index: 1056;
    font-size: 1.2rem;
    font-weight: bold;
    background-color: #fff;
    color: #333;
    border: 1px solid #ccc;
    border-radius: 50%;
    width: 35px;
    height: 35px;
    line-height: 20px;
    padding: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.2s ease;
}
.brida-close-btn:hover {
    background-color: #f44336;
    color: #fff;
    border-color: #f44336;
}

/* Modal agar tetap di atas navbar */
.modal {
    z-index: 2000 !important;
}
.modal-backdrop {
    z-index: 1990 !important;
}

/* Responsif */
@media (max-width: 768px) {
  .modal-dialog {
    margin: 90px auto 0;
  }
  .pdf-container canvas {
    max-width: 100%; /* biar full tapi tidak kepotong */
  }
}
.modal-dialog {
    margin-top: 70px; /* sesuaikan dengan tinggi navbar */
}

/* Card berita */
.brida-card {
    border: none;
    border-radius: 12px;
    overflow: hidden;
    transition: all 0.3s ease;
}
.brida-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 6px 18px rgba(0,0,0,0.15);
}

/* Thumbnail */
/* Thumbnail */
.brida-thumb {
    text-align: center;
    background: #fff;
    padding: 10px;
}
.brida-thumb img {
    max-height: 380px;   /* biar kecil */
    width: auto;         /* biar tidak dipaksa penuh */
    max-width: 100%;     /* biar responsif */
    object-fit: contain; /* tampil full tanpa kepotong */
    border-radius: 8px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
}


/* Judul */
/* Judul jadi orange */
.brida-title {
    font-size: 1.25rem;
    font-weight: 700;
    color: #ff7f00; /* orange */
    margin-bottom: 10px;
    transition: color 0.3s ease;
}
.brida-title:hover {
    color: #e86c00; /* lebih gelap saat hover */
}


/* Deskripsi singkat */
.brida-description {
    font-size: 0.95rem;
    line-height: 1.6;
    color: #444;
    background: #f8f9fa;
    padding: 12px 15px;
    border-radius: 8px;
    margin-top: 10px;
}

/* Tombol */
.brida-card .btn {
    border-radius: 30px;
    font-weight: 500;
    padding: 6px 16px;
}


</style>

{{-- Script PDF.js --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.4.120/pdf.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.4.120/pdf.worker.min.js';

let currentPdf = null, currentPage = 1, scale = 1.2, pdfUrl = '';

document.addEventListener('DOMContentLoaded', () => {
    const prevBtn = document.getElementById('prev-page');
    const nextBtn = document.getElementById('next-page');
    const zoomInBtn = document.getElementById('zoom-in');
    const zoomOutBtn = document.getElementById('zoom-out');
    const downloadBtn = document.getElementById('download-pdf');
    const pageNumEl = document.getElementById('page-num');
    const pageCountEl = document.getElementById('page-count');
    const pageInput = document.getElementById('page-input');

    // Tombol buka PDF
    document.querySelectorAll('.brida-read-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            pdfUrl = this.dataset.fileUrl;
            document.getElementById('pdfViewerLabel').textContent = this.dataset.bridaTitle;
            new bootstrap.Modal(document.getElementById('pdfViewerModal')).show();
            loadPdf(pdfUrl);
        });
    });

    // Tombol navigasi halaman
    prevBtn.addEventListener('click', () => { if (currentPdf && currentPage > 1) renderPage(currentPage - 1); });
    nextBtn.addEventListener('click', () => { if (currentPdf && currentPage < currentPdf.numPages) renderPage(currentPage + 1); });

    // Tombol zoom
    zoomInBtn.addEventListener('click', () => { scale += 0.2; renderPage(currentPage); });
    zoomOutBtn.addEventListener('click', () => { if (scale > 0.5) { scale -= 0.2; renderPage(currentPage); } });

    // Tombol download
    downloadBtn.addEventListener('click', () => {
        if (!pdfUrl) return;
        const link = document.createElement("a");
        link.href = pdfUrl;
        link.setAttribute("download", "dokumen.pdf");
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
    });

    // Input halaman
    if (pageInput) {
        pageInput.addEventListener('change', function() {
            let pageNumber = parseInt(this.value);
            if (currentPdf && pageNumber >= 1 && pageNumber <= currentPdf.numPages) {
                renderPage(pageNumber);
            } else {
                this.value = currentPage; // reset jika input invalid
            }
        });
    }

    // Load PDF
    function loadPdf(url) {
        document.getElementById('pdf-error').classList.add('d-none');
        currentPage = 1;
        pdfjsLib.getDocument(url).promise.then(pdf => {
            currentPdf = pdf;
            if (pageCountEl) pageCountEl.textContent = pdf.numPages;
            renderPage(currentPage);
        }).catch(() => {
            document.getElementById('pdf-error').classList.remove('d-none');
        });
    }

    // Render halaman
    function renderPage(num) {
        if (!currentPdf) return;
        currentPdf.getPage(num).then(page => {
            const viewport = page.getViewport({ scale: scale });
            const canvas = document.getElementById('pdf-canvas');
            const ctx = canvas.getContext('2d');
            canvas.height = viewport.height;
            canvas.width = viewport.width;
            page.render({ canvasContext: ctx, viewport: viewport });

            currentPage = num;
            if (pageNumEl) pageNumEl.textContent = num;
            if (prevBtn) prevBtn.disabled = num <= 1;
            if (nextBtn) nextBtn.disabled = num >= currentPdf.numPages;
            if (pageInput) pageInput.value = num;
        });
    }
});
</script>

@endsection
