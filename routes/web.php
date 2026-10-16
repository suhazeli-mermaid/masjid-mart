<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

// 1. Laluan untuk Halaman Utama (Homepage)
Route::get('/', [ProductController::class, 'index']);

// 2. Laluan untuk Borang Tambah Produk (Admin)
Route::get('/admin/products/create', [ProductController::class, 'create']);
Route::post('/admin/products/store', [ProductController::class, 'store']);