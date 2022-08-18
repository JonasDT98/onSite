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
            $request->session()->put('profilePicture', $user->profile_picture);
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
        $user->profile_picture = 'default.jpg';
        $user->save();
        return redirect('/login');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'profileimage' => 'required'
        ]);

        if (Session::has('loginId')){
            if($request->has('profileimage')){
                foreach($request->file('profileimage')as $picture){
                    $profilePictureName = '-image-'.time().rand(1,1000).'.'.$picture->extension();
                    $picture->move(public_path('profile_images'),$profilePictureName);

                    $user = Auth::user();
                    $user->profile_picture = $profilePictureName;
                    $user->save();
                    $request->session()->put('profilePicture', $profilePictureName);
                }
            }
            return redirect('profile/');

        }else{
            return redirect('/login');
        }
    }

    public function getUser(\App\Models\User $user){
        $data['user'] = $user;
        return view('profile/index', $data);
    }

    public function logout(){
        if (Session::has('loginId')){
            Session::pull('loginId');
            Session::pull('profilePicture');
            return redirect('/login');
        }
    }

}
