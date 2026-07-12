@extends('layouts.app')

@section('content')
<div class="bg-[#F9F6F0] min-h-screen py-16">
    <div class="container mx-auto px-6 max-w-6xl">
        
        <!-- Header -->
        <div class="text-center mb-16">
            <span class="inline-block py-1 px-3 rounded-full bg-green-100 text-green-800 text-sm font-semibold tracking-wide mb-4">
                Pusat Edukasi Botani
            </span>
            <h1 class="text-4xl md:text-5xl font-extrabold text-[#1E352F] mb-6 tracking-tight">Ensiklopedia Bibit <span class="text-green-600">Paper Grow</span></h1>
            <p class="text-gray-600 text-lg max-w-2xl mx-auto leading-relaxed">
                Pelajari siklus hidup, kebutuhan nutrisi, dan fakta unik dari setiap bibit yang terkandung di dalam kertas daur ulang kami.
            </p>
        </div>

        <!-- Carousel Horizontal Modern -->
        <style>
            /* Menyembunyikan scrollbar tapi tetap bisa di-scroll */
            .hide-scrollbar::-webkit-scrollbar { display: none; }
            .hide-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
        </style>

        <div class="relative w-full group/carousel">
            <!-- Tombol Geser Kiri -->
            <button onclick="document.getElementById('seed-carousel').scrollBy({ left: -450, behavior: 'smooth' })" class="absolute top-1/2 -left-6 -translate-y-1/2 hidden lg:flex items-center justify-center w-14 h-14 bg-white rounded-full shadow-xl text-emerald-600 z-20 hover:bg-emerald-600 hover:text-white hover:scale-110 transition-all cursor-pointer border border-emerald-100 opacity-0 group-hover/carousel:opacity-100">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"></path></svg>
            </button>
            
            <!-- Tombol Geser Kanan -->
            <button onclick="document.getElementById('seed-carousel').scrollBy({ left: 450, behavior: 'smooth' })" class="absolute top-1/2 -right-6 -translate-y-1/2 hidden lg:flex items-center justify-center w-14 h-14 bg-white rounded-full shadow-xl text-emerald-600 z-20 hover:bg-emerald-600 hover:text-white hover:scale-110 transition-all cursor-pointer border border-emerald-100 opacity-0 group-hover/carousel:opacity-100">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path></svg>
            </button>

            <!-- Kontainer Scroll Geser -->
            <div id="seed-carousel" class="flex overflow-x-auto snap-x snap-mandatory gap-8 pb-16 pt-4 px-4 hide-scrollbar scroll-smooth">
                @foreach($seeds as $seed)
                    <div class="snap-center shrink-0 w-[85vw] md:w-[400px] bg-white rounded-[2rem] p-8 shadow-xl hover:shadow-2xl hover:-translate-y-3 transition-all duration-500 border border-emerald-50 group relative overflow-hidden flex flex-col justify-between">
                        
                        <!-- Ornamen Latar Belakang Kartu -->
                        <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-emerald-100/50 to-green-50/50 rounded-bl-[100px] -z-10 transition-transform duration-500 group-hover:scale-110"></div>

                        <div>
                            <!-- Slot Gambar (Otomatis muncul jika file tersedia) -->
                            @if(isset($seed['image_slot']))
                                <div class="w-full h-64 sm:h-72 mb-6 rounded-2xl overflow-hidden relative z-10 shadow-sm border border-slate-100 group-hover:shadow-md transition-shadow bg-slate-50">
                                    <img src="{{ asset('images/' . $seed['image_slot']) }}" 
                                         alt="{{ $seed['name'] }}" 
                                         class="w-full h-full object-cover {{ $seed['image_position'] ?? 'object-center' }} group-hover:scale-105 transition-transform duration-700"
                                         onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';"
                                    >
                                    <!-- Ikon Fallback (Muncul jika gambar belum diupload) -->
                                    <div class="hidden w-full h-full bg-gradient-to-br from-emerald-100 to-green-50 items-center justify-center text-6xl">
                                        {{ $seed['icon'] }}
                                    </div>
                                </div>
                            @else
                                <div class="flex items-start justify-between mb-8 relative z-10">
                                    <div class="w-20 h-20 bg-gradient-to-br from-emerald-100 to-green-50 rounded-2xl flex items-center justify-center text-5xl group-hover:scale-110 group-hover:rotate-12 transition-transform duration-500 shadow-inner border border-white">
                                        {{ $seed['icon'] }}
                                    </div>
                                </div>
                            @endif

                            <div class="flex items-start justify-between mb-4 relative z-10">
                                <span class="text-[10px] font-bold text-emerald-600 bg-emerald-50 border border-emerald-100 px-3 py-1.5 rounded-full uppercase tracking-widest shadow-sm">
                                    Bibit Edukasi
                                </span>
                            </div>

                            <h3 class="text-3xl font-black text-[#1E352F] mb-6 relative z-10">{{ $seed['name'] }}</h3>

                            <!-- Informasi Tumbuh (Pill Badges) -->
                            <div class="flex flex-wrap gap-2 mb-8 relative z-10">
                                <div class="bg-slate-50 border border-slate-100 px-3 py-2 rounded-xl flex items-center gap-2">
                                    <span class="text-lg">⏱️</span>
                                    <div>
                                        <div class="text-[9px] uppercase tracking-wider text-slate-400 font-bold">Waktu</div>
                                        <div class="text-xs font-semibold text-slate-700">{{ $seed['germination'] }}</div>
                                    </div>
                                </div>
                                <div class="bg-blue-50/50 border border-blue-100 px-3 py-2 rounded-xl flex items-center gap-2">
                                    <span class="text-lg">💧</span>
                                    <div>
                                        <div class="text-[9px] uppercase tracking-wider text-blue-400 font-bold">Air</div>
                                        <div class="text-xs font-semibold text-blue-700">{{ $seed['water'] }}</div>
                                    </div>
                                </div>
                                <div class="bg-amber-50/50 border border-amber-100 px-3 py-2 rounded-xl flex items-center gap-2">
                                    <span class="text-lg">☀️</span>
                                    <div>
                                        <div class="text-[9px] uppercase tracking-wider text-amber-500 font-bold">Matahari</div>
                                        <div class="text-xs font-semibold text-amber-700">{{ $seed['sunlight'] }}</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Fakta Unik -->
                            <div class="relative z-10">
                                <h4 class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-2 flex items-center gap-2">
                                    Fakta Sains Menarik
                                </h4>
                                <p class="text-sm text-slate-600 leading-relaxed font-light">
                                    {{ $seed['fact'] }}
                                </p>
                            </div>
                        </div>

                        <!-- Call to Action -->
                        <div class="mt-10 relative z-10">
                            <a href="{{ $seed['product_url'] }}" class="flex items-center justify-between w-full bg-slate-900 group-hover:bg-emerald-600 text-white font-bold px-6 py-4 rounded-2xl transition-colors duration-300 shadow-md">
                                <span>Coba Tanam Sekarang</span>
                                <span class="bg-white/20 p-1.5 rounded-full group-hover:translate-x-1 transition-transform">→</span>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Divider -->
        <div class="h-24"></div>

        <!-- NEW SECTION: Anatomi Kertas Benih -->
        <div class="bg-white rounded-[3rem] p-8 md:p-12 lg:p-16 shadow-xl shadow-emerald-900/5 border border-emerald-50 relative overflow-hidden mb-24">
            <!-- Ornamen Estetika Background -->
            <div class="absolute top-0 right-0 w-72 h-72 bg-emerald-50 rounded-full blur-[80px] -z-10"></div>
            <div class="absolute bottom-0 left-0 w-72 h-72 bg-green-50 rounded-full blur-[80px] -z-10"></div>
            
            <div class="text-center mb-16 relative z-10">
                <span class="text-xs font-bold text-emerald-600 uppercase tracking-widest bg-emerald-50 px-4 py-1.5 rounded-full border border-emerald-100 mb-4 inline-block">Mengenal Material</span>
                <h2 class="text-3xl md:text-4xl font-black text-slate-800 mb-4">Anatomi Kertas Ajaib Kami</h2>
                <p class="text-slate-500 max-w-2xl mx-auto font-light leading-relaxed">Apa rahasia di balik selembar kertas yang bisa menumbuhkan kehidupan? Berikut adalah 3 komponen inti ramah lingkungan penyusun Paper Grow.</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-10 relative z-10">
                <!-- Komponen 1 -->
                <div class="text-center group">
                    <div class="w-24 h-24 bg-gradient-to-br from-emerald-100 to-emerald-50 rounded-[2rem] flex items-center justify-center text-4xl mx-auto mb-6 group-hover:-translate-y-2 transition-transform shadow-sm border border-white">📜</div>
                    <h3 class="text-xl font-bold text-slate-800 mb-3">1. Pulp Daur Ulang</h3>
                    <p class="text-sm text-slate-500 leading-relaxed font-light">Terbuat dari 100% kertas bekas yang dihancurkan menjadi bubur tanpa bahan pemutih beracun. Berfungsi melindungi benih sekaligus menjaga kelembapan tanah.</p>
                </div>
                <!-- Komponen 2 -->
                <div class="text-center group">
                    <div class="w-24 h-24 bg-gradient-to-br from-amber-100 to-amber-50 rounded-[2rem] flex items-center justify-center text-4xl mx-auto mb-6 group-hover:-translate-y-2 transition-transform shadow-sm border border-white">🌱</div>
                    <h3 class="text-xl font-bold text-slate-800 mb-3">2. Benih Lokal Pilihan</h3>
                    <p class="text-sm text-slate-500 leading-relaxed font-light">Benih berkualitas unggul yang ditebarkan dan dikeringkan bersama pulp secara manual agar strukturnya tidak rusak dan siap berkecambah dengan cepat.</p>
                </div>
                <!-- Komponen 3 -->
                <div class="text-center group">
                    <div class="w-24 h-24 bg-gradient-to-br from-blue-100 to-blue-50 rounded-[2rem] flex items-center justify-center text-4xl mx-auto mb-6 group-hover:-translate-y-2 transition-transform shadow-sm border border-white">💧</div>
                    <h3 class="text-xl font-bold text-slate-800 mb-3">3. Tinta Ramah Tanah</h3>
                    <p class="text-sm text-slate-500 leading-relaxed font-light">Materi edukatif yang tercetak di atasnya menggunakan tinta nabati (*soy ink*) yang sepenuhnya dapat terurai secara biologis (*biodegradable*) di alam.</p>
                </div>
            </div>
        </div>

        <!-- Forum Tanya Jawab Sains -->
        <div id="chat-section" class="max-w-4xl mx-auto mb-24 mt-16">
            <div class="text-center mb-10">
                <span class="text-xs font-bold text-blue-600 uppercase tracking-widest bg-blue-50 px-4 py-1.5 rounded-full border border-blue-100 mb-4 inline-block">Forum Sains Cilik</span>
                <h2 class="text-3xl font-black text-slate-800 mb-4">Tanya Profesor Grow 👨‍🔬</h2>
                <p class="text-slate-500 font-light leading-relaxed max-w-2xl mx-auto">Ada pertanyaan seputar tanaman, proses fotosintesis, atau biologi? Tanyakan di sini dan akan dijawab langsung oleh pakar botani kami!</p>
            </div>
            
            <div class="bg-white rounded-[2rem] shadow-[0_20px_50px_rgba(0,0,0,0.05)] border border-slate-100 overflow-hidden flex flex-col h-[550px] relative">
                <!-- Chat Header -->
                <div class="bg-gradient-to-r from-emerald-600 to-green-500 px-6 py-4 flex items-center gap-4 shadow-md z-10">
                    <div class="w-12 h-12 bg-white rounded-full flex items-center justify-center text-2xl shadow-inner relative">
                        🌱
                        <div class="absolute bottom-0 right-0 w-3 h-3 bg-green-300 border-2 border-white rounded-full"></div>
                    </div>
                    <div>
                        <h3 class="text-white font-bold text-lg leading-tight">Laboratorium Paper Grow</h3>
                        <p class="text-emerald-100 text-xs flex items-center gap-1 font-medium">
                            <span class="w-1.5 h-1.5 rounded-full bg-green-300 animate-pulse"></span> Profesor Online
                        </p>
                    </div>
                </div>
                
                <!-- Chat Area -->
                <div class="flex-1 overflow-y-auto p-6 bg-slate-50 space-y-6 hide-scrollbar scroll-smooth" style="background-image: url('data:image/svg+xml,%3Csvg width=\'20\' height=\'20\' viewBox=\'0 0 20 20\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'%23cbd5e1\' fill-opacity=\'0.2\' fill-rule=\'evenodd\'%3E%3Ccircle cx=\'3\' cy=\'3\' r=\'3\'/%3E%3Ccircle cx=\'13\' cy=\'13\' r=\'3\'/%3E%3C/g%3E%3C/svg%3E');">
                    
                    @if(isset($chats) && $chats->count() > 0)
                        @foreach($chats->reverse() as $chat)
                            <div class="flex items-start gap-3 group mt-4 {{ $chat->is_admin ? '' : 'flex-row-reverse' }}">
                                <div class="w-10 h-10 rounded-full {{ $chat->is_admin ? 'bg-emerald-100 border-emerald-200' : 'bg-blue-100 border-blue-200' }} flex items-center justify-center text-lg shrink-0 shadow-sm border">{{ $chat->is_admin ? '👨‍🔬' : '👦' }}</div>
                                <div class="max-w-[80%]">
                                    <span class="text-[11px] text-slate-400 font-bold {{ $chat->is_admin ? 'ml-1' : 'mr-1 text-right' }} mb-1 block tracking-wide">{{ $chat->name }} ({{ $chat->role }}) • {{ $chat->created_at->diffForHumans() }}</span>
                                    <div class="{{ $chat->is_admin ? 'bg-emerald-100 border-emerald-200 text-emerald-900 rounded-tl-sm' : 'bg-white border-slate-200 text-slate-700 text-right rounded-tr-sm' }} p-4 rounded-2xl shadow-sm border text-sm leading-relaxed group-hover:shadow-md transition-shadow">
                                        {!! nl2br(e($chat->message)) !!}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <!-- Pesan Selamat Datang (Kiri - Bot/Admin) -->
                        <div class="flex items-start gap-3 group mt-4">
                            <div class="w-10 h-10 rounded-full bg-emerald-100 flex items-center justify-center text-lg shrink-0 shadow-sm border border-emerald-200">👨‍🔬</div>
                            <div class="max-w-[80%]">
                                <span class="text-[11px] text-slate-400 font-bold ml-1 mb-1 block tracking-wide">Profesor Grow • Baru Saja</span>
                                <div class="bg-emerald-100 p-4 rounded-2xl rounded-tl-sm shadow-sm border border-emerald-200 text-emerald-900 text-sm leading-relaxed group-hover:shadow-md transition-shadow">
                                    Halo, selamat datang di <b>Forum Sains Cilik!</b> 👋<br><br>Saya adalah Profesor Grow, asisten cerdas yang siap menjawab pertanyaanmu. Ada yang ingin kamu tanyakan seputar cara menanam Paper Grow, jenis bibit, atau ilmu botani lainnya? Ketik pertanyaanmu di bawah ya! 🌱✨
                                </div>
                            </div>
                        </div>
                    @endif
                </div>

                @auth
                <!-- Chat Input Real Form -->
                <form action="{{ route('edukasi.chat.store') }}" method="POST" class="bg-white p-4 border-t border-slate-100 flex gap-3 items-center shadow-[0_-5px_15px_rgba(0,0,0,0.02)] relative z-10">
                    @csrf
                    <input type="text" name="message" required placeholder="Tanyakan hal ilmiah seputar botani di sini..." class="flex-1 bg-slate-50 rounded-full px-5 py-3 text-sm text-slate-700 border border-slate-200 focus:outline-none focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 transition-all">
                    <button type="submit" class="bg-emerald-500 text-white w-12 h-12 rounded-full flex items-center justify-center hover:bg-emerald-600 hover:scale-105 transition-all shadow-md shrink-0">
                        <svg class="w-5 h-5 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path></svg>
                    </button>
                </form>
                @else
                <div class="bg-white p-6 border-t border-slate-100 flex flex-col items-center justify-center text-center shadow-[0_-5px_15px_rgba(0,0,0,0.02)] relative z-10">
                    <p class="text-slate-500 mb-3 text-sm">Untuk bertanya kepada Profesor Grow, silakan masuk ke akun Anda terlebih dahulu.</p>
                    <a href="{{ route('login') }}" class="px-6 py-2 bg-emerald-500 text-white text-sm font-bold rounded-full hover:bg-emerald-600 transition-colors shadow-sm">Masuk Akun</a>
                </div>
                @endauth
                <div class="px-4 py-2 bg-slate-50 text-center border-t border-slate-100 rounded-b-[2rem]">
                    <p class="text-[10px] text-slate-400">
                        *<strong class="font-semibold text-slate-500">Disclaimer:</strong> Profesor Grow adalah sistem AI otomatis yang <b>hanya dapat menjawab</b> pertanyaan seputar cara tanam, produk Paper Grow, dan pengetahuan botani dasar.
                    </p>
                </div>
            </div>
        </div>

        </div>

    </div>
</div>
<style>
    @keyframes bounce-x {
        0%, 100% { transform: translate(-50%, -50%); }
        50% { transform: translate(calc(-50% - 10px), -50%); }
    }
    .animate-bounce-x {
        animation: bounce-x 2s infinite;
    }
</style
@endsection
