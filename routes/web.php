<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\DailyReportController;
use App\Http\Controllers\PeminjamController;

Route::middleware('auth')->group(function () {
    Route::get('/buku', [BukuController::class, 'index']);
    Route::get('/transaksi', [TransaksiController::class, 'index']);
    Route::get('/daily-report', [DailyReportController::class, 'index']);
    Route::get('/peminjam', [PeminjamController::class, 'index']);
});


Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [LoginController::class, 'showLogin'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth');

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware('auth')
    ->name('dashboard');


