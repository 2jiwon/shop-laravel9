<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Banner, Order, Product};

use Illuminate\Database\Eloquent\Builder;

class CollectionLayout extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($type, $display)
    {
        return $this->getData($type, $display);
    }

    public function getData($type, $display)
    {
        $title = "";
        $sub = "";

        switch ($type) {
            case 'trend':
                /**
                 *  트렌드 상품 가져오기
                 */
                $products = Product::where('is_selling', 'Y')->where('is_displaying', 'Y')->orderBy('view_cnt', 'desc')->paginate(20);
                $title = "트렌드 상품";
                $sub = "회원들이 가장 많이 찾는 핫한 상품들 만나보세요!";
                break;
            case 'new':
                /**
                 *  신상품 가져오기
                 */
                $products = Product::where('is_selling', 'Y')->where('is_displaying', 'Y')->orderBy('created_at', 'desc')->paginate(20);
                $title = "신상품";
                $sub = "새로 들어왔어요!";
                break;
            case 'best':
                /**
                 *  베스트 가져오기
                 */
                $products = Product::where('is_selling', 'Y')->where('is_displaying', 'Y')->orderBy('order_cnt', 'desc')->paginate(20);
                $title = "베스트";
                $sub = "지금 제일 많이 팔리는 인기상품 만나보세요!";
                break;
            default:
                # code...
                break;
        }

        $view = "collection-{$display}";
        
        return view($view)
                ->with('type', $type)->with('title', $title)->with('sub', $sub)
                ->with('products', $products);
    }
}
