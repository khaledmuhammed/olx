@extends('layouts.app')

@section('content')

 <div class="colorlib-product">
    <div class="container">
      <div class="row">
            <div class="col-sm-8 offset-sm-2 text-center colorlib-heading">
                    <h2>My Products</h2>
                </div>
         <div class="col-md-10 col-md-offset-1" style="color:black; font-weight: 500;     left: 92px;">
           <div class="panel panel-default">

              <div class="panel-body">
               <table width="100%" border="1" style="text-align:center;">
                   <tr>
                       <td>Name</td>
                       <td>Price</td>
                       <td>Product Details</td> 
                       <td>Update</td>
                       <td>Delete</td>

                   </tr>
                   <!-- featching data from the model $users  -->
                   @foreach($products as $pro)
                   <tr>
                       <td>{{ $pro['name'] }} </td>
                       <td>${{ $pro['price'] }} </td>
                       <td><a href="/product_details/{{ $pro['id'] }}" class="btn btn-primary">Product Details</a></td>

                       <td><a href="/update_product/{{ $pro['id'] }}" class="btn btn-primary">Update</a></td>

                        <td><a href="/delete_product/{{ $pro['id'] }}" class="btn btn-danger">Delete</a></td>
                      
                   </tr>
                  
                     @endforeach
                     </table>
               <br>
                      
                 
                
           </div>
       </div>
   </div>

</div>

    </div>
  </div>





  {{-- adding product --}}

  <div class="container">
  <div class="contact-wrap">
      <h3>Add Product</h3>
      <form enctype="multipart/form-data" action="/add_product " method="POST" class='contact-form'>
        {!! csrf_field() !!}
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                        <label for="pname">Name</label>
                            <input style="margin-buttom:5px;" type="hidden" name="_token" value="{{ csrf_token() }}"><br>
                            <div class="form-group{{ $errors->has('pname') ? ' has-error' : '' }}">
                                    <input " type="text"  name="pname"   class="form-control" required"><br>
                                
                                    @if ($errors->has('pname'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('pname') }}</strong>
                                        </span>
                                    @endif
                            </div>
                            
                    
                </div>
            </div>
            <div class="w-100"></div>
            <div class="col-md-6">
                    <div class="form-group">
                        <label for="pprice">Price</label>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}"><br>
                        <div class="form-group{{ $errors->has('pprice') ? ' has-error' : '' }}">
                                <input " type="text"  name="pprice"   class="form-control" required"><br>
                                
             
                                @if ($errors->has('pprice'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('pprice') }}</strong>
                                    </span>
                                @endif
                            </div>
                        
                    </div>
                </div>
          
            <div class="w-100"></div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="avatar">Product Image:</label><br>

                      <input type="file" name="avatar"><br>

                </div>
            </div>
            

            <div class="w-100"></div>
            <div class="col-md-6">
                <div class="form-group">
                    <input type="submit"  class="btn btn-primary">
                </div>
            </div>
        </div>
    </form>		
</div>
</div>
<br><br><br>
@endsection
