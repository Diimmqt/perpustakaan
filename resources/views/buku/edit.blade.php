<h2>Edit Buku</h2>

<form action="/buku/{{ $buku->id }}" method="POST">
    @csrf
    @method('PUT')

    <input type="text" name="judul" value="{{ $buku->judul }}"><br>
    <input type="text" name="penulis" value="{{ $buku->penulis }}"><br>
    <input type="number" name="tahun" value="{{ $buku->tahun }}"><br>
    <input type="number" name="stok" value="{{ $buku->stok }}"><br>

    <button type="submit">Update</button>
</form>
