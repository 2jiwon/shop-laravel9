<?php

namespace App\Http\Controllers;

use App\Models\{Category, Product, ProductImage, Question, Review};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Observers\ProductObserver;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     * Admin > 상품관리 > 상품 목록 표시
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(15);

        return view('admin.products')->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     * 새로운 상품 등록 처리
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /**
         *  cate_sub2 : 소 카테고리
         *  cate_sub1 : 중 카테고리
         *  cate_main : 대 카테고리 
         * */ 
        if (!empty($request->cate_sub2)) $request->category = $request->cate_sub2;
        else {
            if (!empty($request->cate_sub1)) $request->category = $request->cate_sub1;
            else {
                $request->category = $request->cate_main;
            }
        }

        Product::create([
            'name' => $request->name,
            'detail' => $request->detail,
            'stock_amount' => $request->stock_amount,
            'supply_price' => $request->supply_price,
            'selling_price' => $request->selling_price,
            'delivery_fee' => $request->delivery_fee,
            'category' => $request->category,
            'is_selling' => $request->is_selling ?? 'N',
            'is_displaying' => $request->is_displaying ?? 'N',
        ]);

        return response()->json(['result' => 'success']);
    }

    /**
     * Display the specified resource.
     * 단일 상품 표시
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $product = Product::find($id);
        // 단일 상품 조회시마다 view_cnt를 증가시킴
        $product->update([
            'view_cnt' => $product->view_cnt+1
        ]);

        $category = Product::getCategories($product->category);

        // 리뷰
        $reviews = Review::where('product_id', $id)->where('is_deleted', 'N')->get();
        // 문의
        $questions = Question::where('product_id', $id)->where('is_deleted', 'N')->get();

        // 비슷한 상품 표시를 위한 데이터
        $others = Product::where('category', $product->category)->get();

        return view('product')
                ->with('product', $product)
                ->with('category', $category)
                ->with('reviews', $reviews)
                ->with('questions', $questions)
                ->with('others', $others);
    }

    /**
     * Display the group products.
     * category 선택시 grid, list에 따라서 상품 목록 표시
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function showLists($id, $display)
    {   
        $products = Product::where('category', $id)->paginate(20);
        // 선택한 카테고리를 표시하기 위한 데이터
        $category = Product::getCategories($id);

        $view = "category-{$display}";

        return view($view)->with('id', $id)
                          ->with('products', $products)
                          ->with('category', $category);
    }


    /**
     * Show the form for editing the specified resource.
     * 수정 폼에 데이터를 표시하기 위한 부분
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);

        $images = ProductImage::where('product_id', $id)->get();
        foreach ($images as $image) {
            $key = "image_".$image->type;
            $product[$key] = $image->image;
        }
        $category = Category::find($product->category);

        return response()->json(['result' => 'success', 'product' => $product, 'product.category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     * 수정 > 업데이트 처리는 여기에서
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        /**
         *  cate_sub2 : 소 카테고리
         *  cate_sub1 : 중 카테고리
         *  cate_main : 대 카테고리 
         * */ 
        if (!empty($request->cate_sub2)) $request->category = $request->cate_sub2;
        else {
            if (!empty($request->cate_sub1)) $request->category = $request->cate_sub1;
            else {
                $request->category = $request->cate_main;
            }
        }

        $target = Product::find($request->id);
        $target->name = $request->name;
        $target->detail = $request->detail;
        $target->stock_amount = $request->stock_amount;
        $target->supply_price = $request->supply_price;
        $target->selling_price = $request->selling_price;
        $target->delivery_fee = $request->delivery_fee;
        $target->category = $request->category;
        $target->is_selling = $request->is_selling ?? 'N';
        $target->is_displaying = $request->is_displaying ?? 'N';
        $target->save();

        /** 상품의 다른 컬럼들은 변경사항이 없고 이미지만 변경될 때 처리 */
        if (!$target->wasChanged() && !empty($request->file())) {
            ProductObserver::updated($target);
        }

        return response()->json(['result' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
