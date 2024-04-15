<?php

namespace App\Http\Controllers;

use App\Models\penjualan;
use Illuminate\Http\Request;
use App\Models\DetailPenjualan;
use Illuminate\Support\Facades\Auth;

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
        $infoLogin = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        if (Auth::attempt($infoLogin)) {
            return redirect('/');
        } else {
            return redirect()->back()->with('error', 'Email Atau Password Anda Salah');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }

    public function index(){
        $role = Auth::user()->role_id;
        $tampilAdmin = ($role === 1) ? true : false;
        $tampilPetugas = ($role === 2) ? true : false;
        $date = date('Y-m-d');

        $penjualan = penjualan::where('tanggal', $date)->get();
        $DetailPenjualan = DetailPenjualan::where('tanggal', $date)->get();
        return view('index', compact('penjualan', 'DetailPenjualan', 'tampilAdmin', 'tampilPetugas'));
    }
}
