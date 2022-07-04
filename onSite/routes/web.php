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
    $data['title'] = "The home page";
    $data['items'] = [
        "ps5",
        "xbox",
        "gitaar",
        "tv",
        "zetel"
    ];
    return view('home/index', $data);
});

Route::get('/profile', function(){
    $users = \DB::table("users")->get();
    $data['users'] = $users;
    return view('profile/index', $data);
});
