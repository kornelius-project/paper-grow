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
        // Update data produk yang sudah ada di database tanpa harus refresh seed
        \App\Models\Product::where('seed_type', 'Bayam')->update(['image' => 'bayam.jpeg']);
        \App\Models\Product::where('seed_type', 'Sawi')->update(['image' => 'sawi.jpeg']);
        \App\Models\Product::where('seed_type', 'Selada')->update(['image' => 'selada.jpeg']);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Rollback ke gambar default
        \App\Models\Product::whereIn('seed_type', ['Bayam', 'Sawi', 'Selada'])->update(['image' => 'product-mockup.png']);
    }
};
