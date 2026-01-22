<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LocaleController;

use App\Http\Controllers\Customer\DashboardController as CustomerDashboard;
use App\Http\Controllers\Customer\ChatController as CustomerChat;

use App\Http\Controllers\Admin\AuthController as AdminAuth;
use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\Admin\UserController as AdminUser;
use App\Http\Controllers\Admin\PlanController as AdminPlan;
use App\Http\Controllers\Admin\ModelController as AdminModel;
use App\Http\Controllers\Admin\SettingsController as AdminSettings;
use App\Http\Controllers\Admin\AiChatController as AdminAiChat;

use App\Http\Controllers\Install\InstallController;

/*
|--------------------------------------------------------------------------
| Installation Routes
|--------------------------------------------------------------------------
*/
Route::prefix('install')->name('install.')->group(function () {
    Route::get('/', [InstallController::class, 'welcome'])->name('welcome');
    Route::get('/requirements', [InstallController::class, 'requirements'])->name('requirements');
    Route::get('/database', [InstallController::class, 'database'])->name('database');
    Route::post('/database', [InstallController::class, 'postDatabase'])->name('database.post');
    Route::get('/admin', [InstallController::class, 'admin'])->name('admin');
    Route::post('/admin', [InstallController::class, 'postAdmin'])->name('admin.post');
    Route::get('/finish', [InstallController::class, 'finish'])->name('finish');
});

/*
|--------------------------------------------------------------------------
| Public Routes (Website)
|--------------------------------------------------------------------------
*/
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/pricing', [HomeController::class, 'pricing'])->name('pricing');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');

/*
|--------------------------------------------------------------------------
| Language Switch
|--------------------------------------------------------------------------
*/
Route::get('/lang/{locale}', [LocaleController::class, 'switch'])
    ->whereIn('locale', ['ar', 'en'])
    ->name('lang.switch');

/*
|--------------------------------------------------------------------------
| Global Login Route (Optional but recommended)
|--------------------------------------------------------------------------
| Laravel's auth middleware redirects to route('login') by default.
| We point it to the admin login for now (until you add customer auth pages).
*/
Route::get('/login', function () {
    return redirect()->route('admin.login');
})->name('login');

/*
|--------------------------------------------------------------------------
| Admin Authentication (Dedicated)
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->name('admin.')->group(function () {

    // Login / Logout
    Route::middleware('guest')->group(function () {
        Route::get('/login', [AdminAuth::class, 'showLogin'])->name('login');

        // ✅ الاسم اللي الـ Blade بيطلبه: admin.login.submit
        Route::post('/login', [AdminAuth::class, 'login'])->name('login.submit');

        // ✅ Alias إضافي بنفس الـ POST route (لو أي كود قديم بيستخدمه)
        Route::post('/login', [AdminAuth::class, 'login'])->name('login.post');
    });

    Route::post('/logout', [AdminAuth::class, 'logout'])
        ->middleware('auth')
        ->name('logout');

    // Protected Admin Panel
    Route::middleware(['auth', 'admin'])->group(function () {
        Route::get('/dashboard', [AdminDashboard::class, 'index'])->name('dashboard');

        Route::get('/users', [AdminUser::class, 'index'])->name('users.index');
        Route::get('/users/create', [AdminUser::class, 'create'])->name('users.create');
        Route::post('/users', [AdminUser::class, 'store'])->name('users.store');
        Route::get('/users/{user}/edit', [AdminUser::class, 'edit'])->name('users.edit');
        Route::put('/users/{user}', [AdminUser::class, 'update'])->name('users.update');
        Route::delete('/users/{user}', [AdminUser::class, 'destroy'])->name('users.destroy');
        Route::get('/plans', [AdminPlan::class, 'index'])->name('plans.index');
        Route::get('/plans/create', [AdminPlan::class, 'create'])->name('plans.create');
        Route::post('/plans', [AdminPlan::class, 'store'])->name('plans.store');
        Route::get('/plans/{plan}/edit', [AdminPlan::class, 'edit'])->name('plans.edit');
        Route::put('/plans/{plan}', [AdminPlan::class, 'update'])->name('plans.update');
        Route::delete('/plans/{plan}', [AdminPlan::class, 'destroy'])->name('plans.destroy');
        Route::get('/models', [AdminModel::class, 'index'])->name('models.index');
        Route::get('/settings', [AdminSettings::class, 'index'])->name('settings.index');
        Route::get('/ai-chat', [AdminAiChat::class, 'index'])->name('ai-chat.index');
        Route::post('/ai-chat/send', [AdminAiChat::class, 'send'])->name('ai-chat.send');
    });
});

/*
|--------------------------------------------------------------------------
| Customer Routes (Protected)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->prefix('customer')->name('customer.')->group(function () {
    Route::get('/dashboard', [CustomerDashboard::class, 'index'])->name('dashboard');

    Route::get('/chat', [CustomerChat::class, 'index'])->name('chat.index');
    Route::post('/chat/send', [CustomerChat::class, 'send'])->name('chat.send');
});
