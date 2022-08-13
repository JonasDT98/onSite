<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use \App\Models\User;
use Session;

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

        $user = User::where('email', '=', $request->email)->first();

        if (Auth::attempt($credentials)){
            $request->session()->put('loginId', $user->id);
            return redirect('/home');
        }else{
            $request->flash();
            $request->session()->flash('message', 'Incorrect user or password ');
            return redirect('/login');
        }
    }

    public function profile(Request $request){
        $data = array();
        if (Session::has('loginId')){
            $user = \DB::table("users")->where('id', Session::get('loginId'))->first();
            $data['user'] = $user;
            return view('profile/index', $data);
            
        }else{
            return redirect('/login');
        }
        
    }

    public function userStore(Request $request){

        $validated = $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $user = new \App\Models\User();
        $user->firstname = $request->input('firstname');
        $user->lastname = $request->input('lastname');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->profile_picture = 'https://freesvg.org/img/abstract-user-flat-4.png';
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

    public function logout(){
        if (Session::has('loginId')){
            Session::pull('loginId');
            return redirect('/login');
        }
    }

}
