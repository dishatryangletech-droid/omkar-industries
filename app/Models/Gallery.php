<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = ['tab_name', 'status', 'images'];

    protected $casts = [
        'images' => 'array',
    ];
}
