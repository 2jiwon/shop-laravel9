<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use Log;
use Cookie;

class CartController extends Controller
{
    public $CART = [];

    public function getCart(Request $request)
    {
        if (Auth::check()) {
            $user = User::find(Auth::id());
            if (!empty($user->cart)) {
                \Log::debug("user cart not empty");

                $this->CART = json_decode($user->cart, true);
            } else {
                \Log::debug("user cart empty");

                if (!empty($request->cookie('cart'))) {
                    $this->CART = json_decode($request->cookie('cart'), true);
                }
            }
        } else {
            \Log::debug("not loggin");
            \Log::debug($request->cookie('cart'));

            if (!empty($request->cookie('cart'))) {
                \Log::debug("not empty1");

                $this->CART = json_decode($request->cookie('cart'), true);
            }
        }
    }

    public function show(Request $request)
    {
        $this->getCart($request);

        \Log::debug($this->CART);

        return view('cart')->with('cartList', $this->CART);
    }

    /**
     *  동일한 상품을 담은 경우를 체크해서 error를 보냄
     *  다시 체크해서 추가하는 경우 force = true로 넘어옴
     */
    public function check(Request $request)
    {
        $this->getCart($request);

        \Log::debug($this->CART);

        if (!$request->force) {
            foreach ($this->CART as $cart) {
                if ($cart[0] == $request->id) {
                    return response()->json(['result' => 'error'], 202);
                } else {
                    continue;
                }
            }
        }

        $this->create($request);
    }

    public function create(Request $request)
    {
        /**
         * 동일 상품 추가인 경우 force = true
         */
        if ($request->force) {
            for ($i = 0; $i < count($this->CART); $i++) {
                if ($this->CART[$i][0] == $request->id) {
                    $this->CART[$i][1] += $request->quantity;
                    break;
                }
            }
        } else {
            array_push($this->CART, [$request->id, $request->quantity]);
        }

        \Log::debug($this->CART);
        
        // 로그인상태이면 DB 사용
        if (Auth::check()) {

            if (!empty($request->cookie('cart'))) {
                // setcookie('cart', "", 0, "/");
                \Cookie::queue(\Cookie::forget('cart'));
            }
            // 쿠키 제거하는 방법 둘다 동작을 안함

            $user = User::find(Auth::id());
            $user->cart = $this->CART;
            $user->save();

        } else {
            // 로그인 상태가 아니면 쿠키에 저장
            setcookie('cart', json_encode($this->CART), time() + (60 * 60 * 2), "/");
            // return response()->view('cart')->cookie('cart', json_encode($cart), 120);
            // <-- 라라벨에서 쓰라 cookie를 써서 저장하면 시간이 완전 이상하게 저장됨, deleted라고 나오면서 저장 자체가 안되는것 같음
            // <-- php에서 쓰는대로 해도 시간이 이상하게 저장되나 그래도 값은 저장이 됨..
        }

        return response()->json(['result' => 'success']);
    }
}
