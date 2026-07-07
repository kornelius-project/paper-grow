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
    Schema::create('partnerships', function (Blueprint $table) {
        $table->id();
        $table->string('school_name'); // Target SD/MI
        $table->string('teacher_name'); // Nama Guru/Kontak
        $table->string('phone_number'); // WhatsApp aktif[cite: 1]
        $table->text('message')->nullable();
        $table->enum('status', ['pending', 'contacted', 'deal'])->default('pending');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('partnerships');
    }
};
