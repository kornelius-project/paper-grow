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
            'image' => 'kornelius.JPG',
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

        // Ambil data chat testimoni khusus untuk user ini (berdasarkan session_id)
        $sessionId = session()->getId();
        $chats = \App\Models\CommunityChat::where('session_id', $sessionId)
                    ->orderBy('id', 'desc')->take(20)->get();

        return view('edukasi.encyclopedia', compact('seeds', 'chats'));
    }

    // Fungsi untuk menyimpan Chat Testimoni dan Auto-Responder AI
    public function storeChat(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:1000'
        ]);

        $userMessage = $request->message;
        $sessionId = session()->getId();

        // 1. Simpan pesan user (Selalu di kanan, is_admin = false)
        \App\Models\CommunityChat::create([
            'name' => auth()->check() ? auth()->user()->name : 'Petani Cilik',
            'role' => auth()->check() ? (auth()->user()->is_admin ? 'Admin' : 'Siswa') : 'Siswa',
            'message' => $userMessage,
            'is_admin' => false,
            'session_id' => $sessionId
        ]);

        // 2. Logika AI Auto-Responder Berbasis Kata Kunci
        $lowerMessage = strtolower($userMessage);
        
        $botReply = "Wah, pertanyaan yang menarik! Tapi mohon maaf ya, Profesor Grow adalah **sistem AI otomatis** yang pengetahuannya terbatas. Profesor hanya bisa menjawab pertanyaan seputar **produk Paper Grow, cara menanam, bibit yang kami gunakan**, dan **fakta botani dasar**. Coba tanyakan hal-hal tersebut! 🌱";

        if (str_contains($lowerMessage, 'apa') && str_contains($lowerMessage, 'paper grow')) {
            $botReply = "Paper Grow adalah inovasi **Kertas Benih Daur Ulang**. Kami mendaur ulang limbah kertas menjadi lembaran baru yang di dalamnya disematkan biji-biji tanaman (seperti bayam, caisim, atau bunga zinnia). Jadi, kertas ini tidak akan menjadi sampah, melainkan bisa kamu tanam dan akan tumbuh menjadi tanaman sungguhan! ♻️🌿";
        } elseif (str_contains($lowerMessage, 'tumbuh') || str_contains($lowerMessage, 'lama') || str_contains($lowerMessage, 'waktu')) {
            $botReply = "Biasanya benih dari Paper Grow akan mulai berkecambah (tumbuh) dalam waktu 3 hingga 7 hari, tergantung dari jenis benihnya. Bunga Bougainvillea mungkin butuh waktu lebih lama (14-21 hari). Pastikan tanahnya selalu lembap ya! ⏱️🌱";
        } elseif (str_contains($lowerMessage, 'tanam') || str_contains($lowerMessage, 'cara') || str_contains($lowerMessage, 'bagaimana')) {
            $botReply = "Cara menanamnya sangat mudah!\n1. Robek kertas Paper Grow menjadi potongan kecil.\n2. Taruh di atas pot berisi tanah subur.\n3. Tutup tipis dengan tanah (sekitar 1 cm).\n4. Siram dengan air hingga lembap.\n5. Taruh di tempat yang terkena sinar matahari pagi! ☀️💦";
        } elseif (str_contains($lowerMessage, 'bibit') || str_contains($lowerMessage, 'benih') || str_contains($lowerMessage, 'biji') || str_contains($lowerMessage, 'sayur')) {
            $botReply = "Saat ini Paper Grow menggunakan beberapa jenis benih pilihan yang mudah tumbuh, yaitu: **Bayam Hijau, Sawi Caisim, Selada Air, Bunga Zinnia, dan Bunga Bougainvillea**. Kamu bisa melihat detail masing-masing benih di Ensiklopedia kami di atas! 🥬🌸";
        } elseif (str_contains($lowerMessage, 'beli') || str_contains($lowerMessage, 'harga') || str_contains($lowerMessage, 'pesan') || str_contains($lowerMessage, 'produk')) {
            $botReply = "Kamu bisa melihat berbagai paket Paper Grow beserta harganya di menu 'Produk' yang ada di bagian atas website ini. Kami punya paket Starter Kit dan Edu Kit yang sangat cocok untuk belajar! 🛒✨";
        } elseif (str_contains($lowerMessage, 'kertas') || str_contains($lowerMessage, 'sampah') || str_contains($lowerMessage, 'daur ulang')) {
            $botReply = "Betul sekali! Kertas Paper Grow terbuat dari 100% limbah kertas (seperti kertas bekas kantor atau sekolah) yang didaur ulang secara alami tanpa bahan kimia berbahaya. Kertas ini 100% dapat terurai oleh alam (biodegradable) dan akan menjadi kompos bagi tanamanmu. 🌍♻️";
        } elseif (str_contains($lowerMessage, 'matahari') || str_contains($lowerMessage, 'siram') || str_contains($lowerMessage, 'air') || str_contains($lowerMessage, 'rawat') || str_contains($lowerMessage, 'cahaya')) {
            $botReply = "Merawatnya gampang banget! Siram potmu secukupnya (jangan sampai tergenang) dan pastikan potnya terkena sinar matahari yang cukup. Matahari sangat penting untuk proses Fotosintesis (memasak makanan bagi tanaman). 🌞💧";
        } elseif (str_contains($lowerMessage, 'fotosintesis') || str_contains($lowerMessage, 'hijau') || str_contains($lowerMessage, 'klorofil')) {
            $botReply = "Daun berwarna hijau karena memiliki zat **Klorofil**. Klorofil menangkap sinar matahari untuk mengubah air dan karbon dioksida menjadi makanan bagi tanaman. Proses memasak makanan ini disebut **Fotosintesis**! 🍃✨";
        } elseif (str_contains($lowerMessage, 'ar') || str_contains($lowerMessage, '3d') || str_contains($lowerMessage, 'scan') || str_contains($lowerMessage, 'augmented')) {
            $botReply = "Paper Grow juga dilengkapi dengan fitur Augmented Reality (AR) lho! Kamu bisa memindai (scan) marker pada kemasan kami menggunakan HP untuk melihat model 3D anatomi tanaman secara langsung. Keren banget kan? 📱✨";
        }

        // 3. Simpan pesan balasan dari Bot (Selalu di kiri, is_admin = true)
        \App\Models\CommunityChat::create([
            'name' => 'Profesor Grow',
            'role' => 'AI Assistant',
            'message' => $botReply,
            'is_admin' => true,
            'session_id' => $sessionId
        ]);

        return redirect()->to(url()->previous() . '#chat-section')->with('success', 'Pertanyaan terkirim!');
    }
}