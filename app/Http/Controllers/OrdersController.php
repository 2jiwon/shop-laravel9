<?php

namespace App\Http\Controllers;

use App\Models\{Order, Product, UserAddress};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

    public function create($id, $quantity)
    {
        $product = Product::find($id);

        return view('shipping-method')->with('product', $product)->with('quantity', $quantity);
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
            'name' => '',
            'phone' => $request->phone_receiver,
            'zipcode' => $request->zip,
            'address1' => $request->address1,
            'address2' => $request->address2
        ];
        $res = UserAddress::create($data);

        $data = [
            'user_id' => Auth::user()->id,
            'user_address_id' => $res->id,
            'payments_id' => 1,
            'status' => 1,
            'products' => [$request->product_id],
            'quantities' => [$request->quantity],
            'total_amount' => $request->total_amount
        ];
        $res = Order::create($data);

        if (empty($res)) return response()->json(['result' => 'fail']);

        return response()->json(['result' => 'success']);
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
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
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
