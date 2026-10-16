<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Papar borang tambah produk
    public function create()
    {
        return view('admin.products.create');
    }

    // Simpan data produk dari borang ke pangkalan data
    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required',
            'kategori'    => 'required',
            'harga'       => 'required|numeric',
            'stok_semasa' => 'required|integer',
            'gambar'      => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $namaGambar = null;
        if ($request->hasFile('gambar')) {
            $namaGambar = time() . '.' . $request->gambar->extension();
            $request->gambar->move(public_path('uploads/products'), $namaGambar);
        }

        Product::create([
            'nama_produk' => $request->nama_produk,
            'kategori'    => $request->kategori,
            'harga'       => $request->harga,
            'stok_semasa' => $request->stok_semasa,
            'penerangan'  => $request->penerangan,
            'gambar'      => $namaGambar,
        ]);

        return redirect()->back()->with('success', 'Barang runcit berjaya ditambah!');
    }
// Papar semua produk di Halaman Utama (Homepage)
public function index()
{
    $products = Product::all();
    return view('welcome', compact('products'));
}
}