<?php

namespace App\Http\Controllers;

// PASTIKAN BARIS INI ADA DI SINI:
use App\Models\Product; 
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        // Auto-fix gambar tomat secara langsung
        Product::where('name', 'like', '%Tomat%')->update([
            'image' => 'tomat.jpeg',
            'seed_type' => 'Tomat'
        ]);

        // Mengambil semua data produk dari database
        $products = Product::all();

        // Mengirim data produk ke file view 'products.index'
        return view('products.index', compact('products'));
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }
}