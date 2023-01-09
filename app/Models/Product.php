<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     *  Product Image
     */
    public function images() {
        return $this->hasMany(ProductImage::class);
    }

    /**
     *  Category
     */
    public function categories() {
        return $this->hasMany(Category::class);
    }
}