<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partnership extends Model
{
    use HasFactory;

    protected $fillable = [
        'school_name',
        'teacher_name',
        'phone_number',
        'message',
        'status',
    ];
}