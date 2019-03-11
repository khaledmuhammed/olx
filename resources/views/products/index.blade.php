@extends('layouts.app')

@section('content')




 <div class="colorlib-product">
    <div class="container">
      <div class="row">
            <div class="col-sm-8 offset-sm-2 text-center colorlib-heading">
                    <h2 id="test">Products</h2>
                </div>
        <div class="col-md-10 col-md-offset-1" style="color:black; font-weight: 500;">
              
           <div class="panel panel-default">
             

              <div class="panel-body">
                 
               
                   <!-- featching data from the model $users  -->
                  
                 <div class="row row-pb-md">
                        @foreach($products as $pro)
					 <div class="col-lg-3 mb-4 text-center">
						<div class="product-entry border">
							<a href="/product_profile/{{$pro->id}}" class="prod-img">
								<img src="/uploads/products/{{$pro->image }}" class="img-fluid" alt="Free html5 bootstrap 4 template">
							</a>
							<div class="desc">
								<h2><a href="/product_profile/{{$pro->id}}"> {{ $pro->name }}</a></h2>
                                <span class="price">$139.00</span>
                                <a href="/cart/{{$pro->id}}" class="btn btn-primary btn-addtocart"><i class="icon-shopping-cart"></i> Add to Cart</a>
							</div>
						</div>
                     </div>
                     @endforeach

                  
                     </table>
               
                      
                 
                
           </div>
       </div>
   </div>

</div>

    </div>
  </div>

  

@endsection
