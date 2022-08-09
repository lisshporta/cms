<?php

declare(strict_types=1);

use App\Http\Controllers\Client\ContactController;
use App\Http\Livewire\Pages\Client\Home as TenantHome;
use App\Http\Livewire\Pages\Client\SingleVehicleView;
use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Middleware\InitializeTenancyBySubdomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;

/*
|--------------------------------------------------------------------------
| Tenant Routes
|--------------------------------------------------------------------------
|
| Here you can register the tenant routes for your application.
| These routes are loaded by the TenantRouteServiceProvider.
|
| Feel free to customize them however you want. Good luck!
|
*/

Route::middleware([
    'web',
    InitializeTenancyBySubdomain::class,
    PreventAccessFromCentralDomains::class,
])->group(function () {
    Route::get('/', TenantHome::class)->name('home');
    Route::get('/vehicle/{slug}', SingleVehicleView::class)->name('view-vehicle');
    Route::get('/contact', [ContactController::class, 'index'])->name('contact');
    Route::post('/contact', [ContactController::class, 'submit'])->name('contact-post');
});
