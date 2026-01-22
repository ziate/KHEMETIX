@php
    $locale = app()->getLocale();
@endphp

<div class="dropdown">
    <button class="btn btn-dark btn-sm rounded-pill border-white border-opacity-10 px-3 d-flex align-items-center gap-2" 
            type="button" data-bs-toggle="dropdown">
        <i class="bi bi-globe2 text-primary"></i>
        <span class="fw-bold" style="font-size: 11px;">{{ strtoupper($locale) }}</span>
    </button>
    <ul class="dropdown-menu dropdown-menu-end bg-dark border-0 shadow-lg mt-2 p-1">
        <li>
            <a class="dropdown-item rounded-2 py-2 {{ $locale === 'ar' ? 'active bg-primary' : '' }}" href="{{ route('lang.switch', 'ar') }}">
                <span class="me-2">🇪🇬</span> العربية
            </a>
        </li>
        <li>
            <a class="dropdown-item rounded-2 py-2 {{ $locale === 'en' ? 'active bg-primary' : '' }}" href="{{ route('lang.switch', 'en') }}">
                <span class="me-2">🇺🇸</span> English
            </a>
        </li>
    </ul>
</div>