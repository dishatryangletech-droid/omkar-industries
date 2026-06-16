<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductSpecification extends Model
{
    protected $guarded = [];

    protected $casts = [
        'table_headers' => 'array',
        'table_data' => 'array',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
