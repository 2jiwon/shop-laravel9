<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class BannersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = Banner::paginate(15);

        return view('admin.banners')->with('banners', $banners);
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
    public function store(Request $request)
    {
        $image = $request->file('image');
        $path = $image->storeAs('banners', Str::lower(Str::random(6)).".".$image->extension(), 'public');

        Banner::create([
            'type' => $request->type,
            'title' => $request->title,
            'image' => $path,
        ]);

        return response()->json(['result' => 'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $banner = Banner::find($id);

        return response()->json(['result' => 'success', 'banner' => $banner]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit(Banner $banner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $target = Banner::find($request->id);

        if (!empty($request->file('image'))) {
            $image = $request->file('image');
            $path = $image->storeAs('banners', Str::lower(Str::random(6)).".".$image->extension(), 'public');

            Storage::disk('public')->delete($target->image);

            $target->update([
                'type' => $request->type,
                'title' => $request->title,
                'image' => $path,
                'is_on' => $request->is_on == '' ? 'N' : 'Y'
            ]);
        } else {
             $target->update([
                'type' => $request->type,
                'title' => $request->title,
                'is_on' => $request->is_on == '' ? 'N' : 'Y'
            ]);
        }

        return response()->json(['result' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {
        //
    }
}
