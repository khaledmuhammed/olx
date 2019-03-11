<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::auth();

Route::get('/', 'ProductController@index');

//products section
Route::get('/myproducts', 'ProductController@myproducts');
Route::post('/add_product', 'productController@add_product');
Route::get('/change_type/{id}', 'AdminController@change');
Route::get('/delete_product/{id}', 'AdminController@delete_product');
Route::get('/update_product/{id}', 'productController@edit_product');
Route::post('/update_product/{id}', 'productController@update_product');
Route::get('/product_profile/{id}', 'productController@product_profile');
Route::get('/product_details/{id}', 'productController@product_details');




//dashboard section
Route::get('/dashboard', 'AdminController@index');
Route::post('/add_user', 'AdminController@store_user');

//profile section
Route::get('profile/{id}', 'HomeController@profile');
Route::post('profile/{id}', 'HomeController@update_user');

Route::get('/users', 'HomeController@ajaxwork');
//cart section
Route::get('/cart/{id}', 'OrderController@add_to_cart');
Route::get('/cart', 'OrderController@all_carts');
Route::get('/delete_order/{id}', 'OrderController@destroy_order');
// Route::get('/submit_orders/{id}', 'OrderController@submit_order');






