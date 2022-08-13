<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use \App\Models\User;

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
            return redirect('/home');
        }else{
            $request->flash();
            $request->session()->flash('message', 'Incorrect user or password ');
            return redirect('/login');
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


    // public function getUser(){

    //     $users = \DB::table("users")->get();
    //     $data['users'] = $users;
    //     return view('profile/index', $data);

    // }

    public function getUser(\App\Models\User $user){
        $data['user'] = $user;
        return view('profile/index', $data);
    }

}
