<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Perpustakaan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            padding: 30px;
        }
        h1 {
            margin-bottom: 20px;
        }
        .cards {
            display: flex;
            gap: 20px;
            margin-bottom: 30px;
        }
        .card {
            background: white;
            padding: 20px;
            border-radius: 10px;
            width: 200px;
            text-align: center;
            box-shadow: 0 5px 10px rgba(0,0,0,.1);
            transition: 0.3s;
        }
        .card:hover {
            transform: translateY(-5px);
        }
        .card h2 {
            font-size: 36px;
            margin: 10px 0;
        }
        .menu {
            display: flex;
            gap: 15px;
        }
        .menu a {
            text-decoration: none;
            background: #2d89ef;
            color: white;
            padding: 15px 20px;
            border-radius: 8px;
            font-weight: bold;
            transition: 0.3s;
        }
        .menu a:hover {
            background: #1b5fbd;
        }
        .menu a.peminjam {
            background: #28a745;
        }
        .menu a.peminjam:hover {
         background: #1e7e34;
        }

    </style>
</head>
<body>

    <h1>📚 Dashboard Perpustakaan</h1>

    {{-- Ringkasan --}}
    <div class="cards">
        <div class="card">
            <p>Total Buku</p>
            <h2>{{ $totalBuku }}</h2>
        </div>
        <div class="card">
            <p>Total Transaksi</p>
            <h2>{{ $totalTransaksi }}</h2>
        </div>
        <div class="card">
            <p>Daily Report</p>
            <h2>{{ $totalReport }}</h2>
        </div>
    </div>

    {{-- Menu cepat --}}
    <div class="menu">
        <a href="/buku">📘 Kelola Buku</a>
        <a href="/transaksi">🔄 Kelola Transaksi</a>
        <a href="/daily-report">📝 Daily Report</a>
        <a href="/peminjam" class="peminjam">tambah peminjam</a>
    </div>

</body>
</html>
