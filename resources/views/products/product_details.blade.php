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
                           <td>Product Name</td>
                           <td>Product Price</td>
                           <td>Buyer Name</td> 
                           <td>Buyer Phone</td>
                       </tr>
                      
                       @foreach($orders as $order)
                       <tr>
                           <td>{{ $order->product->name }} </td>
                           <td>${{$order->product->price}} </td>
                           <td>{{ $order->user->name }} </td>
                           <td>{{ $order->user->phone_number }}</td>    
                          
                       </tr>
                      
                         @endforeach
                         </table>
                   <br><br>
                          
                     
                    
               </div>
           </div>
       </div>
    
    </div>
    
        </div>
      </div>
    
    


    @endsection
