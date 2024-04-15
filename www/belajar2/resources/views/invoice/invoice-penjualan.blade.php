@extends('template.app')
@section('content')
@section('tite', 'Invoice')
<h1 style="font-family: 'Times New Roman', Times, serif">Invoice</h1>
<br>
<div class="row">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <h1>No Nota: #{{$penjualan->kode_penjualan}}</h1>
                <div class="input-group mb-3">
                    <div class="col-md-6">
                        <h4>Dari</h4>
                        <h6>{{$penjualan->user->name}} | {{$penjualan->user->email}} | Tawangmangu</h6>
                    </div>
                    <div class="col-md-6">
                        <h4>Kepada</h4>
                        <h6>{{$penjualan->pelanggan->nama}} | {{$penjualan->pelanggan->alamat}} | {{$penjualan->pelanggan->telp}}</h6>
                    </div>
                </div>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Produk</th>
                        <th>Jumlah</th>
                        <th>Harga</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($DetailPenjualan as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->produk->nama_produk}}</td>
                        <td>{{$item->jumlah}}</td>
                        <td>{{$item->produk->harga}}</td>
                        <td>{{$item->subTotal}}</td>
                    </tr>
                    @endforeach
                    <tr>
                        <td><strong>Total Belanja</strong></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><strong>{{$penjualan->total}}</strong></td>
                    </tr>
                    <tr>
                        <td><strong>Total Bayar</strong></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><strong>{{$penjualan->dibayar}}</strong></td>
                    </tr>
                    <tr>
                        <td><strong>Kembalian</strong></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><strong>{{$penjualan->kembalian}}</strong></td>
                    </tr>
                </tbody>
            </table>
            <center>
                <a href="/penjualan-invoice/{{$penjualan->id}}" class="btn btn-primary">Print</a>
                <a href="/index-penjualan" class="btn btn-secondary">Kembali</a>
            </center>
        </div>
    </div>
</div>

@endsection
