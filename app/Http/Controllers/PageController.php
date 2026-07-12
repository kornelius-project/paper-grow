<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    // Tambahkan fungsi home() ini
    public function home()
    {
        // Data dampak SDG yang didukung oleh Paper Grow
        $sdgImpacts = [
            ['number' => 4, 'title' => 'Pendidikan Berkualitas', 'desc' => 'Menyediakan alat pengajaran interaktif 3D AR terintegrasi.'],
            ['number' => 12, 'title' => 'Konsumsi & Produksi Bertanggung Jawab', 'desc' => 'Mendaur ulang limbah kertas menjadi kertas benih bernilai tinggi.'],
            ['number' => 15, 'title' => 'Kehidupan di Darat', 'desc' => 'Mendorong penanaman bunga Bougainvillea & Zinnia untuk konservasi sejak dini.'],
        ];

        // Hitung statistik (dinamis)
        $partnershipCount = \App\Models\Partnership::count();
        $schoolCount = 2 + $partnershipCount; // Base 2 sekolah untuk social proof + data riil
        $orderCount = \App\Models\Order::count();
        $cityCount = 8 + ($orderCount > 0 ? (int)($orderCount / 2) : 0);
        
        return view('home', compact('sdgImpacts', 'schoolCount', 'orderCount', 'cityCount'));
    }

    // Tambahkan juga fungsi about() agar nanti halaman 'Tentang Kami' tidak eror
   public function about()
{
    // Data Tim Founder Paper Grow sesuai struktur organisasi proposal
    $founders = [
        [
            'name' => 'Setyo Budi Nugroho',
            'role' => 'Chief Executive Officer (CEO)',
            'image' => 'setyo.jpeg', // Taruh foto Anda di folder public/images/
            'bio' => 'Mahasiswa Informatika UKSW yang fokus pada arah strategis bisnis, integrasi teknologi, dan keberlanjutan inovasi produk.'
        ],
        [
            'name' => 'Vyrla Juniati',
            'role' => 'Chief Operating & Marketing Officer',
            'image' => 'vyrla.jpeg',
            'bio' => 'Bertanggung jawab atas efisiensi manajemen produksi, rantai pasok kualitas kertas benih, serta kemitraan strategis dengan sekolah.'
        ],
        [
            'name' => 'Kornelius Candra Kurniawan',
            'role' => 'Chief Technology Officer (CTO)',
            'image' => 'kornelius.jpg',
            'bio' => 'Mengembangkan, mengelola, dan mengintegrasikan konten visual edukasi 3D & Augmented Reality interaktif.'
        ]
    ];

    return view('about', compact('founders'));
}

    // Fungsi untuk Ensiklopedia Bibit
    public function encyclopedia()
    {
        $seeds = [
            [
                'name' => 'Bayam Hijau',
                'icon' => '🥬',
                'germination' => '3 - 5 Hari',
                'water' => 'Sedang (1x Sehari)',
                'sunlight' => 'Penuh',
                'fact' => 'Bayam sangat kaya akan zat besi dan vitamin K. Akar bayam juga membantu menggemburkan tanah.',
                'product_url' => route('products.index')
            ],
            [
                'name' => 'Sawi Caisim',
                'icon' => '🌱',
                'germination' => '4 - 7 Hari',
                'water' => 'Tinggi (2x Sehari)',
                'sunlight' => 'Parsial - Penuh',
                'fact' => 'Sawi sangat cepat panen (hanya ~30 hari) sehingga sangat cocok untuk edukasi kesabaran dan proses biologis anak.',
                'product_url' => route('products.index')
            ],
            [
                'name' => 'Selada Air',
                'icon' => '🥗',
                'germination' => '7 - 10 Hari',
                'water' => 'Tinggi (Selalu Lembap)',
                'sunlight' => 'Parsial',
                'fact' => 'Selada memiliki daun yang sangat sensitif terhadap panas. Tanaman ini bagus untuk percobaan hidroponik sederhana.',
                'product_url' => route('products.index')
            ],
            [
                'name' => 'Bunga Zinnia',
                'icon' => '🌸',
                'germination' => '5 - 7 Hari',
                'water' => 'Sedang (1x Sehari)',
                'sunlight' => 'Penuh',
                'fact' => 'Bunga Zinnia sangat disukai oleh kupu-kupu dan lebah, sehingga sangat baik untuk edukasi ekosistem polinator (SDG 15).',
                'product_url' => route('products.index')
            ],
            [
                'name' => 'Bunga Bougainvillea',
                'icon' => '🌺',
                'germination' => '14 - 21 Hari',
                'water' => 'Rendah (Tahan Kering)',
                'sunlight' => 'Penuh (Panas)',
                'fact' => 'Tanaman ini sangat adaptif di cuaca ekstrem. Bunganya yang cerah sebenarnya adalah daun yang bermodifikasi (braktea).',
                'product_url' => route('products.index')
            ]
        ];

        // Ambil data chat testimoni
        $chats = \App\Models\CommunityChat::orderBy('created_at', 'desc')->take(20)->get();

        return view('edukasi.encyclopedia', compact('seeds', 'chats'));
    }

    // Fungsi untuk menyimpan Chat Testimoni dan Auto-Responder AI
    public function storeChat(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:1000'
        ]);

        $userMessage = $request->message;

        // 1. Simpan pesan user (Selalu di kanan, is_admin = false)
        \App\Models\CommunityChat::create([
            'name' => auth()->check() ? auth()->user()->name : 'Petani Cilik',
            'role' => auth()->check() ? (auth()->user()->is_admin ? 'Admin' : 'Siswa') : 'Siswa',
            'message' => $userMessage,
            'is_admin' => false
        ]);

        // 2. Logika AI Auto-Responder Berbasis Kata Kunci
        $lowerMessage = strtolower($userMessage);
        
        $botReply = "Wah, pertanyaan yang bagus! Sayangnya Profesor Grow saat ini hanya difokuskan untuk menjawab seputar cara menanam, biji, dan informasi mengenai produk Paper Grow. Coba tanyakan hal lain seputar itu ya! 🌱";

        if (str_contains($lowerMessage, 'tumbuh') || str_contains($lowerMessage, 'lama') || str_contains($lowerMessage, 'waktu')) {
            $botReply = "Biasanya benih dari Paper Grow akan mulai berkecambah (tumbuh) dalam waktu 3 hingga 7 hari, tergantung dari jenis benihnya. Pastikan tanahnya selalu lembap ya! ⏱️🌱";
        } elseif (str_contains($lowerMessage, 'tanam') || str_contains($lowerMessage, 'cara') || str_contains($lowerMessage, 'biji')) {
            $botReply = "Cara menanamnya sangat mudah! Robek kertas Paper Grow menjadi potongan kecil, taruh di atas pot berisi tanah subur, tutup tipis dengan tanah lagi, lalu siram dengan air hingga lembap. Jangan lupa taruh di tempat yang terkena sinar matahari! ☀️💦";
        } elseif (str_contains($lowerMessage, 'apa') && str_contains($lowerMessage, 'paper grow')) {
            $botReply = "Paper Grow adalah kertas daur ulang inovatif yang di dalamnya sudah tertanam biji tanaman asli (seperti bayam, caisim, atau bunga). Daripada dibuang jadi sampah, kertas ini bisa kamu tanam dan akan tumbuh menjadi sayuran atau bunga sungguhan! ♻️🌿";
        } elseif (str_contains($lowerMessage, 'beli') || str_contains($lowerMessage, 'harga') || str_contains($lowerMessage, 'pesan') || str_contains($lowerMessage, 'produk')) {
            $botReply = "Kamu bisa melihat berbagai paket Paper Grow beserta harganya di menu 'Produk' yang ada di bagian atas website ini. Kami punya paket Starter Kit yang seru banget lho! 🛒✨";
        } elseif (str_contains($lowerMessage, 'kertas') || str_contains($lowerMessage, 'sampah') || str_contains($lowerMessage, 'daur ulang')) {
            $botReply = "Betul sekali! Kertas Paper Grow terbuat dari 100% limbah kertas yang didaur ulang secara alami tanpa bahan kimia berbahaya, sehingga sangat aman untuk tanah dan bisa terurai sepenuhnya (biodegradable). 🌍♻️";
        } elseif (str_contains($lowerMessage, 'matahari') || str_contains($lowerMessage, 'siram') || str_contains($lowerMessage, 'air') || str_contains($lowerMessage, 'rawat')) {
            $botReply = "Merawatnya gampang banget! Siram potmu sehari sekali saja (jangan sampai tergenang air) dan pastikan potnya terkena sinar matahari pagi yang cukup. Tanaman sangat butuh cahaya untuk fotosintesis! 🌞💧";
        }

        // 3. Simpan pesan balasan dari Bot (Selalu di kiri, is_admin = true)
        \App\Models\CommunityChat::create([
            'name' => 'Profesor Grow',
            'role' => 'AI Assistant',
            'message' => $botReply,
            'is_admin' => true 
        ]);

        return redirect()->back()->with('success', 'Pertanyaan terkirim!');
    }
}