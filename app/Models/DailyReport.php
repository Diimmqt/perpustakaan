<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Transaksi;

function index()
{
    $transaksi = Transaksi::all();

    return view('daily_report.index', compact('transaksi'));
}

class DailyReport extends Model
{
    use HasFactory;


    protected $fillable = [
        'tanggal',
        'total_pengunjung',
        'total_peminjaman',
        'catatan'
    ];
}
