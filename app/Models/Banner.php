<?php

namespace App\Models;

use App\Casts\Image;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Banner extends Model
{
    use HasFactory;

    protected $casts = [
        'image' => Image::class
    ];

    protected $fillable = [
        'name','image'
    ];


}
