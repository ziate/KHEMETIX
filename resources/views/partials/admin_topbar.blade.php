<nav class="navbar navbar-expand-lg py-3">
    <div class="container-fluid">
        
        <button class="btn btn-dark d-lg-none me-3" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMain">
            <i class="bi bi-grid-fill text-primary"></i>
        </button>

        <div class="d-flex align-items-center gap-2 d-none d-md-flex">
            <span class="badge bg-primary bg-opacity-10 text-primary border border-primary border-opacity-25 px-3 py-2">
                <i class="bi bi-cpu-fill me-1"></i> System Online
            </span>
        </div>

        <div class="ms-auto d-flex align-items-center gap-3">
            {{-- Lang Switcher --}}
            @include('partials.lang_switcher')

            <div class="vr mx-2 opacity-25 d-none d-sm-block"></div>

            {{-- User Dropdown --}}
            <div class="dropdown">
                <button class="btn btn-link p-0 d-flex align-items-center text-decoration-none dropdown-toggle" type="button" data-bs-toggle="dropdown">
                    <div class="text-end me-2 d-none d-sm-block">
                        <div class="text-white fw-bold mb-0" style="font-size: 0.85rem; line-height: 1;">{{ auth()->user()->name ?? 'Admin' }}</div>
                        <div class="text-muted small" style="font-size: 0.75rem;">Verified Operator</div>
                    </div>
                    <div class="rounded-circle border border-2 border-primary p-1">
                         <img src="https://ui-avatars.com/api/?name={{ auth()->user()->name ?? 'Admin' }}&background=6366f1&color=fff" class="rounded-circle" width="32" height="32">
                    </div>
                </button>
                <ul class="dropdown-menu dropdown-menu-end shadow-lg border-0 bg-dark p-2" style="min-width: 200px;">
                    <li>
                        <a class="dropdown-item rounded-3 py-2" href="{{ route('admin.dashboard') }}">
                            <i class="bi bi-speedometer2 me-2"></i> {{ __('messages.dashboard') }}
                        </a>
                    </li>
                    <li><hr class="dropdown-divider opacity-10"></li>
                    <li>
                        <form method="POST" action="{{ route('admin.logout') }}">
                            @csrf
                            <button type="submit" class="dropdown-item text-danger rounded-3 py-2">
                                <i class="bi bi-power me-2"></i> {{ __('messages.logout') }}
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>