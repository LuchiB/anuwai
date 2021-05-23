<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();


Route::get('/', 'HomeController@home')->name('home');
Route::get('/contact', 'ContactUsController@index')->name('contact');
Route::get('/about', 'AboutUsController@index')->name('about');

Route::get('/artist/{id}', 'HomeController@artist')->name('artist');

Route::get('shop', 'ShopController@index')->name('shop.index');
Route::get('product/{product}', 'ShopController@show')->name('show.product');


Route::get('cart', 'CartController@index')->name('cart.index');
Route::post('cart', 'CartController@store')->name('cart.store');
Route::patch('cart/{product}', 'CartController@update')->name('cart.update');
Route::delete('cart/{product}', 'CartController@destroy')->name('cart.destroy');

Route::post('save-for-later/{product}', 'SaveForLaterController@store')->name('saveforlater.store');
Route::post('save-for-later/{product}/move-to-cart', 'SaveForLaterController@moveToCart')->name('saveforlater.movetocart');
Route::delete('save-for-later/{product}', 'SaveForLaterController@destroy')->name('saveforlater.destroy');

Route::get('checkout', 'CheckoutController@index')->name('checkout.index');

Route::post('coupon', 'CouponController@store')->name('coupon.store');
Route::delete('coupon', 'CouponController@destroy')->name('coupon.destroy');


Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware(['auth','role:Admin'])->group(function(){
        Route::get('home', 'AdminController@home')->name('home');
        Route::get('user/{id}', 'UserController@edituser')->name('edit.user');
        Route::patch('user/{id}', 'UserController@updateuser')->name('update.user');
        Route::delete('user/{id}', 'UserController@destroy')->name('user.destroy');
        Route::get('password/{id}', 'UserController@resetuserpass')->name('resetpassword');
        Route::patch('password/{id}', 'UserController@updatepassword')->name('updatepassword');
        Route::get('profile', 'AdminController@profile')->name('profile');
        Route::get('setting', 'AdminController@setting')->name('setting');
        Route::resource('category', 'CategoryController');
        Route::resource('product', 'ProductController');
    
});

// Vendor
Route::namespace('Vendor')->prefix('vendor')->name('vendor.')->middleware(['auth','role:Vendor'])->group(function(){
    Route::get('home', 'VendorController@home')->name('home');
    Route::get('product/create', 'VendorController@create')->name('create.product');
    Route::post('product/create', 'VendorController@store')->name('post.product');
    Route::get('product/{id}/edit', 'VendorController@edit')->name('edit.product');
    Route::patch('product/{id}', 'VendorController@update')->name('update.product');
    Route::delete('product/{id}', 'VendorController@destroy')->name('product.destroy');
    Route::get('profile', 'VendorController@setting')->name('setting.profile');
    Route::patch('profile', 'VendorController@updateprofile')->name('updateprofile');
    Route::get('password', 'VendorController@password')->name('password');
    Route::patch('password', 'VendorController@updatepassword')->name('password');
    Route::get('order', 'OrderController@home')->name('order');
});

//buyer / User
Route::namespace('Buyer')->prefix('user')->name('buyer.')->middleware(['auth','role:Buyer'])->group(function(){
    Route::get('home', 'BuyerController@home')->name('home');
    Route::get('orders', 'BuyerController@order')->name('order');
    Route::get('profile', 'BuyerController@profile')->name('profile');
    Route::get('setting', 'BuyerController@setting')->name('setting');
    Route::get('password', 'BuyerController@password')->name('password');
    Route::patch('password', 'BuyerController@updatepassword')->name('updatepassword');
    Route::patch('profile', 'BuyerController@updateprofile')->name('updateprofile');
    Route::resource('order', 'OrderController');
  
});