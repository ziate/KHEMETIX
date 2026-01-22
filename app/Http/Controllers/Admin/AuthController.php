<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    /**
     * Show admin login page.
     */
    public function showLogin(Request $request)
    {
        // If already logged in as admin, go to dashboard
        if (Auth::check() && $this->isAdmin(Auth::user())) {
            return redirect()->route('admin.dashboard');
        }

        return view('admin.auth.login');
    }

    /**
     * Handle admin login.
     */
    public function login(Request $request)
    {
        $request->validate([
            'email'    => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:6', 'max:255'],
            'remember' => ['nullable'],
        ]);

        $throttleKey = $this->throttleKey($request);

        // Basic brute-force protection
        if (RateLimiter::tooManyAttempts($throttleKey, 5)) {
            $seconds = RateLimiter::availableIn($throttleKey);

            throw ValidationException::withMessages([
                'email' => [__('messages.too_many_attempts', ['seconds' => $seconds])],
            ]);
        }

        $credentials = $request->only('email', 'password');
        $remember = (bool) $request->boolean('remember');

        if (!Auth::attempt($credentials, $remember)) {
            RateLimiter::hit($throttleKey, 60);

            throw ValidationException::withMessages([
                'email' => [__('messages.invalid_credentials')],
            ]);
        }

        // Clear throttle
        RateLimiter::clear($throttleKey);

        // Security: regenerate session
        $request->session()->regenerate();

        // Ensure user is admin
        $user = Auth::user();
        if (!$this->isAdmin($user)) {
            // Not allowed: logout + invalidate session
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            throw ValidationException::withMessages([
                'email' => [__('messages.admin_only')],
            ]);
        }

        // Redirect to intended admin page
        return redirect()->intended(route('admin.dashboard'));
    }

    /**
     * Admin logout.
     */
    public function logout(Request $request)
    {
        Auth::logout();

        // Invalidate session to prevent fixation
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }

    /**
     * Determine if user is admin.
     */
    protected function isAdmin($user): bool
    {
        // Supports: role column (admin/user) OR is_admin boolean (optional)
        if (!$user) {
            return false;
        }

        if (isset($user->role) && $user->role === 'admin') {
            return true;
        }

        if (isset($user->is_admin) && (bool) $user->is_admin === true) {
            return true;
        }

        return false;
    }

    /**
     * Build a unique throttle key.
     */
    protected function throttleKey(Request $request): string
    {
        $email = (string) $request->input('email', '');
        return Str::lower($email) . '|' . $request->ip();
    }
}
