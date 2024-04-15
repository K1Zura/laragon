<?php

namespace App\Http\Controllers;

use App\Models\produk;
use App\Models\suplier;
use App\Models\pelanggan;
use App\Models\penjualan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(){
        return view('/login');
    }
    public function auth(Request $request){
        $request->validate([
            'email'=>['required'],
            'password'=>['required'],
        ]);
        $infoLogin=[
            'email'=>$request->email,
            'password'=>$request->password,
        ];
        if (Auth::attempt($infoLogin)) {
            return redirect('/');
        }else {
            return redirect('/login');
        }
    }

    public function index(){
        return view('/home');
    }

    public function produk(){
        $produk = produk::get();
        return view('/produk', compact('produk'));
    }

    public function pelanggan(){
        $pelanggan = pelanggan::get();
        return view('/pelanggan', compact('pelanggan'));
    }

    public function penjualan(){
        $penjualan = penjualan::get();
        return view('/penjualan', compact('penjualan'));
    }

    public function suplier(){
        $suplier = suplier::get();
        return view('/suplier', compact('suplier'));
    }


    public function logout(){
        Auth::logout();
        return redirect('/login');
    }
}
