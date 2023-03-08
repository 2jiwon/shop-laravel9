<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Models\{Order, User};

class AdminController extends Controller
{
    /**
     *  Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::latest()->paginate(10);
        $users = User::latest()->paginate(10);

        return view('admin.dashboard', [
            'orders' => $orders,
            'users' => $users
        ]);
    }

    /**
     *  Display Admin login
     */
    public function getLogin(){
        return view('admin.login');
    }
 
    /**
     *  Handle Admin login
     */
    public function setLogin(Request $request)
    {
        $this->validate($request, [
            'uid' => 'required',
            'password' => 'required',
        ]);
 
        if(auth()->guard('admin')->attempt(['uid' => $request->input('uid'),  'password' => $request->input('password')])){
            $user = auth()->guard('admin')->user();
            if($user){
                return redirect()->route('admin.dashboard')->with('success','You are Logged in sucessfully.');
            }
        }else {
            return back()->with('error','Whoops! invalid email and password.');
        }
    }

    /**
     * Handle Admin logout
     */
    public function logout(Request $request)
    {
        auth()->guard('admin')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin');
    }

}
