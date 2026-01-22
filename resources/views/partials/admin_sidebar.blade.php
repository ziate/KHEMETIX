@php
    $locale = app()->getLocale();
@endphp

<div class="d-flex flex-column h-100 p-4">
    {{-- Brand --}}
    <div class="brand-section mb-5 text-center">
        <div class="d-inline-flex align-items-center justify-content-center mb-2" 
             style="width: 50px; height: 50px; background: linear-gradient(135deg, #6366f1, #00f2ff); border-radius: 12px; box-shadow: 0 0 20px rgba(99,102,241,0.4);">
            <i class="bi bi-lightning-charge-fill text-white fs-3"></i>
        </div>
        <h4 class="fw-bold text-white mb-0" style="font-family: 'Orbitron', sans-serif; letter-spacing: 2px;">KHEMETIX</h4>
        <span class="small text-primary fw-bold" style="letter-spacing: 3px; font-size: 10px;">OS CORE v2.0</span>
    </div>

    {{-- Menu --}}
    <div class="nav-menu flex-grow-1">
        <label class="text-muted small text-uppercase fw-bold mb-3 d-block" style="font-size: 10px; letter-spacing: 1px;">Core Engine</label>
        
        <nav class="nav flex-column gap-2">
            <a href="{{ route('admin.dashboard') }}" class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="bi bi-grid-1x2-fill"></i>
                <span>{{ __('messages.dashboard') }}</span>
            </a>

            <a href="{{ route('admin.users.index') }}" class="sidebar-link {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
                <i class="bi bi-people-fill"></i>
                <span>{{ __('messages.users') }}</span>
            </a>

            <a href="{{ route('admin.plans.index') }}" class="sidebar-link {{ request()->routeIs('admin.plans.*') ? 'active' : '' }}">
                <i class="bi bi-credit-card-2-front-fill"></i>
                <span>{{ __('messages.plans') }}</span>
            </a>

            <a href="{{ route('admin.models.index') }}" class="sidebar-link {{ request()->routeIs('admin.models.*') ? 'active' : '' }}">
                <i class="bi bi-cpu-fill"></i>
                <span>{{ __('messages.models') }}</span>
            </a>

            <a href="{{ route('admin.ai-chat.index') }}" class="sidebar-link {{ request()->routeIs('admin.ai-chat.*') ? 'active' : '' }}">
                <i class="bi bi-chat-dots-fill"></i>
                <span>{{ __('messages.ai_chat') }}</span>
            </a>

            <a href="{{ route('admin.settings.index') }}" class="sidebar-link {{ request()->routeIs('admin.settings.*') ? 'active' : '' }}">
                <i class="bi bi-gear-wide-connected"></i>
                <span>{{ __('messages.settings') }}</span>
            </a>
        </nav>
    </div>

    {{-- Sidebar Footer --}}
    <div class="sidebar-footer mt-auto pt-4 border-top border-white border-opacity-10 text-center">
        <div class="text-muted small mb-3">AI_NODE_STATUS: <span class="text-success fw-bold">ACTIVE</span></div>
        <div class="d-flex justify-content-center">
            @include('partials.lang_switcher')
        </div>
    </div>
</div>

<style>
    .sidebar-link {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 12px 16px;
        color: #94a3b8;
        text-decoration: none;
        border-radius: 12px;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        font-weight: 500;
    }
    .sidebar-link i { font-size: 1.1rem; }
    .sidebar-link:hover {
        background: rgba(255, 255, 255, 0.05);
        color: #fff;
        transform: translateX({{ $locale === 'ar' ? '-5px' : '5px' }});
    }
    .sidebar-link.active {
        background: linear-gradient(90deg, rgba(99, 102, 241, 0.15), transparent);
        color: var(--ai-neon);
        border-{{ $locale === 'ar' ? 'right' : 'left' }}: 3px solid var(--ai-neon);
    }
</style>
