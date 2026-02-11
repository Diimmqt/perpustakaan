<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daily Report</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">

    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold">📊 Daily Report Perpustakaan</h3>
        <a href="/" class="btn btn-secondary">⬅ Home</a>
    </div>

    <!-- Alert -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Form -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <h5 class="mb-3">➕ Tambah Laporan</h5>

            <form action="/daily-report" method="POST" class="row g-3">
                @csrf

                <div class="col-md-4">
                    <label class="form-label">Tanggal</label>
                    <input type="date" name="tanggal" class="form-control" required>
                </div>

                <div class="col-md-4">
                    <label class="form-label">Total Pengunjung</label>
                    <input type="number" name="total_pengunjung" class="form-control" required>
                </div>

                <div class="col-md-4">
                    <label class="form-label">Total Peminjaman</label>
                    <input type="number" name="total_peminjaman" class="form-control" required>
                </div>

                <div class="col-12">
                    <button class="btn btn-primary w-100">
                        💾 Simpan Laporan
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Table -->
    <div class="card shadow">
        <div class="card-body">
            <h5 class="mb-3">📋 Data Laporan Harian</h5>

            <table class="table table-bordered table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Pengunjung</th>
                        <th>Peminjaman</th>
                        <th>Catatan</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($reports as $report)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $report->tanggal }}</td>
                            <td>{{ $report->total_pengunjung }}</td>
                            <td>{{ $report->total_peminjaman }}</td>
                            <td>{{ $report->catatan ?? '-' }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted">
                                Belum ada data laporan
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>

</body>
</html>
