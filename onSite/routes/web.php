<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;

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

Route::get('/register', [UserController::class, 'register']);

Route::get('/login', [UserController::class, 'login']);

Route::get('/profile', function(){
    $users = \DB::table("users")->get();
    $data['users'] = $users;
    return view('profile/index', $data);
});

Route::get('/home/create', [ProductController::class, 'create']);
Route::post('/home/store', [ProductController::class, 'store']);

Route::get('/home', [ProductController::class, 'index']);

Route::get('/home/{product}', [ProductController::class, 'show']);




