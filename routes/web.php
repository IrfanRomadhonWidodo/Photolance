<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookingController;

Route::get('/', function () {
    return view('home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


//Untuk Form Employee 
Route::post('/employees', [App\Http\Controllers\EmployeeController::class, 'store'])->name('employees.store')->middleware('auth');

//Untuk Tentang Kami Bagian cacah
Route::get('/dashboard', [App\Http\Controllers\TentangKamiController::class, 'index'])->name('dashboard');
Route::get('/home', [App\Http\Controllers\TentangKamiController::class, 'index2'])->name('home');
Route::get('/', [App\Http\Controllers\TentangKamiController::class, 'index2']);

//Booking
Route::get('/booking-dashboard_booking', function () {
    return view('booking.dashboard_booking');
})->name('booking.dashboard_booking');
Route::get('/dashboard/view', function () {
    return view('dashboard');
})->name('dashboard.view');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard/booking', [BookingController::class, 'index'])->name('booking.dashboard');
    Route::get('/booking/create', [BookingController::class, 'create'])->name('booking.create');
    Route::post('/booking/check-availability', [BookingController::class, 'checkAvailability'])->name('booking.check-availability');
    Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');
    Route::get('/booking/success', [BookingController::class, 'success'])->name('booking.success');
});



require __DIR__ . '/auth.php';


