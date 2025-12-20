<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Transaksi;
use App\Models\DailyReport;

class HomeController extends Controller
{
    public function index()
    {
        return view('home', [
            'totalBuku' => Buku::count(),
            'totalTransaksi' => Transaksi::count(),
            'totalReport' => DailyReport::count(),
        ]);
    }
}
