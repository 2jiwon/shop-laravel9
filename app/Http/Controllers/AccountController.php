<?php

namespace App\Http\Controllers;

use App\Models\{Order, Product, User, UserAddress};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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
    public function showMyInfo(Request $request)
    {
        $uid = Auth::id();
        $user = User::with('user_addresses')->where('id', $uid)->first();

        return view('account.details')->with('user', $user);
    }

    /**
     * 주문 현황
     *
     * 상태가 배송중 이하인 주문만 표시
     * 
     */
    public function showLastOne(Request $request)
    {
        $user_id = Auth::id();
        $orders = Order::where('user_id', $user_id)
                        ->where(function($qry) {
                            $qry->where('status', 0)
                                ->orWhere('status', '<', 6);
                        })
                        ->orderBy('updated_at', 'desc')
                        ->limit(8)->get();
        
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
        // \Log::debug($products);

        return view('account.dashboard')->with('orders', $orders)->with('products', $products)->with('quantities', $quantities);
    }

    /**
     * 주문 내역
     * 
     * 상태가 배송완료 이상인 주문만 표시
     * 
     */
    public function showHistory(Request $request)
    {
        $user_id = Auth::id();

        $now = Carbon::now();
        $daysAgo = $now->copy()->subDays(7);
        $orders = Order::where('user_id', $user_id)
                        ->where(function($qry) {
                            $qry->where('status', 0)
                                ->orWhere('status', '>=', 6);
                        })
                        ->whereBetween('updated_at', [$daysAgo, $now])
                        ->orderBy('updated_at', 'desc')->get();
        // \Log::debug($order);

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

        return view('account.orders')->with('orders', $orders)->with('products', $products)->with('quantities', $quantities);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $msg = "";
        try {
            $target = User::find($request->id);
            $fields = ['email', 'nickname'];
            foreach ($fields as $field) {
                if (!empty($request->field)) {
                    if ($field == 'email') {
                        $request->validate([
                            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class]
                        ]);
                    }
                    $target[$field] = $request->$field;
                }
            }
            // 비밀번호 변경시
            if (!empty($request->password1) && !empty($request->password2)) {
                $target['password'] = Hash::make($request->password1);
            }
            $target->save();

            $target_address = UserAddress::where('user_id', $target->id)->where('type', 'main')->first();
            // 만약 없으면 새로 만들고 아래에서 업데이트
            if (empty($target_address)) {
                $target_address = UserAddress::create([
                    'type' => 'main',
                    'user_id' => $target->id
                ]);
            }

            $address_fields = ['phone', 'zipcode', 'address1', 'address2'];
            $new = [];
            foreach ($address_fields as $field) {
                if (!empty($request->$field)) {
                    $new[$field] = $request->$field;
                }
            }
            if (!empty($new)) {
                $target_address->update($new);
            }
            $msg = "success";
        } catch (\Throwable $th) {
            $msg = "fail"." ".$th->getMessage();
        }

        return response()->json(['result' => $msg]);
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
