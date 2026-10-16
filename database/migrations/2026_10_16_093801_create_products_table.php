<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::create('products', function (Blueprint $table) {
        $table->id();
        $table->string('nama_produk');        // cth: Beras Cap Rambutan 10kg
        $table->string('kategori');           // cth: Makanan Kering, Minuman, Sayur
        $table->decimal('harga', 8, 2);       // cth: 38.50
        $table->integer('stok_semasa');       // cth: 100
        $table->text('penerangan')->nullable(); // Penerangan ringkas barang
        $table->string('gambar')->nullable();   // Nama fail gambar produk
        $table->timestamps();                 // Rekod masa dicipta & dikemas kini
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
