<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AdminProductController extends Controller
{
    // READ: Menampilkan daftar produk
    public function index()
    {
        $products = Product::latest()->get();
        return view('admin.products.index', compact('products'));
    }

    // Menampilkan form tambah produk
    public function create()
    {
        return view('admin.products.create');
    }

    // CREATE: Menyimpan produk baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'seed_type' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'description' => 'required',
            'image_file' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $data = $request->except('image_file');

        // Handle upload foto produk baru
        if ($request->hasFile('image_file')) {
            $imageName = time() . '.' . $request->image_file->extension();  
            $request->image_file->move(public_path('images'), $imageName);
            $data['image'] = $imageName;
        } else {
            // Default gambar jika tidak diupload
            $data['image'] = 'product-mockup.png';
        }

        Product::create($data);

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil ditambahkan!');
    }

    // Menampilkan form edit
    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    // UPDATE: Menyimpan perubahan produk
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'seed_type' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'description' => 'required',
            'image_file' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $data = $request->except('image_file');

        // Handle ganti foto produk
        if ($request->hasFile('image_file')) {
            // Hapus gambar lama jika ada dan bukan default mockup
            if ($product->image && $product->image != 'product-mockup.png' && File::exists(public_path('images/' . $product->image))) {
                File::delete(public_path('images/' . $product->image));
            }

            $imageName = time() . '.' . $request->image_file->extension();  
            $request->image_file->move(public_path('images'), $imageName);
            $data['image'] = $imageName;
        }

        $product->update($data);

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil diperbarui!');
    }

    // DELETE: Menghapus produk
    public function destroy(Product $product)
    {
        if ($product->image && $product->image != 'product-mockup.png' && File::exists(public_path('images/' . $product->image))) {
            File::delete(public_path('images/' . $product->image));
        }
        
        $product->delete();
        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil dihapus!');
    }
}
