@extends('layouts.app')

    @section('content')
    <div class="container">
    {{-- users table --}}
          <div class="row">
            <div class="col-md-10 col-md-offset-1" style="color:black; font-weight: 500;">
                <div class="panel panel-default">
                        <h3> User's Acounts</h3>

                    <div class="panel-body">
                        <table width="100%" border="1" style="text-align:center;">
                            <tr>
                                <td>Name</td>
                                <td>Email</td>
                                <td>User Type</td>
                                <td>Change Type</td>

                            </tr>
                            <!-- featching data from the model $users  -->
                            @foreach($users as $user)
                            <tr>
                                <td>{{ $user['name'] }} </td>
                                <td>{{ $user['email'] }} </td>
                                <td>{{ $user['USER_TYPE'] }}</td>

                                @if($user['USER_TYPE'] != 'admin')
                                 <td><a href="/change_type/{{ $user['id'] }}" class="btn btn-danger">Change Type</a></td>
                                @endif

                            </tr>
                           
                        @endforeach
                        </table>
                        
                               
                         
                         
                    </div>
                </div>
            </div>
        
        </div>
    <br><br>
      {{-- products table --}}

        <div class="row">
                 <div class="col-md-10 col-md-offset-1" style="color:black; font-weight: 500;">
                    <div class="panel panel-default">
                            <h3>Products</h3>
                     

                       <div class="panel-body">
                        <table width="100%" border="1" style="text-align:center;">
                            <tr>
                                <td>Name</td>
                                <td>Price</td>
                                <td>Owner</td>
                                <td>Delete</td>

                            </tr>
                            <!-- featching data from the model $users  -->
                            @foreach($products as $pro)
                            <tr>
                                <td>{{ $pro['name'] }} </td>
                                <td>${{$pro['price'] }} </td>
                                <td>{{ $pro->user->name }}</td>
                               
                                 <td><a href="/delete_product/{{ $pro['id'] }}" class="btn btn-danger">Delete</a></td>
                               
                            </tr>
                           
                              @endforeach
                              </table>
                        
                               
                          
                         
                    </div>
                </div>
            </div>
        
        </div>
      <br><br>
      {{-- /add_user --}}
        {{--  adding seller  --}}
          <h3>Add Seller</h3>
          <form enctype="multipart/form-data" action="/add_user" method="POST" class='contact-form'>
              {!! csrf_field() !!}
              <div class="row">
                  <div class="col-md-6">
                      <div class="form-group">
                              <label for="fname">Name</label>
                                  <input style="margin-buttom:5px;" type="hidden" name="_token" value="{{ csrf_token() }}"><br>
                                  <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                          <input " type="text"  name="name"  class="form-control" required"><br>
                                      
                                          @if ($errors->has('name'))
                                              <span class="help-block">
                                                  <strong>{{ $errors->first('name') }}</strong>
                                              </span>
                                          @endif
                                  </div>
                                  
                          
                      </div>
                  </div>
                  <div class="w-100"></div>
                  <div class="col-md-6">
                          <div class="form-group">
                              <label for="phone">Phone Number</label>
                              <input type="hidden" name="_token" value="{{ csrf_token() }}"><br>
                              <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                      <input " type="text"  name="phone"    class="form-control" required"><br>
                                      
                   
                                      @if ($errors->has('phone'))
                                          <span class="help-block">
                                              <strong>{{ $errors->first('phone') }}</strong>
                                          </span>
                                      @endif
                                  </div>
                              
                          </div>
                      </div>
                     
                  <div class="w-100"></div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label for="email">Email</label>
      
                              <input type="hidden" name="_token" value="{{ csrf_token() }}"><br>
                              <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                      <input " type="text"  name="email"    class="form-control" required"><br>
                                      
                  
                                      @if ($errors->has('email'))
                                          <span class="help-block">
                                              <strong>{{ $errors->first('email') }}</strong>
                                          </span>
                                      @endif
                                  </div>
               
                      </div>
                  </div>
                  
               
      
                  <div class="w-100"></div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <input type="submit"  class="btn btn-primary">
                      </div>
                  </div>
              </div>
    </div>  
</div>
<br>

    @endsection
