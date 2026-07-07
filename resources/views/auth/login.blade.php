<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk - Paper Grow</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-50 font-sans antialiased text-slate-800 min-h-screen flex flex-col">

    <!-- Topbar Minimalis -->
    <header class="bg-white border-b border-slate-200 py-4 px-8 flex justify-between items-center">
        <a href="{{ route('home') }}" class="text-xl font-black tracking-tight text-[#1E352F]">
            Paper<span class="text-emerald-500">Grow</span>
        </a>
        <a href="{{ route('home') }}" class="text-sm font-bold text-slate-500 hover:text-emerald-600 transition-colors">
            &larr; Kembali ke Beranda
        </a>
    </header>

    <!-- Main Content -->
    <main class="flex-1 flex items-center justify-center p-6">
        <div class="w-full max-w-md">
            <!-- Box Login -->
            <div class="bg-white rounded-3xl shadow-xl shadow-slate-200/50 border border-slate-100 overflow-hidden">
                <div class="p-8 pb-6 bg-[#1E352F] text-center">
                    <h2 class="text-2xl font-black text-white mb-2">Selamat Datang Kembali</h2>
                    <p class="text-emerald-100/80 text-sm">Masuk untuk melanjutkan pesanan Anda.</p>
                </div>
                
                <div class="p-8">
                    @if ($errors->any())
                        <div class="bg-red-50 border border-red-200 text-red-600 px-4 py-3 rounded-xl mb-6 text-sm">
                            <ul class="list-disc list-inside">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login.post') }}" class="space-y-5">
                        @csrf
                        
                        <div>
                            <label for="email" class="block text-sm font-bold text-slate-700 mb-1.5">Alamat Email</label>
                            <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-slate-50 focus:bg-white focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors outline-none placeholder-slate-400" placeholder="nama@email.com">
                        </div>

                        <div>
                            <label for="password" class="block text-sm font-bold text-slate-700 mb-1.5">Kata Sandi</label>
                            <input type="password" id="password" name="password" required class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-slate-50 focus:bg-white focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors outline-none placeholder-slate-400" placeholder="••••••••">
                        </div>

                        <button type="submit" class="w-full bg-emerald-500 hover:bg-emerald-600 text-white font-bold py-3.5 rounded-xl transition-all shadow-md shadow-emerald-500/30 hover:shadow-lg hover:-translate-y-0.5 mt-2">
                            Masuk
                        </button>
                    </form>
                </div>
                
                <div class="bg-slate-50 border-t border-slate-100 p-6 text-center">
                    <p class="text-sm text-slate-600">
                        Belum punya akun? 
                        <a href="{{ route('register') }}" class="font-bold text-emerald-600 hover:text-emerald-700 transition-colors">Daftar sekarang</a>
                    </p>
                </div>
            </div>
        </div>
    </main>

</body>
</html>
