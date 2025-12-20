@extends('layouts.app')


@section('content')
<h3>Data Buku</h3>


<form action="/buku" method="POST" class="mb-3">
@csrf
<input type="text" name="judul" placeholder="Judul" class="form-control mb-2" required>
<input type="text" name="penulis" placeholder="Penulis" class="form-control mb-2" required>
<input type="number" name="tahun" placeholder="Tahun" class="form-control mb-2" required>
<input type="number" name="stok" placeholder="Stok" class="form-control mb-2" required>
<button class="btn btn-primary">Tambah Buku</button>
</form>


<table class="table table-bordered">
<tr>
<th>Judul</th><th>Penulis</th><th>Tahun</th><th>Stok</th>
</tr>
@foreach($bukus as $b)
<tr>
<td>{{ $b->judul }}</td>
<td>{{ $b->penulis }}</td>
<td>{{ $b->tahun }}</td>
<td>{{ $b->stok }}</td>
</tr>
@endforeach
</table>
@endsection