<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

use Image;
use App\User;
use App\Product;
use App\Order;
use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function profile($id){
        $users = User::find($id);
        return view('profile', compact('users') );
    }


    public function update_user(Request $request, $id){

        // Handle the user upload of avatar
        $user = User::find($id);
        if($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save( public_path('/uploads/avatars/' . $filename ) );

            $user->avatar = $filename;
         
        }
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->phone_number = $request['phone'];
        $user->save();


        return redirect('/');

    }

   
}
