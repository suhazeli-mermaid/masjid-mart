<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengurusan Pesanan - Admin Masjid Mart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-3 p-md-4">
    <div class="container-fluid" style="max-width: 1000px;">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <div>
                <h4 class="fw-bold text-success m-0">📋 Senarai Pesanan Pelanggan</h4>
                <small class="text-muted">Jumlah Pesanan: {{ count($orders) }} rekod</small>
            </div>
            <div>
                <a href="/" class="btn btn-sm btn-outline-secondary me-1">← Ke Kedai</a>
                <a href="/admin/products" class="btn btn-sm btn-outline-success">⚙️ Pengurusan Produk</a>
            </div>
        </div>

        <div class="card shadow-sm border-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0 small">
                    <thead class="table-success">
                        <tr>
                            <th>No. Pesanan / Tarikh</th>
                            <th>Pelanggan</th>
                            <th>Item Ditempah</th>
                            <th>Jumlah (RM)</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($orders as $order)
                            <tr>
                                <td>
                                    <strong class="text-success">{{ $order->no_pesanan }}</strong><br>
                                    <small class="text-muted">{{ $order->created_at->format('d/m/Y h:i A') }}</small>
                                </td>
                                <td>
                                    <strong>{{ $order->nama_pelanggan }}</strong><br>
                                    <small>{{ $order->no_telefon }}</small><br>
                                    <small class="text-muted">{{ $order->alamat_penghantaran }}</small>
                                </td>
                                <td>
                                    <ul class="mb-0 ps-3">
                                        @foreach($order->items as $item)
                                            <li>{{ $item->nama_produk }} (x{{ $item->kuantiti }})</li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td class="fw-bold text-success">RM {{ number_format($order->jumlah_keseluruhan, 2) }}</td>
                                <td><span class="badge bg-success">{{ $order->status }}</span></td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center p-4 text-muted">Belum ada pesanan masuk.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>