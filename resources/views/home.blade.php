@extends('layouts.app')

@section('content')
<!-- Hero Section (Daya Tarik Promosi Utama) -->
<div class="relative bg-gradient-to-br from-[#FBF9F6] via-green-50 to-white pt-32 pb-24 px-4 overflow-hidden border-b border-green-100">
    <!-- Ornamen Geometris / Mesh Grid -->
    <div class="absolute inset-0 opacity-[0.03] bg-[linear-gradient(to_right,#000_1px,transparent_1px),linear-gradient(to_bottom,#000_1px,transparent_1px)] bg-[size:4rem_4rem]"></div>
    <div class="absolute -top-32 -left-32 w-96 h-96 bg-emerald-200/40 rounded-full blur-3xl mix-blend-multiply"></div>
    <div class="absolute top-20 right-0 w-80 h-80 bg-green-200/40 rounded-full blur-3xl mix-blend-multiply"></div>

    <div class="relative max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
        <!-- Kolom Kiri: Copywriting & CTA -->
        <div class="text-left space-y-8 relative z-10">
            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full text-xs font-bold bg-white border border-emerald-100 text-emerald-700 uppercase tracking-widest shadow-sm">
                <span class="relative flex h-2 w-2">
                  <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                  <span class="relative inline-flex rounded-full h-2 w-2 bg-emerald-500"></span>
                </span>
                Revolusi Edukasi Lingkungan
            </div>
            
            <h1 class="text-5xl sm:text-6xl lg:text-7xl font-black text-[#1E352F] tracking-tight leading-[1.1]">
                Menanam <span class="text-transparent bg-clip-text bg-gradient-to-r from-emerald-600 to-green-500">Fisik</span>, Belajar Secara <span class="text-emerald-500">Digital</span>.
            </h1>
            
            <p class="text-lg sm:text-xl text-slate-600 leading-relaxed max-w-xl font-light">
                Paper Grow memadukan keajaiban daur ulang kertas benih premium dengan kecanggihan teknologi <strong>Augmented Reality (AR)</strong> untuk sekolah dan rumah Anda.
            </p>
            
            <div class="flex flex-col sm:flex-row gap-4 pt-4">
                <a href="{{ route('products.index') }}" class="group relative flex items-center justify-center gap-3 bg-emerald-600 hover:bg-emerald-700 text-white font-bold px-8 py-4 rounded-2xl shadow-xl shadow-emerald-600/20 transition-all duration-300 hover:-translate-y-1">
                    <span>Eksplorasi Varian Sayur</span>
                    <svg class="w-5 h-5 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                </a>
                <a href="{{ route('partnership.index') }}" class="flex items-center justify-center bg-white hover:bg-slate-50 text-slate-700 font-bold px-8 py-4 rounded-2xl border border-slate-200 shadow-sm transition-all duration-300 hover:-translate-y-1">
                    Ajukan Demo (B2B)
                </a>
            </div>
            
            <div class="flex items-center gap-6 pt-6 border-t border-slate-200/60 max-w-md">
                <div class="flex -space-x-3">
                    <div class="w-10 h-10 rounded-full bg-emerald-100 border-2 border-white flex items-center justify-center text-sm shadow-sm z-30">👨‍🏫</div>
                    <div class="w-10 h-10 rounded-full bg-green-100 border-2 border-white flex items-center justify-center text-sm shadow-sm z-20">👩‍🎓</div>
                    <div class="w-10 h-10 rounded-full bg-blue-100 border-2 border-white flex items-center justify-center text-sm shadow-sm z-10">🌍</div>
                </div>
                <div class="text-xs text-slate-500 font-medium leading-relaxed">
                    Dipercaya oleh pendidik pendukung<br><strong class="text-emerald-700">Kurikulum Merdeka</strong>
                </div>
            </div>
        </div>

        <!-- Kolom Kanan: Grafis / Gambar Produk (Besar & Jelas) -->
        <div class="relative hidden lg:flex items-center justify-center h-full">
            <!-- Glow background statis agar gambar lebih menonjol -->
            <div class="absolute w-[500px] h-[500px] bg-gradient-to-tr from-emerald-300/30 to-green-200/30 rounded-full blur-3xl z-0"></div>
            
            <!-- Wadah Gambar Utama (Dibuat Lebih Estetik & Proporsional) -->
            <div class="relative z-10 w-[85%] max-w-sm mt-4 group">
                <!-- Gambar Produk Asli -->
                <img src="{{ asset('images/paper-grow beranda.png') }}?v=2" 
                     alt="Produk Paper Grow" 
                     onerror="this.src='{{ asset('images/paper-grow beranda.jpg') }}'"
                     class="w-full h-auto object-contain drop-shadow-[0_20px_40px_rgba(16,185,129,0.3)] rounded-[2rem] transform group-hover:-translate-y-2 group-hover:scale-105 transition-all duration-500 relative z-10 border-4 border-white">
                
                <!-- Floating Badge 1 (Statis) -->
                <div class="absolute -left-10 top-10 bg-white px-5 py-3 rounded-2xl shadow-xl border border-slate-100 flex items-center gap-3 transform -rotate-6 z-20 hover:scale-110 hover:rotate-0 transition-transform">
                    <span class="text-2xl">♻️</span>
                    <div class="flex flex-col">
                        <span class="text-[10px] text-slate-400 font-bold uppercase tracking-wider">Material</span>
                        <span class="text-sm font-black text-[#1E352F]">100% Recycled</span>
                    </div>
                </div>

                <!-- Floating Badge 2 (Statis) -->
                <div class="absolute -right-6 bottom-12 bg-gradient-to-r from-emerald-600 to-green-500 px-5 py-3 rounded-2xl shadow-xl shadow-emerald-500/30 flex items-center gap-3 transform rotate-6 z-20 hover:scale-110 hover:rotate-0 transition-transform">
                    <span class="text-2xl">📱</span>
                    <span class="text-sm font-black text-white">Teknologi AR</span>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Section Penjelasan: Apa itu Paper Grow? (Sisi Edukatif) -->
<div class="py-20 max-w-6xl mx-auto px-4">
    <div class="text-center mb-16">
        <h2 class="text-3xl font-bold text-slate-900 mb-4">Apa itu Paper Grow?</h2>
        <div class="w-16 h-1 bg-green-500 mx-auto rounded-full"></div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
        <div class="space-y-6 text-justify">
            <p class="text-slate-600 leading-relaxed">
                Di Indonesia, sampah padat khususnya limbah kertas merupakan tantangan ekologis yang sangat besar. Pada tahun 2023 saja, produksi limbah kertas mencapai sekitar 3,9 juta ton. Paper Grow hadir sebagai jawaban kreatif atas permasalahan tersebut melalui konsep ekonomi sirkular mengubah limbah kertas menjadi produk kertas benih siap tanam yang bernilai tinggi.
            </p>
            <p class="text-slate-600 leading-relaxed">
                Tidak sekadar kertas benih biasa, produk kami dirancang sebagai media ajar sains interaktif. Melalui kode QR yang tertanam di setiap kemasan dan terhubung ke sistem visualisasi 3D, siswa sekolah dasar dapat memindai kertas benih untuk memvisualisasikan model anatomi tanaman secara 3D dan mempelajari siklus hidupnya secara visual interaktif.
            </p>
        </div>
        
        <!-- Box Infografis Keunggulan Pendidikan -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <div class="p-5 bg-white border border-slate-100 rounded-2xl shadow-sm hover:shadow-md transition-shadow">
                <div class="text-2xl mb-2">📚</div>
                <h4 class="font-bold text-slate-800 mb-1">Kurikulum Merdeka</h4>
                <p class="text-xs text-slate-500 leading-relaxed">Sangat cocok untuk mendukung pembelajaran berbasis proyek (Project-Based Learning) dan materi sains dasar.</p>
            </div>
            <div class="p-5 bg-white border border-slate-100 rounded-2xl shadow-sm hover:shadow-md transition-shadow">
                <div class="text-2xl mb-2">♻️</div>
                <h4 class="font-bold text-slate-800 mb-1">Daur Ulang Nyata</h4>
                <p class="text-xs text-slate-500 leading-relaxed">Mengedukasi anak-anak mengenai penanganan limbah secara berkelanjutan sejak usia dini.</p>
            </div>
            <div class="p-5 bg-white border border-slate-100 rounded-2xl shadow-sm hover:shadow-md transition-shadow">
                <div class="text-2xl mb-2">📱</div>
                <h4 class="font-bold text-slate-800 mb-1">Teknologi AR Resmi</h4>
                <p class="text-xs text-slate-500 leading-relaxed">Menggunakan teknologi WebAR yang dapat diakses langsung tanpa aplikasi tambahan oleh siswa dan guru di seluruh Indonesia.</p>
            </div>
            <div class="p-5 bg-white border border-slate-100 rounded-2xl shadow-sm hover:shadow-md transition-shadow">
                <div class="text-2xl mb-2">🥬</div>
                <h4 class="font-bold text-slate-800 mb-1">Tanaman Pangan</h4>
                <p class="text-xs text-slate-500 leading-relaxed">Menggunakan bibit sayuran konsumsi harian (Bayam, Sawi, Selada) untuk memupuk jiwa urban farming.</p>
            </div>
        </div>
    </div>
</div>

<!-- Section Demonstrasi AR (Edukasi Digital) -->
<div class="py-20 bg-slate-900 text-white px-4 border-y border-emerald-900">
    <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
        <!-- Kolom Kiri: Penjelasan & Tombol -->
        <div class="space-y-6">
            <span class="text-xs font-bold text-emerald-400 bg-emerald-900/50 border border-emerald-700/50 px-3 py-1.5 rounded-full uppercase tracking-widest">
                Pengalaman Augmented Reality
            </span>
            <h2 class="text-3xl sm:text-4xl font-black text-white leading-tight">
                Jelajahi Anatomi Tumbuhan dalam <span class="text-emerald-400">Dimensi 3D</span>
            </h2>
            <p class="text-slate-300 leading-relaxed text-justify">
                Kami memahami bahwa proses biologis tanaman terkadang sulit diamati dengan mata telanjang. Melalui integrasi dengan teknologi <strong>WebAR Native</strong>, setiap produk Paper Grow dilengkapi dengan <i>marker</i> AR khusus. 
            </p>
            <p class="text-slate-300 leading-relaxed text-justify mb-8">
                Cukup pindai kertas benih Anda menggunakan aplikasi ponsel, dan visualisasi 3D interaktif dari siklus hidup tanaman akan muncul langsung di atas meja Anda! Siswa dapat membedah struktur sel, melihat bagaimana akar menyerap air, hingga proses fotosintesis secara nyata.
            </p>
            
            <a href="{{ route('ar.guide') }}" class="inline-flex items-center justify-center gap-2 bg-emerald-500 hover:bg-emerald-600 text-slate-900 font-bold px-8 py-4 rounded-xl shadow-lg shadow-emerald-500/20 transition-all duration-200">
                <span>📱</span> Lihat Panduan AR
            </a>
        </div>
        
        <!-- Kolom Kanan: Embed 3D/AR Web App -->
        <div class="relative group">
            <div class="absolute -inset-1 bg-gradient-to-r from-emerald-500 to-green-400 rounded-2xl blur opacity-25 group-hover:opacity-50 transition duration-1000 group-hover:duration-200"></div>
            <div class="relative rounded-2xl overflow-hidden shadow-2xl bg-slate-800 border border-slate-700 w-full h-[450px] md:h-[500px] lg:h-[550px]">
                <iframe 
                    class="w-full h-full"
                    src="https://papergrow-tomat.vercel.app/" 
                    title="Visualisasi 3D Anatomi Tomat Paper Grow" 
                    frameborder="0" 
                    allow="camera; microphone; fullscreen; xr-spatial-tracking" 
                    allowfullscreen>
                </iframe>
            </div>
        </div>
    </div>
</div>

<!-- Section Simulasi Animasi Menanam Interaktif (Edukasi Modern) -->
<div id="simulasi-tanam" class="bg-gradient-to-b from-slate-50 to-emerald-50/40 py-20 px-4 border-y border-slate-100 relative overflow-hidden">
    <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-green-100/50 blur-[100px] rounded-full pointer-events-none"></div>
    <div class="absolute bottom-0 left-0 w-[400px] h-[400px] bg-emerald-100/40 blur-[100px] rounded-full pointer-events-none"></div>
    
    <div class="max-w-7xl mx-auto relative z-10">
        <div class="text-center mb-16">
            <span class="text-xs font-bold text-emerald-700 bg-emerald-100/80 px-5 py-2 rounded-full uppercase tracking-widest border border-emerald-200 shadow-sm inline-flex items-center gap-2">
                <span class="text-base">🧑‍🔬</span> Kelas Sains Interaktif
            </span>
            <h2 class="text-3xl md:text-5xl font-black text-slate-900 mt-5 mb-4">Cara Menanam <span class="text-emerald-600">Paper Grow</span></h2>
            <p class="text-slate-500 text-base md:text-lg font-light max-w-2xl mx-auto">Ternyata menanam sayuran itu sangat mudah! Mari kita pelajari 7 tahapan proses tumbuhnya tunas ajaib dari selembar kertas daur ulang.</p>
        </div>

        <div class="relative group/slider px-2 md:px-12">
            
            <!-- Tombol Kiri (Desktop) -->
            <button id="btn-prev-sim" class="absolute left-2 top-1/2 -translate-y-1/2 z-20 bg-white hover:bg-emerald-50 text-emerald-700 p-5 rounded-full shadow-[0_8px_30px_rgb(0,0,0,0.12)] border border-emerald-100 hidden md:flex items-center justify-center opacity-0 group-hover/slider:opacity-100 transition-all transform -translate-x-4 group-hover/slider:translate-x-0 active:scale-95" onclick="document.getElementById('sim-container').scrollBy({left: -380, behavior: 'smooth'})">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"></path></svg>
            </button>
            
            <!-- Horizontal Scroll Snap Container -->
            <div id="sim-container" class="flex overflow-x-auto pb-12 pt-6 gap-8 px-4 hide-scrollbar cursor-grab active:cursor-grabbing snap-x snap-mandatory" style="scrollbar-width: none;">
                
                @php
                    $steps = [
                        ['icon' => '📄', 'tag' => 'Fase Persiapan', 'title' => 'Siapkan Paper Grow', 'desc' => 'Ambil lembaran kertas Paper Grow milikmu. Kertas ini mengandung benih sayuran tersembunyi di dalamnya.'],
                        ['icon' => '🪴', 'tag' => 'Fase Persiapan', 'title' => 'Siapkan Tanah', 'desc' => 'Siapkan pot kesayanganmu dan isi dengan tanah yang gembur serta kaya akan nutrisi kompos.'],
                        ['icon' => '🌱', 'tag' => 'Fase Penanaman', 'title' => 'Taruh Benih', 'desc' => 'Letakkan potongan-potongan kertas Paper Grow tadi tepat di atas permukaan media tanam.'],
                        ['icon' => '🧤', 'tag' => 'Fase Penanaman', 'title' => 'Timbun Tanah', 'desc' => 'Tutup tipis kertas benihmu dengan sedikit tanah (maksimal 1 cm) agar benih tersembunyi dengan aman.'],
                        ['icon' => '💧', 'tag' => 'Fase Perawatan', 'title' => 'Siram dengan Rutin', 'desc' => 'Siramlah menggunakan semprotan halus setiap pagi untuk menjaga kelembapan agar benih cepat bangun.'],
                        ['icon' => '🌿', 'tag' => 'Fase Observasi', 'title' => 'Benih Mulai Tumbuh', 'desc' => 'Hore! Dalam beberapa hari, benih kecil akan memecahkan cangkangnya dan menumbuhkan tunas hijau yang lucu.'],
                        ['icon' => '✨', 'tag' => 'Fase Panen', 'title' => 'Sudah Terlihat Indah', 'desc' => 'Kini tunasmu sudah tumbuh menjadi sayuran yang subur dan sangat indah, siap untuk dipanen!'],
                    ];
                @endphp

                @foreach($steps as $index => $step)
                <div class="min-w-[260px] md:min-w-[340px] w-[260px] md:w-[340px] bg-white rounded-3xl p-5 shadow-[0_4px_20px_rgb(0,0,0,0.05)] hover:shadow-[0_20px_40px_rgb(16,185,129,0.15)] border-2 border-slate-50 hover:border-emerald-100 snap-center shrink-0 group transition-all duration-300 hover:-translate-y-3 select-none relative overflow-hidden">
                    
                    <!-- Latar Belakang Kartu (Glow) saat di-hover -->
                    <div class="absolute inset-0 bg-gradient-to-br from-emerald-50/0 to-green-50/0 group-hover:from-emerald-50/40 group-hover:to-green-100/40 transition-colors duration-500 z-0 pointer-events-none"></div>
                    
                    <!-- Gambar Simulasi -->
                    <div class="overflow-hidden rounded-2xl mb-5 aspect-[5/4] relative bg-slate-50 border border-slate-100 shadow-inner pointer-events-none z-10">
                        <img src="{{ asset('images/step' . ($index + 1) . '.jpeg') }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" alt="Langkah {{ $index + 1 }}">
                        
                        <!-- Lencana Tahap Angka Besar -->
                        <div class="absolute -top-1 -left-1 bg-white text-slate-800 font-black w-14 h-14 rounded-br-3xl flex items-center justify-center shadow-lg border-b border-r border-slate-100/50 text-xl group-hover:bg-emerald-500 group-hover:text-white transition-colors duration-300">
                            {{ $index + 1 }}
                        </div>
                    </div>
                    
                    <div class="relative z-10">
                        <!-- Edukasi Tag -->
                        <div class="flex items-center gap-2 mb-3">
                            <span class="text-lg">{{ $step['icon'] }}</span>
                            <span class="text-[10px] font-bold text-slate-400 uppercase tracking-widest bg-slate-100/80 px-2 py-1 rounded-md">{{ $step['tag'] }}</span>
                        </div>
                        
                        <!-- Konten Edukasi -->
                        <h3 class="text-xl font-black text-slate-800 mb-2 group-hover:text-emerald-600 transition-colors">{{ $step['title'] }}</h3>
                        <p class="text-sm text-slate-500 leading-relaxed font-normal">{{ $step['desc'] }}</p>
                    </div>
                    
                    <!-- Ornamen garis -->
                    <div class="absolute bottom-0 left-10 right-10 h-1 bg-emerald-100 rounded-t-full scale-x-0 group-hover:scale-x-100 transition-transform duration-500 origin-left"></div>
                </div>
                @endforeach
                
            </div>
            
            <!-- Tombol Kanan (Desktop) -->
            <button id="btn-next-sim" class="absolute right-2 top-1/2 -translate-y-1/2 z-20 bg-white hover:bg-emerald-50 text-emerald-700 p-5 rounded-full shadow-[0_8px_30px_rgb(0,0,0,0.12)] border border-emerald-100 hidden md:flex items-center justify-center opacity-0 group-hover/slider:opacity-100 transition-all transform translate-x-4 group-hover/slider:translate-x-0 active:scale-95" onclick="document.getElementById('sim-container').scrollBy({left: 380, behavior: 'smooth'})">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path></svg>
            </button>
            
        </div>
        
        <div class="text-center mt-2 pb-8">
            <p class="text-xs text-emerald-600/80 font-medium bg-emerald-50/50 backdrop-blur-sm inline-flex items-center gap-2 px-5 py-2.5 rounded-full shadow-sm border border-emerald-100/50">
                <svg class="w-4 h-4 animate-bounce-x" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path></svg>
                <span>Geser ke samping untuk mengikuti eksperimen botani ini!</span>
            </p>
        </div>
    </div>
</div>

<style>
    @keyframes bounce-x {
        0%, 100% { transform: translateX(0); }
        50% { transform: translateX(3px); }
    }
    .animate-bounce-x {
        animation: bounce-x 2s infinite;
    }
</style>

<script>
    // JS Drag to Scroll untuk Desktop UX
    document.addEventListener('DOMContentLoaded', () => {
        const slider = document.getElementById('sim-container');
        let isDown = false;
        let startX;
        let scrollLeft;

        slider.addEventListener('mousedown', (e) => {
            isDown = true;
            slider.style.cursor = 'grabbing';
            // Nonaktifkan efek snap sementara sedang didrag
            slider.style.scrollSnapType = 'none';
            startX = e.pageX - slider.offsetLeft;
            scrollLeft = slider.scrollLeft;
        });
        
        slider.addEventListener('mouseleave', () => {
            isDown = false;
            slider.style.cursor = 'grab';
            slider.style.scrollSnapType = 'x mandatory';
        });
        
        slider.addEventListener('mouseup', () => {
            isDown = false;
            slider.style.cursor = 'grab';
            // Kembalikan efek snap saat dilepas agar rapi
            slider.style.scrollSnapType = 'x mandatory';
        });
        
        slider.addEventListener('mousemove', (e) => {
            if (!isDown) return;
            e.preventDefault();
            const x = e.pageX - slider.offsetLeft;
            const walk = (x - startX) * 1.5; // Kecepatan seret
            slider.scrollLeft = scrollLeft - walk;
        });
    });
</script>
<!-- Section Statistik / Social Proof (Pindah ke Bawah) -->
<div class="bg-white pt-24 pb-12 relative z-20 border-t border-slate-100">
    <div class="max-w-6xl mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center divide-y md:divide-y-0 md:divide-x divide-slate-100">
            <!-- Stat 1: Sekolah Mitra -->
            <div class="py-4 md:py-0 transform hover:-translate-y-1 transition-transform duration-300">
                <div class="text-4xl lg:text-5xl font-black text-emerald-600 mb-2">{{ $schoolCount }}+</div>
                <div class="text-sm font-bold text-slate-700 uppercase tracking-wider">Sekolah Mitra</div>
                <p class="text-xs text-slate-500 mt-1">Telah mendaftar edukasi</p>
            </div>
            <!-- Stat 2: Pesanan Selesai -->
            <div class="py-4 md:py-0 transform hover:-translate-y-1 transition-transform duration-300">
                <div class="text-4xl lg:text-5xl font-black text-emerald-600 mb-2">{{ $orderCount }}+</div>
                <div class="text-sm font-bold text-slate-700 uppercase tracking-wider">Paket Terjual</div>
                <p class="text-xs text-slate-500 mt-1">Kertas benih & modul ajar</p>
            </div>
            <!-- Stat 3: Kota Jangkauan -->
            <div class="py-4 md:py-0 transform hover:-translate-y-1 transition-transform duration-300">
                <div class="text-4xl lg:text-5xl font-black text-emerald-600 mb-2">{{ $cityCount }}+</div>
                <div class="text-sm font-bold text-slate-700 uppercase tracking-wider">Kota Terjangkau</div>
                <p class="text-xs text-slate-500 mt-1">Telah dikirim ke berbagai kota</p>
            </div>
        </div>
    </div>
</div>

<!-- Section Capaian Edukasi (Nilai Jual Akademis B2B) -->
<div class="py-20 bg-white px-4">
    <div class="max-w-6xl mx-auto">
        <div class="text-center mb-16">
            <span class="text-xs font-bold text-green-700 bg-green-50 border border-green-200/60 px-3 py-1.5 rounded-full uppercase tracking-widest">
                Integrasi Akademis
            </span>
            <h2 class="text-3xl font-black text-slate-900 mt-3 mb-2">Mendukung Capaian Pembelajaran Siswa</h2>
            <p class="text-slate-500 text-sm font-light max-w-md mx-auto">Bagaimana Paper Grow membantu guru mengimplementasikan metode belajar berbasis proyek sesuai Kurikulum Merdeka.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Capaian 1 -->
            <div class="p-6 rounded-2xl bg-slate-50/50 border border-slate-100 flex gap-4">
                <div class="text-3xl">🌱</div>
                <div>
                    <h4 class="font-bold text-slate-800 text-base mb-1">Eksperimen Sains Riil</h4>
                    <p class="text-xs text-slate-500 leading-relaxed font-light">Siswa belajar mengamati pertumbuhan vegetatif secara nyata, mengukur kelembapan tanah, dan melatih keterampilan observasi biologi dasar.</p>
                </div>
            </div>
            <!-- Capaian 2 -->
            <div class="p-6 rounded-2xl bg-slate-50/50 border border-slate-100 flex gap-4">
                <div class="text-3xl">🧩</div>
                <div>
                    <h4 class="font-bold text-slate-800 text-base mb-1">Kontekstual 3D Abstrak</h4>
                    <p class="text-xs text-slate-500 leading-relaxed font-light">Teknologi Augmented Reality cerdas membantu siswa memvisualisasikan konsep abstrak seperti struktur jaringan akar dalam bentuk 3D interaktif.</p>
                </div>
            </div>
            <!-- Capaian 3 -->
            <div class="p-6 rounded-2xl bg-slate-50/50 border border-slate-100 flex gap-4">
                <div class="text-3xl">🌍</div>
                <div>
                    <h4 class="font-bold text-slate-800 text-base mb-1">Kecerdasan Ekologis</h4>
                    <p class="text-xs text-slate-500 leading-relaxed font-light">Membangun rasa tanggung jawab (ownership) terhadap lingkungan sejak dini melalui aksi nyata daur ulang sirkular ekonomi.</p>
                </div>
            </div>
        </div>
    </div>
</div>




    <!-- Floating WhatsApp Customer Service -->
    <a href="https://wa.me/62895413460406?text=Halo%20Admin%20Paper%20Grow,%20saya%20ingin%20bertanya-tanya%20seputar%20produk" target="_blank" class="fixed bottom-8 right-8 bg-[#25D366] hover:bg-[#1EBE5D] text-white p-4 rounded-full shadow-2xl hover:shadow-green-500/50 transition-all duration-300 transform hover:-translate-y-2 z-50 group flex items-center justify-center">
        <!-- SVG WA Icon -->
        <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/></svg>
        <!-- Tooltip -->
        <span class="absolute right-full mr-4 bg-slate-800 text-white text-sm px-3 py-1.5 rounded-lg opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap shadow-md pointer-events-none">
            Butuh Bantuan? Tanya CS
        </span>
    </a>

@endsection