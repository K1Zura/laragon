@extends('template.app')
@section('content')
@section('title', 'Invoice')
<h1 style="font-family: 'Times New Roman', Times, serif">Invoice</h1>
<br>
<div class="row">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <h1>Kode Pembelian: {{$pembelian->kode_pembelian}}</h1>
                <div class="col-md-6">
                    <br>
                    <h5>Dari</h5>
                    <p>{{$pembelian->suplier->nama}} | {{$pembelian->suplier->alamat}} | {{$pembelian->suplier->telp}}</p>
                </div>
                <div class="col-md-6">
                    <h5>Kepada</h5>
                    <p>{{Auth::user()->name}}</p>
                </div>
            </div>

            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Barang</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($DetailPembelian as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->produk->nama_produk}}</td>
                            <td>{{$item->produk->harga}}</td>
                            <td>{{$item->jumlah}}</td>
                            <td></td>
                        </tr>
                    @endforeach
                    <tr>
                        <td><strong>Total Belanja</strong></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><strong>{{number_format($pembelian->total)}}</strong></td>
                    </tr>
                    <tr>
                        <td><strong>Total Dibayar</strong></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><strong>{{number_format($pembelian->dibayar)}}</strong></td>
                    </tr>
                    <tr>
                        <td><strong>Kembalian</strong></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><strong>{{number_format($pembelian->kembalian)}}</strong></td>
                    </tr>
                </tbody>
            </table>
            <center>
                <a href="/print-pembelian-invoice/{{$pembelian->id}}" class="btn btn-primary">Print</a>
                <a href="/home-pembelian" class="btn btn-secondary">Kembali</a>
            </center>
        </div>
    </div>
</div>

@endsection
