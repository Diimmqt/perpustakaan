<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daily Report Perpustakaan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 30px;
        }
        h2 {
            margin-bottom: 10px;
        }
        form input, form textarea, form button {
            margin: 5px 0;
            padding: 8px;
            width: 100%;
            max-width: 400px;
        }
        table {
            margin-top: 20px;
            border-collapse: collapse;
            width: 100%;
        }
        table, th, td {
            border: 1px solid #333;
        }
        th, td {
            padding: 8px;
            text-align: center;
        }
        .success {
            color: green;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

    <h2>Daily Report Perpustakaan</h2>

    {{-- pesan sukses --}}
    @if(session('success'))
        <div class="success">
            {{ session('success') }}
        </div>
    @endif

    {{-- form input --}}
    <form action="/daily-report" method="POST">
        @csrf

        <label>Tanggal</label><br>
        <input type="date" name="tanggal" required><br>

        <label>Total Pengunjung</label><br>
        <input type="number" name="total_pengunjung" required><br>

        <label>Total Peminjaman</label><br>
        <input type="number" name="total_peminjaman" required><br>

        <label>Catatan</label><br>
        <textarea name="catatan" rows="3"></textarea><br>

        <button type="submit">Simpan Laporan</button>
    </form>

    {{-- tabel data --}}
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Pengunjung</th>
                <th>Peminjaman</th>
                <th>Catatan</th>
            </tr>
        </thead>
        <tbody>
            @forelse($reports as $r)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $r->tanggal }}</td>
                    <td>{{ $r->total_pengunjung }}</td>
                    <td>{{ $r->total_peminjaman }}</td>
                    <td>{{ $r->catatan }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">Belum ada laporan</td>
                </tr>
            @endforelse
        </tbody>
    </table>

</body>
</html>
