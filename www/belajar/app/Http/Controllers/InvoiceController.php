<?php

namespace App\Http\Controllers;

use App\Models\history;
use App\Models\pembelian;
use App\Models\penjualan;
use Illuminate\Http\Request;
use App\Models\DetailPembelian;
use App\Models\DetailPenjualan;

class InvoiceController extends Controller
{
    public function index($id){
        $penjualan = penjualan::findOrFail($id);
        $DetailPenjualan = DetailPenjualan::where('penjualan_id', $id)->get();
        return view('invoice', compact('penjualan', 'DetailPenjualan'));
    }

    public function printInvoice($id){
        $penjualan = penjualan::findOrFail($id);
        $DetailPenjualan = DetailPenjualan::where('penjualan_id', $id)->get();
        $date = date('Y-m-d');
        history::create([
            'kegiatan' => 'Print Invoice Penjualan',
            'tanggal' => $date,
        ]);
        return view('print.print-invoice', compact('penjualan', 'DetailPenjualan'));
    }

    public function pembelian($id){
        $pembelian = pembelian::findOrFail($id);
        $DetailPembelian = DetailPembelian::where('pembelian_id', $id)->get();
        return view('invoice-pembelian', compact('pembelian', 'DetailPembelian'));
    }

    public function pembelianInvoice($id){
        $pembelian = pembelian::findOrFail($id);
        $DetailPembelian = DetailPembelian::where('pembelian_id', $id)->get();
        $date = date('Y-m-d');
        history::create([
            'kegiatan' => 'Print Invoice Pembelian',
            'tanggal' => $date,
        ]);
        return view('print.print-pembelian-invoice', compact('pembelian', 'DetailPembelian'));
    }
}
