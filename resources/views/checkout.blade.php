<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout Pesanan - Masjid Mart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-3 p-md-4">
    <div class="container" style="max-width: 650px;">
        <div class="card shadow-sm border-0 p-4">
            <h4 class="fw-bold text-success mb-3">🛍️ Pengesahan Pesanan & Penghantaran</h4>
            
            <div class="card bg-light p-3 mb-3 border-0">
                <h6 class="fw-bold">Ringkasan Troli</h6>
                <ul class="list-group mb-2">
                    @foreach($cart as $item)
                        <li class="list-group-item d-flex justify-content-between align-items-center small">
                            <div>
                                <strong>{{ $item['nama_produk'] }}</strong> 
                                <span class="text-muted">x {{ $item['kuantiti'] }}</span>
                            </div>
                            <span class="fw-bold">RM {{ number_format($item['harga'] * $item['kuantiti'], 2) }}</span>
                        </li>
                    @endforeach
                </ul>
                <div class="d-flex justify-content-between fw-bold fs-5 text-success">
                    <span>Jumlah Keseluruhan:</span>
                    <span>RM {{ number_format($total, 2) }}</span>
                </div>
            </div>

            <form action="/checkout/store" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label fw-bold small">Nama Penuh Pelanggan</label>
                    <input type="text" name="nama_pelanggan" class="form-control" placeholder="Ahmad Bin Abdullah" required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold small">No. Telefon / WhatsApp</label>
                    <input type="text" name="no_telefon" class="form-control" placeholder="0123456789" required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold small">Alamat Lengkap Penghantaran</label>
                    <textarea name="alamat_penghantaran" class="form-control" rows="3" placeholder="No 123, Jalan Masjid..." required></textarea>
                </div>
                
                <div class="d-flex justify-content-between mt-4">
                    <a href="/cart" class="btn btn-outline-secondary">← Kembali ke Troli</a>
                    <button type="submit" class="btn btn-success px-4">Hantar & Sahkan Pesanan →</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>