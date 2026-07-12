@extends('layouts.app')

@section('content')
<!-- Header Section Hero Modern -->
<div class="relative bg-gradient-to-b from-green-900 to-emerald-950 text-white py-24 px-4 text-center overflow-hidden">
    <div class="absolute inset-0 opacity-10 bg-[radial-gradient(#fff_1px,transparent_1px)] [background-size:16px_16px]"></div>
    <div class="relative max-w-3xl mx-auto">
        <span class="text-xs font-bold text-emerald-400 uppercase tracking-widest bg-emerald-900/50 px-4 py-1.5 rounded-full border border-emerald-700/50 mb-4 inline-block">
            Mengenal Lebih Dekat
        </span>
        <h1 class="text-4xl sm:text-5xl font-black tracking-tight mb-4 leading-tight">
            Menanam Harapan, Tumbuh Bersama Teknologi
        </h1>
        <p class="text-base sm:text-lg text-emerald-100/80 max-w-2xl mx-auto font-light leading-relaxed">
            Paper Grow adalah pelopor alat peraga pendidikan ramah lingkungan di Indonesia yang menjembatani konservasi alam fisik dan pembelajaran visual imersif.
        </p>
    </div>
</div>

<!-- Visi & Misi Modern Card Grid -->
<div class="max-w-6xl mx-auto py-20 px-4">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Visi Box -->
        <div class="lg:col-span-1 bg-gradient-to-br from-green-800 to-emerald-900 p-8 rounded-3xl text-white shadow-xl flex flex-col justify-between">
            <div>
                <span class="text-xs font-bold uppercase tracking-widest text-emerald-300">Arah Strategis</span>
                <h3 class="text-2xl font-extrabold mt-2 mb-4">Visi Kami</h3>
                <p class="text-emerald-100/90 text-sm leading-relaxed text-justify font-light">
                    "Memimpin ekosistem pendidikan berkelanjutan Indonesia melalui Paper Grow, alat pendidikan inovatif yang mengintegrasikan daur ulang kertas bekas, pendidikan teknologi Augmented Reality (AR), dan konservasi lingkungan, serta berkontribusi pada pencapaian SDGs."
                </p>
            </div>
            <div class="border-t border-emerald-700/50 pt-4 mt-6 text-xs text-emerald-300 font-medium">
                📍 Berbasis di Kampus UKSW Salatiga
            </div>
        </div>

        <!-- Misi Box -->
        <div class="lg:col-span-2 bg-white p-8 rounded-3xl border border-slate-100 shadow-sm flex flex-col justify-between">
            <div>
                <span class="text-xs font-bold uppercase tracking-widest text-green-600">Langkah Nyata</span>
                <h3 class="text-2xl font-extrabold text-slate-900 mt-2 mb-6">Misi Operasional</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-sm text-slate-600 font-light">
                    <div class="flex gap-3">
                        <div class="text-green-600 font-bold">01</div>
                        <p><strong class="font-semibold text-slate-800">Ekonomi Sirkular:</strong> Mendaur ulang kertas bekas sekolah/rumah menjadi produk kertas benih bernilai tinggi (SDG 12).</p>
                    </div>
                    <div class="flex gap-3">
                        <div class="text-green-600 font-bold">02</div>
                        <p><strong class="font-semibold text-slate-800">Edukasi Imersif:</strong> Menyediakan barcode AR terintegrasi teknologi visualisasi cerdas untuk siswa SD (SDG 4).</p>
                    </div>
                    <div class="flex gap-3">
                        <div class="text-green-600 font-bold">03</div>
                        <p><strong class="font-semibold text-slate-800">Responsbilitas Dini:</strong> Memupuk rasa tanggung jawab ekologis anak pada ekosistem lewat praktik langsung (SDG 15).</p>
                    </div>
                    <div class="flex gap-3">
                        <div class="text-green-600 font-bold">04</div>
                        <p><strong class="font-semibold text-slate-800">Jaringan Inklusif:</strong> Berkolaborasi dengan instansi, LSM lingkungan, dan komunitas demi pemerataan alat peraga (SDG 17).</p>
                    </div>
                </div>
            </div>
            <div class="border-t border-slate-100 pt-4 mt-6 flex justify-between items-center text-xs text-slate-400">
                <span>Diferensiasi Hijau & Edutech</span>
                <span class="font-bold text-green-600">Paper Grow &copy; 2026</span>
            </div>
        </div>
    </div>
</div>

<!-- Komitmen Nilai Sosial & Target Kontribusi -->
<div class="bg-emerald-50/50 py-16 px-4 border-y border-emerald-100/50">
    <div class="max-w-5xl mx-auto grid grid-cols-1 sm:grid-cols-3 gap-8 text-center">
        <div class="p-4">
            <div class="text-4xl font-black text-green-700 mb-2">5%</div>
            <h4 class="text-sm font-bold text-slate-800 mb-1">Alokasi Laba Tahunan</h4>
            <p class="text-xs text-slate-500 leading-relaxed font-light">Disalurkan langsung untuk program restorasi hutan nasional dan pendanaan modul pendidikan lingkungan hidup gratis.</p>
        </div>
        <div class="p-4">
            <div class="text-4xl font-black text-green-700 mb-2">100%</div>
            <h4 class="text-sm font-bold text-slate-800 mb-1">Bahan Organik & Lokal</h4>
            <p class="text-xs text-slate-500 leading-relaxed font-light">Memanfaatkan pasokan kertas sisa administrasi kampus UKSW Salatiga serta bibit pangan dari produsen tani lokal.</p>
        </div>
        <div class="p-4">
            <div class="text-4xl font-black text-green-700 mb-2">0+</div>
            <h4 class="text-sm font-bold text-slate-800 mb-1">Mesin Industri Berat</h4>
            <p class="text-xs text-slate-500 leading-relaxed font-light">Proses formulasi dibuat dengan efisiensi tinggi tanpa mesin berat rumit, mendukung manufaktur sirkular ramah emisi.</p>
        </div>
    </div>
</div>

<!-- Kalkulator Kebaikan Bumi (Eco-Calculator) -->
<div class="py-24 bg-gradient-to-br from-slate-900 to-[#0f2e20] text-white px-4 relative overflow-hidden">
    <!-- Ornamen Lingkungan -->
    <div class="absolute -top-32 -left-32 w-[500px] h-[500px] bg-emerald-500/20 blur-[100px] rounded-full pointer-events-none"></div>
    <div class="absolute -bottom-32 -right-32 w-[400px] h-[400px] bg-green-400/20 blur-[100px] rounded-full pointer-events-none"></div>
    
    <div class="max-w-5xl mx-auto relative z-10">
        <div class="text-center mb-12">
            <span class="text-xs font-bold text-emerald-400 bg-emerald-900/50 px-4 py-2 rounded-full uppercase tracking-widest border border-emerald-700/50 shadow-sm inline-flex items-center gap-2 mb-4">
                🌍 Fitur Interaktif
            </span>
            <h2 class="text-3xl md:text-5xl font-black mb-4">Kalkulator Kebaikan Bumi</h2>
            <p class="text-slate-300 text-lg font-light max-w-2xl mx-auto">Geser slider di bawah ini untuk melihat dampak positif yang bisa kamu berikan kepada bumi hanya dengan menggunakan Paper Grow.</p>
        </div>

        <!-- Slider Area -->
        <div class="bg-slate-800/50 backdrop-blur-xl p-8 md:p-12 rounded-3xl border border-slate-700/50 shadow-2xl text-center mb-12 relative">
            <h3 class="text-xl text-slate-300 mb-6 font-medium">Berapa paket Paper Grow yang ingin kamu tanam?</h3>
            
            <div class="flex items-center justify-center mb-8">
                <div class="text-5xl md:text-7xl font-black text-transparent bg-clip-text bg-gradient-to-r from-emerald-400 to-green-300" id="calc-input-display">
                    50
                </div>
                <span class="text-2xl text-slate-400 ml-4 font-bold">Paket</span>
            </div>

            <div class="relative max-w-3xl mx-auto px-4">
                <input type="range" id="eco-slider" min="1" max="1000" value="50" class="w-full h-3 bg-slate-700 rounded-lg appearance-none cursor-pointer accent-emerald-500 focus:outline-none focus:ring-2 focus:ring-emerald-500/50 transition-all">
                <div class="flex justify-between text-xs text-slate-500 mt-4 font-bold uppercase tracking-wider">
                    <span>1 Paket</span>
                    <span>500 Paket</span>
                    <span>1000 Paket</span>
                </div>
            </div>
            
            <!-- Dynamic Badge -->
            <div class="mt-8">
                <span id="eco-badge" class="inline-flex items-center gap-2 px-6 py-2 rounded-full bg-blue-500/20 text-blue-300 border border-blue-500/30 text-sm font-bold uppercase tracking-widest transition-all duration-300">
                    🎖️ Sahabat Bumi
                </span>
            </div>
        </div>

        <!-- Result Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Card 1: Sampah Diselamatkan -->
            <div class="bg-slate-800/40 p-6 rounded-2xl border border-slate-700/50 text-center transform hover:-translate-y-2 transition-transform duration-300">
                <div class="text-4xl mb-4">♻️</div>
                <div class="text-3xl font-black text-emerald-400 mb-1"><span id="res-paper">2.5</span> Kg</div>
                <h4 class="text-sm font-bold text-slate-300 uppercase tracking-widest mb-2">Kertas Didaur Ulang</h4>
                <p class="text-xs text-slate-400 font-light">Sampah kertas yang berhasil diselamatkan dari TPA.</p>
            </div>
            <!-- Card 2: CO2 Diserap -->
            <div class="bg-slate-800/40 p-6 rounded-2xl border border-slate-700/50 text-center transform hover:-translate-y-2 transition-transform duration-300">
                <div class="text-4xl mb-4">💨</div>
                <div class="text-3xl font-black text-emerald-400 mb-1"><span id="res-co2">10</span> Kg</div>
                <h4 class="text-sm font-bold text-slate-300 uppercase tracking-widest mb-2">Karbon Diserap</h4>
                <p class="text-xs text-slate-400 font-light">Estimasi gas rumah kaca (CO2) yang diserap per bulan.</p>
            </div>
            <!-- Card 3: Oksigen -->
            <div class="bg-slate-800/40 p-6 rounded-2xl border border-slate-700/50 text-center transform hover:-translate-y-2 transition-transform duration-300">
                <div class="text-4xl mb-4">🍃</div>
                <div class="text-3xl font-black text-emerald-400 mb-1"><span id="res-o2">75</span> L</div>
                <h4 class="text-sm font-bold text-slate-300 uppercase tracking-widest mb-2">Oksigen Dihasilkan</h4>
                <p class="text-xs text-slate-400 font-light">Estimasi produksi oksigen bersih per bulan.</p>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const slider = document.getElementById('eco-slider');
        const display = document.getElementById('calc-input-display');
        const resPaper = document.getElementById('res-paper');
        const resCo2 = document.getElementById('res-co2');
        const resO2 = document.getElementById('res-o2');
        const badge = document.getElementById('eco-badge');

        // Rumus (Estimasi Edukatif):
        // 1 Paket = 0.05 Kg kertas (50 gram)
        // 1 Tanaman = 0.2 Kg CO2 diserap/bulan
        // 1 Tanaman = 1.5 Liter O2 dihasilkan/bulan
        const MULTIPLIER_PAPER = 0.05;
        const MULTIPLIER_CO2 = 0.2;
        const MULTIPLIER_O2 = 1.5;

        function updateCalculator() {
            const val = parseInt(slider.value);
            
            // Update Number Display
            display.textContent = val.toLocaleString();

            // Calculate Metrics
            const paperVal = (val * MULTIPLIER_PAPER).toFixed(1);
            const co2Val = (val * MULTIPLIER_CO2).toFixed(1);
            const o2Val = (val * MULTIPLIER_O2).toFixed(1);

            // Update DOM
            resPaper.textContent = paperVal;
            resCo2.textContent = co2Val;
            resO2.textContent = o2Val;

            // Update Badge Rank Logic
            if(val < 50) {
                badge.innerHTML = '🌱 Pemula Hijau';
                badge.className = 'inline-flex items-center gap-2 px-6 py-2 rounded-full bg-slate-500/20 text-slate-300 border border-slate-500/30 text-sm font-bold uppercase tracking-widest transition-all duration-300';
            } else if(val >= 50 && val < 250) {
                badge.innerHTML = '🎖️ Sahabat Bumi';
                badge.className = 'inline-flex items-center gap-2 px-6 py-2 rounded-full bg-blue-500/20 text-blue-300 border border-blue-500/30 text-sm font-bold uppercase tracking-widest transition-all duration-300';
            } else if(val >= 250 && val < 750) {
                badge.innerHTML = '🛡️ Pelindung Alam';
                badge.className = 'inline-flex items-center gap-2 px-6 py-2 rounded-full bg-emerald-500/20 text-emerald-300 border border-emerald-500/30 text-sm font-bold uppercase tracking-widest transition-all duration-300 shadow-[0_0_15px_rgba(16,185,129,0.3)]';
            } else {
                badge.innerHTML = '👑 Pahlawan Ekologi';
                badge.className = 'inline-flex items-center gap-2 px-6 py-2 rounded-full bg-amber-500/20 text-amber-300 border border-amber-500/30 text-sm font-bold uppercase tracking-widest transition-all duration-300 shadow-[0_0_20px_rgba(245,158,11,0.4)]';
            }
        }

        // Event Listener untuk pergerakan slider yang mulus (realtime)
        slider.addEventListener('input', updateCalculator);
        
        // Panggil fungsi sekali saat load pertama
        updateCalculator();
    });
</script>

<!-- Peta Jejak Edukasi (Indonesia Map) - Natural & Clean Layout -->
<div class="py-16 relative overflow-hidden bg-slate-50 border-t border-slate-200">
    <!-- Ornamen Latar Belakang Lembut -->
    <div class="absolute inset-0 bg-[radial-gradient(#10B981_1px,transparent_1px)] [background-size:40px_40px] opacity-[0.04]"></div>
    <div class="absolute top-10 right-0 w-[400px] h-[400px] bg-green-100/40 rounded-full blur-[80px] pointer-events-none"></div>

    <div class="max-w-6xl mx-auto px-4 relative z-10">
        
        <!-- Header Judul -->
        <div class="text-center mb-12">
            <span class="text-xs font-bold text-emerald-600 uppercase tracking-widest bg-emerald-100/50 px-4 py-1.5 rounded-full border border-emerald-200 mb-3 inline-block">
                Jejak Hijau Nusantara
            </span>
            <h2 class="text-3xl font-black text-slate-800 mt-2">
                Satu Langkah Kecil,<br>Satu Harapan Besar.
            </h2>
        </div>

        <!-- Grid 2 Kolom (Peta & Penjelasan) -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-center">
            
            <!-- KOLOM KIRI: Peta -->
            <div class="lg:col-span-7 relative w-full">
                <!-- Kontainer Peta Bersih (Background Putih untuk Kontras) -->
                <div class="relative rounded-3xl overflow-hidden shadow-md bg-white border border-slate-100 p-4">
                    
                    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-3/4 h-3/4 bg-green-100/30 blur-[40px] rounded-full"></div>

                    <!-- Gambar Peta Vektor (Masking Gradasi: Pulau Terisi Warna Hitam/Gelap) -->
                    <div class="w-full aspect-[650/280] bg-gradient-to-br from-slate-900 via-slate-800 to-emerald-900 relative z-10 opacity-90"
                         style="-webkit-mask-image: url('{{ asset('images/map-indonesia.svg') }}'); -webkit-mask-size: contain; -webkit-mask-repeat: no-repeat; -webkit-mask-position: center; mask-image: url('{{ asset('images/map-indonesia.svg') }}'); mask-size: contain; mask-repeat: no-repeat; mask-position: center;">
                    </div>

                    <!-- Marker: Salatiga, Jawa Tengah -->
                    <div class="absolute group/marker z-20 cursor-pointer" style="left: 36.5%; top: 67.5%;">
                        <!-- Titik Pin Lokasi (Lebih Besar & Warna Kontras) -->
                        <span class="absolute flex h-8 w-8 -translate-x-1/2 -translate-y-1/2">
                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-amber-400 opacity-60"></span>
                            <span class="relative inline-flex rounded-full h-4 w-4 m-auto bg-amber-500 border-2 border-white shadow-md"></span>
                        </span>
                        
                        <!-- Tooltip -->
                        <div class="absolute bottom-full left-1/2 -translate-x-1/2 mb-3 w-max opacity-0 group-hover/marker:opacity-100 transition-all duration-300 pointer-events-none transform translate-y-2 group-hover/marker:translate-y-0">
                            <div class="bg-white px-4 py-2 rounded-xl shadow-lg border border-slate-100 text-center relative">
                                <p class="text-[10px] font-bold text-emerald-600 uppercase tracking-widest">Pusat Operasional</p>
                                <p class="text-sm font-black text-slate-800">Salatiga, Jawa Tengah</p>
                            </div>
                            <!-- Segitiga Bawah -->
                            <div class="w-3 h-3 bg-white border-b border-r border-slate-100 transform rotate-45 absolute -bottom-1.5 left-1/2 -translate-x-1/2"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- KOLOM KANAN: Penjelasan Ekspansi (Fokus Salatiga & Ringkas) -->
            <div class="lg:col-span-5 text-left space-y-6">
                <div>
                    <h3 class="text-2xl font-black text-slate-800 mb-4 leading-tight">
                        Tumbuh dari <br><span class="text-emerald-600">Jantung Jawa Tengah</span>
                    </h3>
                    <p class="text-slate-600 text-sm leading-relaxed font-light text-justify">
                        Perjalanan inovasi Paper Grow bermula dari Salatiga. Fokus utama kami saat ini adalah memberdayakan ekosistem pendidikan dasar (SD) di sekitar wilayah Salatiga dan kampus UKSW.
                    </p>
                </div>
                
                <!-- CTA Box: Hadirkan di Kota Anda (Fungsi Demo) -->
                <a href="{{ route('partnership.index') }}" class="block bg-emerald-50 border border-emerald-100 p-5 rounded-2xl group cursor-pointer hover:bg-emerald-100/60 transition-colors shadow-sm hover:shadow-md">
                    <div class="flex items-center justify-between gap-4">
                        <div>
                            <h4 class="text-sm font-bold text-emerald-800">Hadirkan Paper Grow di Kotamu!</h4>
                            <p class="text-xs text-emerald-600 mt-1 font-light">Ajukan demo gratis untuk sekolah/instansi Anda hari ini.</p>
                        </div>
                        <div class="w-10 h-10 bg-emerald-600 rounded-full flex items-center justify-center shadow-md group-hover:scale-110 group-hover:bg-emerald-500 transition-all shrink-0">
                            <span class="text-white text-lg font-bold">→</span>
                        </div>
                    </div>
                </a>
            </div>

        </div>
    </div>
</div>

<!-- Tim Founder Section dengan Layout Eksklusif -->
<div class="py-20 px-4 max-w-6xl mx-auto">
    <div class="text-center mb-16">
        <span class="text-xs font-bold text-green-600 uppercase tracking-widest bg-green-50 px-3 py-1 rounded-full">Inovator Di Balik Layar</span>
        <h2 class="text-3xl font-bold text-slate-900 mt-2 mb-3">Kenali Para Founder</h2>
        <p class="text-slate-500 text-sm max-w-md mx-auto font-light">
            Sinergi mahasiswa Informatika Engineering Universitas Kristen Satya Wacana dalam mewujudkan media pembelajaran hijau abad ke-21.
        </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        @foreach($founders as $founder)
        <div class="group bg-white rounded-3xl border border-slate-100 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 p-6 flex flex-col items-center text-center">
            <!-- Frame Foto Simpel & Elegan -->
            <div class="relative w-32 h-32 mb-6 mx-auto">
                <!-- Ornamen Lingkaran Latar Belakang -->
                <div class="absolute inset-0 bg-gradient-to-tr from-emerald-100 to-green-50 rounded-full scale-110 group-hover:scale-105 transition-transform duration-500"></div>
                
                <!-- Lingkaran Utama Foto -->
                <div class="relative w-full h-full bg-slate-100 rounded-full overflow-hidden flex items-center justify-center border-4 border-white shadow-md z-10">
                    @if(file_exists(public_path('images/' . $founder['image'])) && $founder['image'] != '')
                        <img src="{{ asset('images/' . $founder['image']) }}" alt="{{ $founder['name'] }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    @else
                        <span class="text-slate-400 text-xs font-medium px-2 text-center leading-tight">Foto<br>{{ explode(' ', $founder['name'])[0] }}</span>
                    @endif
                </div>
            </div>
            
            <h3 class="text-lg font-extrabold text-slate-900 group-hover:text-green-700 transition-colors">{{ $founder['name'] }}</h3>
            <span class="text-[11px] font-bold text-emerald-700 bg-emerald-50 border border-emerald-100/80 px-3 py-1 rounded-full mt-1.5 mb-4 uppercase tracking-wider">
                {{ $founder['role'] }}
            </span>
            <p class="text-slate-500 text-sm leading-relaxed font-light text-center px-2">
                {{ $founder['bio'] }}
            </p>
        </div>
        @endforeach
    </div>
</div>
@endsection