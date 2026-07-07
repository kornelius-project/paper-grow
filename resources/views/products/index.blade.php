@extends('layouts.app')

@section('content')
<div class="bg-gradient-to-b from-slate-50 to-white min-h-screen py-16 px-4">
    <div class="max-w-6xl mx-auto">
        <!-- Header Section -->
        <div class="text-center mb-16">
            <span class="text-xs font-bold text-green-700 bg-green-50 border border-green-200/60 px-3 py-1.5 rounded-full uppercase tracking-widest">
                Katalog Green Edutech
            </span>
            <h1 class="text-3xl sm:text-4xl font-black text-slate-900 tracking-tight mt-3 mb-4">
                Varian Kertas Benih Sayuran
            </h1>
            <p class="text-slate-500 text-sm max-w-xl mx-auto font-light leading-relaxed">
                Setiap paket diproduksi dari daur ulang kertas sisa secara sfc dan dilengkapi dengan QR Code terintegrasi platform visualisasi 3D AR interaktif.
            </p>
        </div>

        <!-- NEW: Trust Badges -->
        <div class="flex flex-wrap justify-center gap-3 md:gap-6 mb-10">
            <div class="flex items-center gap-2 bg-white px-5 py-2.5 rounded-full shadow-sm border border-emerald-100 hover:scale-105 transition-transform">
                <span class="text-xl">🌱</span>
                <span class="text-xs font-bold text-slate-700">100% Organik</span>
            </div>
            <div class="flex items-center gap-2 bg-white px-5 py-2.5 rounded-full shadow-sm border border-emerald-100 hover:scale-105 transition-transform">
                <span class="text-xl">♻️</span>
                <span class="text-xs font-bold text-slate-700">Zero Waste</span>
            </div>
            <div class="flex items-center gap-2 bg-white px-5 py-2.5 rounded-full shadow-sm border border-emerald-100 hover:scale-105 transition-transform">
                <span class="text-xl">🛡️</span>
                <span class="text-xs font-bold text-slate-700">Garansi Tumbuh</span>
            </div>
        </div>



        <!-- Grid Produk Modern -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @if($products->isEmpty())
                <div class="col-span-1 md:col-span-3 text-center py-16 bg-white rounded-3xl border border-dashed border-slate-200 shadow-sm">
                    <p class="text-slate-400 text-sm font-light">Belum ada data produk di database. Silakan jalankan seeder kembali.</p>
                </div>
            @else
                @foreach($products as $product)
                <div class="group bg-white rounded-3xl border border-slate-100 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex flex-col overflow-hidden">
                    
                    <!-- Frame Gambar Produk Estetik -->
                    <div class="relative aspect-square md:aspect-[4/3] w-full bg-slate-100 overflow-hidden border-b border-slate-50">
                        <!-- Menggunakan gambar dinamis dari database (fallback ke product-mockup.png) -->
                        <img src="{{ asset('images/' . ($product->image ?? 'product-mockup.png')) }}" 
                             alt="Kemasan {{ $product->name }}" 
                             onerror="this.src='https://placehold.co/600x600/e2e8f0/64748b?text=Foto+Produk+Menyusul'"
                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        
                        <!-- Badge Varian Sayur di Atas Gambar -->
                        <span class="absolute top-4 left-4 text-[10px] font-bold text-green-800 bg-white/90 backdrop-blur-sm shadow-sm px-2.5 py-1 rounded-md uppercase tracking-wider">
                            🥦 {{ $product->seed_type }}
                        </span>
                    </div>

                    <!-- Detail Isi Produk -->
                    <div class="p-6 flex flex-col flex-grow justify-between">
                        <div>
                            <h2 class="text-xl font-black text-slate-900 group-hover:text-emerald-700 transition-colors mb-2 leading-snug">
                                {{ $product->name }}
                            </h2>
                            <p class="text-slate-500 text-[13px] font-light leading-relaxed text-justify mb-4 line-clamp-3">
                                {{ $product->description }}
                            </p>
                            
                            <!-- Harga (Psychological Pricing Dinamis) -->
                            <div class="flex items-end gap-2 mb-4">
                                <span class="text-2xl font-black text-emerald-600">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                                <span class="text-sm font-medium text-slate-400 line-through mb-1">Rp {{ number_format($product->price + 10000, 0, ',', '.') }}</span>
                                <span class="text-[10px] font-bold text-red-500 bg-red-50 border border-red-100 px-2 py-0.5 rounded-md mb-1 ml-auto">HEMAT</span>
                            </div>
                            
                            <!-- Atribut Spesifikasi Kertas -->
                            <div class="bg-slate-50/80 rounded-xl p-3 border border-slate-100/50 mb-6 space-y-1.5 text-[11px] text-slate-600 font-light">
                                <div class="flex justify-between">
                                    <span>Dimensi Lembar:</span>
                                    <span class="font-medium text-slate-800">{{ $product->size }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span>Isi Kemasan:</span>
                                    <span class="font-medium text-slate-800">{{ $product->sheets_per_pack }} Lembar / Pack</span>
                                </div>
                                
                                <!-- Stok Progress Bar (Urgency/FOMO) -->
                                <div class="pt-3 mt-3 border-t border-slate-200/80">
                                    <div class="flex justify-between items-center mb-1.5">
                                        <span class="font-bold text-slate-700">Sisa Stok: {{ $product->stock }} Paket</span>
                                        <span class="text-[10px] font-bold text-orange-600 bg-orange-50 px-1.5 py-0.5 rounded animate-pulse">Cepat Habis!</span>
                                    </div>
                                    <div class="w-full bg-slate-200 rounded-full h-1.5">
                                        <!-- Simulasi lebar progress bar berdasarkan stok (asumsi maks stok ideal 100) -->
                                        <div class="bg-gradient-to-r from-orange-400 to-red-500 h-1.5 rounded-full" style="width: {{ min(100, max(10, ($product->stock / 100) * 100)) }}%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                            <!-- Aksi Interaktif -->
                            <div class="flex gap-2">
                                <a href="{{ route('products.show', $product->id) }}" class="flex-1 bg-white border-2 border-slate-200 hover:border-emerald-500 hover:text-emerald-600 text-slate-600 font-bold py-2.5 rounded-xl text-xs text-center transition-all duration-300">
                                    Lihat Detail
                                </a>
                                @auth
                                    <form action="{{ route('cart.add', $product->id) }}" method="POST" class="flex-1">
                                        @csrf
                                        <button type="submit" class="w-full bg-gradient-to-r from-emerald-500 to-green-600 hover:from-emerald-600 hover:to-green-700 text-white font-bold py-2.5 rounded-xl text-xs text-center shadow-lg shadow-emerald-500/30 transition-all duration-300 transform hover:-translate-y-0.5">
                                            🛒 Tambah
                                        </button>
                                    </form>
                                @else
                                    <a href="{{ route('login') }}" class="flex-1 bg-slate-800 hover:bg-slate-900 text-white font-bold py-2.5 rounded-xl text-xs text-center shadow-md transition-all duration-300" title="Harus masuk ke akun Anda">
                                        Masuk u/ Beli
                                    </a>
                                @endauth
                            </div>
                    </div>

                </div>
                @endforeach
            @endif
        </div>
    </div>
</div>
@endsection