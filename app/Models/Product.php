<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Tambahkan properti ini untuk keamanan data kolom tabel Anda
    protected $fillable = [
        'name',
        'description',
        'seed_type',
        'size',
        'sheets_per_pack',
        'qr_code_image',
        'stock',
    ];
}