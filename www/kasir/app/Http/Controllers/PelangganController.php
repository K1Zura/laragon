<?php

namespace App\Http\Controllers;

use App\Models\pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    public function tambahPelanggan(){
        $pelanggan = pelanggan::get();
        return view('/pelanggan.tambah-pelanggan');
    }
    public function tambah(Request $request){
        $pelanggan = pelanggan::create($request->all());
        return redirect('/pelanggan');
    }
    public function updatePelanggan($id){
        $pelanggan = pelanggan::findOrFail($id);
        return view('/pelanggan.update-pelanggan', compact('pelanggan'));
    }
    public function update(Request $request, $id){
        $pelanggan = pelanggan::findOrFail($id);
        $pelanggan->update($request->all());
        return redirect('/pelanggan');
    }
    public function delete($id){
        $pelanggan = pelanggan::findOrFail($id);
        $pelanggan->delete();
        return redirect('/pelanggan');
    }
}
