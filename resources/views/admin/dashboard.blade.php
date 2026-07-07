@extends('admin.layout')

@section('title', 'Dashboard')
@section('header', 'Ringkasan Bisnis')

@section('content')
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
        <!-- Card Total Produk -->
        <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-100 flex items-center gap-5 hover:shadow-md transition-shadow">
            <div class="w-14 h-14 rounded-full bg-emerald-50 flex items-center justify-center text-emerald-600 text-2xl">
                📦
            </div>
            <div>
                <p class="text-sm font-bold text-slate-500 uppercase tracking-wider">Total Produk</p>
                <h3 class="text-3xl font-black text-slate-800">{{ $totalProducts }}</h3>
            </div>
        </div>

        <!-- Card Total Kemitraan -->
        <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-100 flex items-center gap-5 hover:shadow-md transition-shadow">
            <div class="w-14 h-14 rounded-full bg-blue-50 flex items-center justify-center text-blue-600 text-2xl">
                🏫
            </div>
            <div>
                <p class="text-sm font-bold text-slate-500 uppercase tracking-wider">Demo B2B</p>
                <h3 class="text-3xl font-black text-slate-800">{{ $totalPartnerships }}</h3>
            </div>
        </div>
        
        <!-- Card Jalan Pintas Kelola Produk -->
        <a href="{{ route('admin.products.index') }}" class="bg-gradient-to-br from-emerald-500 to-green-600 rounded-2xl p-6 shadow-md shadow-emerald-600/20 text-white flex items-center justify-between group hover:-translate-y-1 transition-all duration-300">
            <div>
                <h3 class="text-xl font-bold mb-1">Kelola Produk</h3>
                <p class="text-emerald-100 text-sm">Lihat atau tambah varian baru</p>
            </div>
            <div class="w-10 h-10 rounded-full bg-white/20 flex items-center justify-center text-xl group-hover:scale-110 transition-transform">
                +
            </div>
        </a>
    </div>
    
    <!-- Informasi Sistem -->
    <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-8 text-center max-w-2xl mx-auto mt-12">
        <div class="text-4xl mb-4">🌱</div>
        <h2 class="text-xl font-bold text-slate-800 mb-2">Selamat Datang di Ruang Kendali Paper Grow</h2>
        <p class="text-slate-500 text-sm leading-relaxed">
            Dari panel ini, Anda memiliki kendali penuh atas toko Anda. Anda bisa mengatur katalog produk, menambah jumlah stok, mengubah gambar, dan segera akan bisa memantau prospek penjualan B2B. Semua data tersinkronisasi langsung dengan Halaman Depan.
        </p>
    </div>
@endsection
