<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DailyReportController extends Controller
{
    public function index()
    {
        $transaksi = []; // WAJIB ADA

        return view('daily_report.index', compact('transaksi'));
    }
}
