@extends('layouts.app')

@section('content')

<div class="container">
<div class="contact-wrap">
        <h3>Edit Product Data</h3>
        <form enctype="multipart/form-data" action="/update_product/{{ $product['id'] }}" method="POST" class='contact-form'>
            {!! csrf_field() !!}
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                            <label for="fname">Name</label>
                                <input style="margin-buttom:5px;" type="hidden" name="_token" value="{{ csrf_token() }}"><br>
                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                        <input " type="text"  name="pname"  value="{{ $product->name }}"  class="form-control" required"><br>
                                    
                                        @if ($errors->has('name') )
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
                            <label for="pprice">Price</label>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}"><br>
                            <div class="form-group{{ $errors->has('pprice') ? ' has-error' : '' }}">
                                    <input " type="text"  name="pprice"  value="{{ $product->price }}"  class="form-control" required"><br>
                                    
                 
                                    @if ($errors->has('phone'))
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
    <br><br><br>
</div>

@endsection
    
