<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index()
    {
        $bukus = Buku::all();
        return view('buku.index', compact('bukus'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'tahun' => 'required|numeric',
            'stok' => 'required|numeric'
        ]);

        Buku::create($request->all());

        return redirect('/buku')->with('success','Buku berhasil ditambahkan');
    }
}
