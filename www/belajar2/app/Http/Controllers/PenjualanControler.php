<?php

namespace App\Http\Controllers;

use App\Models\produk;
use App\Models\pelanggan;
use App\Models\penjualan;
use Illuminate\Http\Request;
use App\Models\DetailPenjualan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PenjualanControler extends Controller
{
    public function home(){
        $date = date('Y-m-d');
        $role = Auth::user()->role_id;
        $tampilAdmin = ($role === 1)? true : false;
        $tampilPetugas = ($role === 2)? true : false;

        $penjualan = penjualan::orderBy('id', 'desc')->get();
        $pelanggan = pelanggan::get();
        return view('penjualan.penjualan', compact('penjualan', 'pelanggan', 'tampilAdmin', 'tampilPetugas'));
    }

    public function tambah($id){
        $date = date('Y-m-d');
        $role = Auth::user()->role_id;
        $tampilAdmin = ($role === 1)? true : false;
        $tampilPetugas = ($role === 2)? true : false;

        $detailPenjualan = Session::get('detailPenjualan', []);
        $produk = produk::get();
        $pelanggan = pelanggan::findOrFail($id);
        return view('penjualan.tambah-penjualan', compact('produk', 'pelanggan', 'detailPenjualan', 'tampilAdmin', 'tampilPetugas'));
    }

    public function tambahBarang(Request $request){
        $produkId = $request->input('barang_id');
        $produk = produk::findOrFail($produkId);

        $detailPenjualan = Session::get('detailPenjualan', []);
        $barang = array_search($produkId, array_column($detailPenjualan, 'barang_id'));

        if ($produk->stok === 1 && isset($detailPenjualan[$barang])) {
            return redirect()->back()->with('error', 'Barang tinggal 1');
        }

        if ($request->input('jumlah') <= $produk->stok) {
            if ($barang !== false) {
                $detailPenjualan[$barang]['jumlah'] += $request->input('jumlah');
            } else {
                $detailPenjualan [] = [
                    'barang_id' => $produk->id,
                    'nama_produk' => $produk->nama_produk,
                    'jumlah' => $request->jumlah,
                    'harga' => $produk->harga,
                ];

                if ($produk->stok === 1 && !isset($detailPenjualan[$barang])) {
                    $detailPenjualan[$barang]['added_after_one'] = true;
                }
            }
            Session::put('detailPenjualan', $detailPenjualan);
            return redirect()->back();
        }else {
            return redirect()->back()->with('error', 'Barang sudah habis');
        }
    }

    public function hapusBarang($id){
        $detailPenjualan = Session::get('detailPenjualan', []);
        $detailPenjualan = array_filter($detailPenjualan, function($detail) use($id){
            return $detail['barang_id'] != $id;
        });
        Session::put('detailPenjualan', $detailPenjualan);
        return redirect()->back();
    }

    public function updateBarang(Request $request){
        $produkId = $request->input('barang_id');
        $jumlahBaru = $request->input('jumlah');
        $produk = produk::findOrFail($produkId);

        if ($jumlahBaru <= $produk->stok) {
            $detailPenjualan = collect(Session::get('detailPenjualan', []));
            $detailPenjualan = $detailPenjualan->map(function($item) use($produkId, $jumlahBaru){
                if ($item['barang_id'] == $produkId) {
                    $item['jumlah'] = $jumlahBaru;
                }
                return $item;
            });
            Session::put('detailPenjualan', $detailPenjualan->toArray());
            return redirect()->back();
        } else {
            return redirect()->back()->with('error', 'Jumlah melebihi stok');
        }
    }

    public function tambahPenjualan(Request $request){
        if ($request->input('action') === 'bayar') {
            $validate = $request->validate([
                'total' => 'required|numeric|min:1',
                'dibayar' => 'required',
                'kembalian' => 'required|numeric|min:0',
            ],[
                'total.min' => 'Masukkan Barang!!',
                'dibayar.required' => 'Masukkan uang!!',
                'kembalian.required' => 'Masukkan uang!!',
                'kembalian.min' => 'Uang anda kurang!!',
            ]);

            $kode_penjualan = '00' . random_int('1000', '9999');
            $dataPenjualan=[
                'kode_penjualan' => $kode_penjualan,
                'total' => $request->input('total'),
                'dibayar' => $request->input('dibayar'),
                'kembalian' => $request->input('kembalian'),
                'pelanggan_id' => $request->input('pelanggan_id'),
                'user_id' => $request->input('user_id'),
                'tanggal' => $request->input('tanggal'),
            ];

            $penjualan = penjualan::create($dataPenjualan);
            $detailPenjualan = Session::get('detailPenjualan', []);

            foreach ($detailPenjualan as $item) {
                $produk = produk::findOrFail($item['barang_id']);
                $date = date('Y-m-d');
                $produk->stok -= $item['jumlah'];
                $produk->save();

                DetailPenjualan::create([
                    'penjualan_id' => $penjualan->id,
                    'produk_id' => $produk->id,
                    'jumlah' => $item['jumlah'],
                    'subTotal' => $item['jumlah'] * $item['harga'],
                    'tanggal' => $date,
                ]);
            }
            Session::forget('detailPenjualan');
            return redirect()->route('detailPenjualan', ['id' => $penjualan->id]);
        }elseif ($request->input('action') === 'batal') {
            Session::forget('detailPenjualan');
            return redirect()->back();
        }
    }

    public function detailPenjualan($id){
        $penjualan = penjualan::findOrFail($id);
        $DetailPenjualan = DetailPenjualan::where('penjualan_id', $id)->get();
        return view('nota.nota-penjualan', compact('penjualan', 'DetailPenjualan'));
    }

    public function print(Request $request){
        $request->validate([
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required|after_or_equal:tanggal_mulai',
        ],[
            'tanggal_mulai.required' => 'Masukkan Tanggal Mulai',
            'tanggal_selesai.required' => 'Masukkan Tanggal Selesai',
            'tanggal_selesai.after_or_equal' => 'Tanggal Selesai Harus Setelah Tanggal Masuk',
        ]);

        $tanggal_mulai = $request->input('tanggal_mulai');
        $tanggal_selesai = $request->input('tanggal_selesai');

        $penjualan = penjualan::whereBetween('tanggal', [$tanggal_mulai, $tanggal_selesai])->get();
        return view('laporan.laporan-penjualan', compact('penjualan'));
    }
}
