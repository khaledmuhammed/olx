<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
        Schema::create('products', function($table) {
          $table->increments('id');
             $table->string('name');
             $table->float('price');
             $table->string('image')->default('dproduct.jpg');
             $table->integer('quantity');
             $table->integer('seller_id')->unsigned();
             $table->timestamps();

        });

       Schema::table('products', function($table) {
           $table->foreign('seller_id')->references('id')->on('users');
       });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('products');
    }
}
