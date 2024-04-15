<?php

namespace App\Http\Controllers;

use App\Models\produk;
use App\Models\suplier;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function tambahProduk(){
        $suplier = suplier::select('id', 'nama')->get();
        return view('/produk.tambah-produk', ['suplier' => $suplier]);
    }
    public function tambah(Request $request){
        $produk = produk::create($request->all());
        return redirect('/produk');
    }
    public function updateProduk($id){
        $produk = produk::findOrFail($id);
        return view('/produk.update-produk', compact('produk'));
    }
    public function update(Request $request, $id){
        $produk = produk::findOrFail($id);
        $produk->update($request->all());
        return redirect('/produk');
    }
    public function delete($id){
        $produk = produk::findOrFail($id);
        $produk->delete();
        return redirect('/produk');
    }
}
