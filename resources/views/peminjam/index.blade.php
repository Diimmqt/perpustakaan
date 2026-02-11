<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Peminjam</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            padding: 30px;
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
        input, button {
            width: 100%;
            padding: 8px;
            margin: 6px 0 15px;
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
        form.inline {
            display: inline;
        }
    </style>
</head>
<body>

<h2>👤 Data Peminjam</h2>

@if(session('success'))
    <p style="color:green">{{ session('success') }}</p>
@endif

<div class="container">

    {{-- FORM TAMBAH --}}
    <div class="card">
        <h3>Tambah Peminjam</h3>
        <form action="/peminjam" method="POST">
            @csrf
            <input type="text" name="nama" placeholder="Nama" required>
            <input type="text" name="kelas" placeholder="Kelas" required>
            <input type="text" name="alamat" placeholder="Alamat" required>
            <input type="text" name="no_hp" placeholder="No HP" required>
            <button type="submit">Simpan</button>
        </form>
    </div>

    {{-- TABEL --}}
    <div class="card">
        <h3>Daftar Peminjam</h3>
        <table>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>No HP</th>
                <th>Aksi</th>
            </tr>
            @forelse($peminjams as $p)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $p->nama }}</td>
                <td>{{ $p->kelas }}</td>
                <td>{{ $p->no_hp }}</td>
                <td>
                    <a href="/peminjam/{{ $p->id }}/edit">Edit</a>
                    |
                    <form class="inline" action="/peminjam/{{ $p->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button style="background:red">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5">Belum ada data</td>
            </tr>
            @endforelse
        </table>
    </div>

</div>

</body>
</html>
