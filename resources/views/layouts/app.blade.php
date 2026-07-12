<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paper Grow - Green Edutech</title>
    <!-- Google Fonts: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Tailwind Play CDN -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #FBF9F6; /* Organic Cream */
            color: #1E352F; /* Deep Forest Green */
        }
        /* Styling Scrollbar Estetik */
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #FBF9F6; }
        ::-webkit-scrollbar-thumb { background: #86efac; border-radius: 4px; }
        ::-webkit-scrollbar-thumb:hover { background: #16a34a; }
    </style>
</head>
<body class="flex flex-col min-h-screen selection:bg-emerald-200 selection:text-emerald-900">

    <!-- Navbar / Header Website Modern -->
    <nav class="bg-white/80 backdrop-blur-md sticky top-0 z-50 shadow-sm border-b border-slate-100 px-6 py-4 flex justify-between items-center transition-all duration-300">
        
        <!-- Bagian Logo Kiri Modern & Sleek -->
        <a href="{{ route('home') }}" class="group flex items-center gap-3 active:scale-95 transition-transform duration-150">
            <div class="group-hover:rotate-6 transition-transform duration-300">
                <img src="{{ asset('images/logo.png') }}" alt="Logo Paper Grow" class="h-12 w-auto object-contain drop-shadow-sm">
            </div>
            <div class="flex flex-col justify-center">
                <span class="text-[22px] font-black text-[#1E352F] tracking-tight leading-none">Paper<span class="text-emerald-500 font-light">Grow</span></span>
                <span class="text-[8px] font-bold text-emerald-600/80 tracking-[0.2em] uppercase mt-1">
                    Green Edutech Platform
                </span>
            </div>
        </a>
        
        <!-- Bagian Menu Kanan Dinamis (Termasuk Panduan AR) -->
        <div class="space-x-1 sm:space-x-4 flex items-center relative">
            <a href="{{ route('home') }}" 
               class="px-3 py-2 rounded-lg text-xs sm:text-sm font-semibold transition-all duration-200 {{ Request::is('/') ? 'bg-green-50 text-green-700' : 'text-slate-600 hover:text-green-600 hover:bg-slate-50' }}">
                Beranda
            </a>
            <a href="{{ route('products.index') }}" 
               class="px-3 py-2 rounded-lg text-xs sm:text-sm font-semibold transition-all duration-200 {{ Request::is('products*') ? 'bg-green-50 text-green-700' : 'text-slate-600 hover:text-green-600 hover:bg-slate-50' }}">
                Toko / Produk
            </a>
            
            <!-- Dropdown Edukasi -->
            <div class="relative group">
                <button class="px-3 py-2 rounded-lg text-xs sm:text-sm font-semibold transition-all duration-200 flex items-center gap-1 {{ Request::is('edukasi*') || Request::is('panduan-ar') ? 'bg-green-50 text-green-700' : 'text-slate-600 hover:text-green-600 hover:bg-slate-50' }}">
                    Edukasi
                    <svg class="w-4 h-4 transition-transform group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>
                <!-- Dropdown Menu -->
                <div class="absolute top-full right-0 mt-2 w-56 bg-white border border-slate-100 rounded-xl shadow-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 transform origin-top-right group-hover:translate-y-0 translate-y-2 z-50">
                    <div class="p-2 space-y-1">
                        <a href="{{ route('edukasi.encyclopedia') }}" class="block px-4 py-2 text-sm text-slate-600 hover:bg-green-50 hover:text-green-700 rounded-lg font-medium transition-colors">
                            🌱 Ensiklopedia Bibit
                        </a>
                        <a href="{{ route('ar.guide') }}" class="block px-4 py-2 text-sm text-slate-600 hover:bg-green-50 hover:text-green-700 rounded-lg font-medium transition-colors">
                            📱 Panduan AR
                        </a>
                    </div>
                </div>
            </div>

            <a href="{{ route('partnership.index') }}" 
               class="px-3 py-2 rounded-lg text-xs sm:text-sm font-semibold transition-all duration-200 {{ Request::is('kemitraan-sekolah') ? 'bg-green-50 text-green-700' : 'text-slate-600 hover:text-green-600 hover:bg-slate-50' }}">
                Growth (B2B)
            </a>

            <a href="/about" 
               class="px-3 py-2 rounded-lg text-xs sm:text-sm font-semibold transition-all duration-200 {{ Request::is('about') ? 'bg-green-50 text-green-700' : 'text-slate-600 hover:text-green-600 hover:bg-slate-50' }}">
                Tentang Kami
            </a>

            <!-- Pemisah Garis Vertikal -->
            <div class="h-6 w-px bg-slate-200 mx-2 hidden sm:block"></div>

            @auth
                <!-- Menu Pengguna Terdaftar -->
                <div class="flex items-center gap-4">
                    <!-- Ikon Keranjang -->
                    @php
                        $cartCount = \App\Models\Cart::where('user_id', auth()->id())->sum('quantity');
                    @endphp
                    <a href="{{ route('cart.index') }}" class="relative text-slate-600 hover:text-emerald-600 transition-colors p-2">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                        @if($cartCount > 0)
                            <span class="absolute top-0 right-0 inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-white transform translate-x-1/2 -translate-y-1/4 bg-red-500 rounded-full">{{ $cartCount }}</span>
                        @endif
                    </a>

                    <div class="relative group">
                    <button class="px-3 py-2 rounded-lg text-xs sm:text-sm font-bold text-emerald-700 bg-emerald-50 hover:bg-emerald-100 transition-all duration-200 flex items-center gap-2 border border-emerald-100">
                        @if(auth()->user()->profile_photo)
                            <img src="{{ Storage::url(auth()->user()->profile_photo) }}" alt="Profile" class="w-6 h-6 rounded-full object-cover border border-emerald-200">
                        @else
                            <span class="w-6 h-6 rounded-full bg-emerald-200 flex items-center justify-center text-xs text-emerald-800">
                                {{ substr(auth()->user()->name, 0, 1) }}
                            </span>
                        @endif
                        <span class="hidden sm:inline">{{ explode(' ', auth()->user()->name)[0] }}</span>
                        <svg class="w-4 h-4 transition-transform group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <!-- Dropdown Akun -->
                    <div class="absolute top-full right-0 mt-2 w-48 bg-white border border-slate-100 rounded-xl shadow-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 transform origin-top-right group-hover:translate-y-0 translate-y-2 z-50 overflow-hidden">
                        <a href="{{ route('profile.index') }}" class="block px-4 py-3 text-sm font-bold text-slate-700 hover:bg-slate-50 border-b border-slate-100">
                            👤 Profil Saya
                        </a>
                        @if(auth()->user()->is_admin)
                            <a href="{{ route('admin.dashboard') }}" class="block px-4 py-3 text-sm font-bold text-slate-700 hover:bg-slate-50 border-b border-slate-100">
                                ⚙️ Ruang Admin
                            </a>
                        @endif
                        <form method="POST" action="{{ route('logout') }}" class="block">
                            @csrf
                            <button type="submit" class="w-full text-left px-4 py-3 text-sm font-bold text-red-500 hover:bg-red-50 transition-colors">
                                🚪 Log Out
                            </button>
                        </form>
                    </div>
                </div>
            @else
                <!-- Tombol Masuk/Daftar (Belum Login) -->
                <div class="flex items-center gap-2">
                    <a href="{{ route('login') }}" class="hidden sm:inline-block px-4 py-2 text-sm font-bold text-slate-600 hover:text-emerald-600 transition-colors">Masuk</a>
                    <a href="{{ route('register') }}" class="px-4 py-2 text-sm font-bold bg-[#1E352F] text-white rounded-lg hover:bg-emerald-600 transition-colors shadow-sm shadow-emerald-500/20 whitespace-nowrap">Daftar</a>
                </div>
            @endauth
        </div>
    </nav>

    <!-- Tempat Konten Utama Dinamis -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- Footer Website Informatif & Berbasis Kemitraan (SDG 17) -->
    <footer class="bg-green-950 text-white py-8 mt-12 text-sm border-t-4 border-emerald-500">
        <div class="max-w-6xl mx-auto px-4 flex flex-col sm:flex-row justify-between items-center gap-4">
            <div class="text-center sm:text-left">
                <p class="font-bold tracking-wide text-base">PAPER GROW INDONESIA</p>
                <!-- Menekankan kolaborasi strategis sesuai proposal Anda -->
                <p class="text-xs text-emerald-300/80 font-light mt-1 max-w-xl leading-relaxed">
                    Mengakselerasi SDG 17 melalui Kemitraan Edukasi Berkelanjutan bersama Universitas Kristen Satya Wacana (UKSW) Salatiga.
                </p>
            </div>
            <div class="text-xs text-emerald-400 font-medium bg-emerald-900/40 px-3 py-1.5 rounded-lg border border-emerald-800/60 whitespace-nowrap">
                &copy; 2026 Paper Grow UKSW Salatiga. All Rights Reserved.
            </div>
        </div>
    </footer>

</body>
</html>