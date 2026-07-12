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
            </div>

        </div>
    </div>
</div>

@endsection
