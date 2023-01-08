<?php

namespace App\Observers;

use App\Models\{Product, ProductImage};
use Illuminate\Http\Request;

use Illuminate\Support\Str;

class ProductObserver
{
    public $afterCommit = true;
    
    /**
     * Handle the Product "created" event.
     *
     * @param  \App\Models\Product  $product
     * @return void
     */
    public function created(Product $product)
    {
        // 이미지 파일 처리
        $images = [];
        array_push($images, request()->file('image_main'));
        array_push($images, request()->file('image_detail'));

        foreach ($images as $key => $image) {
            $path = $image->storeAs('uploads', Str::lower(Str::random(6)).".".$image->extension());

            ProductImage::create([
                'product_id' => $product->id,
                'type' => ($key == 0) ? 'main' : 'detail',
                'filename' => $path,
            ]);
        }
    }

    /**
     * Handle the Product "updated" event.
     *
     * @param  \App\Models\Product  $product
     * @return void
     */
    public function updated(Product $product)
    {
        //
    }

    /**
     * Handle the Product "deleted" event.
     *
     * @param  \App\Models\Product  $product
     * @return void
     */
    public function deleted(Product $product)
    {
        //
    }

    /**
     * Handle the Product "restored" event.
     *
     * @param  \App\Models\Product  $product
     * @return void
     */
    public function restored(Product $product)
    {
        //
    }

    /**
     * Handle the Product "force deleted" event.
     *
     * @param  \App\Models\Product  $product
     * @return void
     */
    public function forceDeleted(Product $product)
    {
        //
    }
}
