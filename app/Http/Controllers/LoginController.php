<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use illuminate\Support\Str;
use illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(){
        return view('login');
    }
    public function loginproses(Request $request){
        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect('/datasiswa');
        }
        return redirect('/datasiswa');
    }
    public function register(){
        return view('register');
    }
    public function registeruser(Request $request){
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->pasword),
            'remember_token' => Str::random(60),
        ]);

        return redirect('/login');
    }
    public function logout(){
        Auth::logout();
        return redirect('login'); 
    }
}