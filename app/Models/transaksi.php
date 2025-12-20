<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    use HasFactory;
s

    protected $fillable = [
    'peminjam_id',
    'buku_id',
    'tanggal_pinjam',
    'tanggal_kembali',
    'status'
    ];


    public function peminjam()
    {
        return $this->belongsTo(Peminjam::class);
    }


    public function buku()
    {
        return $this->belongsTo(Buku::class);
    }
}
