<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    // 1. Papar Halaman Troli
    public function index()
    {
        $cart = session()->get('cart', []);
        $total = 0;

        foreach ($cart as $item) {
            $total += $item['harga'] * $item['kuantiti'];
        }

        return view('cart', compact('cart', 'total'));
    }

    // 2. Tambah Barang ke Troli
    public function add($id)
    {
        $product = Product::findOrFail($id);
        $cart = session()->get('cart', []);

        // Jika barang sudah ada dalam troli, tambah kuantiti
        if (isset($cart[$id])) {
            $cart[$id]['kuantiti']++;
        } else {
            // Jika barang belum ada, tambah item baharu
            $cart[$id] = [
                "nama_produk" => $product->nama_produk,
                "kuantiti"    => 1,
                "harga"       => $product->harga,
                "gambar"      => $product->gambar
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Barang berjaya ditambah ke dalam troli!');
    }

    // 3. Kemas Kini Kuantiti Barang
    public function update(Request $request, $id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['kuantiti'] = max(1, (int)$request->kuantiti);
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Kuantiti troli dikemas kini!');
    }

    // 4. Padam Barang dari Troli
    public function remove($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Barang dipadam dari troli!');
    }
}