<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="UTF-8">
    <title>{{ __('messages.admin_panel') }} | {{ __('messages.login') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;700&family=Orbitron:wght@400;700;900&family=Plus+Jakarta+Sans:wght@400;600&display=swap" rel="stylesheet">
    
    @if(app()->getLocale() === 'ar')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css">
    @else
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    @endif

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <style>
        :root {
            --ai-neon: #00f2ff;
            --ai-purple: #7000ff;
            --ai-bg: #030712;
            --glass: rgba(15, 23, 42, 0.8);
        }

        body {
            font-family: {{ app()->getLocale() === 'ar' ? '"Cairo"' : '"Plus Jakarta Sans"' }}, sans-serif;
            background-color: var(--ai-bg);
            color: #fff;
            margin: 0;
            height: 100vh;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Animated Background Particles Mesh */
        #particles-js {
            position: absolute;
            width: 100%;
            height: 100%;
            z-index: 1;
        }

        /* Cosmic Glows */
        .glow {
            position: absolute;
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, rgba(0, 242, 255, 0.15) 0%, transparent 70%);
            border-radius: 50%;
            z-index: 2;
            filter: blur(50px);
        }

        .login-container {
            position: relative;
            z-index: 10;
            width: 100%;
            max-width: 460px;
            padding: 20px;
        }

        .login-card {
            background: var(--glass);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(0, 242, 255, 0.2);
            border-radius: 30px;
            padding: 50px 40px;
            box-shadow: 0 0 40px rgba(0, 0, 0, 0.5), inset 0 0 20px rgba(0, 242, 255, 0.05);
            position: relative;
            overflow: hidden;
        }

        /* Scanning Line Effect */
        .login-card::before {
            content: "";
            position: absolute;
            top: -100%;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(transparent, rgba(0, 242, 255, 0.1), transparent);
            animation: scan 4s linear infinite;
        }

        @keyframes scan {
            0% { top: -100%; }
            100% { top: 100%; }
        }

        .brand-name {
            font-family: 'Orbitron', sans-serif;
            font-size: 40px;
            font-weight: 900;
            text-align: center;
            letter-spacing: 4px;
            background: linear-gradient(to bottom, #fff 30%, var(--ai-neon));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 5px;
            filter: drop-shadow(0 0 10px rgba(0, 242, 255, 0.3));
        }

        .admin-label {
            text-align: center;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 5px;
            color: var(--ai-neon);
            opacity: 0.8;
            margin-bottom: 40px;
            font-weight: bold;
        }

        .form-label {
            font-size: 13px;
            color: #94a3b8;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .input-group-custom {
            position: relative;
            margin-bottom: 25px;
        }

        .form-control {
            background: rgba(0, 0, 0, 0.3);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            padding: 14px 18px;
            color: #fff;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        .form-control:focus {
            background: rgba(0, 242, 255, 0.05);
            border-color: var(--ai-neon);
            box-shadow: 0 0 15px rgba(0, 242, 255, 0.2);
            color: #fff;
            transform: scale(1.02);
        }

        .btn-submit {
            background: transparent;
            border: 1px solid var(--ai-neon);
            color: var(--ai-neon);
            border-radius: 12px;
            padding: 15px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 2px;
            position: relative;
            overflow: hidden;
            transition: 0.4s;
            margin-top: 15px;
        }

        .btn-submit:hover {
            background: var(--ai-neon);
            color: var(--ai-bg);
            box-shadow: 0 0 30px var(--ai-neon);
        }

        .lang-switcher {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 30px;
            font-family: 'Orbitron', sans-serif;
            font-size: 11px;
        }

        .lang-link {
            color: rgba(255,255,255,0.4);
            text-decoration: none;
            transition: 0.3s;
        }

        .lang-link:hover, .lang-link.active {
            color: var(--ai-neon);
            text-shadow: 0 0 8px var(--ai-neon);
        }

        .alert {
            background: rgba(239, 68, 68, 0.1);
            border-left: 3px solid #ef4444;
            color: #fca5a5;
            font-size: 13px;
            border-radius: 8px;
        }
    </style>
</head>
<body>

<div id="particles-js"></div>
<div class="glow" style="top: -10%; left: -10%;"></div>
<div class="glow" style="bottom: -10%; right: -10%;"></div>

@php
    $loginAction = '/admin/login';
    if (\Illuminate\Support\Facades\Route::has('admin.login.submit')) {
        $loginAction = route('admin.login.submit');
    } elseif (\Illuminate\Support\Facades\Route::has('admin.login.post')) {
        $loginAction = route('admin.login.post');
    }
@endphp

<div class="login-container">
    <div class="login-card">
        <div class="brand-section">
            <div class="brand-name">KHEMETIX</div>
            <div class="admin-label">AI CORE INTERFACE</div>
        </div>

        @if (session('status'))
            <div class="alert alert-success border-0 bg-success bg-opacity-10 text-success mb-4">
                {{ session('status') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger mb-4">
                <ul class="mb-0 list-unstyled">
                    @foreach ($errors->all() as $error)
                        <li><i class="bi bi-cpu me-2"></i>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ $loginAction }}">
            @csrf

            <div class="input-group-custom">
                <label class="form-label">
                    <i class="bi bi-fingerprint"></i> {{ __('messages.email') ?? 'ACCESS_ID' }}
                </label>
                <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="user@khemetix.ai" required autofocus>
            </div>

            <div class="input-group-custom">
                <label class="form-label">
                    <i class="bi bi-key"></i> {{ __('messages.password') ?? 'ENCRYPTION_KEY' }}
                </label>
                <input type="password" name="password" class="form-control" placeholder="••••••••" required>
            </div>

            <div class="d-flex justify-content-between align-items-center mb-4">
                <div class="form-check">
                    <input type="checkbox" name="remember" class="form-check-input" id="remember">
                    <label class="form-check-label text-muted small" for="remember">
                        {{ __('messages.remember_me') ?? 'STAY_CONNECTED' }}
                    </label>
                </div>
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-submit">
                    <span>{{ __('messages.login') }}</span>
                </button>
            </div>
        </form>

        <div class="lang-switcher">
            <a href="{{ route('lang.switch','ar') }}" class="lang-link {{ app()->getLocale() === 'ar' ? 'active' : '' }}">AR_NODE</a>
            <span style="color: rgba(255,255,255,0.1)">//</span>
            <a href="{{ route('lang.switch','en') }}" class="lang-link {{ app()->getLocale() === 'en' ? 'active' : '' }}">EN_NODE</a>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
<script>
    particlesJS('particles-js', {
        "particles": {
            "number": { "value": 80 },
            "color": { "value": "#00f2ff" },
            "shape": { "type": "circle" },
            "opacity": { "value": 0.2 },
            "size": { "value": 2 },
            "line_linked": {
                "enable": true,
                "distance": 150,
                "color": "#00f2ff",
                "opacity": 0.1,
                "width": 1
            },
            "move": { "enable": true, "speed": 1 }
        },
        "interactivity": {
            "events": { "onhover": { "enable": true, "mode": "grab" } }
        }
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>