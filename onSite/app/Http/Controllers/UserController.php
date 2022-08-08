<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(){
        return view('users/register');
    }

    public function login(){
        return view('users/login');
    }

    public function userStore(Request $request){
        $user = new \App\Models\User();
        $user->firstname = $request->input('firstname');
        $user->lastname = $request->input('lastname');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->profile_picture = 'empty';
        $user->save();
        return redirect('/login');
    }

    public function handlelogin(Request $request){
        
    }

}
