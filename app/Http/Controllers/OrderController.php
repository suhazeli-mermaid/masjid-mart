<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // 1. Papar Halaman Checkout
    public function checkout()
    {
        $cart = session()->get('cart', []);
        
        if (count($cart) == 0) {
            return redirect('/')->with('success', 'Troli anda kosong!');
        }

        $total = 0;
        foreach ($cart as $item) {
            $total += $item['harga'] * $item['kuantiti'];
        }

        return view('checkout', compact('cart', 'total'));
    }

    // 2. Simpan Pesanan (Process Order)
    public function store(Request $request)
    {
        $request->validate([
            'nama_pelanggan'      => 'required',
            'no_telefon'          => 'required',
            'alamat_penghantaran' => 'required',
        ]);

        $cart = session()->get('cart', []);
        
        if (count($cart) == 0) {
            return redirect('/');
        }

        $total = 0;
        foreach ($cart as $item) {
            $total += $item['harga'] * $item['kuantiti'];
        }

        // Cipta Rekod Pesanan
        $order = Order::create([
            'no_pesanan'          => 'ORD-' . date('Ymd') . '-' . rand(100, 999),
            'nama_pelanggan'      => $request->nama_pelanggan,
            'no_telefon'          => $request->no_telefon,
            'alamat_penghantaran' => $request->alamat_penghantaran,
            'jumlah_keseluruhan'  => $total,
            'status'              => 'Selesai',
        ]);

        // Simpan setiap item & tolak stok barang
        foreach ($cart as $id => $details) {
            OrderItem::create([
                'order_id'    => $order->id,
                'nama_produk' => $details['nama_produk'],
                'harga'       => $details['harga'],
                'kuantiti'    => $details['kuantiti'],
            ]);

            // Tolak Stok
            $product = Product::find($id);
            if ($product) {
                $product->stok_semasa = max(0, $product->stok_semasa - $details['kuantiti']);
                $product->save();
            }
        }

        // Kosongkan Troli selepas selesai pesanan
        session()->forget('cart');

        return view('order_success', compact('order'));
    }

    // 3. Papar Senarai Pesanan Admin
    public function listAdmin()
    {
        $orders = Order::with('items')->latest()->get();
        return view('admin.orders.index', compact('orders'));
    }
}