@extends('layouts.app')

@section('content')

<!-- Hero Section Khusus Edukasi & B2B -->
<div class="relative bg-slate-900 overflow-hidden pt-24 pb-16 px-4">
    <div class="absolute inset-0 opacity-20 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]"></div>
    <div class="absolute top-0 right-0 w-96 h-96 bg-emerald-500 rounded-full blur-[100px] opacity-20"></div>
    
    <div class="relative max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-12 items-center z-10">
        <div class="text-left space-y-6">
            <span class="inline-block px-4 py-1.5 rounded-full bg-emerald-500/20 text-emerald-400 text-xs font-bold uppercase tracking-widest border border-emerald-500/30">
                Paper Grow For Schools (B2B)
            </span>
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-black text-white leading-tight">
                Revolusi Pembelajaran Sains <br> Berbasis <span class="text-emerald-400">Proyek & Teknologi</span>
            </h1>
            <p class="text-lg text-slate-300 max-w-xl font-light leading-relaxed">
                Dukung implementasi Kurikulum Merdeka di sekolah Anda melalui praktik menanam cerdas. Gabungkan daur ulang sirkular ekonomi dengan teknologi Augmented Reality dalam satu media ajar inovatif.
            </p>
        </div>
        
        <div class="relative group">
            <div class="absolute -inset-4 bg-emerald-500/20 rounded-[2rem] blur-xl transform -rotate-3 group-hover:rotate-0 transition-transform duration-500"></div>
            <img src="{{ asset('images/mengajar.jpeg') }}" alt="Demonstrasi Paper Grow di Sekolah" class="relative rounded-[2rem] shadow-2xl object-cover w-full h-[300px] lg:h-[400px] border border-white/10 transform group-hover:scale-[1.02] transition-transform duration-500">
        </div>
    </div>
</div>

<!-- Mengapa Memilih Paper Grow Section -->
<div class="bg-white py-20 px-4">
    <div class="max-w-6xl mx-auto">
        <div class="text-center mb-16">
            <h2 class="text-3xl font-black text-slate-900 mb-4">Mengapa Bermitra Bersama Kami?</h2>
            <div class="w-16 h-1 bg-emerald-500 mx-auto rounded-full"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-slate-50 p-8 rounded-3xl border border-slate-100 hover:border-emerald-200 transition-colors group">
                <div class="w-14 h-14 bg-white rounded-2xl shadow-sm border border-slate-100 flex items-center justify-center text-3xl mb-6 group-hover:scale-110 transition-transform">📚</div>
                <h3 class="text-xl font-bold text-slate-800 mb-3">Selaras Kurikulum Merdeka</h3>
                <p class="text-slate-600 text-sm leading-relaxed">Media ajar yang sempurna untuk Projek Penguatan Profil Pelajar Pancasila (P5), khususnya tema Gaya Hidup Berkelanjutan.</p>
            </div>
            
            <div class="bg-slate-50 p-8 rounded-3xl border border-slate-100 hover:border-emerald-200 transition-colors group">
                <div class="w-14 h-14 bg-white rounded-2xl shadow-sm border border-slate-100 flex items-center justify-center text-3xl mb-6 group-hover:scale-110 transition-transform">📱</div>
                <h3 class="text-xl font-bold text-slate-800 mb-3">Teknologi WebAR Native</h3>
                <p class="text-slate-600 text-sm leading-relaxed">Tanpa perlu instal aplikasi berat. Siswa dapat memindai kertas benih untuk memvisualisasikan anatomi sel tumbuhan secara 3D interaktif.</p>
            </div>
            
            <div class="bg-slate-50 p-8 rounded-3xl border border-slate-100 hover:border-emerald-200 transition-colors group">
                <div class="w-14 h-14 bg-white rounded-2xl shadow-sm border border-slate-100 flex items-center justify-center text-3xl mb-6 group-hover:scale-110 transition-transform">♻️</div>
                <h3 class="text-xl font-bold text-slate-800 mb-3">Edukasi Sirkular Ekonomi</h3>
                <p class="text-slate-600 text-sm leading-relaxed">Menanamkan kecerdasan ekologis dengan mempraktikkan langsung bagaimana limbah kertas disulap menjadi sumber pangan (sayuran).</p>
            </div>
        </div>
    </div>
</div>

<!-- Galeri Edukasi (Growth & Impact) -->
<div class="bg-slate-50 py-20 px-4 border-t border-slate-100">
    <div class="max-w-6xl mx-auto">
        <div class="text-center mb-16">
            <span class="inline-block px-4 py-1.5 rounded-full bg-blue-100 text-blue-700 text-xs font-bold uppercase tracking-widest border border-blue-200 mb-4">
                Aksi Nyata & Pertumbuhan
            </span>
            <h2 class="text-3xl font-black text-slate-900 mb-4">Membangun Ekosistem Hijau Bersama</h2>
            <p class="text-slate-600 max-w-2xl mx-auto leading-relaxed">
                Ribuan siswa telah merasakan serunya belajar sains secara langsung melalui Paper Grow. Berikut adalah dokumentasi keseruan mereka saat mempraktikkan gaya hidup berkelanjutan di kelas.
            </p>
        </div>

        <!-- Grid Galeri -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="group relative rounded-3xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-500 h-[300px]">
                <div class="absolute inset-0 bg-slate-900/20 group-hover:bg-transparent transition-colors duration-500 z-10"></div>
                <img src="{{ asset('images/mengajar2.jpeg') }}" alt="Dokumentasi Edukasi 1" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700">
                <div class="absolute bottom-0 left-0 right-0 p-6 bg-gradient-to-t from-slate-900/90 to-transparent z-20 translate-y-4 group-hover:translate-y-0 opacity-0 group-hover:opacity-100 transition-all duration-300">
                    <h4 class="text-white font-bold text-lg">Praktik Menanam</h4>
                    <p class="text-emerald-300 text-sm">Siswa SD memindahkan benih</p>
                </div>
            </div>

            <div class="group relative rounded-3xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-500 h-[300px]">
                <div class="absolute inset-0 bg-slate-900/20 group-hover:bg-transparent transition-colors duration-500 z-10"></div>
                <img src="{{ asset('images/mengajar3.jpeg') }}" alt="Dokumentasi Edukasi 2" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700">
                <div class="absolute bottom-0 left-0 right-0 p-6 bg-gradient-to-t from-slate-900/90 to-transparent z-20 translate-y-4 group-hover:translate-y-0 opacity-0 group-hover:opacity-100 transition-all duration-300">
                    <h4 class="text-white font-bold text-lg">Sesi Penjelasan</h4>
                    <p class="text-emerald-300 text-sm">Edukasi sirkular ekonomi</p>
                </div>
            </div>

            <div class="group relative rounded-3xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-500 h-[300px]">
                <div class="absolute inset-0 bg-slate-900/20 group-hover:bg-transparent transition-colors duration-500 z-10"></div>
                <img src="{{ asset('images/mengajar4.jpeg') }}" alt="Dokumentasi Edukasi 3" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700">
                <div class="absolute bottom-0 left-0 right-0 p-6 bg-gradient-to-t from-slate-900/90 to-transparent z-20 translate-y-4 group-hover:translate-y-0 opacity-0 group-hover:opacity-100 transition-all duration-300">
                    <h4 class="text-white font-bold text-lg">Antusiasme Belajar</h4>
                    <p class="text-emerald-300 text-sm">Integrasi Augmented Reality</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Section Formulir Pendaftaran Demo -->
<div class="bg-gradient-to-b from-emerald-50/50 to-white py-20 px-4 border-t border-emerald-50">
    <div class="max-w-4xl mx-auto">
        <div class="bg-white rounded-[2.5rem] shadow-2xl shadow-emerald-900/5 overflow-hidden flex flex-col md:flex-row border border-emerald-100">
            
            <!-- Panel Kiri (Informasi) -->
            <div class="bg-emerald-600 text-white p-10 md:w-2/5 flex flex-col justify-between relative overflow-hidden">
                <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/diagmonds-light.png')] opacity-20"></div>
                
                <div class="relative z-10">
                    <h3 class="text-2xl font-black mb-4">Jadwalkan Demo Gratis!</h3>
                    <p class="text-emerald-100 text-sm leading-relaxed mb-8">
                        Dapatkan sesi pengenalan produk secara langsung. Tim fasilitator kami akan datang ke sekolah Anda untuk mendemonstrasikan praktik menanam cerdas ini secara cuma-cuma.
                    </p>
                    
                    <div class="space-y-4">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 rounded-full bg-emerald-500/50 flex items-center justify-center shrink-0">📦</div>
                            <span class="text-sm font-medium">Free Sample Produk</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 rounded-full bg-emerald-500/50 flex items-center justify-center shrink-0">👩‍🏫</div>
                            <span class="text-sm font-medium">Sesi Workshop Guru</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 rounded-full bg-emerald-500/50 flex items-center justify-center shrink-0">🤝</div>
                            <span class="text-sm font-medium">Harga Khusus B2B (Grosir)</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Panel Kanan (Formulir) -->
            <div class="p-10 md:w-3/5">
                @if(session('success'))
                    <script>
                        document.addEventListener("DOMContentLoaded", function() {
                            Swal.fire({
                                title: 'Proposal Terkirim!',
                                text: '{{ session('success') }}',
                                icon: 'success',
                                confirmButtonText: 'Luar Biasa',
                                confirmButtonColor: '#10b981',
                                backdrop: `rgba(16, 185, 129, 0.2)`
                            });
                        });
                    </script>
                @endif

                @auth
                <form action="{{ route('partnership.store') }}" method="POST" class="space-y-5">
                    @csrf
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Nama Sekolah / Institusi</label>
                        <input type="text" name="school_name" class="w-full bg-slate-50 border border-slate-200 px-4 py-3 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:outline-none focus:bg-white transition-colors text-sm" placeholder="Contoh: SD Negeri 01 Salatiga" required>
                    </div>
                    
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Nama Perwakilan (Guru/Kepsek)</label>
                        <input type="text" name="teacher_name" class="w-full bg-slate-50 border border-slate-200 px-4 py-3 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:outline-none focus:bg-white transition-colors text-sm" placeholder="Nama Lengkap & Gelar" required>
                    </div>
                    
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Nomor WhatsApp Aktif</label>
                        <input type="text" name="phone_number" class="w-full bg-slate-50 border border-slate-200 px-4 py-3 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:outline-none focus:bg-white transition-colors text-sm" placeholder="Contoh: 081234567890" required>
                    </div>
                    
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Pesan & Kebutuhan (Opsional)</label>
                        <textarea name="message" class="w-full bg-slate-50 border border-slate-200 px-4 py-3 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:outline-none focus:bg-white transition-colors text-sm" rows="3" placeholder="Tuliskan estimasi jumlah siswa atau preferensi hari kunjungan..."></textarea>
                    </div>
                    
                    <button type="submit" class="w-full bg-slate-900 hover:bg-slate-800 text-white py-4 rounded-xl font-bold shadow-lg shadow-slate-900/20 transition-all duration-300 hover:-translate-y-1">
                        Kirim Pengajuan Demo
                    </button>
                    
                    <p class="text-[11px] text-slate-400 text-center mt-4">
                        Data Anda aman bersama kami. Tim Paper Grow akan menghubungi Anda dalam waktu maksimal 1x24 jam kerja.
                    </p>
                </form>
                @else
                <!-- Form Terkunci (Guest) -->
                <div class="space-y-5 relative">
                    <!-- Overlay Blur -->
                    <div class="absolute inset-0 bg-white/50 backdrop-blur-[3px] z-10 flex flex-col items-center justify-center rounded-xl border border-slate-100">
                        <div class="bg-white p-6 rounded-2xl shadow-xl shadow-slate-200/50 text-center max-w-sm border border-emerald-50">
                            <div class="w-16 h-16 bg-emerald-50 rounded-full flex items-center justify-center text-3xl mx-auto mb-4 border-4 border-white shadow-sm">🔐</div>
                            <h4 class="font-black text-slate-800 mb-2">Kemitraan Terkunci</h4>
                            <p class="text-sm text-slate-500 mb-6 leading-relaxed">Untuk mengajukan demonstrasi, silakan masuk ke akun Anda agar kami dapat memverifikasi instansi Anda.</p>
                            <a href="{{ route('login') }}" class="block w-full bg-gradient-to-r from-emerald-500 to-green-600 hover:from-emerald-600 text-white font-bold py-3 rounded-xl transition-all shadow-md">
                                Masuk Akun
                            </a>
                        </div>
                    </div>

                    <!-- Dummy Inputs -->
                    <div>
                        <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Nama Sekolah / Institusi</label>
                        <input type="text" disabled class="w-full bg-slate-50 border border-slate-100 px-4 py-3 rounded-xl text-sm opacity-50 cursor-not-allowed">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Nama Perwakilan</label>
                        <input type="text" disabled class="w-full bg-slate-50 border border-slate-100 px-4 py-3 rounded-xl text-sm opacity-50 cursor-not-allowed">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Nomor WhatsApp</label>
                        <input type="text" disabled class="w-full bg-slate-50 border border-slate-100 px-4 py-3 rounded-xl text-sm opacity-50 cursor-not-allowed">
                    </div>
                    <button type="button" disabled class="w-full bg-slate-200 text-slate-400 py-4 rounded-xl font-bold cursor-not-allowed">
                        Kirim Pengajuan Demo
                    </button>
                </div>
                @endauth
            </div>

        </div>
    </div>
</div>

@endsection
