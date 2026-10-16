<!DOCTYPE html>
<html lang="ms">
<head>
    <!-- Tag Penting untuk Paparan Telefon Bimbit -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masjid Mart App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    
    <style>
        body {
            padding-bottom: 70px; /* Ruang supaya tidak bertindih dengan Menu Bawah */
            background-color: #f8f9fa;
        }
        .app-header {
            position: sticky;
            top: 0;
            z-index: 1000;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .bottom-nav {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            background: white;
            border-top: 1px solid #dee2e6;
            z-index: 1000;
        }
        .bottom-nav a {
            color: #6c757d;
            text-decoration: none;
            font-size: 0.75rem;
        }
        .bottom-nav a.active {
            color: #198754;
            font-weight: bold;
        }
        .product-card {
            border: none;
            border-radius: 12px;
            overflow: hidden;
            transition: transform 0.2s;
        }
        .product-img {
            height: 130px;
            object-fit: cover;
        }
        .badge-cart {
            position: absolute;
            top: -5px;
            right: 20%;
        }
    </style>
</head>
<body>

    <!-- Header Atas (App Bar) -->
    <div class="bg-success text-white p-3 app-header d-flex justify-content-between align-items-center">
        <div>
            <h5 class="m-0 fw-bold">🕌 Masjid Mart</h5>
            <small style="font-size: 0.75rem; opacity: 0.9;">Kedai Runcit Komuniti Anda</small>
        </div>
        <a href="/admin/products" class="btn btn-sm btn-light rounded-pill px-3 fw-bold">⚙️ Senarai Admin</a>
    </div>

    <!-- Mesej Pemberitahuan -->
    <div class="container mt-2">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show p-2 small mb-2" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close p-2" data-bs-dismiss="alert"></button>
            </div>
        @endif
    </div>

    <!-- Senarai Produk & Widget Carian -->
    <div class="container my-2">

        <!-- BORANG CARIAN, TAPISAN & SUSUNAN (DITAMBAH DI SINI) -->
        <form action="/" method="GET" class="card p-2 shadow-sm border-0 mb-3 bg-white">
            <div class="row g-2">
                <!-- Petak Carian Kata Kunci -->
                <div class="col-12 col-md-5">
                    <input type="text" name="search" value="{{ request('search') }}" class="form-control form-control-sm" placeholder="🔍 Cari barang (cth: Beras, Milo)...">
                </div>
                
                <!-- Pilihan Kategori -->
                <div class="col-6 col-md-3">
                    <select name="category" class="form-select form-select-sm" onchange="this.form.submit()">
                        <option value="">-- Semua Kategori --</option>
                        <option value="Makanan Kering" {{ request('category') == 'Makanan Kering' ? 'selected' : '' }}>Makanan Kering</option>
                        <option value="Minuman" {{ request('category') == 'Minuman' ? 'selected' : '' }}>Minuman</option>
                        <option value="Barang Basah / Sayur" {{ request('category') == 'Barang Basah / Sayur' ? 'selected' : '' }}>Barang Basah / Sayur</option>
                        <option value="Keperluan Rumah" {{ request('category') == 'Keperluan Rumah' ? 'selected' : '' }}>Keperluan Rumah</option>
                    </select>
                </div>

                <!-- Pilihan Susunan Harga & Butang Cari -->
                <div class="col-6 col-md-4 d-flex">
                    <select name="sort" class="form-select form-select-sm me-1" onchange="this.form.submit()">
                        <option value="">-- Susun Harga --</option>
                        <option value="price_low" {{ request('sort') == 'price_low' ? 'selected' : '' }}>Harga: Murah ➔ Mahal</option>
                        <option value="price_high" {{ request('sort') == 'price_high' ? 'selected' : '' }}>Harga: Mahal ➔ Murah</option>
                    </select>
                    <button type="submit" class="btn btn-sm btn-success px-3">Cari</button>
                </div>
            </div>
        </form>

        <h6 class="fw-bold mb-3 text-secondary">Katalog Barang Runcit</h6>
        
        <!-- Grid 2 Kolum Khas Telefon -->
        <div class="row g-2">
            @forelse($products as $product)
                <div class="col-6 col-md-3">
                    <div class="card product-card h-100 shadow-sm">
                        @if($product->gambar)
                            <img src="{{ asset('uploads/products/' . $product->gambar) }}" class="card-img-top product-img">
                        @else
                            <img src="https://via.placeholder.com/150" class="card-img-top product-img">
                        @endif
                        
                        <div class="card-body p-2 d-flex flex-column">
                            <span class="badge bg-light text-dark border mb-1 align-self-start" style="font-size: 0.65rem;">
                                {{ $product->kategori }}
                            </span>
                            <h6 class="card-title text-truncate mb-1" style="font-size: 0.85rem;" title="{{ $product->nama_produk }}">
                                {{ $product->nama_produk }}
                            </h6>
                            <div class="fw-bold text-success mb-1" style="font-size: 0.95rem;">
                                RM {{ number_format($product->harga, 2) }}
                            </div>
                            <div class="text-muted mb-2" style="font-size: 0.7rem;">
                                Stok: {{ $product->stok_semasa }}
                            </div>
                            
                            <a href="/cart/add/{{ $product->id }}" class="btn btn-sm btn-success mt-auto w-100 rounded-pill py-1" style="font-size: 0.75rem;">
                                + Troli
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-warning text-center small">Tiada produk ditemui mengikut carian anda.</div>
                </div>
            @endforelse
        </div>
    </div>

    <!-- Navigasi Bawah (Bottom Navigation Bar) -->
    <div class="bottom-nav d-flex justify-content-around text-center py-2">
        <a href="/" class="active d-flex flex-column align-items-center">
            <i class="bi bi-house-door-fill fs-5"></i>
            <span>Utama</span>
        </a>
        <a href="/cart" class="position-relative d-flex flex-column align-items-center">
            <i class="bi bi-cart-fill fs-5"></i>
            <span>Troli</span>
            @if(count(session('cart', [])) > 0)
                <span class="badge bg-danger rounded-circle badge-cart">
                    {{ count(session('cart', [])) }}
                </span>
            @endif
        </a>
        <a href="/admin/products/create" class="d-flex flex-column align-items-center">
            <i class="bi bi-plus-circle-fill fs-5"></i>
            <span>Tambah</span>
        </a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>