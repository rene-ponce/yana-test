<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserActivity extends Model
{
    use HasFactory;

    protected $fillable = [
        'uid',
        'message_text',
        'message_from',
        'datetime'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
