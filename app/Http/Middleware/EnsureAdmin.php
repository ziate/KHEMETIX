<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EnsureAdmin
{
    /**
     * Handle an incoming request.
     *
     * Ensures the authenticated user is an admin.
     * - If not authenticated: redirect to admin login
     * - If authenticated but not admin: logout + return 403 (or redirect)
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Not logged in
        if (!Auth::check()) {
            return redirect()->route('admin.login');
        }

        $user = Auth::user();

        // Determine admin role
        $isAdmin = false;

        // Supports: role column OR is_admin boolean
        if (isset($user->role) && $user->role === 'admin') {
            $isAdmin = true;
        } elseif (isset($user->is_admin) && (bool) $user->is_admin === true) {
            $isAdmin = true;
        }

        if (!$isAdmin) {
            // For safety: log out non-admin trying to access admin area
            Auth::logout();

            $request->session()->invalidate();
            $request->session()->regenerateToken();

            // If request expects JSON, return 403 JSON
            if ($request->expectsJson()) {
                return response()->json([
                    'message' => __('messages.admin_only') ?: 'Admins only.',
                ], 403);
            }

            // Otherwise redirect to admin login with message
            return redirect()
                ->route('admin.login')
                ->withErrors(['email' => __('messages.admin_only') ?: 'Admins only.']);
        }

        return $next($request);
    }
}
