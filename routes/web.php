<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

// 1. Laluan untuk Halaman Utama (Homepage)
Route::get('/', [ProductController::class, 'index']);

// 2. Laluan untuk Borang Tambah Produk (Admin)
Route::get('/admin/products/create', [ProductController::class, 'create']);
Route::post('/admin/products/store', [ProductController::class, 'store']);
use App\Http\Controllers\CartController;

// Laluan Troli
Route::get('/cart', [CartController::class, 'index']);
Route::get('/cart/add/{id}', [CartController::class, 'add']);
Route::post('/cart/update/{id}', [CartController::class, 'update']);
Route::get('/cart/remove/{id}', [CartController::class, 'remove']);
// Laluan Pengurusan Admin (CRUD Produk)
Route::get('/admin/products', [ProductController::class, 'listAdmin']);
Route::get('/admin/products/edit/{id}', [ProductController::class, 'edit']);
Route::post('/admin/products/update/{id}', [ProductController::class, 'update']);
Route::get('/admin/products/delete/{id}', [ProductController::class, 'destroy']);
use App\Http\Controllers\OrderController;

// Laluan Checkout & Pesanan
Route::get('/checkout', [OrderController::class, 'checkout']);
Route::post('/checkout/store', [OrderController::class, 'store']);
Route::get('/admin/orders', [OrderController::class, 'listAdmin']);