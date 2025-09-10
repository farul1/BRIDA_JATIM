@extends('public_front.include_berita')
@section('title', $berita->judul)

@section('content')
<style>
    :root {
        --primary: #e68200;
        --primary-dark: #d49c4e;
        --light-bg: #f9fafc;
        --text-dark: #222;
        --text-light: #666;
    }
    h1 {
    font-size: 40px;
    line-height: 1.2;
    max-height: 2.4em; /* maksimal 2 baris */
    overflow: hidden;
    text-overflow: ellipsis;
}

    /* Blog Content */
    .blog-read {
        background: #fff;
        border-radius: 16px;
        box-shadow: 0 6px 20px rgba(0,0,0,0.08);
        padding: 25px;
    }
.blog-read img {
    border-radius: 14px;
    margin-bottom: 20px;
    max-width: 50%;
    display: block;
    margin-left: auto;
    margin-right: auto;
    transition: transform 0.4s ease, box-shadow 0.4s ease;
    cursor: zoom-in; /* kasih icon zoom */
}
.blog-read img:hover {
    transform: scale(1.1); /* efek zoom */
    box-shadow: 0 10px 25px rgba(0,0,0,0.15);
}


    .post-text { font-size: 16px; line-height: 1.8; color: var(--text-dark); }
    .post-text .post-date, .post-text .post-comment {
        display: inline-block; margin-top: 15px; margin-right: 15px;
        font-size: 14px; color: var(--text-light);
    }

    /* Comments */
    #blog-comment ol { list-style: none; padding: 0; }
    #blog-comment li {
        display: flex; gap: 15px; margin-bottom: 18px; padding: 15px;
        background: #fff; border-radius: 14px;
        box-shadow: 0 3px 10px rgba(0,0,0,0.06);
        animation: fadeInUp .5s ease both;
    }
    #blog-comment .avatar img {
        width: 55px; height: 55px; border-radius: 50%; object-fit: cover;
        border: 2px solid var(--primary);
    }
    #blog-comment .comment-info .c_name { font-weight: 600; color: var(--text-dark); margin-right: 10px; }
    #blog-comment .comment-info .c_date { font-size: 13px; color: var(--text-light); }
    #blog-comment .comment {
        background: var(--light-bg); padding: 12px 16px; border-radius: 12px;
        margin-top: 6px; line-height: 1.6;
    }
    @keyframes fadeInUp { from{opacity:0;transform:translateY(15px);} to{opacity:1;transform:translateY(0);} }
    #loadMoreBtn {
        background: var(--primary); color: #fff; border: none;
        padding: 10px 20px; border-radius: 30px; font-weight: 600;
        cursor: pointer; transition: .3s; display: block; margin: 10px auto 0;
    }
    #loadMoreBtn:hover { background: var(--primary-dark); }

    /* Sidebar */

#sidebar .widget ul li {
    position: relative;
    padding: 10px 12px;
    border-radius: 10px;
    transition: all 0.3s ease;
}

#sidebar .widget ul li a {
    color: #333;
    text-decoration: none;
    transition: all 0.3s ease;
    display: inline-block;
}

#sidebar .widget ul li .date {
    transition: all 0.3s ease;
}

/* Hover Effect */
#sidebar .widget ul li:hover {
    background: var(--primary-dark);
    box-shadow: 0 8px 20px rgba(0,0,0,0.1);
}

#sidebar .widget ul li:hover a {
    color: #fff;
    transform: translateX(5px);
}

#sidebar .widget ul li:hover .date {
    color: #fff;
}

/* Optional: small arrow appearing on hover */
#sidebar .widget ul li::after {
    content: '➔';
    position: absolute;
    right: 15px;
    opacity: 0;
    transition: all 0.3s ease;
}
#sidebar .widget ul li:hover::after {
    opacity: 1;
    right: 10px;
    color: #fff;
}


    /* Animated Floating Form */
.animated-form {
    background: #fff;
    padding: 30px 25px;
    border-radius: 18px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.08);
    transition: all 0.4s ease;
}
.animated-form:hover { transform: translateY(-4px); box-shadow: 0 15px 35px rgba(0,0,0,0.12); }
/* Form Floating Label + Ikon */
.form-floating-group {
    position: relative;
    margin-bottom: 22px;
}

.form-floating-group input,
.form-floating-group textarea {
    width: 100%;
    border: 1px solid #ddd;
    border-radius: 12px;
    padding: 14px 15px 14px 45px;
    font-size: 15px;
    transition: all 0.3s ease;
    background: #fff;
}

.form-floating-group textarea { padding-top: 18px; resize: none; }

.form-floating-group i {
    position: absolute;
    top: 50%;
    left: 15px;
    transform: translateY(-50%);
    color: var(--primary);
    font-size: 16px;
    transition: all 0.3s ease;
}

.form-floating-group label {
    position: absolute;
    top: 50%;
    left: 45px;
    transform: translateY(-50%);
    color: #999;
    pointer-events: none;
    transition: all 0.3s ease;
    background: #fff;
    padding: 0 5px;
}

/* Animasi label naik */
.form-floating-group input:focus + label,
.form-floating-group textarea:focus + label,
.form-floating-group input:not(:placeholder-shown) + label,
.form-floating-group textarea:not(:placeholder-shown) + label {
    top: -10px;        /* Naik ke atas */
    left: 12px;        /* Geser ke kiri */
    font-size: 13px;   /* Lebih kecil */
    color: var(--primary);
    font-weight: 600;
    transition: all 0.3s ease;
}

/* Animasi ikon ikut scale saat fokus */
.form-floating-group input:focus ~ i,
.form-floating-group textarea:focus ~ i {
    transform: translateY(-50%) scale(1.2);
    color: var(--primary-dark);
}


/* Tombol dengan efek ripple */
.btn-custom {
    background: var(--primary);
    color: #fff;
    border-radius: 30px;
    padding: 12px 25px;
    font-weight: 600;
    font-size: 15px;
    position: relative;
    overflow: hidden;
    transition: 0.4s ease;
}
.btn-custom:hover { background: var(--primary-dark); }
.ripple-btn:after {
    content: '';
    position: absolute;
    width: 100px;
    height: 100px;
    background: rgba(255,255,255,0.3);
    display: block;
    border-radius: 50%;
    opacity: 0;
    pointer-events: none;
    transform: scale(1);
    transition: transform 0.6s, opacity 0.6s;
}
.ripple-btn:active:after {
    transform: scale(4);
    opacity: 1;
    transition: 0s;
}



    /* Notification */
    .notification {
        position: fixed; top: 80px; right: 10px; z-index: 9999;
        max-width: 350px; width: 100%; border-radius: 12px;
        box-shadow: 0 6px 20px rgba(0,0,0,0.15);
        transform: translateX(calc(100% + 30px));
        transition: all 0.5s cubic-bezier(0.68, -0.55, 0.265, 1.35);
        display: none;
    }
    .notification.active { transform: translateX(0); display: block; }
    .notification .content {
        display: flex; align-items: center; padding: 16px 20px; background: #fff; position: relative;
    }
    .notification .content::before {
        content: ''; position: absolute; left: 0; bottom: 0; width: 100%; height: 3px;
        animation: progress 5s linear forwards;
    }
    @keyframes progress { 100% { width: 0%; } }
    .notification.success .content::before { background: #4BB543; }
    .notification.error .content::before { background: #ff3333; }
    .notification .icon {
        height: 40px; width: 40px; margin-right: 15px;
        border-radius: 50%; display: flex; align-items: center; justify-content: center;
        color: #fff; font-size: 20px;
    }
    .notification.success .icon { background: #4BB543; }
    .notification.error .icon { background: #ff3333; }
    .notification .details span { font-size: 16px; font-weight: 600; color: #333; }
    .notification .details p { color: #666; font-size: 14px; margin: 3px 0 0; }
    .close-btn { color: #999; font-size: 20px; cursor: pointer; transition: 0.3s; padding: 0 5px; }
    .close-btn:hover { color: #333; }
</style>

<!-- Subheader -->
<section id="subheader" class="text-light" data-stellar-background-ratio=".2" style="background-image: url('/img/bgprovheader2.jpg');">
    <div class="center-y relative text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1 style="color:blackhamdi;">{{ $berita->judul }}</h1>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</section>
<section aria-label="section">
    <div class="container py-5">
        <div class="row g-4">

            <!-- Blog -->
            <div class="col-md-8">
                <div class="blog-read mb-4">
                    <img src="{{ asset('file_upload/berita/'.$berita->gambar) }}" alt="{{ $berita->judul }}" class="img-fluid w-100">
                    <div class="post-text">
                        {!! $berita->description !!}
                        <br>
                        <span class="post-date"><i class="fa fa-calendar"></i> {{ $berita->created_at->format('d M Y') }}</span>
                        <span class="post-comment"><i class="fa fa-comments"></i> {{ $komentar->count() }}</span>
                    </div>
                </div>

                <!-- Komentar -->
                <div id="blog-comment">
                    <h4 class="mb-3">💬 Komentar ({{ $komentar->count() }})</h4>
                    <ol id="commentList">
                        @foreach($komentar as $index => $k)
                            <li class="comment-item" style="{{ $index >= 5 ? 'display:none;' : '' }}">
                                <div class="avatar"><img src="{{ asset('img/2.png') }}" alt="avatar" /></div>
                                <div>
                                    <div class="comment-info">
                                        <span class="c_name">{{ $k->name }}</span>
                                        <span class="c_date">{{ $k->created_at->format('d M Y') }}</span>
                                    </div>
                                    <div class="comment">{{ $k->comment }}</div>
                                </div>
                            </li>
                        @endforeach
                    </ol>
                    @if($komentar->count() > 5)
                        <button id="loadMoreBtn">🔽 Lihat Semua Komentar</button>
                    @endif
                </div>

                <div id="comment-form-wrapper" class="mt-5">
    <h4 class="mb-3">✍️ Tinggalkan Komentar</h4>
    <div class="comment_form_holder animated-form">
        <form method="post" action="{{ route('komentar.kirim',$berita->id) }}" id="commentForm">
            @csrf

            <div class="form-floating-group">
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder=" " required>
                <label>Nama Lengkap</label>
                <i class="fas fa-user"></i>
            </div>
            @error('name') <div class="text-danger small">{{ $message }}</div> @enderror

            <div class="form-floating-group">
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder=" " required>
                <label>Email</label>
                <i class="fas fa-envelope"></i>
            </div>
            @error('email') <div class="text-danger small">{{ $message }}</div> @enderror

            <div class="form-floating-group textarea-group">
                <textarea name="message" rows="5" class="form-control @error('message') is-invalid @enderror" placeholder=" " required></textarea>
                <label>Komentar</label>
                <i class="fas fa-comment-dots"></i>
            </div>
            @error('message') <div class="text-danger small">{{ $message }}</div> @enderror

            {{-- Tambahkan reCAPTCHA --}}
            <div class="form-group mt-3">
                {!! NoCaptcha::display() !!}
                @error('g-recaptcha-response') <div class="text-danger small">{{ $message }}</div> @enderror
            </div>

            <button type="submit" class="btn btn-custom w-100 ripple-btn mt-3">
                🚀 Kirim Komentar
            </button>
        </form>
    </div>
</div>


            </div>

            <!-- Sidebar -->
            <div id="sidebar" class="col-md-4">
                <div class="widget widget-post">
                    <h4>📰 Berita Terbaru</h4>
                    <div class="small-border mb-2"></div>
                    <ul>
                        @foreach($beritasamping as $s)
                            <li>
                                <span class="date">{{ \Carbon\Carbon::parse($s->tanggal)->format('d M') }}</span>
                                <a href="{{ route('detailpost',$s->id) }}">{{ $s->judul }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="widget widget-text">
                    <h4>ℹ️ Tentang Kami</h4>
                    <div class="small-border mb-2"></div>
                    {!! $profil->tentang_kami !!}
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Notification -->
<div class="notification" id="notification">
    <div class="content">
        <div class="icon"><i class="fas fa-check"></i></div>
        <div class="details">
            <span></span>
            <p></p>
        </div>
        <div class="close-btn" onclick="hideNotification()"><i class="fas fa-times"></i></div>
    </div>
</div>
{!! NoCaptcha::renderJs() !!}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Load more
        const loadBtn = document.getElementById("loadMoreBtn");
        if (loadBtn) {
            loadBtn.addEventListener("click", function() {
                document.querySelectorAll(".comment-item").forEach(el => el.style.display = "flex");
                loadBtn.style.display = "none";
            });
        }

        // Notifikasi dari session
        @if(session('status'))
            showNotification('success', 'Sukses!', '{{ session('status') }}');
        @endif

        @if($errors->any())
            showNotification('error', 'Gagal!', 'Periksa kembali input Anda.');
        @endif
    });

    function showNotification(type, title, message) {
        const notification = document.getElementById("notification");
        notification.className = `notification ${type} active`;

        const icon = notification.querySelector('.icon i');
        icon.className = type === 'success' ? 'fas fa-check' : 'fas fa-exclamation';

        notification.querySelector('.details span').textContent = title;
        notification.querySelector('.details p').textContent = message;

        setTimeout(() => { hideNotification(); }, 5000);
    }

    function hideNotification() {
        document.getElementById("notification").classList.remove('active');
    }
</script>
@endsection
