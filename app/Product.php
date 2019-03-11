<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
   protected $fillable = [
           'name', 'price','image','quantity', 'seller_id'
       ];


       public function user(){

        // you should add the forign key
        return $this->belongsTo('App\User','seller_id');
    }

}
