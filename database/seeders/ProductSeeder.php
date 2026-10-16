<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            // --- MAKANAN KERING & BUMIPUTERA ---
            ['nama_produk' => 'Beras Cap Rambutan 10kg', 'kategori' => 'Makanan Kering', 'harga' => 38.50, 'stok_semasa' => 50, 'penerangan' => 'Beras Super Spesial Tempatan 10kg.'],
            ['nama_produk' => 'Beras Faiza Emas 10kg', 'kategori' => 'Makanan Kering', 'harga' => 39.90, 'stok_semasa' => 40, 'penerangan' => 'Beras tempatan berkualiti tinggi keluaran Faiza.'],
            ['nama_produk' => 'Basti Basmati Faiza 5kg', 'kategori' => 'Makanan Kering', 'harga' => 45.00, 'stok_semasa' => 25, 'penerangan' => 'Beras Basmati khas untuk nasi beriani/minyak.'],
            ['nama_produk' => 'Minyak Masak Seri Murni 5kg', 'kategori' => 'Makanan Kering', 'harga' => 32.90, 'stok_semasa' => 60, 'penerangan' => 'Minyak masak sawit tulen botol 5kg.'],
            ['nama_produk' => 'Minyak Masak Saji 5kg', 'kategori' => 'Makanan Kering', 'harga' => 33.20, 'stok_semasa' => 55, 'penerangan' => 'Minyak masak sawit keluaran FGV Saji.'],
            ['nama_produk' => 'Minyak Masak Buruh 2kg', 'kategori' => 'Makanan Kering', 'harga' => 14.50, 'stok_semasa' => 35, 'penerangan' => 'Minyak masak pek sederhana 2kg.'],
            ['nama_produk' => 'Gula Pasir CSR 1kg', 'kategori' => 'Makanan Kering', 'harga' => 2.85, 'stok_semasa' => 120, 'penerangan' => 'Gula putih murni paket 1kg.'],
            ['nama_produk' => 'Gula Halus Prai 1kg', 'kategori' => 'Makanan Kering', 'harga' => 2.90, 'stok_semasa' => 80, 'penerangan' => 'Gula pasir halus kualiti premium.'],
            ['nama_produk' => 'Garam Halus Cap Kapal 500g', 'kategori' => 'Makanan Kering', 'harga' => 1.20, 'stok_semasa' => 100, 'penerangan' => 'Garam beriodin halus.'],
            ['nama_produk' => 'Tepung Terigu Cap Sauh 1kg', 'kategori' => 'Makanan Kering', 'harga' => 3.40, 'stok_semasa' => 70, 'penerangan' => 'Tepung gandum serba guna.'],
            ['nama_produk' => 'Tepung Gandum Faiza 1kg', 'kategori' => 'Makanan Kering', 'harga' => 3.50, 'stok_semasa' => 65, 'penerangan' => 'Tepung gandum tidak diluntur (unbleached).'],
            ['nama_produk' => 'Susu Pekat Marigold 500g', 'kategori' => 'Makanan Kering', 'harga' => 3.70, 'stok_semasa' => 90, 'penerangan' => 'Susu isian pekat manis.'],
            ['nama_produk' => 'Susu Cair F&N 390g', 'kategori' => 'Makanan Kering', 'harga' => 4.10, 'stok_semasa' => 50, 'penerangan' => 'Susu cair kualiti tinggi untuk masakan/minuman.'],
            ['nama_produk' => 'Kicap Lemak Manis Jawi 640ml', 'kategori' => 'Makanan Kering', 'harga' => 5.80, 'stok_semasa' => 40, 'penerangan' => 'Kicap lemak manis keluaran bumiputera.'],
            ['nama_produk' => 'Kicap Asin Mudim 640ml', 'kategori' => 'Makanan Kering', 'harga' => 5.50, 'stok_semasa' => 45, 'penerangan' => 'Kicap asin tradisi Kedah.'],
            ['nama_produk' => 'Sos Cili Kimball 500g', 'kategori' => 'Makanan Kering', 'harga' => 4.20, 'stok_semasa' => 60, 'penerangan' => 'Sos cili pedas manis.'],
            ['nama_produk' => 'Sos Tiram Maggi 340g', 'kategori' => 'Makanan Kering', 'harga' => 6.10, 'stok_semasa' => 35, 'penerangan' => 'Sos tiram pekat khas untuk masakan tumis.'],
            ['nama_produk' => 'Biun Faiza 400g', 'kategori' => 'Makanan Kering', 'harga' => 3.20, 'stok_semasa' => 50, 'penerangan' => 'Bihun beras lembut tidak mudah hancur.'],
            ['nama_produk' => 'Maggi Kari (5 x 79g)', 'kategori' => 'Makanan Kering', 'harga' => 5.90, 'stok_semasa' => 100, 'penerangan' => 'Mee segera perasa kari kegemaran ramai.'],
            ['nama_produk' => 'Maggi Ayam (5 x 77g)', 'kategori' => 'Makanan Kering', 'harga' => 5.90, 'stok_semasa' => 80, 'penerangan' => 'Mee segera perasa ayam segar.'],

            // --- BARANG BASAH & REMPAH ---
            ['nama_produk' => 'Telur Ayam Gred A (30 Biji)', 'kategori' => 'Barang Basah / Sayur', 'harga' => 13.50, 'stok_semasa' => 40, 'penerangan' => 'Telur ayam segar gred A satu papan.'],
            ['nama_produk' => 'Telur Ayam Gred B (30 Biji)', 'kategori' => 'Barang Basah / Sayur', 'harga' => 12.90, 'stok_semasa' => 30, 'penerangan' => 'Telur ayam segar gred B.'],
            ['nama_produk' => 'Bawang Merah India 1kg', 'kategori' => 'Barang Basah / Sayur', 'harga' => 4.50, 'stok_semasa' => 50, 'penerangan' => 'Bawang merah gred import.'],
            ['nama_produk' => 'Bawang Putih China 500g', 'kategori' => 'Barang Basah / Sayur', 'harga' => 3.80, 'stok_semasa' => 45, 'penerangan' => 'Bawang putih segar siap pek.'],
            ['nama_produk' => 'Ubi Kentang Russet 1kg', 'kategori' => 'Barang Basah / Sayur', 'harga' => 5.20, 'stok_semasa' => 40, 'penerangan' => 'Ubi kentang saiz sederhana.'],
            ['nama_produk' => 'Rempah Kari Daging Baba\'s 250g', 'kategori' => 'Barang Basah / Sayur', 'harga' => 4.90, 'stok_semasa' => 70, 'penerangan' => 'Serbuk kari daging dan kambing.'],
            ['nama_produk' => 'Rempah Kari Ikan Adabi 250g', 'kategori' => 'Barang Basah / Sayur', 'harga' => 4.80, 'stok_semasa' => 60, 'penerangan' => 'Serbuk kari ikan keluaran Adabi.'],
            ['nama_produk' => 'Serbuk Kurma Adabi 250g', 'kategori' => 'Barang Basah / Sayur', 'harga' => 4.80, 'stok_semasa' => 40, 'penerangan' => 'Serbuk rempah kurma ayam & daging.'],
            ['nama_produk' => 'Cili Kering Gemuk 200g', 'kategori' => 'Barang Basah / Sayur', 'harga' => 4.00, 'stok_semasa' => 35, 'penerangan' => 'Cili kering kurang pedas.'],
            ['nama_produk' => 'Ikan Bilis Langkawi 250g', 'kategori' => 'Barang Basah / Sayur', 'harga' => 9.50, 'stok_semasa' => 25, 'penerangan' => 'Ikan bilis kopek gred A garing.'],

            // --- MINUMAN ---
            ['nama_produk' => 'Milo Softpack 1kg', 'kategori' => 'Minuman', 'harga' => 21.90, 'stok_semasa' => 50, 'penerangan' => 'Minuman coklat malt berkhasiat.'],
            ['nama_produk' => 'Nescafe Classic 200g', 'kategori' => 'Minuman', 'harga' => 18.50, 'stok_semasa' => 40, 'penerangan' => 'Kopi sebatian tulen.'],
            ['nama_produk' => 'Teh Tarik BOH 3-in-1 (12s)', 'kategori' => 'Minuman', 'harga' => 12.90, 'stok_semasa' => 45, 'penerangan' => 'Teh tarik segera kaya rasa.'],
            ['nama_produk' => 'Teh uncang BOH 100s', 'kategori' => 'Minuman', 'harga' => 11.50, 'stok_semasa' => 60, 'penerangan' => 'Uncang teh hitam Cameron Highlands.'],
            ['nama_produk' => 'Kopi O Cap Televisyen (20s)', 'kategori' => 'Minuman', 'harga' => 6.50, 'stok_semasa' => 50, 'penerangan' => 'Kopi O tradisional uncang.'],
            ['nama_produk' => 'Horlicks Malt 400g', 'kategori' => 'Minuman', 'harga' => 13.20, 'stok_semasa' => 30, 'penerangan' => 'Minuman malt gandum khasiat tinggi.'],
            ['nama_produk' => 'Sirip Ros F&N 500ml', 'kategori' => 'Minuman', 'harga' => 4.50, 'stok_semasa' => 40, 'penerangan' => 'Pati kordial perasa sirap ros.'],
            ['nama_produk' => 'Kordial Sarsi F&N 500ml', 'kategori' => 'Minuman', 'harga' => 4.50, 'stok_semasa' => 35, 'penerangan' => 'Pati kordial perasa sarsi.'],
            ['nama_produk' => 'Susu UHT Farm Fresh Kurma 1L', 'kategori' => 'Minuman', 'harga' => 8.90, 'stok_semasa' => 30, 'penerangan' => 'Susu segar UHT diperkaya dengan kurma.'],
            ['nama_produk' => 'Air Mineral Spritzer 1.5L', 'kategori' => 'Minuman', 'harga' => 2.30, 'stok_semasa' => 100, 'penerangan' => 'Air mineral semula jadi botol besar.'],

            // --- KEPERLUAN RUMAH ---
            ['nama_produk' => 'Sabun Breeze Power Clean 3.6kg', 'kategori' => 'Keperluan Rumah', 'harga' => 28.90, 'stok_semasa' => 30, 'penerangan' => 'Serbuk pencuci pakaian berkuasa tinggi.'],
            ['nama_produk' => 'Sabun Pencuci Dynamo Liquid 2.7kg', 'kategori' => 'Keperluan Rumah', 'harga' => 26.50, 'stok_semasa' => 25, 'penerangan' => 'Cecair pencuci pakaian pekat.'],
            ['nama_produk' => 'Sunlight Limau Nipis 900ml', 'kategori' => 'Keperluan Rumah', 'harga' => 6.50, 'stok_semasa' => 60, 'penerangan' => 'Cecair pencuci pinggan mangkuk.'],
            ['nama_produk' => 'Pelembut Pakaian Downy 1.4L', 'kategori' => 'Keperluan Rumah', 'harga' => 15.90, 'stok_semasa' => 35, 'penerangan' => 'Pelembut dan pemewangi pakaian wangian tahan lama.'],
            ['nama_produk' => 'Pencuci Lantai Ajax Fabuloso 1.5L', 'kategori' => 'Keperluan Rumah', 'harga' => 11.20, 'stok_semasa' => 40, 'penerangan' => 'Pencuci lantai harum lavendar.'],
            ['nama_produk' => 'Ubat Gigi Colgate Maksima 225g', 'kategori' => 'Keperluan Rumah', 'harga' => 9.80, 'stok_semasa' => 70, 'penerangan' => 'Ubat gigi perlindungan kaviti.'],
            ['nama_produk' => 'Ubat Gigi Mukmin 175g', 'kategori' => 'Keperluan Rumah', 'harga' => 6.20, 'stok_semasa' => 50, 'penerangan' => 'Ubat gigi suci dan bersih keluaran tempatan.'],
            ['nama_produk' => 'Sabun Mandi Lifebuoy Total 10 850ml', 'kategori' => 'Keperluan Rumah', 'harga' => 17.50, 'stok_semasa' => 30, 'penerangan' => 'Pencuci badan perlindungan kuman.'],
            ['nama_produk' => 'Syampu Sunsilk Hitam 650ml', 'kategori' => 'Keperluan Rumah', 'harga' => 18.90, 'stok_semasa' => 25, 'penerangan' => 'Syampu pemelihara rambut hitam menawan.'],
            ['nama_produk' => 'Tisu Muka Premier 200s (4 Kotak)', 'kategori' => 'Keperluan Rumah', 'harga' => 14.50, 'stok_semasa' => 45, 'penerangan' => 'Tisu lembut 2 lapis kegunaan isi rumah.'],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}