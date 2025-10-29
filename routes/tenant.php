<?php

use App\Http\Controllers\Central\TenantController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;

/*
|--------------------------------------------------------------------------
| Tenant Routes
|--------------------------------------------------------------------------
|
| These routes are for tenant subdomains. They are loaded by the
| TenantRouteServiceProvider. You can customize them as needed.
|
*/

Route::middleware([
    'web',
    InitializeTenancyByDomain::class,
    PreventAccessFromCentralDomains::class,
])->group(function () {

    // Public tenant landing page
    Route::get('/', function () {
        return view('tenant.welcome');
    })->name('tenant.welcome');

    // Inactive tenant page
    Route::get('/inactive', function () {
        return view('tenant.inactiveDashboard');
    })->name('tenant.inactive');

    // Authenticated tenant routes (must be active)
    Route::middleware(['auth', 'verified', 'tenant.inactive'])->group(function () {

        // Dashboard
        Route::get('/dashboard', [TenantController::class, 'showDashboard'])
            ->name('tenant.dashboard');

        // Profile management
        Route::prefix('profile')->group(function () {
            Route::get('/', [ProfileController::class, 'edit'])->name('profile.edit');
            Route::patch('/', [ProfileController::class, 'update'])->name('profile.update');
            Route::delete('/', [ProfileController::class, 'destroy'])->name('profile.destroy');
        });
    });

    require __DIR__ . '/auth.php';
});
