<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        if ($request->expectsJson()) {
            return null;
        }

        // لو المسار يبدأ بـ /admin -> وجهه لصفحة دخول الأدمن
        if ($request->is('admin') || $request->is('admin/*')) {
            // هذا الراوت لازم يكون موجود في routes/web.php
            return route('admin.login');
        }

        // باقي الموقع (لو لاحقاً عملت login عام)
        if (\Illuminate\Support\Facades\Route::has('login')) {
            return route('login');
        }

        // fallback آمن
        return url('/');
    }
}
