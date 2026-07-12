@extends('layouts.app')

@section('content')
    <header class="container mx-auto px-6 py-16 flex flex-col md:flex-row items-center justify-between">
        <div class="md:w-1/2 space-y-6">
            <span class="bg-green-100 text-green-800 text-sm font-semibold px-3 py-1 rounded-full">Kertas Daur Ulang & Edukasi</span>
            <h1 class="text-4xl md:text-6xl font-bold leading-tight text-[#1E352F]">Tanam Kertasmu, <br><span class="text-green-700">Tumbuhkan Masa Depan</span></h1>
            <p class="text-gray-600 text-lg">Paper Grow adalah media edukasi interaktif yang mengubah kertas bekas menjadi media tanam kaya nutrisi yang siap menumbuhkan tanaman baru.</p>
            <a href="#how-it-works" class="inline-block bg-[#2C4A3E] text-white px-8 py-3 rounded-lg font-medium shadow-md hover:bg-green-800 transition">Pelajari Selengkapnya</a>
        </div>
        <div class="md:w-1/2 flex justify-center mt-10 md:mt-0">
            <img src="{{ asset('images/logo.jpeg') }}" alt="Paper Grow Logo" class="w-4/5 rounded-2xl shadow-sm">
        </div>
    </header>

    <section id="how-it-works" class="bg-white py-16">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-3xl font-bold mb-12 text-[#1E352F]">Bagaimana Cara Kerjanya?</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Card 1 -->
                <div class="group p-6 bg-[#F9F6F0] rounded-2xl hover:bg-white hover:shadow-xl hover:-translate-y-2 border border-transparent hover:border-green-100 transition-all duration-300 cursor-pointer">
                    <div class="text-4xl mb-4 transform group-hover:rotate-12 group-hover:scale-110 transition-transform duration-300 drop-shadow-sm">📄</div>
                    <h3 class="text-xl font-bold mb-2 text-[#1E352F] group-hover:text-green-700 transition-colors duration-300">1. Tulis atau Gambar</h3>
                    <p class="text-gray-600 leading-relaxed">Gunakan kertas Paper Grow untuk media belajar, menggambar, atau menulis catatan.</p>
                </div>
                <!-- Card 2 -->
                <div class="group p-6 bg-[#F9F6F0] rounded-2xl hover:bg-white hover:shadow-xl hover:-translate-y-2 border border-transparent hover:border-green-100 transition-all duration-300 cursor-pointer">
                    <div class="text-4xl mb-4 transform group-hover:-translate-y-2 group-hover:scale-110 transition-transform duration-300 drop-shadow-sm">🪴</div>
                    <h3 class="text-xl font-bold mb-2 text-[#1E352F] group-hover:text-green-700 transition-colors duration-300">2. Letakkan di Tanah</h3>
                    <p class="text-gray-600 leading-relaxed">Jika sudah selesai digunakan, robek kecil-kecil dan letakkan di atas media tanah basah.</p>
                </div>
                <!-- Card 3 -->
                <div class="group p-6 bg-[#F9F6F0] rounded-2xl hover:bg-white hover:shadow-xl hover:-translate-y-2 border border-transparent hover:border-green-100 transition-all duration-300 cursor-pointer">
                    <div class="text-4xl mb-4 transform group-hover:rotate-[360deg] group-hover:scale-125 transition-transform duration-700 drop-shadow-sm origin-center">🌸</div>
                    <h3 class="text-xl font-bold mb-2 text-[#1E352F] group-hover:text-green-700 transition-colors duration-300">3. Siram & Tumbuh</h3>
                    <p class="text-gray-600 leading-relaxed">Siram secara berkala. Kertas akan terurai dan bibit di dalamnya akan mulai bertunas!</p>
                </div>
            </div>
        </div>
    </section>

    <!-- NEW SECTION: Simulasi Menanam -->
    <section id="simulasi-tanam" class="bg-[#F9F6F0] py-20 border-y border-emerald-50 relative overflow-hidden">
        <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-green-100/50 blur-[100px] rounded-full pointer-events-none"></div>
        <div class="container mx-auto px-6 relative z-10">
            <div class="text-center mb-14">
                <span class="bg-green-100 text-green-800 text-xs font-bold px-4 py-1.5 rounded-full tracking-widest uppercase border border-green-200">Praktik Langsung</span>
                <h2 class="text-3xl md:text-4xl font-black mt-4 text-[#1E352F]">Simulasi Menanam Kertas</h2>
                <p class="text-gray-500 mt-3 max-w-2xl mx-auto font-light leading-relaxed">Ikuti 7 langkah mudah di bawah ini untuk mengubah lembaran kertas bekas menjadi sayuran segar yang siap dipanen. Geser untuk melihat prosesnya!</p>
            </div>

            <!-- Horizontal Scroll Snap Container -->
            <div class="flex overflow-x-auto pb-8 snap-x snap-mandatory gap-6 px-4 md:px-0" style="scrollbar-width: thin; scrollbar-color: #10B981 #F9F6F0;">
                
                @php
                    $steps = [
                        ['title' => 'Siapkan Media', 'desc' => 'Siapkan pot dan isi dengan tanah kompos atau media tanam yang gembur.'],
                        ['title' => 'Basahi Tanah', 'desc' => 'Siram tanah secara perlahan hingga seluruh permukaannya lembap merata.'],
                        ['title' => 'Robek Kertas', 'desc' => 'Robek-robek produk Paper Grow yang sudah tak terpakai menjadi potongan kecil.'],
                        ['title' => 'Letakkan Benih', 'desc' => 'Sebarkan robekan kertas tadi tepat di atas permukaan tanah yang sudah basah.'],
                        ['title' => 'Tutup Tipis', 'desc' => 'Taburkan sedikit tanah lagi di atas potongan kertas agar tertutup tipis (jangan terlalu dalam).'],
                        ['title' => 'Penyiraman Rutin', 'desc' => 'Siram secara rutin menggunakan semprotan halus setiap pagi/sore untuk menjaga kelembapan.'],
                        ['title' => 'Tunggu Tunas!', 'desc' => 'Dalam 7-14 hari, benih ajaib akan mulai berkecambah dan tumbuh tunas daun baru!'],
                    ];
                @endphp

                @foreach($steps as $index => $step)
                <div class="min-w-[280px] md:min-w-[320px] bg-white rounded-3xl p-5 shadow-sm hover:shadow-xl border border-slate-100 snap-center shrink-0 group transition-all duration-300 hover:-translate-y-2">
                    <div class="overflow-hidden rounded-2xl mb-5 aspect-square relative bg-slate-50 border border-slate-100">
                        <img src="{{ asset('images/step' . ($index + 1) . '.jpeg') }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" alt="Langkah {{ $index + 1 }}">
                        <div class="absolute top-3 left-3 bg-white/90 backdrop-blur-sm text-emerald-700 font-black w-10 h-10 rounded-full flex items-center justify-center shadow-md">
                            0{{ $index + 1 }}
                        </div>
                    </div>
                    <h3 class="text-xl font-black text-[#1E352F] mb-2 group-hover:text-emerald-600 transition-colors">{{ $step['title'] }}</h3>
                    <p class="text-sm text-slate-500 leading-relaxed font-light">{{ $step['desc'] }}</p>
                </div>
                @endforeach
                
            </div>
            
            <div class="text-center mt-6 hidden md:block">
                <p class="text-xs text-slate-400 font-medium bg-white inline-block px-4 py-2 rounded-full shadow-sm border border-slate-100">
                    Gunakan <i>scroll</i> horizontal atau sentuh & geser layar untuk melihat langkah selanjutnya &rarr;
                </p>
            </div>
        </div>
    </section>

    <section id="variants" class="container mx-auto px-6 py-16">
        <h2 class="text-3xl font-bold text-center mb-12 text-[#1E352F]">Pilihan Bibit Edukasi</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($seeds as $seed)
                <div class="border border-gray-200 p-6 rounded-xl hover:shadow-lg transition bg-white text-center">
                    <div class="text-4xl mb-3">{{ $seed['icon'] }}</div>
                    <h3 class="text-xl font-bold mb-2 text-[#1E352F]">{{ $seed['name'] }}</h3>
                    <p class="text-gray-600">{{ $seed['description'] }}</p>
                </div>
            @endforeach
        </div>
    </section>
@endsection