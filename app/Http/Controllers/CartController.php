<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    // Tampilkan isi keranjang
    public function index()
    {
        $carts = Cart::with('product')->where('user_id', auth()->id())->get();
        
        $subtotal = $carts->sum(function($item) {
            return $item->quantity * $item->product->price;
        });

        $tax = $subtotal * 0.12; // PPN 12%
        $total = $subtotal + $tax;

        return view('cart.index', compact('carts', 'subtotal', 'tax', 'total'));
    }

    // Tambah ke keranjang
    public function add(Request $request, Product $product)
    {
        $cartItem = Cart::where('user_id', auth()->id())
                        ->where('product_id', $product->id)
                        ->first();

        if ($cartItem) {
            $cartItem->increment('quantity');
        } else {
            Cart::create([
                'user_id' => auth()->id(),
                'product_id' => $product->id,
                'quantity' => 1
            ]);
        }

        return redirect()->route('cart.index')->with('success', 'Produk berhasil ditambahkan ke keranjang!');
    }

    // Update jumlah (quantity)
    public function update(Request $request, Cart $cart)
    {
        if ($cart->user_id !== auth()->id()) abort(403);

        $request->validate(['quantity' => 'required|integer|min:1']);
        $cart->update(['quantity' => $request->quantity]);

        return back()->with('success', 'Jumlah produk diperbarui.');
    }

    // Hapus dari keranjang
    public function destroy(Cart $cart)
    {
        if ($cart->user_id !== auth()->id()) abort(403);
        
        $cart->delete();
        return back()->with('success', 'Produk dihapus dari keranjang.');
    }
}
