<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        // Bersihkan data lama
        Schema::disableForeignKeyConstraints();
        Product::truncate();
        Schema::enableForeignKeyConstraints();

        // 1. Varian Bayam
        Product::create([
            'name' => 'Paper Grow - Paket Sayur Bayam',
            'description' => 'Kertas benih edukatif dari bubur kertas daur ulang dengan benih Bayam hijau pilihan. Memudahkan siswa mengamati proses perkecambahan cepat dan pertumbuhan daun secara langsung maupun lewat visualisasi 3D AR Assemblr EDU.',
            'seed_type' => 'Bayam',
            'size' => '10x15 cm',
            'sheets_per_pack' => 5,
            'qr_code_image' => 'bayam.jpg', // <-- Mengarah ke public/images/bayam.jpg
            'price' => 15000,
            'image' => 'product-mockup.png',
            'stock' => 150
        ]);

        // 2. Varian Sawi
        Product::create([
            'name' => 'Paper Grow - Paket Sayur Sawi (Choy Sum)',
            'description' => 'Media tanam kertas daur ulang yang ramah lingkungan dengan benih Sawi. Sangat cocok untuk praktik biologi dasar di sekolah dasar dalam mempelajari siklus hidup tanaman pangan.',
            'seed_type' => 'Sawi',
            'size' => '10x15 cm',
            'sheets_per_pack' => 5,
            'qr_code_image' => 'sawi.jpg', // <-- Mengarah ke public/images/sawi.jpg
            'price' => 15000,
            'image' => 'product-mockup.png',
            'stock' => 150
        ]);

        // 3. Varian Selada
        Product::create([
            'name' => 'Paper Grow - Paket Sayur Selada',
            'description' => 'Paket kertas benih berisi bibit Selada premium. Memberikan pengalaman ganda menanam fisik dan mengeksplorasi struktur anatomi tanaman secara digital interaktif.',
            'seed_type' => 'Selada',
            'size' => '10x15 cm',
            'sheets_per_pack' => 5,
            'qr_code_image' => 'selada.jpg', // <-- Mengarah ke public/images/selada.jpg
            'price' => 15000,
            'image' => 'product-mockup.png',
            'stock' => 150
        ]);
    }
}