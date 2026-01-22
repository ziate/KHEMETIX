<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', __('messages.dashboard')) | Khemetix AI</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700&family=Plus+Jakarta+Sans:wght@300;400;600;800&family=Orbitron:wght@400;700&display=swap" rel="stylesheet">

    @if(app()->getLocale() === 'ar')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css">
        <style> body { font-family: 'Cairo', sans-serif; } </style>
    @else
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
        <style> body { font-family: 'Plus Jakarta Sans', sans-serif; } </style>
    @endif

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <style>
        :root {
            --ai-primary: #6366f1;
            --ai-neon: #00f2ff;
            --ai-sidebar-bg: #020617;
            --ai-content-bg: #030712;
            --ai-card-bg: rgba(15, 23, 42, 0.6);
            --ai-border: rgba(255, 255, 255, 0.08);
        }

        body {
            background-color: var(--ai-content-bg);
            color: #e2e8f0;
            overflow-x: hidden;
            background-image: radial-gradient(circle at 50% 50%, rgba(99, 102, 241, 0.05) 0%, transparent 50%);
        }

        .admin-wrapper { display: flex; min-height: 100vh; }

        /* Sidebar Styling */
        .admin-sidebar {
            width: 280px;
            background: var(--ai-sidebar-bg);
            border-{{ app()->getLocale() === 'ar' ? 'left' : 'right' }}: 1px solid var(--ai-border);
            transition: all 0.3s ease;
            position: sticky;
            top: 0;
            height: 100vh;
            z-index: 1000;
        }

        /* Content Area */
        .admin-main {
            flex-grow: 1;
            background: var(--ai-content-bg);
            padding: 0;
            min-width: 0; /* Prevents overflow */
        }

        .admin-page { padding: 30px; animation: fadeIn 0.5s ease-in-out; }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Card Enhancements */
        .card {
            background: var(--ai-card-bg);
            backdrop-filter: blur(10px);
            border: 1px solid var(--ai-border);
            border-radius: 20px;
            color: #fff;
            transition: transform 0.3s ease;
        }
        .card:hover { border-color: rgba(99, 102, 241, 0.3); }

        .navbar {
            background: rgba(3, 7, 18, 0.8) !important;
            backdrop-filter: blur(15px);
            border-bottom: 1px solid var(--ai-border) !important;
        }

        @media (max-width: 991.98px) {
            .admin-sidebar { position: fixed; left: -100%; }
            .admin-sidebar.show { left: 0; }
        }
    </style>
    @yield('styles')
</head>
<body>

<div class="admin-wrapper">
    {{-- Sidebar --}}
    <aside class="admin-sidebar d-none d-lg-block" id="sidebarMain">
        @include('partials.admin_sidebar')
    </aside>

    {{-- Main Content --}}
    <main class="admin-main">
        {{-- Topbar --}}
        @include('partials.admin_topbar')

        <div class="admin-page">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="fw-bold m-0" style="letter-spacing: -0.5px;">@yield('header')</h2>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item small text-muted">Khemetix</li>
                        <li class="breadcrumb-item small active text-primary" aria-current="page">AI_Node</li>
                    </ol>
                </nav>
            </div>

            @yield('content')
        </div>
    </main>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
@yield('scripts')
</body>
</html>