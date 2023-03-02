<?php

use App\Http\Controllers\Admin\InventoryController;
use App\Http\Controllers\VehicleController;
use App\Http\Livewire\Pages\ExplorePage;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', ExplorePage::class)->name('home');
Route::get('/vehicles/{slug}', [VehicleController::class, 'index'])->name('vehicle.show');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::name('admin.')->group(function () {
    Route::get('/dashboard', [VehicleController::class, 'dashboard'])->name('dashboard');

        Route::prefix('inventory')->name('inventory.')->group(function () {
            Route::get('/', [InventoryController::class, 'index'])->name('index');
            Route::get('/new', [InventoryController::class, 'new'])->name('new');
            Route::get('/edit/{id}', [InventoryController::class, 'update'])->name('update');
        });
    });
});
