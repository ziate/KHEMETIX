<?php
namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\View;
class SetLocaleMiddleware {
    public function handle(Request $request, Closure $next) {
        $locale = config("app.locale");
        if (auth()->check() && auth()->user()->locale) {
            $locale = auth()->user()->locale;
        } elseif (session()->has("locale")) {
            $locale = session("locale");
        }
        App::setLocale($locale);
        View::share("current_locale", $locale);
        View::share("direction", $locale === "ar" ? "rtl" : "ltr");
        return $next($request);
    }
}