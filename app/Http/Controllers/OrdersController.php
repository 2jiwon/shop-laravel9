<?php

namespace App\Http\Controllers;

use App\Models\{Order, Product, UserAddress};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Observers\OrderObserver;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::paginate(15);

        return view('admin.orders')->with('orders', $orders);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function preCreate($id, $quantity)
    {
        $product = Product::find($id);

        return view('customer-info')->with('product', $product)->with('quantity', $quantity);
    }

    public function create($id)
    {
        $order = Order::find($id);
        $product = Product::find($order->products[0]);

        return view('shipping-method')->with('order', $order)->with('product', $product);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = [
            'user_id' => Auth::user()->id,
            'type' => 'sub',
            'phone' => $request->phone_receiver,
            'zipcode' => $request->zip,
            'address1' => $request->address1,
            'address2' => $request->address2
        ];
        $res = UserAddress::create($data);

        $data = [
            'user_id' => Auth::user()->id,
            'user_address_id' => $res->id,
            'status' => 1,
            'products' => [$request->product_id],
            'quantities' => [$request->quantity],
            'total_amount' => $request->total_amount
        ];
        $res = Order::create($data);

        if (empty($res)) return response()->json(['result' => 'fail']);

        return response()->json(['result' => 'success', 'oid' => $res->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::with(['product', 'user', 'user_address'])->find($id);

        // return response()->json(['result' => 'success', 'order' => $order]);
        return view('admin.orderedit')->with('order', $order);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $target = Order::find($request->id);
        
        $target->status = $request->status;
        $target->total_amount = $request->total_amount;
        $target->quantities = $request->quantities;
        $target->save();

        /** Order의 다른 컬럼들은 변경사항이 없고 관계성으로 연결된 모델이 변경될 때 */
        if (!$target->wasChanged()) {
            OrderObserver::updated($target);
        }

        return response()->json(['result' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
