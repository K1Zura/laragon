<?php

namespace App\Http\Controllers;

use App\Models\history;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;

class AuthController extends Controller
{
    public function login(){
        return view('login');
    }

    public function auth(Request $request){
        $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);
        $infoLogin=[
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($infoLogin)) {
            $date = date('Y-m-d');
            history::create([
                'kegiatan' => 'Login',
                'tanggal' => $date,
            ]);
            return redirect('/');
        } else {
            return redirect()->back()->with('error', 'Email Atau Password Anda Salah');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect('/login');
    }

    public function index(){
        $role_id = Auth::user()->role_id;
        $tampilAdmin = ($role_id === 1) ? true : false;
        $tampilPetugas = ($role_id === 2) ? true : false;

        return view('index', compact('tampilAdmin', 'tampilPetugas'));
    }
}
