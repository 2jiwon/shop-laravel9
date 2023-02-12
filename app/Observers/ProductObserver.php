<?php

namespace App\Observers;

use App\Models\{Product, ProductImage};
use Illuminate\Http\Request;

use Illuminate\Support\Str;

class ProductObserver
{
    /**
     *  트랜잭션이 커밋된 후에만 이벤트 핸들러를 실행하도록
     */
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
        $images['main'] = request()->file('image_main');
        $images['detail1'] = request()->file('image_detail1');
        $images['detail2'] = request()->file('image_detail2');

        foreach ($images as $key => $image) {
            $path = $image->storeAs('uploads', Str::lower(Str::random(6)).".".$image->extension(), 'public');

            ProductImage::create([
                'product_id' => $product->id,
                'type' => $key,
                'image' => $path,
            ]);
        }
    }

    /**
     * Handle the Product "updated" event.
     *
     * @param  \App\Models\Product  $product
     * @return void
     */
    public static function updated(Product $product)
    {
        // 이미지 파일 처리
        $keys = ['image_main', 'image_detail1', 'image_detail2'];
        foreach ($keys as $k) {
            $image = request()->file($k);
            
            if (!empty($image)) {
                $path = $image->storeAs('uploads', Str::lower(Str::random(6)).".".$image->extension(), 'public');

                $target = ProductImage::where('product_id', $product->id)->where('type', substr($k, 6));
                $target->update([
                        'type' => substr($k, 6),
                        'image' => $path,
                    ]);
            }
        }
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
