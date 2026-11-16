<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CountryContact extends Model
{
    use HasFactory;

    protected $table = 'country_contacts';

    protected $fillable = [
        'country_name',
        'logo',
        'address',
        'phone',
        'email',
        'status',
        'sort_order',
    ];
}
