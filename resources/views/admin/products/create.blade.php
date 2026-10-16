<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <title>Tambah Produk - Masjid Mart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-4">
    <div class="container" style="max-width: 600px;">
        <div class="card shadow-sm p-4">
            <h3 class="mb-4 text-success">Borang Tambah Barang Runcit</h3>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <form action="/admin/products/store" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Nama Barang</label>
                    <input type="text" name="nama_produk" class="form-control" placeholder="Cth: Beras Cap Rambutan 10kg" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Kategori</label>
                    <select name="kategori" class="form-select" required>
                        <option value="Makanan Kering">Makanan Kering</option>
                        <option value="Minuman">Minuman</option>
                        <option value="Barang Basah / Sayur">Barang Basah / Sayur</option>
                        <option value="Keperluan Rumah">Keperluan Rumah</option>
                    </select>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label">Harga (RM)</label>
                        <input type="number" step="0.01" name="harga" class="form-control" placeholder="38.50" required>
                    </div>
                    <div class="col">
                        <label class="form-label">Stok Awal</label>
                        <input type="number" name="stok_semasa" class="form-control" placeholder="50" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Penerangan Ringkas</label>
                    <textarea name="penerangan" class="form-control" rows="2"></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Gambar Produk</label>
                    <input type="file" name="gambar" class="form-control">
                </div>
                <button type="submit" class="btn btn-success w-100">Simpan Barang</button>
            </form>
        </div>
    </div>
</body>
</html>