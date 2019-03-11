<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Order;
use App\Product;
use Auth;

class OrderController extends Controller
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


    public function add_to_cart($product_id)
    {

        $product = Product::find($product_id);
        //adding order to user
        $orders = new Order();
        $orders->user_id = Auth::user()->id;
        $orders->product_id = $product_id;
        $orders->amount = 1;
        $orders->total_price = ($orders->amount) * $product->price;
        $orders->save();

        Product::find($product_id)->decrement('quantity');
        $orders = Order::where('user_id','=',Auth::user()->id)->get();

        $total_price =  Order::where('user_id','=',Auth::user()->id)->sum('total_price');
         return view('cart' , compact('orders','total_price'));
    }


    public function all_carts()
    {

         $orders = Order::where('user_id','=',Auth::user()->id)->get();
        // $total_price= Auth::user()->products->sum('price');
        $total_price=0;
         return view('cart' , compact('orders','total_price'));
    }

  
     
    
        public function destroy_order($id)
         {
            $order = Order::find($id);
            $product_id = $order->product->id;
            $product = Product::find($product_id)->increment('quantity');
            Order::find($id)->delete();
            return redirect('/cart');
        }
}
