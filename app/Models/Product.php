<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];

    protected $casts = [
        'slider_images' => 'array',
        'key_features' => 'array',
        'industries' => 'array',
        'core_applications' => 'array',
        'advantages' => 'array',
        'related_products' => 'array',
        'specially_designed_parts' => 'array',
        'image_parts' => 'array',
    ];

    public function specifications()
    {
        return $this->hasMany(ProductSpecification::class, 'product_id');
    }

    public function applications()
    {
        return $this->belongsToMany(Application::class, 'application_product');
    }

    public function related_industries()
    {
        return $this->belongsToMany(Industry::class, 'industry_product');
    }

    public function parent()
    {
        return $this->belongsTo(Product::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Product::class, 'parent_id');
    }

    public function sections()
    {
        return $this->hasMany(ProductSection::class, 'product_id');
    }
}
