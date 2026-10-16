<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesanan Berjaya - Masjid Mart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light p-3 p-md-4">
    <div class="container text-center" style="max-width: 500px;">
        <div class="card shadow-sm border-0 p-4">
            <div class="display-1 text-success mb-2">🎉</div>
            <h3 class="fw-bold text-success mb-1">Pesanan Anda Berjaya!</h3>
            <p class="text-muted small">Terima kasih kerana membeli-belah di Masjid Mart.</p>

            <div class="card bg-light p-3 border-0 my-3 text-start small">
                <div><strong>No. Pesanan:</strong> <span class="text-success fw-bold">{{ $order->no_pesanan }}</span></div>
                <div><strong>Nama:</strong> {{ $order->nama_pelanggan }}</div>
                <div><strong>No. Telefon:</strong> {{ $order->no_telefon }}</div>
                <div><strong>Jumlah Bayaran:</strong> RM {{ number_format($order->jumlah_keseluruhan, 2) }}</div>
            </div>

            <a href="/" class="btn btn-success w-100 rounded-pill">Kembali ke Halaman Utama Kedai</a>
        </div>
    </div>
</body>
</html>