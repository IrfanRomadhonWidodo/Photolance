<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\UserController;

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





require __DIR__ . '/auth.php';


