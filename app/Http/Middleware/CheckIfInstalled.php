<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckIfInstalled
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $installedFile = storage_path('installed');

        if (!file_exists($installedFile) && !$request->is('install*')) {
            return redirect()->route('install.welcome');
        }

        if (file_exists($installedFile) && $request->is('install*')) {
            return redirect('/');
        }

        return $next($request);
    }
}
