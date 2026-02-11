<?php

namespace App\Http\Controllers;

use App\Models\Peminjam;
use Illuminate\Http\Request;

class PeminjamController extends Controller
{
    // =====================
    // TAMPIL DATA + FORM
    // =====================
    public function index()
    {
        return view('peminjam.index', [
            'peminjams' => Peminjam::all()
        ]);
    }

    // =====================
    // SIMPAN DATA
    // =====================
    public function store(Request $request)
    {
        $request->validate([
            'nama'   => 'required',
            'kelas'  => 'required',
            'alamat' => 'required',
            'no_hp'  => 'required',
        ]);

        Peminjam::create($request->all());

        return redirect('/peminjam')->with('success','Data peminjam berhasil ditambahkan');
    }

    // =====================
    // FORM EDIT
    // =====================
    public function edit($id)
    {
        return view('peminjam.edit', [
            'peminjam' => Peminjam::findOrFail($id)
        ]);
    }

    // =====================
    // UPDATE DATA
    // =====================
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama'   => 'required',
            'kelas'  => 'required',
            'alamat' => 'required',
            'no_hp'  => 'required',
        ]);

        $peminjam = Peminjam::findOrFail($id);
        $peminjam->update($request->all());

        return redirect('/peminjam')->with('success','Data peminjam berhasil diupdate');
    }

    // =====================
    // HAPUS DATA
    // =====================
    public function destroy($id)
    {
        Peminjam::destroy($id);
        return redirect('/peminjam')->with('success','Data peminjam berhasil dihapus');
    }
}
