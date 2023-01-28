<?php

namespace App\Http\Controllers;

use App\Models\{Category, Product};
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
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
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Product::create([
            'name' => $request->name,
            'detail' => $request->detail,
            'stock_amount' => $request->stock_amount,
            'supply_price' => $request->supply_price,
            'selling_price' => $request->selling_price,
            'delivery_fee' => $request->delivery_fee,
            'category' => json_encode([$request->cate1, $request->cate2, $request->cate3]),
            'is_selling' => $request->is_selling ?? 'N',
            'is_displaying' => $request->is_displaying ?? 'N',
        ]);

        return response()->json(['result' => 'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $product = Product::find($id);
        $product->update([
            'view_cnt' => $product->view_cnt+1
        ]);

        $category = Product::getCategories($product->category);

        $others = Product::where('category', $product->category)->get();

        return view('product')->with('product', $product)->with('category', $category)->with('others', $others);
    }

    /**
     * Display the group products.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function showLists($id)
    {   
        $products = Product::where('category', $id)->paginate(20);
        $category = Product::getCategories($id);

        return view('category-grid')->with('products', $products)->with('category', $category);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
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
