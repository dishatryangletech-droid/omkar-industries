<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WelcomePopup extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'title',
        'subtitle',
        'content',
        'button_text',
        'button_link',
        'is_active',
    ];
}
