<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Transaksi Peminjaman</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            padding: 30px;
        }
        h2 {
            margin-bottom: 15px;
        }
        .container {
            display: grid;
            grid-template-columns: 1fr 2fr;
            gap: 30px;
        }
        .card {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 5px 10px rgba(0,0,0,.1);
        }
        label {
            font-weight: bold;
        }
        select, input, button {
            width: 100%;
            padding: 8px;
            margin: 6px 0 15px 0;
        }
        button {
            background: #2d89ef;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background: #1b5fbd;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table th, table td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: center;
        }
        table th {
            background: #eee;
        }
        .badge {
            padding: 5px 10px;
            border-radius: 6px;
            color: white;
            font-size: 12px;
        }
        .dipinjam {
            background: orange;
        }
        .kembali {
            background: green;
        }
        .aksi form {
            display: inline;
        }
    </style>
</head>
<body>

<h2>🔄 Transaksi Peminjaman</h2>

@if(session('success'))
    <p style="color:green">{{ session('success') }}</p>
@endif

<div class="container">

    {{-- FORM TRANSAKSI --}}
    <div class="card">
        <h3>Tambah Transaksi</h3>
        <form action="/transaksi" method="POST">
            @csrf

            <label>Peminjam</label>
            <select name="peminjam_id" required>
                <option value="">-- Pilih Peminjam --</option>
                @foreach($peminjams as $p)
                    <option value="{{ $p->id }}">
                        {{ $p->nama }} ({{ $p->kelas }})
                    </option>
                @endforeach
            </select>

            <label>Buku</label>
            <select name="buku_id" required>
                <option value="">-- Pilih Buku --</option>
                @foreach($bukus as $b)
                    <option value="{{ $b->id }}">
                        {{ $b->judul }}
                    </option>
                @endforeach
            </select>

            <label>Tanggal Pinjam</label>
            <input type="date" name="tanggal_pinjam" required>

            <button type="submit">Simpan</button>
        </form>
    </div>

    {{-- TABEL TRANSAKSI --}}
    <div class="card">
        <h3>Data Transaksi</h3>
        <table>
            <tr>
                <th>No</th>
                <th>Peminjam</th>
                <th>Buku</th>
                <th>Tgl Pinjam</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>

            @forelse($transaksis as $t)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $t->peminjam->nama }}</td>
                <td>{{ $t->buku->judul }}</td>
                <td>{{ $t->tanggal_pinjam }}</td>
                <td>
                    <span class="badge {{ $t->status }}">
                        {{ strtoupper($t->status) }}
                    </span>
                </td>
                <td class="aksi">
                    @if($t->status == 'dipinjam')
                        <form action="/transaksi/{{ $t->id }}/kembali" method="POST">
                            @csrf
                            @method('PUT')
                            <button type="submit">Kembalikan</button>
                        </form>
                    @endif

                    <form action="/transaksi/{{ $t->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button style="background:red">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6">Belum ada transaksi</td>
            </tr>
            @endforelse
        </table>
    </div>

</div>

</body>
</html>
