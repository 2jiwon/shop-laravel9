<?php

namespace App\Observers;

use App\Models\{Order, Product, User, UserAddress};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class OrderObserver
{
    /**
     * Handle the Order "created" event.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function created(Order $order)
    {
        //
    }

    /**
     * Handle the Order "updated" event.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public static function updated(Order $order)
    {
        $target_address = UserAddress::find($order->user_address_id);
        $arr = ['phone', 'zipcode', 'address1', 'address2'];
        $new = [];
        foreach ($arr as $val) {
            if (!empty($request->$val)) {
                $new[$val] = $request->$val;
            }
        }
        if (!empty($new)) {
            $target_address->update($new);
        }
        // 상품준비중이 되면 상품 수량을 하나 감소시킴
        if ($order->status == 3) {
            foreach ($order->products as $product) {
                Product::where('id', $product)->decrement('stock_amount');
            }
        }
    }

    /**
     * Handle the Order "deleted" event.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function deleted(Order $order)
    {
        //
    }

    /**
     * Handle the Order "restored" event.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function restored(Order $order)
    {
        //
    }

    /**
     * Handle the Order "force deleted" event.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function forceDeleted(Order $order)
    {
        //
    }
}
