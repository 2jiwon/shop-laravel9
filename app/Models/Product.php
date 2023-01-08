<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $primaryKey = 'product_id';

    protected $guarded = [];

    /**
     *  Product Image
     */
    public function images() {
        return $this->hasMany(ProductImage::class);
    }
}
