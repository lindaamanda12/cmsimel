<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\KontakController;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\KendaraanController as AdminKendaraanController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\BookingController as AdminBookingController;

/*
|--------------------------------------------------------------------------
| Halaman Pelanggan (Public)
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/motor', [KendaraanController::class, 'motor'])->name('motor');
Route::get('/mobil', [KendaraanController::class, 'mobil'])->name('mobil');

Route::get('/kendaraan/{kendaraan}', [KendaraanController::class, 'detail'])->name('kendaraan.detail');

Route::get('/booking/{kendaraan}', [BookingController::class, 'create'])->name('booking.create');
Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');

Route::get('/kontak', [KontakController::class, 'index'])->name('kontak');

/*
|--------------------------------------------------------------------------
| Admin (/admin)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->prefix('admin')->group(function () {

    Route::get('/', function () {
        return redirect()->route('admin.dashboard');
    });

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('admin.dashboard');

    Route::resource('kategori', KategoriController::class)->except(['show']);

    Route::resource('kendaraan', AdminKendaraanController::class)->except(['show']);

    Route::resource('banner', BannerController::class)->except(['show']);

    Route::resource('booking', AdminBookingController::class)
        ->only(['index', 'show', 'update', 'destroy'])
        ->names('admin.booking');

});

require __DIR__.'/auth.php';
