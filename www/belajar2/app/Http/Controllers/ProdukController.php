<?php

namespace App\Http\Controllers;

use App\Models\produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProdukController extends Controller
{
    public function index(){
        $date = date('Y-m-d');
        $role = Auth::user()->role_id;
        $tampilAdmin = ($role === 1)? true : false;
        $tampilPetugas = ($role === 2)? true : false;

        $produk = produk::get();
        return view('produk', compact('produk', 'tampilAdmin', 'tampilPetugas'));
    }

    public function tambah(Request $request){
        $produk = produk::create($request->all());
        return redirect()->back()->with('success', 'Produk berhasil ditambahkan');
    }

    public function update(Request $request, $id){
        $produk = produk::findOrFail($id);
        $produk->update($request->all());
        return redirect()->back()->with('success', 'Produk berhasil diupdate');
    }

    public function hapus($id){
        $produk = produk::findOrFail($id);
        $produk->delete();
        return redirect()->back()->with('success', 'Produk berhasil dihapus');
    }

    public function print(Request $request){
        if ($request->input('status') === 'ada') {
            $produk = produk::where('stok', '>', 0)->get();
        }elseif ($request->input('status') === 'habis') {
            $produk = produk::where('stok', '=', 0)->get();
        }else {
            $produk = produk::get();
        }
        return view('laporan.laporan-produk', compact('produk'));
    }
}
