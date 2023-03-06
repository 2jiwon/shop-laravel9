<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(15);

        return view('admin.users')->with('users', $users);
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
        User::create([
            'uid' => $request->uid,
            'password' => Hash::make($request->password),
            'remember_token' => Str::random(60),
            'email' => $request->email,
            'nickname' => $request->nickname,
            'phone' => $request->phone
        ]);

        return response()->json(['result' => 'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);

        return response()->json(['result' => 'success', 'user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $target = User::find($request->id);

        if (!empty($request->password)) {
            $target->update([
                'uid' => $request->uid,
                'password' => Hash::make($request->password),
                'remember_token' => Str::random(60),
                'email' => $request->email,
                'nickname' => $request->nickname,
                'phone' => $request->phone,
                'is_deleted' => $request->is_deleted == '' ? 'N' : 'Y'
            ]);
        } else {
            $target->update([
                'uid' => $request->uid,
                'email' => $request->email,
                'nickname' => $request->nickname,
                'phone' => $request->phone,
                'is_deleted' => $request->is_deleted == '' ? 'N' : 'Y'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
