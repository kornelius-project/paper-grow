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

    // Fungsi untuk menyimpan Chat Testimoni
    public function storeChat(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:1000'
        ]);

        \App\Models\CommunityChat::create([
            'name' => auth()->check() ? auth()->user()->name : 'Petani Cilik Anonim',
            'role' => auth()->check() ? (auth()->user()->is_admin ? 'Paper Grow Admin' : 'Siswa/Orang Tua') : 'Pengguna',
            'message' => $request->message,
            'is_admin' => auth()->check() ? auth()->user()->is_admin : false
        ]);

        return redirect()->back()->with('success', 'Cerita serumu berhasil dikirim!');
    }
}