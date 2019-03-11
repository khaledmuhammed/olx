@extends('layouts.app')

@section('content')

<div style="text-align:center; border:1px solid white; width:28%; margin-left:35%; color:black; background-color:white;">
        <img src="/uploads/avatars/{{ $users->avatar }}" style="width:150px; height:150px;  border-radius:50%;">
       <h2>{{ $users->name ."'s Profile" }}</h2>
       <h2 style="color: #616161;">Email: {{ $users->email }} </h2>
       <h2 style="color: #616161;">Phone: {{ $users->phone_number }} </h2>
      
   
   </div>
<br><br><br><br>



<div class="container">
<div class="contact-wrap">
    <h3>Change Your Information</h3>
    <form enctype="multipart/form-data" action="/profile/{{ $users['id'] }}" method="POST" class='contact-form'>
        {!! csrf_field() !!}
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                        <label for="fname">Name</label>
                            <input style="margin-buttom:5px;" type="hidden" name="_token" value="{{ csrf_token() }}"><br>
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <input " type="text"  name="name"  value="{{ $users->name }}"  class="form-control" required"><br>
                                
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
                                <input " type="text"  name="phone"  value="{{ $users->phone_number }}"  class="form-control" required"><br>
                                
             
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
                                <input " type="text"  name="email"  value="{{ $users->email }}"  class="form-control" required"><br>
                                
            
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
                    <label for="avatar">Change Image:</label><br>

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
    <br><br><br>
    </div>


@endsection
    
