<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\DailyReportController;
use App\Http\Controllers\HomeController;




/*
|--------------------------------------------------------------------------
| WEB ROUTES
|--------------------------------------------------------------------------
*/
// home
Route::get('/', [HomeController::class, 'index']);
// ===== BUKU =====
Route::get('/buku', [BukuController::class, 'index']);
Route::post('/buku', [BukuController::class, 'store']);
Route::get('/buku/{id}/edit', [BukuController::class, 'edit']);
Route::put('/buku/{id}', [BukuController::class, 'update']);
Route::delete('/buku/{id}', [BukuController::class, 'destroy']);

// ===== TRANSAKSI =====
Route::get('/transaksi', [TransaksiController::class, 'index']);
Route::post('/transaksi', [TransaksiController::class, 'store']);
Route::get('/transaksi/{id}/edit', [TransaksiController::class, 'edit']);
Route::put('/transaksi/{id}', [TransaksiController::class, 'update']);
Route::delete('/transaksi/{id}', [TransaksiController::class, 'destroy']);
Route::put('/transaksi/{id}/kembali', [TransaksiController::class, 'kembali']);

// ===== DAILY REPORT =====
Route::get('/daily-report', [DailyReportController::class, 'index']);
Route::post('/daily-report', [DailyReportController::class, 'store']);
