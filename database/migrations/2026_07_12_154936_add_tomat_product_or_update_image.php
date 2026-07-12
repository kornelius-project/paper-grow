<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Update gambar jika produk Tomat sudah ada, atau buat baru jika belum ada
        \App\Models\Product::updateOrCreate(
            ['seed_type' => 'Tomat'],
            [
                'name' => 'Paper Grow - Paket Sayur Tomat',
                'description' => 'Media tanam kertas daur ulang yang ramah lingkungan dengan benih Tomat.',
                'size' => '10x15 cm',
                'sheets_per_pack' => 5,
                'qr_code_image' => 'tomat.jpg',
                'price' => 15000,
                'image' => 'tomat.jpeg',
                'stock' => 150
            ]
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Rollback
        \App\Models\Product::where('seed_type', 'Tomat')->update(['image' => 'product-mockup.png']);
    }
};
