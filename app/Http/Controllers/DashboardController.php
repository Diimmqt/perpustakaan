<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Transaksi;
use App\Models\DailyReport;

class DashboardController extends Controller
{
    public function index()
    {
        $totalBuku = Buku::count();
        $totalTransaksi = Transaksi::count();
        $totalReport = DailyReport::count();

        return view('home', compact(
            'totalBuku',
            'totalTransaksi',
            'totalReport'
        ));
    }
}
