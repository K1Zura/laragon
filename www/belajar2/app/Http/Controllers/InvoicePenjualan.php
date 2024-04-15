<?php

namespace App\Http\Controllers;

use App\Models\pembelian;
use App\Models\penjualan;
use Illuminate\Http\Request;
use App\Models\DetailPembelian;
use App\Models\DetailPenjualan;

class InvoicePenjualan extends Controller
{
    public function penjualanInvoice($id){
        $penjualan = penjualan::findOrFail($id);
        $DetailPenjualan = DetailPenjualan::where('penjualan_id', $id)->get();
        return view('invoice.invoice-penjualan', compact('penjualan', 'DetailPenjualan'));
    }

    public function invoicePenjualan($id){
        $penjualan = penjualan::findOrFail($id);
        $DetailPenjualan = DetailPenjualan::where('penjualan_id', $id)->get();
        return view('invoice.print-penjualan', compact('penjualan', 'DetailPenjualan'));
    }

    public function pembelianInvoice($id){
        $pembelian = pembelian::findOrFail($id);
        $DetailPembelian = DetailPembelian::where('pembelian_id', $id)->get();
        return view('invoice.invoice-pembelian', compact('pembelian', 'DetailPembelian'));
    }

    public function invoicePembelian($id){
        $pembelian = pembelian::findOrFail($id);
        $DetailPembelian = DetailPembelian::where('pembelian_id', $id)->get();
        return view('invoice.print-pembelian', compact('pembelian', 'DetailPembelian'));
    }
}
