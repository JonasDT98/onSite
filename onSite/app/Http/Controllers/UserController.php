<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function register(){
        return view('users/register');
    }

    public function login(){
        return view('users/login');
    }

    public function handlelogin(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)){
            echo "Login OK";
        }else{
            echo "FAILED";
        }

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

}
