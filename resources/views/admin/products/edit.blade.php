<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kemaskini Produk - Masjid Mart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-3 p-md-4">
    <div class="container" style="max-width: 600px;">
        <div class="card shadow-sm p-4 border-0">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="text-success m-0">Kemaskini Barang Runcit</h4>
                <a href="/admin/products" class="btn btn-sm btn-outline-secondary">← Batal</a>
            </div>

            <form action="/admin/products/update/{{ $product->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Nama Barang</label>
                    <input type="text" name="nama_produk" value="{{ $product->nama_produk }}" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Kategori</label>
                    <select name="kategori" class="form-select" required>
                        <option value="Makanan Kering" {{ $product->kategori == 'Makanan Kering' ? 'selected' : '' }}>Makanan Kering</option>
                        <option value="Minuman" {{ $product->kategori == 'Minuman' ? 'selected' : '' }}>Minuman</option>
                        <option value="Barang Basah / Sayur" {{ $product->kategori == 'Barang Basah / Sayur' ? 'selected' : '' }}>Barang Basah / Sayur</option>
                        <option value="Keperluan Rumah" {{ $product->kategori == 'Keperluan Rumah' ? 'selected' : '' }}>Keperluan Rumah</option>
                    </select>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label">Harga (RM)</label>
                        <input type="number" step="0.01" name="harga" value="{{ $product->harga }}" class="form-control" required>
                    </div>
                    <div class="col">
                        <label class="form-label">Stok Baki</label>
                        <input type="number" name="stok_semasa" value="{{ $product->stok_semasa }}" class="form-control" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Penerangan Ringkas</label>
                    <textarea name="penerangan" class="form-control" rows="2">{{ $product->penerangan }}</textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Ganti Gambar (Biarkan kosong jika tidak tukar)</label>
                    <input type="file" name="gambar" class="form-control">
                </div>
                <button type="submit" class="btn btn-success w-100">Kemaskini Maklumat Barang</button>
            </form>
        </div>
    </div>
</body>
</html>