<?php

namespace App\Http\Controllers;

use App\Models\{Order, Product, User};
use Illuminate\Http\Request;
use \Carbon\Carbon;
use Auth;

class AccountController extends Controller
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function showLastOne(Request $request)
    {
        $user_id = Auth::id();
        $orders = Order::where('user_id', $user_id)->orderBy('updated_at', 'desc')->limit(8)->get();
        
        $products = [];
        $quantities = [];
        foreach ($orders as $order) {
            foreach ($order->quantities as $q) {
                $quantities[$order->id][] = $q;
            }
            
            foreach ($order->products as $id) {
                $pd = Product::with('images')->where('id', $id)->first();
                $products[$order->id][] = $pd;
            }
        }
        \Log::debug($products);

        return view('account.dashboard')->with('orders', $orders)->with('products', $products)->with('quantities', $quantities);
    }

    public function showHistory(Request $request)
    {
        $user_id = Auth::id();

        $now = Carbon::now();
        $daysAgo = $now->copy()->subDays(7);
        // \Log::debug($now);
        // \Log::debug($daysAgo);

        $orders = Order::where('user_id', $user_id)->whereBetween('updated_at', [$daysAgo, $now])->get();
        // \Log::debug($order);
        $products = [];
        foreach ($orders->product_id as $id) {
            $pd = Product::with('images')->where('id', $id)->first();
            array_push($products, $pd);
        }

        return view('account.dashboard')->with('orders', $orders)->with('products', $products);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
