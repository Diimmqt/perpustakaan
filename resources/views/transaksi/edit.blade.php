<h2>Edit Transaksi</h2>

<form action="/transaksi/{{ $transaksi->id }}" method="POST">
    @csrf
    @method('PUT')

    <select name="peminjam_id">
        @foreach($peminjams as $p)
            <option value="{{ $p->id }}" {{ $p->id == $transaksi->peminjam_id ? 'selected' : '' }}>
                {{ $p->nama }}
            </option>
        @endforeach
    </select><br>

    <select name="buku_id">
        @foreach($bukus as $b)
            <option value="{{ $b->id }}" {{ $b->id == $transaksi->buku_id ? 'selected' : '' }}>
                {{ $b->judul }}
            </option>
        @endforeach
    </select><br>

    <input type="date" name="tanggal_pinjam" value="{{ $transaksi->tanggal_pinjam }}"><br>

    <button type="submit">Update</button>
</form>
