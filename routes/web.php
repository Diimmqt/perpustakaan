<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\DailyReportController;

/*
|--------------------------------------------------------------------------
| WEB ROUTES
|--------------------------------------------------------------------------
*/

// ===== BUKU =====
Route::get('/buku', [BukuController::class, 'index']);
Route::post('/buku', [BukuController::class, 'store']);

// ===== TRANSAKSI =====
Route::get('/transaksi', [TransaksiController::class, 'index']);
Route::post('/transaksi', [TransaksiController::class, 'store']);
Route::put('/transaksi/{id}/kembali', [TransaksiController::class, 'kembali']);

// ===== DAILY REPORT =====
Route::get('/daily-report', [DailyReportController::class, 'index']);
Route::post('/daily-report', [DailyReportController::class, 'store']);
