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

Route::get('/', function () {
    return view('login');
});

Route::get('/home', function(){
    $products = \DB::table("products")->get();
    $data['products'] = $products;
    return view('home/index', $data);
});

Route::get('/profile', function(){
    $users = \DB::table("users")->get();
    $data['users'] = $users;
    return view('profile/index', $data);
});
