@extends('layouts.app')

@section('content')
<div class="bg-gradient-to-b from-[#FBF9F6] to-white min-h-screen py-20 px-4">
    <div class="max-w-6xl mx-auto">
        
        <!-- Header Edukatif -->
        <div class="text-center mb-20">
            <span class="inline-flex items-center gap-2 text-xs font-bold text-emerald-700 bg-emerald-100/60 px-4 py-2 rounded-full uppercase tracking-widest border border-emerald-200/50 mb-6">
                <span>🪄</span> Keajaiban Sains Digital
            </span>
            <h1 class="text-4xl md:text-5xl font-black text-[#1E352F] tracking-tight mb-6">
                Buka Gerbang Dimensi Tanaman 3D
            </h1>
            <p class="text-slate-600 text-lg max-w-2xl mx-auto font-light leading-relaxed">
                Tidak perlu mikroskop untuk melihat bagaimana akar menyerap air atau daun berfotosintesis. Dengan teknologi WebAR kami, anatomi biologi tanaman hadir langsung di atas meja Anda, tanpa perlu mengunduh aplikasi apa pun!
            </p>
        </div>

        <!-- Apa yang akan dipelajari? (Teaser Edukasi) -->
        <div class="bg-white rounded-3xl p-8 md:p-12 shadow-xl shadow-slate-200/50 border border-slate-100 mb-24 relative overflow-hidden">
            <!-- Hiasan Background Abstrak -->
            <div class="absolute -top-20 -right-20 w-64 h-64 bg-green-50 rounded-full blur-3xl opacity-50"></div>
            
            <div class="relative z-10 grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                <div>
                    <h3 class="text-2xl font-black text-[#1E352F] mb-4">Apa yang menanti Anda di dalam sana?</h3>
                    <p class="text-slate-500 mb-6 leading-relaxed text-justify">
                        Proyek Augmented Reality ini dirancang khusus berdasarkan silabus Sains. Saat model 3D muncul, Anda dapat membedah tanaman lapis demi lapis:
                    </p>
                    <ul class="space-y-4">
                        <li class="flex items-start gap-3">
                            <span class="text-2xl">🌱</span>
                            <div>
                                <h4 class="font-bold text-slate-800">Fisiologi Akar & Batang</h4>
                                <p class="text-sm text-slate-500 font-light">Melihat langsung jaringan xilem dan floem bekerja mendistribusikan nutrisi tanah.</p>
                            </div>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="text-2xl">☀️</span>
                            <div>
                                <h4 class="font-bold text-slate-800">Simulasi Fotosintesis</h4>
                                <p class="text-sm text-slate-500 font-light">Animasi partikel interaktif yang menunjukkan bagaimana karbon dioksida diubah menjadi oksigen.</p>
                            </div>
                        </li>
                    </ul>
                </div>
                <!-- 3D Model Viewer Native -->
                <div class="bg-gradient-to-tr from-emerald-50 to-white rounded-3xl h-80 md:h-96 flex flex-col items-center justify-center border-4 border-white shadow-inner relative overflow-hidden group">
                    <!-- Script Model Viewer -->
                    <script type="module" src="https://ajax.googleapis.com/ajax/libs/model-viewer/3.5.0/model-viewer.min.js"></script>
                    
                    <model-viewer 
                        src="{{ asset('models/tanaman.glb') }}" 
                        alt="Model 3D Anatomi Tanaman" 
                        auto-rotate 
                        camera-controls 
                        ar 
                        ar-modes="webxr scene-viewer quick-look" 
                        shadow-intensity="1" 
                        class="w-full h-full outline-none">
                        
                        <!-- Fallback Text Jika Model Belum Ada -->
                        <div slot="poster" class="absolute inset-0 flex flex-col items-center justify-center">
                            <span class="text-6xl mb-4 animate-bounce">🪴</span>
                            <p class="text-sm font-bold text-slate-500 bg-white/80 px-4 py-2 rounded-full shadow-sm backdrop-blur">Memuat Model 3D...</p>
                        </div>
                    </model-viewer>

                    <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 bg-white/90 backdrop-blur-md px-6 py-2.5 rounded-2xl text-xs font-bold text-emerald-800 shadow-lg border border-white/50 z-20 whitespace-nowrap pointer-events-none opacity-100 group-hover:opacity-0 transition-opacity">
                        👆 Geser untuk memutar
                    </div>
                </div>
            </div>
        </div>

        <!-- Langkah-langkah WebAR (Timeline Grid) -->
        <div class="text-center mb-16">
            <h2 class="text-3xl font-black text-[#1E352F]">3 Langkah Mudah Mengaksesnya</h2>
            <p class="text-slate-500 mt-2">Semudah mengambil foto, 100% tanpa ribet install aplikasi.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 relative">
            <!-- Garis Penghubung (Hanya muncul di Desktop) -->
            <div class="hidden md:block absolute top-12 left-1/6 right-1/6 h-1 bg-gradient-to-r from-emerald-100 via-green-300 to-emerald-100 rounded-full z-0 opacity-50"></div>

            <!-- Card Step 1 -->
            <div class="bg-white rounded-3xl p-8 border border-slate-100 shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-300 relative z-10 text-center group">
                <div class="w-20 h-20 bg-slate-50 border-4 border-white rounded-2xl flex items-center justify-center text-4xl shadow-lg mx-auto mb-6 group-hover:bg-emerald-100 transition-colors duration-300">
                    📱
                </div>
                <div class="text-emerald-600 font-black text-xl mb-2">Langkah 1</div>
                <h3 class="text-lg font-bold text-[#1E352F] mb-3">Buka Kamera Ponsel</h3>
                <p class="text-sm text-slate-500 font-light leading-relaxed">
                    Tidak perlu mengunduh aplikasi apa pun! Cukup buka aplikasi Kamera bawaan HP Anda atau fitur pemindai QR (Google Lens / Scanner).
                </p>
            </div>

            <!-- Card Step 2 -->
            <div class="bg-white rounded-3xl p-8 border border-slate-100 shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-300 relative z-10 text-center group">
                <div class="w-20 h-20 bg-slate-50 border-4 border-white rounded-2xl flex items-center justify-center text-4xl shadow-lg mx-auto mb-6 group-hover:bg-emerald-100 transition-colors duration-300">
                    🔍
                </div>
                <div class="text-emerald-600 font-black text-xl mb-2">Langkah 2</div>
                <h3 class="text-lg font-bold text-[#1E352F] mb-3">Pindai QR Code Kemasan</h3>
                <p class="text-sm text-slate-500 font-light leading-relaxed">
                    Arahkan kamera tepat ke stiker QR Code ajaib yang menempel pada kemasan Paper Grow Anda. Lalu ketuk tautan (*link*) yang muncul di layar.
                </p>
            </div>

            <!-- Card Step 3 -->
            <div class="bg-white rounded-3xl p-8 border border-slate-100 shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-300 relative z-10 text-center group">
                <div class="w-20 h-20 bg-slate-50 border-4 border-white rounded-2xl flex items-center justify-center text-4xl shadow-lg mx-auto mb-6 group-hover:bg-emerald-100 transition-colors duration-300">
                    🧬
                </div>
                <div class="text-emerald-600 font-black text-xl mb-2">Langkah 3</div>
                <h3 class="text-lg font-bold text-[#1E352F] mb-3">Eksplorasi Dunia Sel</h3>
                <p class="text-sm text-slate-500 font-light leading-relaxed">
                    *Tadaa!* Tanaman virtual akan muncul dari browser Anda. Sentuh setiap organ daun atau akar di layar untuk melihat fungsi biologinya secara interaktif.
                </p>
            </div>
        </div>

    </div>
</div>
@endsection