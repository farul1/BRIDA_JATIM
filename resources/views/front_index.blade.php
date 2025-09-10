<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="utf-8" />
    <title>@yield('title')</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="BRIDA JATIM" name="description" />
    <meta content="" name="keywords" />
    <meta content="" name="author" />

    <link rel="icon" type="image/png" href="{{ asset('img/Logo.jpg') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style_front_index.css') }}">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('frontend_include.style')
</head>.

<body>
    <header class="transparent scroll-light">
        @if(!empty($settings['aksesoris_kiri_atas']))
            <img src="{{ asset($settings['aksesoris_kiri_atas']) }}" alt="Dekorasi Kiri Atas" class="dekorasi-pojok dekorasi-kiri-atas">
        @endif
        @if(!empty($settings['aksesoris_kanan_atas']))
            <img src="{{ asset($settings['aksesoris_kanan_atas']) }}" alt="Dekorasi Kanan Atas" class="dekorasi-pojok dekorasi-kanan-atas">
        @endif
        @if(!empty($settings['aksesoris_kiri_bawah']))
            <img src="{{ asset($settings['aksesoris_kiri_bawah']) }}" alt="Dekorasi Kiri Bawah" class="dekorasi-pojok dekorasi-kiri-bawah">
        @endif
        @if(!empty($settings['aksesoris_kanan_bawah']))
            <img src="{{ asset($settings['aksesoris_kanan_bawah']) }}" alt="Dekorasi Kanan Bawah" class="dekorasi-pojok dekorasi-kanan-bawah">
        @endif
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="de-flex sm-pt10">
                        <div class="de-flex-col">
                                @php
                                    $logoheader = App\Models\LogoHeaders::all();
                                @endphp

                                <div id="logo">
                                    <a href="{{ url('/') }}">
                                        @if($logoheader->isNotEmpty() && $logoheader[0]->gambar)
                                            <img alt="Logo" class="logo-main" src="{{ asset('file_upload/logo header/' . $logoheader[0]->gambar) }}" />
                                        @else
                                            <img alt="Logo" class="logo-main" src="{{ asset('img/default-logo.png') }}" />
                                        @endif
                                    </a>
                                </div>

                        </div>
                        <div class="de-flex-col header-col-mid">
                            @include('public_front.include_link')
                        </div>
                        <div class="de-flex-col">
                            <span id="menu-btn"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
<audio id="welcomeAudio" muted>
    <source src="{{ asset($settings['welcome_audio_file']) }}" type="audio/mpeg">
</audio>

    <div id="slider-section" style="padding-top: 0;">
        @yield('slider')
    </div>

    <div class="no-bottom no-top" id="content">
        <div id="top"></div>
        @yield('blog')
        @yield('berita')
        @yield('pengumuman')
        @yield('galeri')
        @yield('link polling')
        @yield('content')
    </div>

    <section class="afu-social-section">
        <div class="container">
            <div class="row">
                <!-- Video Section -->
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <div class="video-section">
                    @php
                        $hasUploadVideo = !empty($settings['welcome_video_file']);
                        $hasYoutubeUrl = !empty($settings['welcome_video_url']);
                    @endphp

                    @if($hasUploadVideo && $hasYoutubeUrl)
                        <div class="video-grid">
                            <div class="video-upload-wrapper">
                                <video autoplay loop muted playsinline>
                                    <source src="{{ asset($settings['welcome_video_file']) }}" type="video/mp4">
                                    Browser tidak mendukung video.
                                </video>
                            </div>
                            <div class="youtube-wrapper">
                                <iframe src="{{ $settings['welcome_video_url'] }}"
                                        title="Video Sambutan"
                                        allowfullscreen></iframe>
                            </div>
                        </div>
                    @elseif($hasUploadVideo)
                        <div class="video-upload-wrapper">
                            <video autoplay loop muted playsinline>
                                <source src="{{ asset($settings['welcome_video_file']) }}" type="video/mp4">
                                Browser tidak mendukung video.
                            </video>
                        </div>
                    @elseif($hasYoutubeUrl)
                        <div class="youtube-wrapper">
                            <iframe src="{{ $settings['welcome_video_url'] }}"
                                    title="Video Sambutan"
                                    allowfullscreen></iframe>
                        </div>
                    @else
                        <div class="text-center py-5">
                            <p class="text-muted">Video sambutan belum tersedia.</p>
                        </div>
                    @endif
                </div>
                </div>
                <!-- Social Media Links -->
<div class="col-12 col-xl-4">
    <div class="social-media-box" style="display: flex; flex-direction: column; align-items: center; gap: 8px;">

        <!-- Embed Instagram Profil -->
@if(!empty($settings['instagram_link']))
    <blockquote class="instagram-media" 
        data-instgrm-permalink="{{ $settings['instagram_link'] }}" 
        data-instgrm-version="14" 
        style="width:100%; max-width:350px; margin:0 auto;">
    </blockquote>
    <script async src="https://www.instagram.com/embed.js"></script>
@endif



        <!-- Social Media Links -->
        <div class="social-links" style="display: flex; flex-wrap: wrap; justify-content: center; gap: 5px;">
            @foreach($sosmed as $item)
                <a href="{{ $item->link }}" class="social-account" target="_blank" style="text-align: center; margin: 2px;">
                    <img src="{{ asset('file_upload/icon/' . $item->icon) }}" 
                         alt="{{ $item->nama }}" 
                         class="icon" style="width: 24px; height: 24px; display: block; margin: 0 auto;">
                    <p class="name" style="font-size: 10px; margin: 2px 0 0 0;">{{ $item->nama }}</p>
                </a>
            @endforeach
        </div>

        <!-- Grid Instagram Post Kecil -->
        @if(!empty($data_ig))
            <div class="grid" style="display: flex; flex-wrap: wrap; justify-content: center; gap: 3px; margin-top: 5px;">
                @php $no = 0; @endphp
                @foreach ($data_ig['data'] as $ig)
                    @if(strpos($ig['media_url'], '.mp4') === false && $no < 9)
                        @php $no++; @endphp
                        <a href="{{ $ig['permalink'] }}" target="_blank">
                            <img src="{{ $ig['media_url'] }}" 
                                 alt="Instagram Post" 
                                 class="item" 
                                 style="width: 50px; height: 50px; object-fit: cover;">
                        </a>
                    @endif
                @endforeach
            </div>
        @endif

    </div>
</div>

                </div>
            </div>
        </div>

    </section>



    @include('public_front.include_footer')

<div id="preloader">
    <div class="grid-overlay"></div>
    <div class="tech-container">
        <div class="holographic-circle"></div>
        <div class="holographic-circle"></div>
        <div class="holographic-circle"></div>

        <!-- Core dengan logo -->
        <div class="core">
            <img src="{{ asset('img/Logo.jpg') }}" alt="Logo BRIDA">
        </div>

        <div class="particles" id="particles"></div>
    </div>

    <div class="loading-text glitch" data-text="BRIDA LOADING">BRIDA LOADING...</div>

    <div class="progress-bar">
        <div class="progress"></div>
    </div>

    <div class="binary-code" id="binary-code"></div>
</div>



    <!-- WhatsApp Chat Widget -->
    <div class="wa-chat-widget">
        <div class="wa-chat-container">
            <div class="wa-chat-window" id="waChatWindow">
                <div class="wa-chat-header">
                    <img src="{{ asset('img/Logo.jpg') }}" alt="BRIDA JATIM">
                    <div class="wa-chat-header-info">
                        <h3>BRIDA JATIM</h3>
                        <p><span class="wa-status-dot"></span> Online</p>
                    </div>
                    <button class="wa-chat-header-close" id="waChatClose">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="wa-chat-body" id="waChatBody">
                </div>
                <div class="wa-chat-input">
                    <input type="text" placeholder="Ketik pesan..." id="waChatInput">
                    <button id="waChatSend"><i class="fas fa-paper-plane"></i></button>
                </div>
            </div>
            <button class="wa-chat-btn" id="waChatBtn">
                <i class="fab fa-whatsapp"></i>
                <span class="wa-chat-badge">1</span>
            </button>
        </div>
    </div>
</body>
</html>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
document.addEventListener('click', function enableSound() {
    const audio = document.getElementById('welcomeAudio');
    audio.muted = false;
    audio.play().then(() => {
        console.log("Audio diputar setelah klik user");
    }).catch(err => console.warn("Gagal play audio:", err));
    document.removeEventListener('click', enableSound);
});
</script>
<script>
    // Create particles
    const particlesContainer = document.getElementById('particles');
    for (let i = 0; i < 20; i++) {
        const particle = document.createElement('div');
        particle.classList.add('particle');
        particle.style.left = `${Math.random() * 100}%`;
        particle.style.top = `${Math.random() * 100}%`;
        particle.style.animationDelay = `${Math.random() * 4}s`;
        particle.style.opacity = Math.random() * 0.5 + 0.3;
        particlesContainer.appendChild(particle);
    }

    // Create binary rain
    const binaryContainer = document.getElementById('binary-code');
    const characters = ['0', '1'];

    function createBinary() {
        const digit = document.createElement('div');
        digit.classList.add('binary-digit');
        digit.textContent = characters[Math.floor(Math.random() * characters.length)];
        digit.style.left = `${Math.random() * 100}%`;
        digit.style.animationDuration = `${Math.random() * 3 + 2}s`;
        binaryContainer.appendChild(digit);

        // Remove old digits to prevent memory issues
        if (binaryContainer.children.length > 50) {
            binaryContainer.removeChild(binaryContainer.children[0]);
        }
    }

    setInterval(createBinary, 100);

    // Simulate loading completion
    setTimeout(() => {
        document.getElementById('preloader').style.opacity = '0';
        setTimeout(() => {
            document.getElementById('preloader').style.display = 'none';
        }, 1000);
    }, 5000);
</script>
<script>
function slideRight(id){
  const el = document.getElementById(id);
  el.scrollBy({ left: el.clientWidth * 0.5, behavior: 'smooth' });
}
function slideLeft(id){
  const el = document.getElementById(id);
  el.scrollBy({ left: -el.clientWidth * 0.5, behavior: 'smooth' });
}
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
    // Cek apakah ada elemen dekorasi di kanan bawah
    const decoration = document.querySelector('.dekorasi-kanan-bawah');
    const waWidget = document.querySelector('.wa-chat-widget');

    // Jika tidak ada dekorasi, tambahkan class no-decoration
    if (!decoration) {
        waWidget.classList.add('no-decoration');
    }
});
</script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const starsContainer = document.querySelector('.stars-input');
    if (!starsContainer) return;

    const stars = $('.stars-input input');
    const pollingMessage = $('#pollingMessage');
    const commentBox = $('#pollingKomentar');
    const submitButton = $('#pollingSubmit');
    const pollingEffects = $('.polling-effects');
    const energyWave = $('.energy-wave');
    const confettiParticles = $('.confetti-particle');
    const btnParticles = $('.btn-particles .particle');
    const thankYouMessage = $('.thank-you-message');
    let currentRating = 0;

    function animateButtonParticles() {
        btnParticles.each(function() {
            const size = Math.random() * 3 + 1;
            const posX = Math.random() * 100;
            const posY = Math.random() * 100;
            const delay = Math.random() * 3;
            const duration = Math.random() * 2 + 1;

            $(this).css({
                width: size + 'px',
                height: size + 'px',
                left: posX + '%',
                top: posY + '%',
                backgroundColor: `hsl(${Math.random() * 60 + 200}, 100%, 50%)`,
                animation: `particleFlow ${duration}s infinite ${delay}s`,
                opacity: '0.7'
            });
        });
    }

    if (btnParticles.length) {
        animateButtonParticles();
        setInterval(animateButtonParticles, 3000);
    }

    if (stars.length) {
        stars.on('change', function() {
            currentRating = parseInt($(this).val());
            if (pollingMessage.length) {
                pollingMessage.text(`Terima kasih atas rating ${currentRating} bintang!`);
                pollingMessage.css('color', 'var(--text-dark)');
            }
            $(this).next('label').css('animation', 'starSelect 0.6s ease');
        });

        $('.stars-input label').hover(
            function() {
                const hoverValue = parseInt($(this).attr('data-value'));
                $('.stars-input label').each(function() {
                    const labelValue = parseInt($(this).attr('data-value'));
                    if (labelValue <= hoverValue) {
                        $(this).find('.star-core').css('background', 'yellow');
                        $(this).find('.star-glow').css('opacity', '0.5');
                    } else {
                        $(this).find('.star-core').css('background', '#e0e0e0');
                        $(this).find('.star-glow').css('opacity', '0');
                    }
                });
            },
            function() {
                if (currentRating === 0) {
                    $('.stars-input label').each(function() {
                        $(this).find('.star-core').css('background', '#e0e0e0');
                        $(this).find('.star-glow').css('opacity', '0');
                    });
                } else {
                    $('.stars-input label').each(function() {
                        const labelValue = parseInt($(this).attr('data-value'));
                        if (labelValue <= currentRating) {
                            $(this).find('.star-core').css('background', 'yellow');
                            $(this).find('.star-glow').css('opacity', '0.7');
                        } else {
                            $(this).find('.star-core').css('background', '#e0e0e0');
                            $(this).find('.star-glow').css('opacity', '0');
                        }
                    });
                }
            }
        );

        if (submitButton.length) {
            submitButton.on('click', function() {
                if (currentRating === 0) {
                    if (pollingMessage.length) {
                        pollingMessage.text('Silakan berikan rating terlebih dahulu');
                        pollingMessage.css('color', 'var(--error-color)');
                        pollingMessage.css('animation', 'shake 0.5s ease');
                        setTimeout(() => pollingMessage.css('animation', ''), 500);
                    }
                    return;
                }

                const comment = commentBox.length ? commentBox.val() : '';

                $(this).css('animation', 'activateButton 0.3s ease');

                if (pollingEffects.length) pollingEffects.css('opacity', '1');
                if (energyWave.length) energyWave.css('animation', 'showEnergy 0.8s ease');
                if (thankYouMessage.length) thankYouMessage.css('animation', 'thankYouPop 0.8s ease forwards');

                if (confettiParticles.length) {
                    confettiParticles.each(function() {
                        const delay = Math.random() * 0.3;
                        const color = `hsl(${Math.random() * 60 + 200}, 100%, 50%)`;

                        $(this).css({
                            left: '50%',
                            top: '50%',
                            backgroundColor: color,
                            animation: `showConfetti 1s ease ${delay}s forwards`
                        });
                    });
                }

                $.ajax({
                    url: '/inputnilai',
                    method: 'POST',
                    data: {
                        nilai: currentRating,
                        komentar: comment
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    beforeSend: function() {
                        submitButton.prop('disabled', true);
                        if (submitButton.find('.btn-text').length) {
                            submitButton.find('.btn-text').text('MENGIRIM...');
                        }
                    },
                    success: function() {
                        if (pollingMessage.length) {
                            pollingMessage.text('TERIMA KASIH! PENILAIAN TELAH DIKIRIM');
                            pollingMessage.css('color', 'var(--primary-color)');
                            pollingMessage.css('text-shadow', '0 0 5px var(--neon-glow)');
                        }

                        setTimeout(() => {
                            if (stars.length) stars.prop('checked', false);
                            if (commentBox.length) commentBox.val('');
                            currentRating = 0;
                            $('.star-core').css('background', '#e0e0e0');
                            $('.star-glow').css('opacity', '0');
                            if (pollingMessage.length) {
                                pollingMessage.text('Pilih bintang untuk memberikan rating');
                                pollingMessage.css('color', 'var(--text-light)');
                                pollingMessage.css('text-shadow', 'none');
                            }

                            if (pollingEffects.length) pollingEffects.css('opacity', '0');
                            if (energyWave.length) energyWave.css('animation', '');
                            if (confettiParticles.length) confettiParticles.css('animation', '');
                            if (thankYouMessage.length) thankYouMessage.css('animation', '');
                        }, 3000);
                    },
                    error: function(xhr) {
                        if (pollingMessage.length) {
                            pollingMessage.text('Gagal mengirim: ' + (xhr.responseJSON?.message || 'Error'));
                            pollingMessage.css('color', 'var(--error-color)');
                            pollingMessage.css('text-shadow', 'none');
                        }
                    },
                    complete: function() {
                        submitButton.prop('disabled', false);
                        submitButton.css('animation', '');
                        if (submitButton.find('.btn-text').length) {
                            submitButton.find('.btn-text').text('KIRIM PENILAIAN');
                        }
                    }
                });
            });
        }
    }
});
</script>


<script>
    // ==================== IMAGE SLIDESHOW ====================
document.addEventListener('DOMContentLoaded', function() {
    let slideIndex = 0;
    let timer = 7; // detik
    const _timer = timer;
    let slideshowInterval;

    function showSlides() {
        const slides = document.querySelectorAll(".mySlides");
        const dots = document.querySelectorAll(".dots");

        if (!slides.length) return;

        if (slideIndex > slides.length - 1) slideIndex = 0;
        if (slideIndex < 0) slideIndex = slides.length - 1;

        slides.forEach(slide => slide.style.display = "none");
        slides[slideIndex].style.display = "block";

        dots.forEach(dot => dot.classList.remove("active"));
        if (dots[slideIndex]) dots[slideIndex].classList.add("active");
    }

    function nextSlide() { slideIndex++; showSlides(); resetTimer(); }
    function prevSlide() { slideIndex--; showSlides(); resetTimer(); }
    window.currentSlide = (n) => { slideIndex = n - 1; showSlides(); resetTimer(); }

    function resetTimer() {
        clearInterval(slideshowInterval);
        timer = _timer;
        startSlideshow();
    }

    function startSlideshow() {
        slideshowInterval = setInterval(() => {
            timer--;
            if (timer < 1) nextSlide();
        }, 1000);
    }

    // Event Next/Prev
    document.querySelectorAll('.next').forEach(btn => btn.addEventListener('click', nextSlide));
    document.querySelectorAll('.prev').forEach(btn => btn.addEventListener('click', prevSlide));

    // Initialize
    showSlides();
    startSlideshow();
});

</script>

<script>
    // ==================== BACK TO TOP BUTTON ====================
document.addEventListener('DOMContentLoaded', function() {
    const backToTopBtn = document.getElementById('back-to-top');
    if (!backToTopBtn) return;

    window.addEventListener("scroll", function() {
        if (window.scrollY > 200) {
            backToTopBtn.classList.add("show");
        } else {
            backToTopBtn.classList.remove("show");
        }
    });

    backToTopBtn.addEventListener("click", function(e) {
        e.preventDefault();
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });
});
</script>
<script>
    // ==================== WHATSAPP CHAT WIDGET ====================
// whatsapp-chat.js
document.addEventListener('DOMContentLoaded', function() {
    const waChatBtn = document.getElementById('waChatBtn');
    if (!waChatBtn) return;

    const chatWindow = document.getElementById('waChatWindow');
    const chatClose = document.getElementById('waChatClose');
    const chatBody = document.getElementById('waChatBody');
    const chatInput = document.getElementById('waChatInput');
    const chatSend = document.getElementById('waChatSend');

    const sampleMessages = [
        {
            text: "Halo! Selamat datang di BRIDA JATIM. Ada yang bisa kami bantu?",
            incoming: true,
            time: "Baru saja"
        },
        {
            text: "Kami siap membantu Anda dari Senin-Jumat pukul 08.00-16.00 WIB",
            incoming: true,
            time: "Baru saja"
        },
        {
            text: "Untuk respon lebih cepat, Anda bisa langsung menghubungi kami via WhatsApp",
            incoming: true,
            time: "Baru saja"
        }
    ];

    function addMessage(text, incoming, time) {
        if (!chatBody) return;

        const messageDiv = document.createElement('div');
        messageDiv.className = `wa-message wa-message-${incoming ? 'incoming' : 'outgoing'}`;
        messageDiv.innerHTML = `
            <div>${text}</div>
            <div class="wa-message-time">
                ${time}
                ${!incoming ? '<i class="fas fa-check-double"></i>' : ''}
            </div>
        `;
        chatBody.appendChild(messageDiv);
        chatBody.scrollTop = chatBody.scrollHeight;
    }

    function addSampleMessages() {
        sampleMessages.forEach(msg => {
            addMessage(msg.text, msg.incoming, msg.time);
        });
    }

    waChatBtn.addEventListener('click', function() {
        if (!chatWindow) return;

        chatWindow.classList.toggle('active');
        if (chatWindow.classList.contains('active') && chatBody && chatBody.children.length === 0) {
            const typingDiv = document.createElement('div');
            typingDiv.className = 'wa-message wa-message-incoming';
            typingDiv.innerHTML = `
                <div class="wa-typing-indicator">
                    <div class="wa-typing-dot"></div>
                    <div class="wa-typing-dot"></div>
                    <div class="wa-typing-dot"></div>
                </div>
            `;
            chatBody.appendChild(typingDiv);

            setTimeout(() => {
                if (chatBody) {
                    chatBody.removeChild(typingDiv);
                    addSampleMessages();
                }
            }, 1500);
        }
    });

    if (chatClose) {
        chatClose.addEventListener('click', function() {
            if (chatWindow) chatWindow.classList.remove('active');
        });
    }

    function sendMessage() {
        if (!chatInput || !chatBody) return;

        const message = chatInput.value.trim();
        if (message) {
            addMessage(message, false, "Baru saja");
            chatInput.value = '';

            setTimeout(() => {
                addMessage("Terima kasih atas pesan Anda. Anda akan diarahkan ke WhatsApp kami...", true, "Baru saja");
            }, 800);

            setTimeout(() => {
                const whatsappUrl = `https://wa.me/6282257663431?text=${encodeURIComponent(message)}`;
                window.open(whatsappUrl, '_blank');
            }, 2000);
        }
    }

    if (chatSend) {
        chatSend.addEventListener('click', sendMessage);
    }

    if (chatInput) {
        chatInput.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                sendMessage();
            }
        });
    }

    setTimeout(() => {
        if (chatWindow && !chatWindow.classList.contains('active')) {
            chatWindow.classList.add('active');

            if (chatBody) {
                const typingDiv = document.createElement('div');
                typingDiv.className = 'wa-message wa-message-incoming';
                typingDiv.innerHTML = `
                    <div class="wa-typing-indicator">
                        <div class="wa-typing-dot"></div>
                        <div class="wa-typing-dot"></div>
                        <div class="wa-typing-dot"></div>
                    </div>
                `;
                chatBody.appendChild(typingDiv);

                setTimeout(() => {
                    if (chatBody) {
                        chatBody.removeChild(typingDiv);
                        addSampleMessages();
                    }
                }, 1500);

                setTimeout(() => {
                    if (chatWindow && !chatWindow.matches(':hover')) {
                        chatWindow.classList.remove('active');
                    }
                }, 10000);
            }
        }
    }, 3000);
});
</script>
<script>

// main.js
document.addEventListener('DOMContentLoaded', function() {
    function initializeAll() {
        // Load jQuery dependent code after jQuery is loaded
        function checkJQuery() {
            if (window.jQuery) {
                $(document).ready(function() {
                    // Inisialisasi komponen yang membutuhkan jQuery
                    if (typeof initializeStarRating === 'function') {
                        initializeStarRating();
                    }
                });
            } else {
                setTimeout(checkJQuery, 100);
            }
        }

        // Inisialisasi komponen yang tidak membutuhkan jQuery
        if (typeof initializeSlideshow === 'function') {
            initializeSlideshow();
        }
        if (typeof initializeCarousel === 'function') {
            initializeCarousel();
        }
        if (typeof initializeBackToTop === 'function') {
            initializeBackToTop();
        }
        if (typeof initializeWhatsAppChat === 'function') {
            initializeWhatsAppChat();
        }

        checkJQuery();
    }

    initializeAll();
});
</script>
<script src="{{ asset('js/carousel.js') }}"></script>
