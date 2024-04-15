@extends('template.app')
@section('content')
@section('tite', 'Invoice')
<h1 style="font-family: 'Times New Roman', Times, serif">Invoice</h1>
<br>
<div class="row">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <h1>No Nota: #{{$pembelian->kode_pembelian}}</h1>
                <div class="input-group mb-3">
                    <div class="col-md-6">
                        <h4>Dari</h4>
                        <h6>{{$pembelian->suplier->nama}} | {{$pembelian->suplier->alamat}} | {{$pembelian->suplier->telp}}</h6>
                    </div>
                    <div class="col-md-6">
                        <h4>Kepada</h4><h6>{{$pembelian->user->name}} | {{$pembelian->user->email}} | Tawangmangu</h6>
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
                    @foreach ($DetailPembelian as $item)
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
                        <td><strong>{{$pembelian->total}}</strong></td>
                    </tr>
                    <tr>
                        <td><strong>Total Bayar</strong></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><strong>{{$pembelian->dibayar}}</strong></td>
                    </tr>
                    <tr>
                        <td><strong>Kembalian</strong></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><strong>{{$pembelian->kembalian}}</strong></td>
                    </tr>
                </tbody>
            </table>
            <center>
                <a href="/pembelian-invoice/{{$pembelian->id}}" class="btn btn-primary">Print</a>
                <a href="/index-pembelian" class="btn btn-secondary">Kembali</a>
            </center>
        </div>
    </div>
</div>

@endsection
