<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up(): void {
    Schema::create('products', function (Blueprint $table) {
        $table->id();
        $table->string('name'); // Contoh: Paket Kertas Benih Paper Grow
        $table->text('description');
        $table->string('seed_type'); // Bougainvillea / Zinnia
        $table->string('size')->default('10x15 cm'); // Sesuai proposal
        $table->integer('sheets_per_pack')->default(5); // 1 paket isi 5 lembar
        $table->string('qr_code_image')->nullable(); // Untuk asset gambar QR Assemblr
        $table->integer('price')->default(15000); // Harga produk
        $table->string('image')->nullable(); // Foto produk asli
        $table->integer('stock')->default(0);
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
