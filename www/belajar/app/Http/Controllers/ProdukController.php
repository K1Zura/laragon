<?php

namespace App\Http\Controllers;

use App\Models\produk;
use App\Models\history;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index(Request $request){
        if ($request->user()->role_id === 1) {
            $produk = produk::get();
            return view('produk', compact('produk'));
        }elseif ($request->user()->role_id === 2) {
            return redirect()->back()->with('error', 'Hanya boleh admin');
        }
    }

    public function tambah(Request $request){
        if ($request->user()->role_id === 1) {
            $date = date('Y-m-d');
            $produk = produk::create($request->all());
            history::create([
                'kegiatan' => 'Tambah Produk',
                'tanggal' => $date,
            ]);
            return redirect()->back()->with('success', 'Produk berhasil ditambahkan');
        }elseif ($request->user()->role_id === 2) {
            return redirect()->back()->with('error', 'Hanya admin yang diperbolehkan');
        }
    }

    public function update(Request $request, $id){
        if ($request->user()->role_id === 1) {
            $date = date('Y-m-d');
            $produk = produk::findOrFail($id);
            $produk->update($request->all());
            history::create([
                'kegiatan' => 'Update Produk',
                'tanggal' => $date,
            ]);
            return redirect()->back()->with('success', 'Produk berhasil diupdate');
        }elseif ($request->user()->role_id === 2) {
            return redirect()->back()->with('error', 'Hanya admin yang diperbolehkan');
        }
    }

    public function hapus($id){
        if ($request->user()->role_id === 1) {
            $date = date('Y-m-d');
            $produk = produk::findOrFail($id);
            $produk->delete();
            history::create([
                'kegiatan' => 'Hapus Produk',
                'tanggal' => $date,
            ]);
            return redirect()->back()->with('success', 'Produk berhasil dihapus');
        }elseif ($request->user()->role_id === 2) {
            return redirect()->back()->with('error', 'Hanya admin yang diperbolehkan');
        }

    }

    public function print(Request $request){
        $date = date('Y-m-d');
        $status = $request->input('status');
        if($status == 'habis') {
            $produk = Produk::where('stok', 0)->get();
        } elseif($status == 'ada') {
            $produk = Produk::where('stok', '>', 0)->get();
        } else {
            $produk = Produk::all();
        }
        history::create([
            'kegiatan' => 'Print Produk',
            'tanggal' => $date,
        ]);
        return view('print.print-produk', compact('produk'));
    }
}
