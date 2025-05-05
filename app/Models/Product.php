<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'price',
        'description',
        'image_url'
    ];

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }


    use HasFactory;
}
