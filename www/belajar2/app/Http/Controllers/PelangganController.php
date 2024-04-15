<?php

namespace App\Http\Controllers;

use App\Models\pelanggan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PelangganController extends Controller
{
    public function index(){
        $date = date('Y-m-d');
        $role = Auth::user()->role_id;
        $tampilAdmin = ($role === 1)? true : false;
        $tampilPetugas = ($role === 2)? true : false;

        $pelanggan = pelanggan::get();
        return view('pelanggan', compact('pelanggan', 'tampilAdmin', 'tampilPetugas'));
    }

    public function tambah(Request $request){
        $pelanggan = pelanggan::create($request->all());
        return redirect()->back()->with('success', 'Pelanggan berhasil ditambahkan');
    }

    public function update(Request $request, $id){
        $pelanggan = pelanggan::findOrFail($id);
        $pelanggan->update($request->all());
        return redirect()->back()->with('success', 'Pelanggan berhasil diupdate');
    }

    public function hapus($id){
        $pelanggan = pelanggan::findOrFail($id);
        $pelanggan->delete();
        return redirect()->back()->with('success', 'Pelanggan berhasil dihapus');
    }
}
