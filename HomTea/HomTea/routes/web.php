<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Route::post('changeLanguage', 'LanguageController@changeLanguage');

Route::resource('user', 'UserController');

Route::post('signin', 'AppController@signin'); /* */

Route::post('forgot', 'AppController@forgot'); /* */

Route::post('profile', 'AppController@profile'); /* */

Route::post('passwordChecker', 'AppController@passwordChecker'); /* */

Route::post('password', 'AppController@password'); /* */

Route::get('signout', 'AppController@signout'); /* */



Route::get('cart', function() { /* */
  return view('shop.cart')->render();
});

Route::post('askbox', 'AppController@askbox');

Route::get('coupon', 'AppController@getCoupon'); /* */
Route::post('coupon', 'AppController@postCoupon'); /* */

Route::get('orders', 'AppController@orders'); /* */

Route::get('orderItems/{id}', 'AppController@orderItems'); /* */

Route::get('orderUpdate/{id}/{value}', 'AppController@orderUpdate'); /* */

Route::get('itemAdd/{id}/{name}/{price}', 'AppController@getItemAdd'); /* */

Route::post('itemAdd', 'AppController@postItemAdd'); /* */

Route::get('itemDetails/{id}', 'AppController@itemDetails'); /* */

Route::get('itemUpdate/{id}/{value}', 'AppController@itemUpdate'); /* */

Route::get('itemDelete/{id}', 'AppController@itemDelete'); /* */

Route::get('checkout', 'AppController@checkout'); /* */

Route::get('/', 'AppController@index'); /* */

Route::get('products', 'AppController@all'); /* */

Route::get('product/{field}/{value}', 'AppController@category'); /* */

Route::get('emailChecker', 'AppController@emailChecker'); /* */

Route::group(['prefix' => 'frontend'], function() {
  Route::group(['middleware' => 'admin'], function() {

    Route::get('messages', 'frontend\AppController@messages'); /* */

    Route::get('notifications', 'frontend\AppController@notifications'); /* */
    Route::get('notifications2', 'frontend\AppController@notifications2'); /* */

    Route::get('count', 'frontend\AppController@count'); /* */

    Route::get('dashboard', 'frontend\AppController@dashboard'); /* */

    Route::get('orders', 'frontend\AppController@orders'); /* */

    Route::get('newOrders', 'frontend\AppController@newOrders'); /* */

    Route::get('orderItems/{id}', 'frontend\AppController@orderItems'); /* */

    Route::get('products', 'frontend\AppController@products'); /* */

    Route::get('users', 'frontend\AppController@users'); /* */

    Route::get('create', 'frontend\AppController@create'); /* */
    Route::post('fieldCreate/{table}', 'frontend\AppController@fieldCreate'); /* */
    Route::post('fieldUpdate/{table}', 'frontend\AppController@fieldUpdate'); /* PUT */

    Route::get('other', 'frontend\AppController@other'); /* */
    Route::post('other/create', 'frontend\AppController@otherCreate'); /* */
    Route::post('otherUpdate/{table}', 'frontend\AppController@otherUpdate'); /* PUT */

    Route::post('couponChecker', 'frontend\AppController@couponChecker'); /* */
    Route::get('couponUpdate/{code}/{value}', 'frontend\AppController@couponUpdate'); /* */

    Route::get('signout', 'frontend\AppController@signout'); /* */

  });
});
