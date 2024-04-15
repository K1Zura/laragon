<?php

namespace App\Http\Controllers;

use App\Models\produk;
use App\Models\penjualan;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    public function tambahPenjualan(){
        $produk = produk::get();
        return view('/penjualan.tambah-penjualan', compact('produk'));
    }
    public function tambah(Request $request){
        $penjualan = penjualan::create($request->all());
        return redirect('/penjualan');
    }
    public function updatePenjualan($id){
        $penjualan = penjualan::findOrFail($id);
        return view('/penjualan.update-penjualan', compact('penjualan'));
    }
    public function update(Request $request, $id){
        $penjualan = penjualan::findOrFail($id);
        $penjualan->update($request->all());
        return redirect('/penjualan');
    }
    public function delete($id){
        $penjualan = penjualan::findOrFail($id);
        $penjualan->delete();
        return redirect('/penjualan');
    }
}
