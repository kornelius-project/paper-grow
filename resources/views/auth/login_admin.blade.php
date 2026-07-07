<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Paper Grow</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-50 min-h-screen flex items-center justify-center p-4">
    <div class="max-w-md w-full bg-white rounded-3xl shadow-xl border border-slate-100 overflow-hidden">
        <!-- Header -->
        <div class="bg-emerald-600 p-8 text-center">
            <h1 class="text-2xl font-black text-white tracking-tight">Ruang Kendali</h1>
            <p class="text-emerald-100 text-sm mt-1">Sistem Manajemen Paper Grow</p>
        </div>

        <!-- Form -->
        <div class="p-8">
            @if($errors->any())
                <div class="bg-red-50 border border-red-200 text-red-600 px-4 py-3 rounded-xl mb-6 text-sm">
                    {{ $errors->first() }}
                </div>
            @endif

            <form action="{{ route('login.admin.post') }}" method="POST" class="space-y-5">
                @csrf
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Email Admin</label>
                    <input type="email" name="email" value="{{ old('email') }}" required autofocus
                           class="w-full border border-slate-200 p-3.5 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 focus:outline-none transition-all"
                           placeholder="admin@papergrow.com">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Kata Sandi</label>
                    <input type="password" name="password" required
                           class="w-full border border-slate-200 p-3.5 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 focus:outline-none transition-all"
                           placeholder="••••••••">
                </div>

                <button type="submit" class="w-full bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-4 rounded-xl shadow-md hover:shadow-lg transition-all duration-200 mt-2">
                    Masuk ke Dashboard
                </button>
            </form>
            
            <div class="mt-8 text-center">
                <a href="{{ route('home') }}" class="text-sm text-slate-400 hover:text-emerald-600 font-medium transition-colors">
                    &larr; Kembali ke Beranda
                </a>
            </div>
        </div>
    </div>
</body>
</html>
