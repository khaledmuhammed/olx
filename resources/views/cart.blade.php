@extends('layouts.app')

@section('content')


    <div class="colorlib-product">
            <div class="container">
                <div class="row row-pb-lg" style=" margin: 49px 0px 10px 0rem;">
                    <div class="col-md-10 offset-md-1">
                        <div class="process-wrap">
                            <div class="process text-center active">
                                <p><span>01</span></p>
                                <h3>Shopping Cart</h3>
                            </div>
                            <div class="process text-center">
                                <p><span>02</span></p>
                                <h3>Checkout</h3>
                            </div>
                            <div class="process text-center">
                                <p><span>03</span></p>
                                <h3>Order Complete</h3>
                            </div>
                        </div>
                    </div>
    </div>

        <div class="row row-pb-lg">
                <div class="col-md-12">
                    <div class="product-name d-flex">
                        <div class="one-forth text-left px-4">
                            <span>Product Details</span>
                        </div>
                        <div class="one-eight text-center">
                            <span>Price</span>
                        </div>
                        <div class="one-eight text-center">
                            <span>Quantity</span>
                        </div>
                     
                        <div class="one-eight text-center px-4">
                            <span>Remove</span>
                        </div>
                    </div>
                 {{-- start dynamic code --}}
                   
                    @foreach($orders as $order)
                      
                      <div class="product-cart d-flex">
                        <div class="one-forth">
                            <div class="product-img" style="background-image: url(/uploads/products/{{$order->product->image }});">
                            </div>
                            <div class="display-tc">
                                <h3>{{$order->product->name}}</h3>
                            </div>
                        </div>
                        <div class="one-eight text-center">
                            <div class="display-tc">
                                <span class="price">$ {{$order->product->price}}</span>
                               
                            </div>
                        </div>
                        {{--  adding order price to total price  --}}
                         
                      <div class="one-eight text-center">
                            <div class="display-tc">
                                    <span class="price">{{$order->amount}}</span>
                            </div>
                        </div>
                     
                        <div class="one-eight text-center">
                            <div class="display-tc">
                                <a href="/delete_order/{{ $order->id }}" class="closed"></a>
                            </div>
                        </div>
                    </div>

                  @endforeach

                  

                </div>
            </div>
    <div class="row row-pb-lg">
        <div class="col-md-12">
            <div class="total-wrap">
                <div class="row">
                    <div class="col-sm-8">
                        <form action="#">
                           
                        </form>
                    </div>
                    <div class="col-sm-4 text-center">
                        <div class="total">
                            <div class="sub">
                                <p><span>Subtotal:</span> <span>${{$total_price}}</span></p>
                                <p><span>Delivery:</span> <span>$30.00</span></p>
                                <p><span>Discount:</span> <span>$45.00</span></p>
                            </div>
                            <div class="grand-total">
                                <p><span><strong>Total:</strong></span> <span>${{$total_price  +30 +45}}</span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>



@endsection
