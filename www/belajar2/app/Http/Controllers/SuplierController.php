<?php

namespace App\Http\Controllers;

use App\Models\suplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuplierController extends Controller
{
    public function index(){
        $date = date('Y-m-d');
        $role = Auth::user()->role_id;
        $tampilAdmin = ($role === 1)? true : false;
        $tampilPetugas = ($role === 2)? true : false;

        $suplier = suplier::get();
        return view('suplier', compact('suplier', 'tampilAdmin', 'tampilPetugas'));
    }

    public function tambah(Request $request){
        $suplier = suplier::create($request->all());
        return redirect()->back()->with('success', 'Suplier berhasil ditambahkan');
    }

    public function update(Request $request, $id){
        $suplier = suplier::findOrFail($id);
        $suplier->update($request->all());
        return redirect()->back()->with('success', 'Suplier berhasil diupdate');
    }

    public function hapus($id){
        $suplier = suplier::findOrFail($id);
        $suplier->delete();
        return redirect()->back()->with('success', 'Suplier berhasil dihapus');
    }
}
