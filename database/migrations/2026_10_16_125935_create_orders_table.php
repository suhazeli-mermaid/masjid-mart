<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('no_pesanan')->unique(); // cth: ORD-20261016-001
            $table->string('nama_pelanggan');
            $table->string('no_telefon');
            $table->text('alamat_penghantaran');
            $table->decimal('jumlah_keseluruhan', 8, 2);
            $table->string('status')->default('Selesai'); // Selesai / Dibatalkan
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};