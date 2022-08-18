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
    return redirect('/login');
});

Route::get('/register', [UserController::class, 'register']);
Route::post('/register', [UserController::class, 'userStore']);

Route::get('/login', [UserController::class, 'login']);
Route::post('/login', [UserController::class, 'handlelogin']);

Route::get('/profile', [UserController::class, 'profile']);
Route::post('/profile/store', [UserController::class, 'store']);

Route::get('/home/create', [ProductController::class, 'create']);
Route::post('/home/store', [ProductController::class, 'store']);

Route::get('/home', [ProductController::class, 'index']);

Route::get('/home/{product}', [ProductController::class, 'show']);

Route::get('/logout', [UserController::class, 'logout']);

Route::get('/home/update/{id}', [ProductController::class, 'update']);
Route::get('/home/buy/{id}', [ProductController::class, 'buy']);

Route::put('/home/put/{id}', [ProductController::class, 'put']);
Route::put('/home/selling/{id}', [ProductController::class, 'selling']);

Route::delete('/home/destroy/{id}', [ProductController::class, 'destroy']);



