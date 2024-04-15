<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PenggunaController extends Controller
{
    public function index(){
        $date = date('Y-m-d');
        $role = Auth::user()->role_id;
        $tampilAdmin = ($role === 1)? true : false;
        $tampilPetugas = ($role === 2)? true : false;

        $user = User::get();
        return view('pengguna', compact('user', 'tampilAdmin', 'tampilPetugas'));
    }

    public function tambah(Request $request){
        $user = User::create($request->all());
        return redirect()->back()->with('success', 'User berhasil ditambahkan');
    }

    public function update(Request $request, $id){
        $user = User::findOrFail($id);
        $user->update($request->all());
        return redirect()->back()->with('success', 'User berhasil diupdate');
    }

    public function hapus($id){
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->back()->with('success', 'User berhasil dihapus');
    }
}
