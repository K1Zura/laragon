<?php

namespace App\Http\Controllers;

use App\Models\produk;
use App\Models\history;
use App\Models\suplier;
use App\Models\pembelian;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\DetailPembelian;
use Illuminate\Support\Facades\Session;

class PembelianController extends Controller
{
    public function home(Request $request){
        if ($request->user()->role_id === 1) {
            $pembelian = pembelian::orderBy('id', 'desc')->get();
            $suplier = suplier::get();
            return view('pembelian', compact('pembelian', 'suplier'));
        }elseif ($request->user()->role_id === 2) {
            return redirect()->back()->with('error', 'Hanya Boleh Admin');
        }
    }

    public function index($id){
        $suplier = suplier::findOrFail($id);
        $detailPembelian = Session::get('detailPembelian', []);
        $produk = produk::get();
        return view('pembelian.tambah-pembelian', compact('detailPembelian', 'produk', 'suplier'));
    }

    public function tambahBarang(Request $request){
        $produkId = $request->input('barang_id');
        $produk = produk::findOrFail($produkId);

        $detailPembelian = Session::get('detailPembelian', []);
        $barang = array_search($produkId, array_column($detailPembelian,'barang_id'));

        if ($barang !== false) {
            $detailPembelian [$barang]['jumlah'] += $request->input('jumlah');
        }else {
            $detailPembelian [] = [
                'barang_id' => $produk->id,
                'nama_produk' => $produk->nama_produk,
                'jumlah' => $request->input('jumlah'),
                'harga' => $produk->harga,
            ];
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

    public function pembelian(Request $request){
        if ($request->input('action') === 'simpan') {
            $validated = $request->validate([
                'total' => 'required|numeric|min:1',
                'dibayar' => 'required',
                'kembalian' => 'required|numeric|min:0',
            ],[
                'total.min' => 'Masukkan Barang!!',
                'dibayar.required' => 'Masukkan Uang!!',
                'kembalian.required' => 'Masukkan Uang!!',
                'kembalian.min' => 'Uang Anda Kurang!!',
            ]);

            $kode_pembelian = 'PB' . Str::random(4);
            $dataPembelian = [
                'kode_pembelian' => $kode_pembelian,
                'total' => $request->input('total'),
                'dibayar' => $request->input('dibayar'),
                'kembalian' => $request->input('kembalian'),
                'tanggal' => $request->input('tanggal'),
                'suplier_id' => $request->input('suplier_id'),
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
                ]);

                history::create([
                    'kegiatan' => 'Pembelian Produk',
                    'tanggal' => $date,
                ]);
            }
            Session::forget('detailPembelian');
            return redirect()->route('detailPembelian', ['id' => $pembelian->id])->with('success', 'Pembelian Berhasil');
        }elseif ($request->input('action') === 'batal') {
            Session::forget('detailPembelian');
            return redirect()->back();
        }
    }

    public function detailPembelian($id){
        $pembelian = pembelian::findOrFail($id);
        $DetailPembelian = DetailPembelian::where('pembelian_id', $id)->get();
        return view('nota-pembelian', compact('pembelian', 'DetailPembelian'));
    }
}
