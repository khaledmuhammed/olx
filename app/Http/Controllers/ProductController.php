<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Product;
use App\Order;
use App\User;
use Auth;
use Image;


class ProductController extends Controller
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

  public function index()
  {
      $products = Product::select('products.*')->where('seller_id','!=', Auth::user()->id)->orderby('id','desc')->get();
      return view('products.index',compact('products'));
  }

  public function myproducts()
  {
      
       $seller_id = Auth::user()->id;
       $products = Product::all()->where('seller_id',$seller_id);
   
      return view('products.myproducts',compact('products','orders'));
  }


  public function edit_product($id)
  {
    $product = Product::find($id);
    return view('products.update_product',compact('product'));
  

  }




  public function product_profile($id)
  {
    $product = Product::find($id);
    return view('products.product_profile',compact('product'));
  

  }

  public function product_details($product_id)
  {

    $orders = Order::where('product_id','=',$product_id)->get();
   
    return view('products.product_details',compact('orders'));
  

  }




  public function update_product(Request $request, $id)
  {
    $product = Product::find($id);
    if($request->hasFile('avatar')){

        $avatar = $request->file('avatar');
        $filename = time() . '.' . $avatar->getClientOriginalExtension();
        Image::make($avatar)->resize(300, 300)->save( public_path('/uploads/products/' . $filename ) );

        // $user = Auth::user();
        
        $product->image = $filename;
     
    }
    $product->name = $request['pname'];
    $product->price = $request['pprice'];
    $product->seller_id = Auth::user()->id;

    $product->save();


    return redirect('/myproducts');

  }



  public function add_product(Request $request){

     $product = new Product();
    if($request->hasFile('avatar')){

        $avatar = $request->file('avatar');
        $filename = time() . '.' . $avatar->getClientOriginalExtension();
        Image::make($avatar)->resize(300, 300)->save( public_path('/uploads/products/' . $filename ) );

        // $user = Auth::user();
        
        $product->image = $filename;
     
    }
    $product->name = $request['pname'];
    $product->price = $request['pprice'];
    $product->quantity = 50;
    $product->seller_id = Auth::user()->id;
    $product->save();


    return redirect('/myproducts');

}


}
