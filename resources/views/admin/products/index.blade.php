<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengurusan Produk - Admin Masjid Mart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
</head>
<body class="bg-light p-3 p-md-4">
    <div class="container-fluid" style="max-width: 1100px;">
        
        <!-- Header Utama Admin -->
        <div class="d-flex justify-content-between align-items-center mb-3">
            <div>
                <h4 class="fw-bold text-success m-0">⚙️ Senarai Stok & Pengurusan Produk</h4>
                <small class="text-muted">Jumlah Barang Berdaftar: {{ count($products) }} item</small>
            </div>
            <div>
                <a href="/" class="btn btn-sm btn-outline-secondary me-1">← Ke Kedai</a>
                <a href="/admin/products/create" class="btn btn-sm btn-success">+ Tambah Produk</a>
            </div>
        </div>

        @if(session('success'))
            <div class="alert alert-success p-2 small mb-3">{{ session('success') }}</div>
        @endif

        <!-- Widget Carian, Tapisan & Susunan Khas Admin -->
        <div class="card p-3 shadow-sm border-0 mb-3 bg-white">
            <form action="/admin/products" method="GET">
                <div class="row g-2">
                    <!-- Petak Carian Kata Kunci -->
                    <div class="col-12 col-md-4">
                        <label class="form-label small fw-bold text-muted mb-1">Carian Nama Barang</label>
                        <input type="text" name="search" value="{{ request('search') }}" class="form-control form-control-sm" placeholder="🔍 Taip nama barang...">
                    </div>
                    
                    <!-- Pilihan Kategori -->
                    <div class="col-6 col-md-3">
                        <label class="form-label small fw-bold text-muted mb-1">Kategori</label>
                        <select name="category" class="form-select form-select-sm" onchange="this.form.submit()">
                            <option value="">-- Semua Kategori --</option>
                            <option value="Makanan Kering" {{ request('category') == 'Makanan Kering' ? 'selected' : '' }}>Makanan Kering</option>
                            <option value="Minuman" {{ request('category') == 'Minuman' ? 'selected' : '' }}>Minuman</option>
                            <option value="Barang Basah / Sayur" {{ request('category') == 'Barang Basah / Sayur' ? 'selected' : '' }}>Barang Basah / Sayur</option>
                            <option value="Keperluan Rumah" {{ request('category') == 'Keperluan Rumah' ? 'selected' : '' }}>Keperluan Rumah</option>
                        </select>
                    </div>

                    <!-- Pilihan Susunan Khas Admin -->
                    <div class="col-6 col-md-3">
                        <label class="form-label small fw-bold text-muted mb-1">Susunan Data</label>
                        <select name="sort" class="form-select form-select-sm" onchange="this.form.submit()">
                            <option value="">Terkini Ditambah</option>
                            <option value="stock_low" {{ request('sort') == 'stock_low' ? 'selected' : '' }}>⚠️ Stok Sikit ➔ Banyak</option>
                            <option value="stock_high" {{ request('sort') == 'stock_high' ? 'selected' : '' }}>📦 Stok Banyak ➔ Sikit</option>
                            <option value="price_low" {{ request('sort') == 'price_low' ? 'selected' : '' }}>Harga: Murah ➔ Mahal</option>
                            <option value="price_high" {{ request('sort') == 'price_high' ? 'selected' : '' }}>Harga: Mahal ➔ Murah</option>
                        </select>
                    </div>

                    <!-- Butang Carian & Reset -->
                    <div class="col-12 col-md-2 d-flex align-items-end">
                        <button type="submit" class="btn btn-sm btn-success w-100 me-1">Cari</button>
                        <a href="/admin/products" class="btn btn-sm btn-outline-secondary">Reset</a>
                    </div>
                </div>
            </form>
        </div>

        <!-- Jadual Senarai Produk Admin -->
        <div class="card shadow-sm border-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0" style="font-size: 0.9rem;">
                    <thead class="table-success">
                        <tr>
                            <th style="width: 60px;">Gambar</th>
                            <th>Nama Produk</th>
                            <th>Kategori</th>
                            <th>Harga (RM)</th>
                            <th>Stok Baki</th>
                            <th class="text-center" style="width: 140px;">Tindakan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($products as $product)
                            <tr>
                                <td>
                                    @if($product->gambar)
                                        <img src="{{ asset('uploads/products/' . $product->gambar) }}" width="45" height="45" class="rounded" style="object-fit: cover;">
                                    @else
                                        <img src="https://via.placeholder.com/45" width="45" height="45" class="rounded">
                                    @endif
                                </td>
                                <td class="fw-bold">
                                    {{ $product->nama_produk }}
                                    @if($product->stok_semasa <= 5)
                                        <span class="badge bg-danger ms-1" style="font-size: 0.65rem;">Stok Kritik!</span>
                                    @endif
                                </td>
                                <td><span class="badge bg-light text-dark border">{{ $product->kategori }}</span></td>
                                <td class="text-success fw-bold">RM {{ number_format($product->harga, 2) }}</td>
                                <td>
                                    <span class="badge {{ $product->stok_semasa < 10 ? 'bg-danger' : 'bg-secondary' }}">
                                        {{ $product->stok_semasa }} unit
                                    </span>
                                </td>
                                <td class="text-center">
                                    <a href="/admin/products/edit/{{ $product->id }}" class="btn btn-sm btn-outline-primary py-0 px-2 me-1">Edit</a>
                                    <a href="/admin/products/delete/{{ $product->id }}" onclick="return confirm('Adakah anda pasti nak padam barang ini?')" class="btn btn-sm btn-outline-danger py-0 px-2">Padam</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center p-4 text-muted">Tiada barang runcit dijumpai mengikut carian anda.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</body>
</html>