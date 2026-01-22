<!DOCTYPE html>
<html lang="{{ $current_locale }}" dir="{{ $direction }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Khemetix - AI WordPress Builder</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    @if($direction == "rtl")
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700&display=swap" rel="stylesheet">
        <style>
            body { font-family: 'Cairo', sans-serif; background-color: #f4f7f6; }
            .navbar-brand { font-weight: 700; font-size: 1.5rem; color: #0d6efd !important; }
        </style>
    @else
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
        <style>
            body { font-family: 'Inter', sans-serif; background-color: #f4f7f6; }
            .navbar-brand { font-weight: 700; font-size: 1.5rem; color: #0d6efd !important; }
        </style>
    @endif
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-white bg-white shadow-sm py-3 mb-4">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">KHEMETIX</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link px-3" href="{{ route('home') }}">@lang('messages.home')</a></li>
                    <li class="nav-item"><a class="nav-link px-3" href="{{ route('pricing') }}">@lang('messages.pricing')</a></li>
                    <li class="nav-item"><a class="nav-link px-3" href="{{ route('about') }}">@lang('messages.about')</a></li>
                </ul>
                <div class="d-flex align-items-center">
                    @include('partials.lang_switcher')
                    <a href="{{ route('login') }}" class="btn btn-link text-decoration-none text-dark ms-3">@lang('messages.login')</a>
                    <a href="{{ route('register') }}" class="btn btn-primary px-4 rounded-pill">@lang('messages.register')</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container">
        @yield('content')
    </div>

    <footer class="bg-white py-5 mt-5 border-top">
        <div class="container text-center">
            <p class="text-muted mb-0">&copy; 2026 Khemetix. جميع الحقوق محفوظة.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
