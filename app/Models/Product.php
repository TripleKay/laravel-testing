<?php

namespace App\Models;

use App\Casts\Image;
use App\Models\Brand;
use App\Models\ProductImage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    // protected $cast = [
    //     'image' => Image::class,
    // ];

    protected $fillable = [
        'name','category_id','description','price','instock','brand_id'
    ];

    public function brands(){
        return $this->belongsTo(Brand::class,'brand_id','id');
    }

    public function categories(){
        return $this->belongsTo(Category::class,'category_id','id');
    }

    public function images(){
        return $this->hasMany(ProductImage::class,'product_id','id');
    }

    public function image(){
        return $this->hasOne(ProductImage::class,'product_id','id')->latestOfMany();
    }
}
