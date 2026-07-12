<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommunityChat extends Model
{
    protected $fillable = [
        'name',
        'role',
        'message',
        'is_admin',
        'session_id',
    ];
}
