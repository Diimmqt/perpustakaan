<?php

namespace App\Http\Controllers;

use App\Models\DailyReport;
use Illuminate\Http\Request;

class DailyReportController extends Controller
{
    public function index()
    {
        $reports = DailyReport::all();
        return view('daily_report.index', compact('reports'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'total_pengunjung' => 'required|numeric',
            'total_peminjaman' => 'required|numeric'
        ]);

        DailyReport::create($request->all());

        return redirect('/daily-report')->with('success','Laporan tersimpan');
    }
}
?>