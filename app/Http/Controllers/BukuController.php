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

    // ⬇️ DIPINDAHKAN KE DALAM CLASS (INI INTI PERBAIKANNYA)
    public function edit($id)
    {
        $buku = Buku::findOrFail($id);
        return view('buku.edit', compact('buku'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'tahun' => 'required|numeric',
            'stok' => 'required|numeric',
        ]);

        $buku = Buku::findOrFail($id);
        $buku->update($request->all());

        return redirect('/buku')->with('success','Buku berhasil diupdate');
    }

    public function destroy($id)
    {
        Buku::destroy($id);
        return redirect('/buku')->with('success','Buku berhasil dihapus');
    }
}
