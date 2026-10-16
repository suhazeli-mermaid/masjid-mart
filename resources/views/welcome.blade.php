<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <title>Masjid Mart - Kedai Runcit Online</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-success mb-4">
        <div class="container">
            <a class="navbar-brand fw-bold" href="/">🕌 Masjid Mart</a>
            <a href="/admin/products/create" class="btn btn-light btn-sm">+ Tambah Barang (Admin)</a>
        </div>
    </nav>

    <!-- Senarai Produk -->
    <div class="container">
        <h4 class="mb-3">Senarai Barang Runcit</h4>
        <div class="row">
            @forelse($products as $product)
                <div class="col-md-3 mb-4">
                    <div class="card h-100 shadow-sm">
                        @if($product->gambar)
                            <img src="{{ asset('uploads/products/' . $product->gambar) }}" class="card-img-top" style="height: 180px; object-fit: cover;">
                        @else
                            <img src="https://via.placeholder.com/150" class="card-img-top" style="height: 180px; object-fit: cover;">
                        @endif
                        <div class="card-body d-flex flex-column">
                            <span class="badge bg-secondary mb-2 w-auto">{{ $product->kategori }}</span>
                            <h5 class="card-title fs-6">{{ $product->nama_produk }}</h5>
                            <p class="card-text text-success fw-bold fs-5 mb-1">RM {{ number_format($product->harga, 2) }}</p>
                            <small class="text-muted mb-3">Stok: {{ $product->stok_semasa }} unit</small>
                            <button class="btn btn-outline-success mt-auto w-100">+ Tambah ke Troli</button>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-warning">Belum ada barang runcit dimasukkan. Sila guna butang Tambah Barang.</div>
                </div>
            @endforelse
        </div>
    </div>
</body>
</html>