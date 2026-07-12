@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto px-4 sm:px-6 py-12">
    <!-- Breadcrumb -->
    <nav class="flex mb-8 text-sm font-bold text-slate-500">
        <a href="{{ route('home') }}" class="hover:text-emerald-600 transition-colors">Beranda</a>
        <span class="mx-2">/</span>
        <a href="{{ route('products.index') }}" class="hover:text-emerald-600 transition-colors">Katalog</a>
        <span class="mx-2">/</span>
        <span class="text-slate-800">{{ $product->name }}</span>
    </nav>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-start">
        <!-- Gambar Produk -->
        <div class="bg-white p-8 rounded-3xl shadow-xl shadow-slate-200/50 border border-slate-100 flex items-center justify-center sticky top-24">
            <img src="{{ asset('images/' . ($product->image ?? 'product-mockup.png')) }}" alt="{{ $product->name }}" class="w-full h-auto max-w-sm object-cover drop-shadow-xl hover:scale-105 transition-transform duration-500">
        </div>

        <!-- Detail Info Produk -->
        <div>
            <!-- Badge Kategori -->
            <span class="inline-block px-3 py-1 bg-emerald-100 text-emerald-700 text-xs font-black uppercase tracking-wider rounded-full mb-4">
                Kertas Benih Organik
            </span>
            
            <h1 class="text-4xl sm:text-5xl font-black text-[#1E352F] mb-4 leading-tight">{{ $product->name }}</h1>
            
            <div class="flex items-center gap-4 mb-6">
                <span class="text-3xl font-black text-emerald-600">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                <span class="px-2 py-1 bg-slate-100 text-slate-600 font-bold text-sm rounded-lg border border-slate-200">
                    Stok: {{ $product->stock }} lbr
                </span>
            </div>

            <!-- Deskripsi -->
            <div class="prose prose-emerald prose-lg text-slate-600 mb-8">
                <p class="leading-relaxed">
                    {{ $product->description ?? 'Produk kertas benih ramah lingkungan dari Paper Grow. Kertas ini tidak hanya bisa ditulisi, tapi juga ditanam untuk menumbuhkan tanaman organik yang cantik. Solusi tepat untuk mengurangi sampah kertas sambil menghijaukan bumi.' }}
                </p>
                <ul class="font-bold text-sm space-y-2 mt-4 text-slate-700">
                    <li>🌱 Mudah ditanam, tumbuh dalam 7-14 hari</li>
                    <li>♻️ 100% dari kertas daur ulang (Eco-friendly)</li>
                    <li>💧 Menyerap air dengan optimal</li>
                </ul>
            </div>

            <!-- Bagian Pemesanan -->
            <div class="bg-slate-50 p-6 rounded-3xl border border-slate-100">
                <p class="font-bold text-slate-700 mb-4 text-sm">Pilih jumlah pesanan:</p>
                
                @auth
                    <!-- Tombol Tambah ke Keranjang (Jika sudah login) -->
                    <form action="{{ route('cart.add', $product->id) }}" method="POST" class="flex flex-col sm:flex-row gap-4">
                        @csrf
                        <button type="submit" class="flex-1 bg-gradient-to-r from-emerald-500 to-green-600 hover:from-emerald-600 hover:to-green-700 text-white font-black py-4 rounded-2xl text-lg shadow-xl shadow-emerald-500/30 transition-all duration-300 transform hover:-translate-y-1 text-center">
                            🛒 Tambah ke Keranjang
                        </button>
                    </form>
                @else
                    <!-- Peringatan Login (Jika belum login) -->
                    <div class="text-center">
                        <a href="{{ route('login') }}" class="block w-full bg-slate-800 hover:bg-slate-900 text-white font-black py-4 rounded-2xl text-lg shadow-xl shadow-slate-800/20 transition-all duration-300 transform hover:-translate-y-1 text-center mb-3">
                            🔒 Masuk untuk Membeli
                        </a>
                        <p class="text-xs font-bold text-slate-500">Anda harus mendaftar/masuk terlebih dahulu.</p>
                    </div>
                @endauth
            </div>
        </div>
    </div>
</div>
@endsection


