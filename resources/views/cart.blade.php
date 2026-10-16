<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <title>Troli Beli-Belah - Masjid Mart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-success mb-4">
        <div class="container">
            <a class="navbar-brand fw-bold" href="/">🕌 Masjid Mart</a>
            <a href="/" class="btn btn-outline-light btn-sm">← Terus Membeli-Belah</a>
        </div>
    </nav>

    <div class="container">
        <h3 class="mb-4">Troli Beli-Belah Anda</h3>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if(count($cart) > 0)
            <div class="card shadow-sm p-3 mb-4">
                <table class="table align-middle">
                    <thead>
                        <tr>
                            <th>Produk</th>
                            <th>Harga Seunit</th>
                            <th style="width: 150px;">Kuantiti</th>
                            <th>Jumlah</th>
                            <th>Tindakan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cart as $id => $details)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        @if($details['gambar'])
                                            <img src="{{ asset('uploads/products/' . $details['gambar']) }}" width="50" height="50" class="rounded me-3" style="object-fit: cover;">
                                        @else
                                            <img src="https://via.placeholder.com/50" width="50" height="50" class="rounded me-3">
                                        @endif
                                        <span class="fw-bold">{{ $details['nama_produk'] }}</span>
                                    </div>
                                </td>
                                <td>RM {{ number_format($details['harga'], 2) }}</td>
                                <td>
                                    <form action="/cart/update/{{ $id }}" method="POST" class="d-flex">
                                        @csrf
                                        <input type="number" name="kuantiti" value="{{ $details['kuantiti'] }}" min="1" class="form-control form-control-sm me-2">
                                        <button type="submit" class="btn btn-sm btn-outline-primary">Ubah</button>
                                    </form>
                                </td>
                                <td class="fw-bold text-success">
                                    RM {{ number_format($details['harga'] * $details['kuantiti'], 2) }}
                                </td>
                                <td>
                                    <a href="/cart/remove/{{ $id }}" class="btn btn-sm btn-outline-danger">Padam</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="d-flex justify-content-between align-items-center mt-3 pt-3 border-top">
                    <h5>Jumlah Keseluruhan: <span class="text-success fw-bold">RM {{ number_format($total, 2) }}</span></h5>
                    <button class="btn btn-success btn-lg disabled">Teruskan ke Pembayaran (Checkout) →</button>
                </div>
            </div>
        @else
            <div class="alert alert-warning text-center p-4">
                <h5>Troli anda masih kosong!</h5>
                <a href="/" class="btn btn-success mt-2">Mula Membeli-Belah Sekarang</a>
            </div>
        @endif
    </div>
</body>
</html>