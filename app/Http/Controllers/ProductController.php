<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // 1. Papar semua produk di Homepage berserta Carian, Tapisan Kategori & Susunan Harga
    public function index(Request $request)
    {
        $query = Product::query();

        if ($request->has('search') && $request->search != '') {
            $query->where('nama_produk', 'like', '%' . $request->search . '%');
        }

        if ($request->has('category') && $request->category != '') {
            $query->where('kategori', $request->category);
        }

        if ($request->has('sort')) {
            if ($request->sort == 'price_low') {
                $query->orderBy('harga', 'asc');
            } elseif ($request->sort == 'price_high') {
                $query->orderBy('harga', 'desc');
            } else {
                $query->latest();
            }
        } else {
            $query->latest();
        }

        $products = $query->get();

        return view('welcome', compact('products'));
    }

    // 2. Papar Senarai Produk untuk Admin Berserta Carian & Susunan Stok
    public function listAdmin(Request $request)
    {
        $query = Product::query();

        // Carian Nama Barang
        if ($request->has('search') && $request->search != '') {
            $query->where('nama_produk', 'like', '%' . $request->search . '%');
        }

        // Tapisan Kategori
        if ($request->has('category') && $request->category != '') {
            $query->where('kategori', $request->category);
        }

        // Susunan Harga & Stok Baki Khas Admin
        if ($request->has('sort')) {
            if ($request->sort == 'stock_low') {
                $query->orderBy('stok_semasa', 'asc'); // Stok sikit di atas untuk admin re-stock
            } elseif ($request->sort == 'stock_high') {
                $query->orderBy('stok_semasa', 'desc');
            } elseif ($request->sort == 'price_low') {
                $query->orderBy('harga', 'asc');
            } elseif ($request->sort == 'price_high') {
                $query->orderBy('harga', 'desc');
            } else {
                $query->latest();
            }
        } else {
            $query->latest();
        }

        $products = $query->get();

        return view('admin.products.index', compact('products'));
    }

    // 3. Papar borang tambah produk
    public function create()
    {
        return view('admin.products.create');
    }

    // 4. Simpan data produk dari borang ke pangkalan data
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

        return redirect('/admin/products')->with('success', 'Barang runcit berjaya ditambah!');
    }

    // 5. Papar Borang Sunting (Edit) Produk
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.products.edit', compact('product'));
    }

    // 6. Simpan Perubahan Produk (Update)
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'nama_produk' => 'required',
            'kategori'    => 'required',
            'harga'       => 'required|numeric',
            'stok_semasa' => 'required|integer',
            'gambar'      => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $namaGambar = $product->gambar;
        if ($request->hasFile('gambar')) {
            $namaGambar = time() . '.' . $request->gambar->extension();
            $request->gambar->move(public_path('uploads/products'), $namaGambar);
        }

        $product->update([
            'nama_produk' => $request->nama_produk,
            'kategori'    => $request->kategori,
            'harga'       => $request->harga,
            'stok_semasa' => $request->stok_semasa,
            'penerangan'  => $request->penerangan,
            'gambar'      => $namaGambar,
        ]);

        return redirect('/admin/products')->with('success', 'Maklumat barang berjaya dikemas kini!');
    }

    // 7. Padam Produk (Delete)
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->back()->with('success', 'Barang berjaya dipadam dari sistem!');
    }
}