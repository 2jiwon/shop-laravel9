<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Banner, Order, Product};

use Illuminate\Database\Eloquent\Builder;

class HomeLayout extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return $this->getBasicData();
    }

    public function getBasicData()
    {
        /**
         *  배너 정보 가져오기
         */
        $main_banners = Banner::where('type', 'main')->where('is_on', 'Y')->get();
        $collection_banners = Banner::where('type', 'collection')->where('is_on', 'Y')->get();

        /**
         *  트렌드 상품 가져오기
         */
        $trends = Product::where('is_selling', 'Y')->where('is_displaying', 'Y')->orderBy('view_cnt', 'desc')->limit(20)->get();

        /**
         *  신상품 가져오기
         */
        $news = Product::where('is_selling', 'Y')->where('is_displaying', 'Y')->orderBy('created_at', 'desc')->limit(20)->get();

        /**
         *  신상품 가져오기
         */
        $bests = Product::where('is_selling', 'Y')->where('is_displaying', 'Y')->orderBy('order_cnt', 'desc')->limit(20)->get();

        return view('home')
                ->with('main_banners', $main_banners)->with('collection_banners', $collection_banners)
                ->with('trends', $trends)
                ->with('bests', $bests)
                ->with('news', $news);
    }
}
