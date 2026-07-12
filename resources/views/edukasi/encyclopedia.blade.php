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
                            <div class="flex items-start justify-between mb-8 relative z-10">
                                <div class="w-20 h-20 bg-gradient-to-br from-emerald-100 to-green-50 rounded-2xl flex items-center justify-center text-5xl group-hover:scale-110 group-hover:rotate-12 transition-transform duration-500 shadow-inner border border-white">
                                    {{ $seed['icon'] }}
                                </div>
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
