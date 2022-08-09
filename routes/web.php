<?php

use App\Http\Controllers\Admin\VehicleController as AdminVehicleController;
use App\Http\Controllers\HomeController;
use App\Http\Livewire\Pages\Client\SingleVehicleView;
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

Route::get('/', [HomeController::class,  'index'])->name('home');
Route::get('/explore', ExplorePage::class)->name('explore');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::prefix('dashboard')->group(function () {
        Route::get('/', function () {
            return view('dashboard');
        })->name('dashboard');

        Route::prefix('inventory')->group(function () {
            Route::get('/', [AdminVehicleController::class,  'index'])->name('cars.index');
            Route::get('/new', [AdminVehicleController::class,  'new'])->name('car.new');
            Route::get('/edit/{id}', [AdminVehicleController::class,  'update'])->name('car.update');
        });
    });
});
