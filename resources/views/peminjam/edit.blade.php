<h2>Edit Peminjam</h2>

<form action="/peminjam/{{ $peminjam->id }}" method="POST">
    @csrf
    @method('PUT')

    <input type="text" name="nama" value="{{ $peminjam->nama }}"><br>
    <input type="text" name="kelas" value="{{ $peminjam->kelas }}"><br>
    <input type="text" name="alamat" value="{{ $peminjam->alamat }}"><br>
    <input type="text" name="no_hp" value="{{ $peminjam->no_hp }}"><br>

    <button type="submit">Update</button>
</form>
