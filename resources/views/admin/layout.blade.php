<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard') - Paper Grow</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-50 font-sans antialiased text-slate-800">

    <div class="flex h-screen overflow-hidden">
        
        <!-- Sidebar Navigation -->
        <aside class="w-64 bg-[#1E352F] text-white flex flex-col hidden md:flex">
            <div class="p-6 border-b border-white/10 flex items-center justify-between">
                <span class="text-xl font-black tracking-tight text-white">Paper<span class="text-emerald-400">Grow</span> Admin</span>
            </div>
            
            <div class="flex-1 overflow-y-auto py-4">
                <nav class="flex-1 mt-6 px-4 space-y-2">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl transition-colors {{ Request::is('admin/dashboard') ? 'bg-[#1E352F] text-white' : 'text-slate-600 hover:bg-slate-100 hover:text-[#1E352F]' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                    <span class="font-bold">Dashboard</span>
                </a>
                <a href="{{ route('admin.orders.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl transition-colors {{ Request::is('admin/orders*') ? 'bg-[#1E352F] text-white' : 'text-slate-600 hover:bg-slate-100 hover:text-[#1E352F]' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
                    <span class="font-bold">Pesanan Masuk</span>
                </a>
                <a href="{{ route('admin.products.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl transition-colors {{ Request::is('admin/products') ? 'bg-[#1E352F] text-white' : 'text-slate-600 hover:bg-slate-100 hover:text-[#1E352F]' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                    <span class="font-bold">Kelola Produk</span>
                </a>
                <a href="{{ route('admin.partnerships.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl transition-colors {{ Request::is('admin/partnerships') ? 'bg-[#1E352F] text-white' : 'text-slate-600 hover:bg-slate-100 hover:text-[#1E352F]' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                    <span class="font-bold">Demo B2B</span>
                </a>
            </nav>
            </div>
            
            <!-- Bottom Sidebar (Logout) -->
            <div class="p-4 border-t border-white/10">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full flex items-center gap-3 px-4 py-3 text-sm text-red-300 hover:bg-red-500/10 hover:text-red-400 rounded-xl transition-colors">
                        <span>🚪</span> Log Out
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main Content Area -->
        <main class="flex-1 relative overflow-y-auto focus:outline-none">
            <!-- Topbar (Mobile support) -->
            <header class="bg-white border-b border-slate-200 sticky top-0 z-10 px-8 py-4 flex justify-between items-center hidden md:flex">
                <h2 class="text-xl font-bold text-slate-800">@yield('header')</h2>
                <div class="flex items-center gap-4">
                    <span class="text-sm font-medium text-slate-500">Halo, {{ auth()->user()->name }}</span>
                    <div class="w-10 h-10 rounded-full bg-emerald-100 border-2 border-emerald-200 flex items-center justify-center text-emerald-700 font-bold">
                        A
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <div class="p-8">
                @if(session('success'))
                    <div class="bg-emerald-50 border border-emerald-200 text-emerald-700 px-4 py-3 rounded-xl mb-6 text-sm font-medium flex items-center gap-2 shadow-sm">
                        <span>✅</span> {{ session('success') }}
                    </div>
                @endif
                
                @yield('content')
            </div>
        </main>
    </div>

</body>
</html>
