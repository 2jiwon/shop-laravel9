<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Banner, Product};

class Layouts extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return $this->getBanners();
    }

    public function getBanners()
    {
        $main_banners = Banner::where('type', 'main')->where('is_on', 'Y')->get();
        $collection_banners = Banner::where('type', 'collection')->where('is_on', 'Y')->get();

        return view('home')->with('main_banners', $main_banners)->with('collection_banners', $collection_banners);
    }
}
