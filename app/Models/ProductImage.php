<?php

namespace App\Models;

use App\Casts\Image;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use HasFactory;

    protected $casts = [
        'image' => Image::class,
    ];

    protected $fillable = [
        'image','product_id'
    ];
}