<?php

use App\Http\Controllers\Central\TenantController;
use App\Http\Controllers\Central\TenantStatusController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

foreach (config('tenancy.central_domains') as $domain) {
    Route::domain($domain)->group(function () {

        Route::get('/', fn() => view('welcome'));

        Route::get('/dashboard', fn() => view('dashboard'))
            ->middleware(['auth', 'verified'])
            ->name('dashboard');

        // Authenticated user routes
        Route::middleware('auth')->group(function () {

            // Profile routes
            Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
            Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
            Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

            // Tenants listing accessible by any authenticated user
            Route::get('/tenants', [TenantController::class, 'index'])->name('tenants.index');
        });

        // Admin-only routes
        Route::middleware(['auth', 'role:admin'])->group(function () {
            Route::get('/tenants/create', [TenantController::class, 'create'])->name('tenants.create');
            Route::post('/tenants/store', [TenantController::class, 'store'])->name('tenants.store');
            Route::post('/tenants/{tenant}/toggle-status', [TenantStatusController::class, 'index'])->name('tenant.status');
        });

        // Auth routes
        require __DIR__ . '/auth.php';
    });
}
