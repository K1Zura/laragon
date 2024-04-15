<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function home(){
        return view('/home');
    }
    public function login(){
        return view('/login');
    }
    public function auth(request $request){
        $request->validate([
            'email'=>['required'],
            'password'=>['required'],
        ]);
        $infologin = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($infologin)) {
            return redirect('/');
        }
        else {
            return redirect('/login');
        }
    }
    public function register(){
        return view('/register');
    }
    public function addRegister(request $request){
        $user = User::create($request->all());
        return redirect('/login');
    }
    public function logout(request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regeneratetoken();

        return redirect('/login');
    }
}
