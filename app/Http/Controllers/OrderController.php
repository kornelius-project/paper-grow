<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    // Menampilkan halaman form checkout
    public function checkoutForm()
    {
        $userId = auth()->id();
        $carts = Cart::with('product')->where('user_id', $userId)->get();

        if ($carts->isEmpty()) {
            return redirect()->route('products.index')->withErrors(['cart' => 'Keranjang Anda kosong!']);
        }

        $subtotal = $carts->sum(function($item) {
            return $item->quantity * $item->product->price;
        });

        $tax = $subtotal * 0.12; // PPN 12%
        $totalPrice = $subtotal + $tax;

        return view('checkout.index', compact('carts', 'subtotal', 'tax', 'totalPrice'));
    }

    // Memproses Checkout dari Keranjang
    public function checkout(Request $request)
    {
        $request->validate([
            'shipping_name' => 'required|string|max:255',
            'shipping_phone' => 'required|string|max:20',
            'shipping_address' => 'required|string',
        ]);

        $userId = auth()->id();
        $carts = Cart::with('product')->where('user_id', $userId)->get();

        if ($carts->isEmpty()) {
            return redirect()->route('products.index')->withErrors(['cart' => 'Keranjang Anda kosong!']);
        }

        $subtotal = $carts->sum(function($item) {
            return $item->quantity * $item->product->price;
        });

        $tax = $subtotal * 0.12; // PPN 12%
        $totalPrice = $subtotal + $tax;

        DB::beginTransaction();
        try {
            // 1. Buat Data Pesanan (Order)
            $order = Order::create([
                'user_id' => $userId,
                'subtotal' => $subtotal,
                'tax_amount' => $tax,
                'total_price' => $totalPrice,
                'shipping_name' => $request->shipping_name,
                'shipping_phone' => $request->shipping_phone,
                'shipping_address' => $request->shipping_address,
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

            // 3. Konfigurasi Midtrans
            \Midtrans\Config::$serverKey = config('services.midtrans.server_key');
            \Midtrans\Config::$isProduction = config('services.midtrans.is_production');
            \Midtrans\Config::$isSanitized = true;
            \Midtrans\Config::$is3ds = true;

            $params = [
                'transaction_details' => [
                    'order_id' => 'PG-' . $order->id . '-' . time(),
                    'gross_amount' => $totalPrice,
                ],
                'customer_details' => [
                    'first_name' => $request->shipping_name,
                    'email' => auth()->user()->email,
                    'phone' => $request->shipping_phone,
                    'shipping_address' => [
                        'first_name' => $request->shipping_name,
                        'phone' => $request->shipping_phone,
                        'address' => $request->shipping_address,
                    ]
                ],
            ];

            // 4. Generate Snap Token
            $snapToken = \Midtrans\Snap::getSnapToken($params);
            $order->update(['snap_token' => $snapToken]);

            // 5. Kosongkan Keranjang
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
