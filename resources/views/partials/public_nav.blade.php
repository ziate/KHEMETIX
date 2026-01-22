<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="{{ route("home") }}">Khemetix</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link" href="{{ route("home") }}">@lang("messages.home")</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route("pricing") }}">@lang("messages.pricing")</a></li>
            </ul>
            @include("partials.lang_switcher")
        </div>
    </div>
</nav>