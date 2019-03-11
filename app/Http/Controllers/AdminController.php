<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Product;
use App\User;
use Auth;
use Validator;
use Image;
class AdminController extends Controller
{

     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('Admin');
    }

    public function index()
  {
       
        $users = User::join('user_types', 'users.user_type_id', '=', 'user_types.id')
                      ->select('users.*','user_types.name AS USER_TYPE')->get();

        //   $users =    User::all();
        $products = Product::orderby('id','desc')->get();
        return view('dashboard.index',compact('products','users'));
  }

  public function change($id)
  {

    //finding user 
      $user = User::find($id);

        if($user['user_type_id'] == 2){
            User::select('users.user_type_id')
                ->where('id', $id)
                ->update(['user_type_id' => 3]);
                 
       }
        else if($user['user_type_id'] == 3){
            User::select('users.user_type_id')
                ->where('id', $id)
                ->update(['user_type_id' => 2]);
       }
            return redirect('/dashboard');
  }


  public function delete_product($id)
  {
    $product = Product::find($id)->delete();
        
     return redirect('/dashboard');
  }



  public function store_user(Request $request)
    {
        

        $users = new User();
        $users->name = $request['name'];
        $users->email = $request['email'];
        $users->password ='$2y$10$YJEdi.ZZFGKQqEabwlQmwOZHtAEbITCWJs4w6p9MXR1MDx6tpA7UG';
        $users->phone_number = $request['phone'];
        $users->user_type_id = 2;
        $users->save(); 


        return redirect('/dashboard');
    }
}
