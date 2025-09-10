<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>BRIDA LOGIN</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #ff9800;
            --primary-light: #ffb300;
            --primary-dark: #f57c00;
            --accent: #2196f3;
            --text: #333;
            --text-light: #666;
            --background: #fff8e1;
            --card-bg: #fff;
            --error: #f44336;
            --success: #4caf50;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background-image: url('{{ secure_asset('img/BRIDA.gif')}}');
            background-size: cover;
            background-position: center;
            background-blend-mode: overlay;
            font-family: 'Nunito', sans-serif;
            color: var(--text);
            padding: 20px;
            position: relative;
        }

        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
        }

        /* Header Styles */
        .header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background: rgba(255, 255, 255, 0.95);
            box-shadow: 0 2px 15px rgba(255, 152, 0, 0.15);
            z-index: 1000;
            padding: 12px 0;
        }

        .header-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            height: 50px;
            display: flex;
            align-items: center;
        }

        .logo img {
            height: 100%;
            width: auto;
        }

        .nav-menu {
            display: flex;
            list-style: none;
            gap: 30px;
        }

        .nav-menu a {
            color: var(--text);
            text-decoration: none;
            font-weight: 700;
            font-size: 1.1rem;
            padding: 8px 16px;
            border-radius: 6px;
            transition: all 0.3s ease;
            position: relative;
        }

        .nav-menu a:hover {
            color: var(--primary);
        }

        .nav-menu a::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            width: 0;
            height: 2px;
            background: var(--primary);
            transition: all 0.3s ease;
            transform: translateX(-50%);
        }

        .nav-menu a:hover::after {
            width: 70%;
        }

        /* Login Card Styles */
        .login-container {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            margin-top: 80px;
        }

        .login-card {
            background: var(--card-bg);
            border-radius: 20px;
            box-shadow: 0 10px 40px rgba(255, 152, 0, 0.2);
            width: 100%;
            max-width: 420px;
            padding: 40px 35px;
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(255, 179, 0, 0.3);
            transform: translateY(0);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .login-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 45px rgba(255, 152, 0, 0.25);
        }

        .login-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: linear-gradient(90deg, var(--primary) 0%, var(--primary-light) 100%);
        }

        .login-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .login-title {
            font-size: 28px;
            font-weight: 800;
            color: var(--primary);
            margin-bottom: 8px;
            letter-spacing: 0.5px;
            position: relative;
            display: inline-block;
        }

        .login-title::after {
            content: '';
            position: absolute;
            bottom: -8px;
            left: 50%;
            transform: translateX(-50%);
            width: 50px;
            height: 3px;
            background: linear-gradient(90deg, var(--primary) 0%, var(--primary-light) 100%);
            border-radius: 3px;
        }

        .login-subtitle {
            color: var(--text-light);
            font-size: 15px;
            margin-top: 12px;
        }

        .form-group {
            margin-bottom: 20px;
            position: relative;
        }

        .form-label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: var(--text);
            font-size: 14px;
            display: flex;
            align-items: center;
        }

        .form-label i {
            margin-right: 8px;
            color: var(--primary);
        }

        .input-with-icon {
            position: relative;
        }

        .form-input {
            width: 100%;
            padding: 14px 45px 14px 16px;
            border: 2px solid #ffe0b2;
            border-radius: 10px;
            font-size: 16px;
            background: #fffdf7;
            color: var(--text);
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .form-input:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(255, 179, 0, 0.2);
            outline: none;
            background: #fffbe7;
        }

        .input-icon {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--primary);
            cursor: pointer;
            font-size: 18px;
            opacity: 0.7;
            transition: opacity 0.3s ease;
        }

        .input-icon:hover {
            opacity: 1;
        }

        .captcha-container {
            margin: 20px 0;
            padding: 15px;
            background: #fff8e1;
            border-radius: 10px;
            border: 1px dashed var(--primary-light);
            text-align: center;
        }

        .captcha-required {
            border: 1px dashed var(--error);
            background: #ffebee;
        }

        .captcha-label {
            display: block;
            margin-bottom: 10px;
            font-weight: 600;
            color: var(--text);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .captcha-label i {
            margin-right: 8px;
            color: var(--primary);
        }

        .g-recaptcha {
            display: inline-block;
            margin: 0 auto;
        }

        .captcha-error {
            color: var(--error);
            font-size: 13px;
            margin-top: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .captcha-error i {
            margin-right: 5px;
        }

        .login-button {
            width: 100%;
            padding: 15px;
            background: linear-gradient(90deg, var(--primary) 0%, var(--primary-light) 100%);
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(255, 152, 0, 0.3);
            letter-spacing: 0.5px;
            margin-top: 10px;
            position: relative;
            overflow: hidden;
        }

        .login-button:disabled {
            background: #cccccc;
            cursor: not-allowed;
            box-shadow: none;
            transform: none;
        }

        .login-button::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: all 0.6s ease;
        }

        .login-button:hover:not(:disabled) {
            transform: translateY(-2px);
            box-shadow: 0 7px 20px rgba(255, 152, 0, 0.4);
        }

        .login-button:hover:not(:disabled)::before {
            left: 100%;
        }

        .login-button:active:not(:disabled) {
            transform: translateY(0);
        }

        .login-footer {
            text-align: center;
            margin-top: 25px;
            padding-top: 20px;
            border-top: 1px solid #ffe0b2;
        }

        .forgot-link {
            color: var(--primary);
            text-decoration: none;
            font-weight: 600;
            font-size: 15px;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
        }

        .forgot-link i {
            margin-right: 6px;
        }

        .forgot-link:hover {
            color: var(--primary-dark);
            text-decoration: underline;
        }

        .alert {
            padding: 12px 16px;
            border-radius: 10px;
            margin-bottom: 20px;
            font-size: 14px;
            display: flex;
            align-items: center;
        }

        .alert-error {
            background-color: #ffebee;
            color: var(--error);
            border-left: 4px solid var(--error);
        }

        .alert-success {
            background-color: #e8f5e9;
            color: var(--success);
            border-left: 4px solid var(--success);
        }

        .alert i {
            margin-right: 10px;
            font-size: 18px;
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            .header-container {
                flex-direction: column;
                gap: 15px;
            }

            .nav-menu {
                gap: 15px;
            }

            .nav-menu a {
                font-size: 1rem;
                padding: 6px 12px;
            }

            .login-card {
                padding: 30px 25px;
            }
        }

        @media (max-width: 480px) {
            .nav-menu {
                flex-direction: column;
                gap: 10px;
                align-items: center;
            }

            .login-title {
                font-size: 24px;
            }

            .form-input {
                padding: 12px 40px 12px 12px;
            }

            .captcha-container {
                padding: 10px;
            }

            /* Force reCAPTcha to be responsive */
            .g-recaptcha {
                transform: scale(0.85);
                transform-origin: center;
            }
        }

        /* Animation */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .login-card {
            animation: fadeIn 0.5s ease-out;
        }

        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            10%, 30%, 50%, 70%, 90% { transform: translateX(-5px); }
            20%, 40%, 60%, 80% { transform: translateX(5px); }
        }

        .shake {
            animation: shake 0.5s;
        }

        /* Loading spinner for button */
        .btn-loading {
            position: relative;
            color: transparent !important;
        }

        .btn-loading::after {
            content: '';
            position: absolute;
            width: 20px;
            height: 20px;
            top: 50%;
            left: 50%;
            margin: -10px 0 0 -10px;
            border: 3px solid rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            border-top-color: white;
            animation: spin 0.8s ease infinite;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="header-container">
            <div class="logo">
                @php
                    $logoheader = App\Models\LogoHeaders::all();
                @endphp
                <a href="{{ url('/') }}">
                    @if($logoheader->isNotEmpty() && $logoheader[0]->gambar)
                        <img alt="Logo BRIDA" src="{{ asset('file_upload/logo header/' . $logoheader[0]->gambar) }}" />
                    @else
                        <img alt="Logo BRIDA" src="{{ asset('img/default-logo.png') }}" />
                    @endif
                </a>
            </div>
            <nav>
                <ul class="nav-menu">
                    <li><a href="{{ url('/') }}">HOME</a></li>
                    <li><a href="{{ url('/login') }}">LOGIN</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Login Container -->
    <div class="login-container">
        <div class="login-card">
            <div class="login-header">
                <h1 class="login-title">LOGIN BRIDA</h1>
                <p class="login-subtitle">Masukkan kredensial Anda untuk mengakses sistem</p>
            </div>

            @if($errors->any())
                <div class="alert alert-error">
                    <i class="fas fa-exclamation-circle"></i>
                    {{ $errors->first('loginError') }}
                </div>
            @endif

            @if(session('success'))
                <div class="alert alert-success">
                    <i class="fas fa-check-circle"></i>
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('login') }}" method="POST" id="loginForm">
                @csrf
                <div class="form-group">
                    <label class="form-label" for="username">
                        <i class="fas fa-user"></i>Username
                    </label>
                    <div class="input-with-icon">
                        <input type="text" id="username" name="username" class="form-input" placeholder="Masukkan username" required value="{{ old('username') }}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label" for="password">
                        <i class="fas fa-lock"></i>Password
                    </label>
                    <div class="input-with-icon">
                        <input type="password" id="password" name="password" class="form-input" placeholder="Masukkan password" required>
                        <span class="input-icon" onclick="togglePassword()">
                            <i class="fas fa-eye" id="eye-icon"></i>
                        </span>
                    </div>
                </div>

                @if($showCaptcha ?? false)
                <div class="captcha-container" id="captchaContainer">
                    <label class="captcha-label">
                        <i class="fas fa-shield-alt"></i>Verifikasi Anda bukan robot
                    </label>
                    <div class="g-recaptcha" data-sitekey="{{ env('NOCAPTCHA_SITEKEY') }}" data-callback="onCaptchaSuccess" data-expired-callback="onCaptchaExpired"></div>
                    <div class="captcha-error" id="captchaError" style="display: none;">
                        <i class="fas fa-exclamation-circle"></i>
                        <span>Harap selesaikan verifikasi reCAPTCHA</span>
                    </div>
                    @error('g-recaptcha-response')
                        <div class="captcha-error">
                            <i class="fas fa-exclamation-circle"></i>
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                </div>
                @endif

                <button type="submit" class="login-button" id="loginBtn" disabled>
                    <span>Masuk</span>
                </button>
            </form>

            <div class="login-footer">
                <a href="#" class="forgot-link">
                    <i class="fas fa-key"></i>Lupa Password?
                </a>
            </div>
        </div>
    </div>

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // State untuk melacak status reCAPTCHA
        let captchaVerified = false;

        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eye-icon');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.classList.remove('fa-eye');
                eyeIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                eyeIcon.classList.remove('fa-eye-slash');
                eyeIcon.classList.add('fa-eye');
            }
        }

        // Callback ketika reCAPTCHA berhasil diselesaikan
        function onCaptchaSuccess() {
            captchaVerified = true;
            document.getElementById('loginBtn').disabled = false;
            document.getElementById('captchaError').style.display = 'none';
            document.getElementById('captchaContainer').classList.remove('captcha-required');
        }

        // Callback ketika reCAPTCHA kedaluwarsa
        function onCaptchaExpired() {
            captchaVerified = false;
            document.getElementById('loginBtn').disabled = true;
            grecaptcha.reset();
        }

        // Validasi form sebelum dikirim
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            const loginBtn = document.getElementById('loginBtn');
            const captchaContainer = document.getElementById('captchaContainer');

            // Jika reCAPTCHA diperlukan tetapi belum diselesaikan
            if (captchaContainer && !captchaVerified) {
                e.preventDefault();
                document.getElementById('captchaError').style.display = 'flex';
                captchaContainer.classList.add('captcha-required');
                captchaContainer.classList.add('shake');

                setTimeout(() => {
                    captchaContainer.classList.remove('shake');
                }, 500);

                // Scroll ke reCAPTCHA
                captchaContainer.scrollIntoView({ behavior: 'smooth', block: 'center' });
            } else {
                // Tampilkan loading state
                loginBtn.classList.add('btn-loading');
            }
        });

        // Show error message with SweetAlert if exists
        @if($errors->has('loginError'))
            Swal.fire({
                icon: 'error',
                title: 'Login Gagal',
                text: '{{ $errors->first('loginError') }}',
                confirmButtonColor: '#ff9800',
            });
        @endif
    </script>
</body>
</html>
