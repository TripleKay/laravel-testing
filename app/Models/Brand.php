<?php

namespace App\Models;

use App\Casts\Image;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Brand extends Model
{
    use HasFactory;

    protected $casts = [
        'image' => Image::class
    ];

    protected $fillable = [
      'name','image'
    ];

    public function products(){
        return $this->hasMany(Product::class,'brand_id','id');
    }
}