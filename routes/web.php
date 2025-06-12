<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\TentangKamiController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Rute utama ('/') akan menjalankan TentangKamiController dan diberi nama 'home'.
Route::get('/', [TentangKamiController::class, 'index2'])->name('home');

// Rute untuk dasbor pengguna biasa.
Route::get('/dashboard', [TentangKamiController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

//Untuk Form Employee 
Route::post('/employees', [EmployeeController::class, 'store'])->name('employees.store')->middleware('auth');

// Rute untuk Booking
Route::prefix('dashboard')->middleware(['auth'])->group(function () {
    Route::get('/dashboard_booking', [BookingController::class, 'index'])->name('booking.dashboard_booking');
    Route::get('/booking/create', [BookingController::class, 'create'])->name('booking.create');
    Route::post('/booking/check-availability', [BookingController::class, 'checkAvailability'])->name('booking.check-availability');
    Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');
    Route::get('/booking/success', [BookingController::class, 'success'])->name('booking.success');
});

// Rute untuk Pembayaran
Route::prefix('payment')->name('payment.')->group(function () {
    Route::get('/dashboard', [PaymentController::class, 'dashboard'])->name('dashboard');
    Route::get('/{booking}', [PaymentController::class, 'show'])->name('show');
    Route::post('/{payment}/process', [PaymentController::class, 'processPayment'])->name('process');
    Route::get('/{payment}/complete', [PaymentController::class, 'complete'])->name('complete');
});

// Log Out Filament
Route::post('admin/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->name('filament.admin.auth.logout');

// Rute untuk Autentikasi
require __DIR__ . '/auth.php';
