@extends('layouts.app')


@section('content')
<h3>Transaksi Peminjaman</h3>


<form action="/transaksi" method="POST" class="mb-3">
@csrf
<input type="number" name="peminjam_id" placeholder="ID Peminjam" class="form-control mb-2" required>
<input type="number" name="buku_id" placeholder="ID Buku" class="form-control mb-2" required>
<input type="date" name="tanggal_pinjam" class="form-control mb-2" required>
<button class="btn btn-success">Pinjam</button>
</form>


<table class="table table-bordered">
<tr>
<th>Peminjam</th><th>Buku</th><th>Status</th><th>aksi</th>
</tr>
@foreach($transaksis as $t)
<tr>
<td>{{ $t->peminjam->nama }}</td>
<td>{{ $t->buku->judul }}</td>
<td>{{ $t->status }}</td>
<td>
    <a href="/transaksi/{{ $t->id }}/edit">Edit</a>

    <form action="/transaksi/{{ $t->id }}" method="POST" style="display:inline">
        @csrf
        @method('DELETE')
        <button type="submit">Hapus</button>
    </form>

    @if($t->status == 'dipinjam')
    <form action="/transaksi/{{ $t->id }}/kembali" method="POST" style="display:inline">
        @csrf
        @method('PUT')
        <button type="submit">Kembalikan</button>
    </form>
    @endif
</td>

</tr>
@endforeach
</table>
@endsection