<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Peminjam;
use App\Models\Buku;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksis = Transaksi::with(['peminjam','buku'])->get();
        $peminjams = Peminjam::all();
        $bukus = Buku::all();

        return view('transaksi.index', compact('transaksis','peminjams','bukus'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'peminjam_id' => 'required',
            'buku_id' => 'required',
            'tanggal_pinjam' => 'required|date'
        ]);

        Transaksi::create([
            'peminjam_id' => $request->peminjam_id,
            'buku_id' => $request->buku_id,
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'status' => 'dipinjam'
        ]);

        return redirect('/transaksi');
    }

    public function edit($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $peminjams = Peminjam::all();
        $bukus = Buku::all();

        return view('transaksi.edit', compact('transaksi','peminjams','bukus'));
    }

    public function update(Request $request, $id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->update($request->all());

        return redirect('/transaksi');
    }

    public function destroy($id)
    {
        Transaksi::destroy($id);
        return redirect('/transaksi');
    }

    public function kembali($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->update([
            'tanggal_kembali' => now(),
            'status' => 'dikembalikan'
        ]);

        return redirect('/transaksi');
    }
}
