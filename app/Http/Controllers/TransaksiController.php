<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Peminjam;
use App\Models\Buku;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\DailyReport;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksis = Transaksi::with(['peminjam','buku'])->get();
        $peminjams  = Peminjam::all();
        $bukus      = Buku::all();

        return view('transaksi.index', compact(
            'transaksis',
            'peminjams',
            'bukus'
        ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'peminjam_id' => 'required|exists:peminjams,id',
            'buku_id' => 'required|exists:bukus,id',
            'tanggal_pinjam' => 'required|date',
        ]);

        Transaksi::create([
            'peminjam_id' => $request->peminjam_id,
            'buku_id' => $request->buku_id,
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'status' => 'dipinjam'
        ]);

        return redirect('/transaksi')->with('success','Transaksi berhasil');
    }

    public function kembali($id)
    {
        $transaksi = Transaksi::findOrFail($id);

        // update status & tanggal kembali
        $transaksi->update([
            'status' => 'kembali',
            'tanggal_kembali' => Carbon::today()
        ]);

        return redirect('/transaksi')->with('success', 'Buku berhasil dikembalikan');
    }
    public function destroy($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->delete();

         redirect('/transaksi')->with('success', 'Transaksi berhasil dihapus');
    }


}
