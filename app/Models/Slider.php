<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $fillable = [
        'title',
        'main_title_color',
        'subtitle',
        'sub_title_color',
        'sub_title_bg_color',
        'description',
        'description_color',
        'photo',
        'background_photo',
        'btn_title',
        'btn_link',
        'btn_color',
        'btn_text_color',
        'btn_hover_color',
        'btn_hover_text_color',
        'status',
        'full_screen',
    ];

    protected $casts = [
        'full_screen' => 'boolean',
    ];
}
