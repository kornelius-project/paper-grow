<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    // Memproses Checkout dari Keranjang
    public function checkout(Request $request)
    {
        $userId = auth()->id();
        $carts = Cart::with('product')->where('user_id', $userId)->get();

        if ($carts->isEmpty()) {
            return redirect()->route('products.index')->withErrors(['cart' => 'Keranjang Anda kosong!']);
        }

        $totalPrice = $carts->sum(function($item) {
            return $item->quantity * $item->product->price;
        });

        DB::beginTransaction();
        try {
            // 1. Buat Data Pesanan (Order)
            $order = Order::create([
                'user_id' => $userId,
                'total_price' => $totalPrice,
                'status' => 'pending', // Menunggu Pembayaran
            ]);

            // 2. Pindahkan Barang dari Keranjang ke Rincian Pesanan (Order Items)
            foreach ($carts as $cart) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $cart->product_id,
                    'quantity' => $cart->quantity,
                    'price' => $cart->product->price,
                ]);
            }

            // 3. Kosongkan Keranjang
            Cart::where('user_id', $userId)->delete();

            DB::commit();

            return redirect()->route('order.success', $order->id);
            
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['checkout' => 'Terjadi kesalahan saat memproses pesanan Anda.']);
        }
    }

    // Halaman Sukses Checkout
    public function success(Order $order)
    {
        // Pastikan hanya pemilik pesanan yang bisa melihat
        if ($order->user_id !== auth()->id()) abort(403);

        return view('order.success', compact('order'));
    }
}
