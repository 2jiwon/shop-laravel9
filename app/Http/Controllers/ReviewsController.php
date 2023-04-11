<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

use Auth;

class ReviewsController extends Controller
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
    public function create(Request $request)
    {
        $msg = "";
        try {
            $res = Review::create([
                'product_id' => $request->product_id,
                'user_id' => $request->user()->id,
                'rate' => $request->rate,
                'title' => $request->title,
                'contents' => $request->contents,
            ]);

            if (!$res) throw new Exception("저장에 실패했어요.", 1);
            
        } catch (\Throwable $th) {
            $msg = "fail ".$th->getMessage();
        }

        return response()->json(['result' => $msg]);
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
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function show(Review $review)
    {
        $reviews = Review::where('user_id', Auth::id())->where('is_deleted', 'N')->get();
        return view('account.reviews')->with('reviews', $reviews);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function edit(Review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Review $review)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review $review)
    {
        //
    }
}
