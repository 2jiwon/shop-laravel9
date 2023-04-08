<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use Log;

class WishlistController extends Controller
{
    public $WISHLIST = [];

    public function getWishlist(Request $request)
    {
        if (Auth::check()) {
            $user = User::find(Auth::id());
            if (!empty($user->wishlist)) {
                \Log::debug("user wishlist not empty");

                $this->WISHLIST = json_decode($user->wishlist, true);
            } 
        }
    }

    public function show(Request $request)
    {
        $this->getWishlist($request);

        \Log::debug($this->WISHLIST);

        $this->checkAndSave();

        return view('account.wishlist')->with('wishlist', $this->WISHLIST);
    }

    public function accountShow(Request $request)
    {
        $this->getWishlist($request);

        \Log::debug($this->WISHLIST);

        $this->checkAndSave();

        return view('account.wishlist')->with('wishlist', $this->WISHLIST);
    }

    /**
     *  동일한 상품을 담은 경우를 체크해서 error를 보냄
     *  다시 체크해서 추가하는 경우 force = true로 넘어옴
     */
    public function check(Request $request)
    {
        $this->getWishlist($request);

        \Log::debug($this->WISHLIST);

        if (!$request->force) {
            foreach ($this->WISHLIST as $wishlist) {
                if ($wishlist[0] == $request->id) {
                    return response()->json(['result' => 'error'], 202);
                } else {
                    continue;
                }
            }
        }

        $this->create($request);
    }

    public function simpleCheck(Request $request)
    {
        $this->getWishlist($request);

        foreach ($this->WISHLIST as $wishlist) {
            if ($wishlist[0] == $request->id) {
                return response()->json(['result' => 'true'], 200);
            } else {
                continue;
            }
        }

        return response()->json(['result' => 'false'], 203);
    }

    public function create(Request $request)
    {
        /**
         * 동일 상품 추가인 경우 force = true
         */
        if ($request->force) {
            for ($i = 0; $i < count($this->WISHLIST); $i++) {
                if ($this->WISHLIST[$i][0] == $request->id) {
                    $this->WISHLIST[$i][1] += $request->quantity;
                    break;
                }
            }
        } else {
            array_push($this->WISHLIST, [$request->id, $request->quantity]);
        }

        \Log::debug($this->WISHLIST);
        
        // 로그인상태이면 DB 사용
        if (Auth::check()) {
            $user = User::find(Auth::id());
            $user->wishlist = $this->WISHLIST;
            $user->save();
        }

        return response()->json(['result' => 'success']);
    }

    /**
     * 수량 수정시
     */
    public function edit(Request $request)
    {
        \Log::debug($request->id);

        $this->getWishlist($request);

        for ($i=0; $i < count($this->WISHLIST); $i++) {
          if ($this->WISHLIST[$i][0] == $request->id[$i]) {
            $this->WISHLIST[$i][1] = $request->quantity[$i];
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
        $this->getWishlist($request);

        for ($i=0; $i < count($this->WISHLIST); $i++) {
          if ($this->WISHLIST[$i][0] == $request->id) {
            array_splice($this->WISHLIST, $i, 1);
          }
        }

        $this->checkAndSave();

        return response()->json(['result' => 'success']);
    }

    public function checkAndSave()
    {
        if (Auth::check()) {
            $user = User::find(Auth::id());
            $user->wishlist = $this->WISHLIST;
            $user->save();
        }
    }
}
