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