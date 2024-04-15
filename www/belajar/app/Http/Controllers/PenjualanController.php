<?php

namespace App\Http\Controllers;

use App\Models\produk;
use App\Models\history;
use App\Models\pelanggan;
use App\Models\penjualan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\DetailPenjualan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PenjualanController extends Controller
{
    public function home(){
        $role_id = Auth::user()->role_id;
        $tampilAdmin = ($role_id === 1) ? true : false;
        $tampilPetugas = ($role_id === 2) ? true : false;

        $penjualan = penjualan::orderBy('id', 'desc')->get();
        $pelanggan = pelanggan::get();
        return view('penjualan', compact('penjualan', 'pelanggan', 'tampilAdmin', 'tampilPetugas'));
    }

    public function index($id){
        $pelanggan = pelanggan::findOrFail($id);
        $detailPenjualan = Session::get('detailPenjualan', []);
        $produk = produk::get();
        return view('penjualan.tambah-penjualan', compact('detailPenjualan', 'produk', 'pelanggan'));
    }

    public function tambahBarang(Request $request){
        $produkId = $request->input('barang_id');
        $produk = produk::findOrFail($produkId);

        $detailPenjualan = Session::get('detailPenjualan', []);
        $barang = array_search($produkId, array_column($detailPenjualan,'barang_id'));

        if ($produk->stok === 1 && isset($detailPenjualan[$barang])) {
            return redirect()->back()->with('error', 'Produk tinggal 1, Tidak bisa menambah lagi');
        }

        if ($request->input('jumlah') <= $produk->stok) {
            if ($barang !== false) {
                $detailPenjualan[$barang]['jumlah'] += $request->input('jumlah');
            } else {
                $detailPenjualan[] = [
                    'barang_id' => $produk->id,
                    'nama_produk' => $produk->nama_produk,
                    'jumlah' => $request->input('jumlah'),
                    'harga' => $produk->harga,
                ];
            }

            if ($produk->stok === 1 && !isset($detailPenjualan[$barang])) {
                $detailPenjualan[$barang]['added_after_one'] = true;
            }

            Session::put('detailPenjualan', $detailPenjualan);
            return redirect()->back();
        } else {
            return redirect()->back()->with('error', 'Jumlah melebihi stok.');
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
            return redirect()->back()->with('error', 'Jumlah melebihi stok yang ada.');
        }
    }

    public function penjualan(Request $request){
        if ($request->input('action') === 'bayar') {
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

            $kode_penjualan = '00' . random_int(1000, 9999);
            $dataPenjualan = [
                'kode_penjualan' => $kode_penjualan,
                'total' => $request->input('total'),
                'dibayar' => $request->input('dibayar'),
                'kembalian' => $request->input('kembalian'),
                'tanggal' => $request->input('tanggal'),
                'pelanggan_id' => $request->input('pelanggan_id'),
                'user_id' => $request->input('user_id'),
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
                ]);

                history::create([
                    'kegiatan' => 'Penjualan Produk',
                    'tanggal' => $date,
                ]);
            }
            Session::forget('detailPenjualan');
            return redirect()->route('detailPenjualan', ['id' => $penjualan->id])->with('success', 'Transaksi Berhasil');
        }elseif ($request->input('action') === 'batal') {
            Session::forget('detailPenjualan');
            return redirect()->back();
        }
    }

    public function detailPenjualan($id){
        $penjualan = penjualan::findOrFail($id);
        $DetailPenjualan = DetailPenjualan::where('penjualan_id', $id)->get();
        return view('nota', compact('penjualan', 'DetailPenjualan'));
    }

    public function print(Request $request)
    {
        if ($request->user()->role_id === 1) {
            $request->validate([
                'tanggal_mulai' => 'required|date',
                'tanggal_akhir' => 'required|date|after_or_equal:tanggal_mulai'
            ],[
                'tanggal_mulai.required' => 'Masukkan Tanggal Mulai',
                'tanggal_akhir.required' => 'Masukkan Tanggal Akhir',
                'tanggal_akhir.after_or_equal' => 'Harus Lebih dari Tanggal Mulai',
            ]);

            $tanggalMulai = $request->input('tanggal_mulai');
            $tanggalAkhir = $request->input('tanggal_akhir');

            $penjualan = Penjualan::whereBetween('tanggal', [$tanggalMulai, $tanggalAkhir])
                                                ->orderBy('id', 'desc')
                                                ->get();
            return view('print.print-penjualan', compact('penjualan'));
        }elseif ($request->user()->role_id === 2) {
            return redirect()->back()->with('error', 'Hanya admin yang diperbolehkan');
        }
    }
}
