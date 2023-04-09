<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\{User, Product};
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

                // 사용자 카트와 쿠키에 있는 카트가 둘다 비어있지 않은 경우 합치고 쿠키를 비우기
                if (!empty($request->cookie('cart'))) {
                    $cookieCart = json_decode($request->cookie('cart'), true);
                    $userCart = json_decode($user->cart, true);

                    $this->CART = array_merge($userCart, $cookieCart);

                    for ($i = 0; $i < count($this->CART); $i++) {
                        for ($j = $i + 1; $j < count($this->CART); $j++) {
                            if ($this->CART[$i][0] == $this->CART[$j][0]) {
                                $this->CART[$i] = [ $this->CART[$i][0], $this->CART[$i][1] + $this->CART[$j][1]];
                                array_splice($this->CART, $j, 1);
                            }
                        }
                    }
                    \Cookie::queue(\Cookie::forget('cart'));
                } else {
                    $this->CART = json_decode($user->cart, true);
                }
            } else {
                \Log::debug("user cart empty");

                if (!empty($request->cookie('cart'))) {
                    $this->CART = json_decode($request->cookie('cart'), true);
                }
            }
        } else {
            \Log::debug("not logged in");
            \Log::debug($request->cookie('cart'));

            if (!empty($request->cookie('cart'))) {
                \Log::debug("cookie cart not empty");

                $this->CART = json_decode($request->cookie('cart'), true);
            }
        }
    }

    public function show(Request $request)
    {
        $this->getCart($request);

        \Log::debug($this->CART);

        $this->checkAndSave();

        return view('cart')->with('cartList', $this->CART);
    }

    public function accountShow(Request $request)
    {
        $this->getCart($request);

        \Log::debug($this->CART);

        $this->checkAndSave();

        return view('account.cart')->with('cartList', $this->CART);
    }

    /**
     * 배송비 계산
     *  일단은 품목의 배송비 항목중 가장 높은 것으로 가져오기
     */
    public function checkDeliveryFee(Request $request)
    {
        $this->getCart($request);

        $arr = [];
        foreach ($this->CART as $cart) {
            $temp = Product::where('id', $cart[0])->value('delivery_fee');
            array_push($arr, $temp);
        }

        rsort($arr);
        return response()->json(['result' => $arr[0]]);
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
                \Cookie::queue(\Cookie::forget('cart'));
            }
            $user = User::find(Auth::id());
            $user->cart = $this->CART;
            $user->save();

        } else {
            // 로그인 상태가 아니면 쿠키에 저장
            setcookie('cart', json_encode($this->CART), time() + (60 * 60 * 2), "/");
        }

        return response()->json(['result' => 'success']);
    }

    /**
     * 수량 수정시
     */
    public function edit(Request $request)
    {
        \Log::debug($request->id);

        $this->getCart($request);

        for ($i=0; $i < count($this->CART); $i++) {
          if ($this->CART[$i][0] == $request->id[$i]) {
            $this->CART[$i][1] = $request->quantity[$i];
          }
        }

        $this->checkAndSave();

        return response()->json(['result' => 'success']);
    }

    /**
     * 품목 삭제시
     */
    public function delete(Request $request)
    {
        $this->getCart($request);

        for ($i=0; $i < count($this->CART); $i++) {
          if ($this->CART[$i][0] == $request->id) {
            array_splice($this->CART, $i, 1);
          }
        }

        $this->checkAndSave();

        return response()->json(['result' => 'success']);
    }

    public function checkAndSave()
    {
        if (Auth::check()) {
            $user = User::find(Auth::id());
            $user->cart = $this->CART;
            $user->save();
        } else {
            setcookie('cart', json_encode($this->CART), time() + (60 * 60 * 2), "/");
        }
    }
}
