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

    <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
    <![endif]-->

    @include('frontend_include.style')
    @stack('styles')
</head>

    <style>
        .nav-link:hover{
            color:orange !important;
            text-shadow: 0px 0px 10px #ffffff !important;
        }
        .nav-link:active:hover{
            color:white !important;
            text-shadow: 0px 0px 10px #ffffff !important;
        }
        /* .imagegaleri{
            max-width:100% !important;
            max-height:100% !important;
        } */
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }
        
        #wrapper {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        
        #content {
            flex: 1;
            padding-bottom: 0px; /* Memberi jarak dengan footer */
        }


        /* --------------------------------------------------
	WHATSAPP
	/* -------------------------------------------------- */

.wa-chat-widget {
    position: fixed;
    bottom: 100px; /* Default dengan dekorasi */
    right: 30px;
    z-index: 9999;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    transform: scale(0.8);
    transform-origin: right bottom;
}

.wa-chat-widget.no-decoration {
    bottom: 30px !important;
}
    .wa-chat-container {
        display: flex;
        flex-direction: column;
        align-items: flex-end;
        gap: 10px;
    }

    /* Chat Window */
    .wa-chat-window {
        width: 280px;
        background: white;
        border-radius: 12px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        overflow: hidden;
        transform: translateY(20px) scale(0.95);
        opacity: 0;
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        max-height: 0;
        border: 1px solid #e0e0e0;
    }

    .wa-chat-window.active {
        opacity: 1;
        transform: translateY(0) scale(1);
        max-height: 500px;
    }

    /* Chat Header */
    .wa-chat-header {
        background: linear-gradient(135deg, #25D366, #128C7E);
        color: white;
        padding: 10px 12px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .wa-chat-header img {
        width: 32px;
        height: 32px;
        border-radius: 50%;
        object-fit: cover;
        border: 2px solid rgba(255,255,255,0.3);
    }

    .wa-chat-header-info {
        flex: 1;
    }

    .wa-chat-header-info h3 {
        margin: 0;
        font-size: 14px;
        font-weight: 600;
    }

    .wa-chat-header-info p {
        margin: 3px 0 0;
        font-size: 11px;
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .wa-status-dot {
        display: inline-block;
        width: 8px;
        height: 8px;
        background: #ffffff;
        border-radius: 50%;
        animation: status-pulse 1.5s infinite;
    }

    .wa-chat-header-close {
        background: none;
        border: none;
        color: white;
        font-size: 18px;
        cursor: pointer;
        opacity: 0.8;
        transition: opacity 0.2s;
    }

    .wa-chat-header-close:hover {
        opacity: 1;
    }

    /* Chat Body */
    .wa-chat-body {
        padding: 12px;
        height: 250px;
        overflow-y: auto;
        background: #f5f5f5;
        display: flex;
        flex-direction: column;
        gap: 10px;
        background-image:
            radial-gradient(circle at 10% 20%, rgba(220, 248, 198, 0.1) 0%, transparent 20%),
            radial-gradient(circle at 90% 80%, rgba(220, 248, 198, 0.1) 0%, transparent 20%);
    }

    /* Message Bubbles */
    .wa-message {
        max-width: 75%;
        padding: 8px 12px;
        border-radius: 18px;
        font-size: 13px;
        line-height: 1.4;
        position: relative;
    }

    .wa-message-incoming {
        align-self: flex-start;
        background: white;
        border-top-left-radius: 4px;
        color: #333;
        box-shadow: 0 1px 3px rgba(0,0,0,0.1);
    }

    .wa-message-outgoing {
        align-self: flex-end;
        background: #DCF8C6;
        border-top-right-radius: 4px;
        color: #333;
    }

    .wa-message-time {
        font-size: 9px;
        color: #999;
        text-align: right;
        margin-top: 3px;
        display: flex;
        align-items: center;
        justify-content: flex-end;
        gap: 3px;
    }

    /* Chat Input */
    .wa-chat-input {
        display: flex;
        padding: 8px;
        background: white;
        border-top: 1px solid #eee;
    }

    .wa-chat-input input {
        flex: 1;
        border: 1px solid #ddd;
        border-radius: 20px;
        padding: 8px 12px;
        outline: none;
        font-size: 13px;
    }

    .wa-chat-input button {
        background: #25D366;
        color: white;
        border: none;
        border-radius: 50%;
        width: 36px;
        height: 36px;
        margin-left: 10px;
        cursor: pointer;
        transition: all 0.2s;
    }

    .wa-chat-input button:hover {
        background: #128C7E;
    }

    /* Main Button */
    .wa-chat-btn {
        width: 64px;
        height: 64px;
        border-radius: 50%;
        background: linear-gradient(145deg, #25D366, #128C7E);
        color: white;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 30px;
        box-shadow: 0 6px 24px rgba(37, 211, 102, 0.4);
        cursor: pointer;
        transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
        border: none;
        outline: none;
        position: relative;
        animation: premium-float 3s ease-in-out infinite;
        z-index: 2;
        transform: scale(1) !important;
        margin-bottom: 5px;
    }

    .wa-chat-btn:hover {
        transform: scale(1.1) rotate(5deg);
        box-shadow: 0 10px 28px rgba(37, 211, 102, 0.6);
    }

    /* Notification Badge */
    .wa-chat-badge {
        position: absolute;
        top: -6px;
        right: -6px;
        background: #FF3B30;
        color: white;
        border-radius: 50%;
        width: 26px;
        height: 26px;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 12px;
        font-weight: bold;
        animation: premium-badge-pulse 1.5s infinite;
        border: 2px solid white;
    }

    /* Typing Indicator */
    .wa-typing-indicator {
        display: inline-flex;
        align-items: center;
        background: white;
        padding: 8px 12px;
        border-radius: 18px;
        box-shadow: 0 1px 3px rgba(0,0,0,0.1);
    }

    .wa-typing-dot {
        width: 6px;
        height: 6px;
        background: #999;
        border-radius: 50%;
        margin: 0 2px;
        animation: wa-typing 1.4s infinite ease-in-out;
    }

    /* Animations */
    @keyframes premium-float {
        0%, 100% { transform: translateY(0) rotate(0deg); }
        50% { transform: translateY(-10px) rotate(2deg); }
    }

    @keyframes premium-badge-pulse {
        0%, 100% { transform: scale(1); }
        50% { transform: scale(1.15); }
    }

    @keyframes status-pulse {
        0%, 100% { opacity: 1; }
        50% { opacity: 0.6; }
    }

    @keyframes wa-typing {
        0%, 60%, 100% { transform: translateY(0); }
        30% { transform: translateY(-4px); }
    }

    .wa-typing-dot:nth-child(1) { animation-delay: 0s; }
    .wa-typing-dot:nth-child(2) { animation-delay: 0.2s; }
    .wa-typing-dot:nth-child(3) { animation-delay: 0.4s; }

    /* Responsive */
    @media (max-width: 480px) {
        .wa-chat-window {
            width: 280px;
            right: 20px;
        }
    }
    </style>
<body>
    <div id="wrapper">
        <!-- header begin -->
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
                                <!-- logo begin -->
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

                                <!-- logo close -->
                            </div>
                            <div class="de-flex-col header-col-mid">
                                <!-- mainmenu begin -->
                                @include('public_front.include_link')
                                <!-- mainmenu close -->
                            </div>
                            <div class="de-flex-col">
                                <span id="menu-btn"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- header close -->
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

        <!-- content begin -->
        <div class="no-bottom no-top" id="content">
            <div id="top"></div>
            @yield('content')

        <!-- content close -->
        <!-- Back to Top Button -->
        <a href="#" id="back-to-top" title="Kembali ke atas">
            <svg width="24" height="24" fill="white" viewBox="0 0 24 24">
                <path d="M4 12l1.41 1.41L11 7.83V20h2V7.83l5.59 5.58L20 12l-8-8-8 8z"/>
            </svg>
        </a>

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
        @include('public_front.include_footer')
        
</body>

</html>
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
document.addEventListener('DOMContentLoaded', function() {
    const waChatBtn = document.getElementById('waChatBtn');
    const chatWindow = document.getElementById('waChatWindow');
    const chatClose = document.getElementById('waChatClose');
    const chatBody = document.getElementById('waChatBody');
    const chatInput = document.getElementById('waChatInput');
    const chatSend = document.getElementById('waChatSend');

    const sampleMessages = [
        { text: "Halo! Selamat datang di BRIDA JATIM. Ada yang bisa kami bantu?", incoming: true, time: "Baru saja" },
        { text: "Kami siap membantu Anda dari Senin-Jumat pukul 08.00-16.00 WIB", incoming: true, time: "Baru saja" },
        { text: "Untuk respon lebih cepat, Anda bisa langsung menghubungi kami via WhatsApp", incoming: true, time: "Baru saja" }
    ];

    function addMessage(text, incoming, time) {
        const messageDiv = document.createElement('div');
        messageDiv.className = `wa-message wa-message-${incoming ? 'incoming' : 'outgoing'}`;
        messageDiv.innerHTML = `
            <div>${text}</div>
            <div class="wa-message-time">
                ${time} ${!incoming ? '<i class="fas fa-check-double"></i>' : ''}
            </div>
        `;
        chatBody.appendChild(messageDiv);
        chatBody.scrollTop = chatBody.scrollHeight;
    }

    function addSampleMessages() {
        sampleMessages.forEach(msg => addMessage(msg.text, msg.incoming, msg.time));
    }

    // Saat tombol WA di klik
    waChatBtn.addEventListener('click', function() {
        chatWindow.classList.toggle('active');

        if (chatWindow.classList.contains('active') && chatBody.children.length === 0) {
            // efek typing dulu baru muncul pesan
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
                chatBody.removeChild(typingDiv);
                addSampleMessages();
            }, 1500);
        }
    });

    // Tutup chat
    chatClose.addEventListener('click', () => {
        chatWindow.classList.remove('active');
    });

    // Kirim pesan
    function sendMessage() {
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

    chatSend.addEventListener('click', sendMessage);
    chatInput.addEventListener('keypress', e => {
        if (e.key === 'Enter') sendMessage();
    });
});
</script>
