<?php

namespace App\Http\Controllers;

use App\Models\produk;
use App\Models\suplier;
use App\Models\pembelian;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\DetailPembelian;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PembelianControler extends Controller
{
    public function home(){
        $date = date('Y-m-d');
        $role = Auth::user()->role_id;
        $tampilAdmin = ($role === 1)? true : false;
        $tampilPetugas = ($role === 2)? true : false;

        $pembelian = pembelian::orderBy('id', 'desc')->get();
        $suplier = suplier::get();
        return view('pembelian.pembelian', compact('pembelian', 'suplier', 'tampilAdmin', 'tampilPetugas'));
    }

    public function tambah($id){
        $date = date('Y-m-d');
        $role = Auth::user()->role_id;
        $tampilAdmin = ($role === 1)? true : false;
        $tampilPetugas = ($role === 2)? true : false;

        $detailPembelian = Session::get('detailPembelian', []);
        $produk = produk::get();
        $suplier = suplier::findOrFail($id);
        return view('pembelian.tambah-pembelian', compact('produk', 'suplier', 'detailPembelian', 'tampilAdmin', 'tampilPetugas'));
    }

    public function tambahBarang(Request $request){
        $produkId = $request->input('barang_id');
        $produk = produk::findOrFail($produkId);

        $detailPembelian = Session::get('detailPembelian', []);
        $barang = array_search($produkId, array_column($detailPembelian, 'barang_id'));

        if ($barang !== false) {
            $detailPembelian[$barang]['jumlah'] += $request->input('jumlah');
        } else {
            $detailPembelian [] = [
                'barang_id' => $produk->id,
                'nama_produk' => $produk->nama_produk,
                'jumlah' => $request->jumlah,
                'harga' => $produk->harga,
            ];

            if ($produk->stok === 1 && !isset($detailPembelian[$barang])) {
                $detailPembelian[$barang]['added_after_one'] = true;
            }
        }
        Session::put('detailPembelian', $detailPembelian);
        return redirect()->back();
    }

    public function hapusBarang($id){
        $detailPembelian = Session::get('detailPembelian', []);
        $detailPembelian = array_filter($detailPembelian, function($detail) use($id){
            return $detail['barang_id'] != $id;
        });
        Session::put('detailPembelian', $detailPembelian);
        return redirect()->back();
    }

    public function updateBarang(Request $request){
        $produkId = $request->input('barang_id');
        $jumlahBaru = $request->input('jumlah');
        $produk = produk::findOrFail($produkId);

        $detailPembelian = collect(Session::get('detailPembelian', []));
        $detailPembelian = $detailPembelian->map(function($item) use($produkId, $jumlahBaru){
            if ($item['barang_id'] == $produkId) {
                $item['jumlah'] = $jumlahBaru;
            }
            return $item;
        });
        Session::put('detailPembelian', $detailPembelian->toArray());
        return redirect()->back();
    }

    public function tambahPembelian(Request $request){
        if ($request->input('action') === 'bayar') {
            $validate = $request->validate([
                'total' => 'required|numeric|min:1',
                'jumlah' => 'required',
            ],[
                'total.min' => 'Masukkan Barang!!',
                'dibayar.required' => 'Masukkan uang!!',
            ]);

            $kode_pembelian = 'PB' . Str::random(4);
            $dataPembelian=[
                'kode_pembelian' => $kode_pembelian,
                'total' => $request->input('total'),
                'jumlah' => $request->input('jumlah'),
                'suplier_id' => $request->input('suplier_id'),
                'user_id' => $request->input('user_id'),
                'tanggal' => $request->input('tanggal'),
            ];

            $pembelian = pembelian::create($dataPembelian);
            $detailPembelian = Session::get('detailPembelian', []);

            foreach ($detailPembelian as $item) {
                $produk = produk::findOrFail($item['barang_id']);
                $date = date('Y-m-d');
                $produk->stok += $item['jumlah'];
                $produk->save();

                DetailPembelian::create([
                    'pembelian_id' => $pembelian->id,
                    'produk_id' => $produk->id,
                    'jumlah' => $item['jumlah'],
                    'subTotal' => $item['jumlah'] * $item['harga'],
                    'tanggal' => $date,
                ]);
            }
            Session::forget('detailPembelian');
            return redirect()->route('detailPembelian', ['id' => $pembelian->id]);
        }elseif ($request->input('action') === 'batal') {
            Session::forget('detailPembelian');
            return redirect()->back();
        }
    }

    public function detailPembelian($id){
        $pembelian = pembelian::findOrFail($id);
        $DetailPembelian = DetailPembelian::where('pembelian_id', $id)->get();
        return view('nota.nota-pembelian', compact('pembelian', 'DetailPembelian'));
    }
}
