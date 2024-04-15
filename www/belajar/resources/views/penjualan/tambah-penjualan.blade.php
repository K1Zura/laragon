@extends('template.app')
@section('content')
@section('title', 'Penjualan')
<h1 style="font-family: 'Times New Roman', Times, serif">Penjualan</h1>
<br>
<div class="row">
    @if (session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">
            {{session('error')}}
        </div>
    @endif
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <form action="/penjualan" method="post">
                    @csrf
                    <div class="input-group mb-2">
                        <select name="barang_id" id="barang_id" class="form-control" onchange="this.form.submit()">
                            <option value="">...</option>
                            @foreach ($produk as $item)
                            <option value="{{$item->id}}">{{$item->nama_produk}}</option>
                            @endforeach
                        </select>
                        <input type="number" name="jumlah" id="jumlah" value="1" hidden>
                    </div>
                </form>
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Produk</th>
                            <th>Jumlah</th>
                            <th>Harga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($detailPenjualan as $index => $item)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$item['nama_produk']}}</td>
                                <td>
                                    <form action="/penjualan" method="post">
                                        @method('PUT')
                                        @csrf
                                        <input type="number" name="jumlah" id="jumlah" class="form-control" size="2" onchange="this.form.submit()" value="{{$item['jumlah']}}">
                                        <input type="hidden" name="barang_id" value="{{$item['barang_id']}}">
                                    </form>
                                </td>
                                <td>{{$item['harga']}}</td>
                                <td>
                                    <form action="/penjualan/{{$item['barang_id']}}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <form action="/tambahPenjualan" method="post">
                    @csrf
                    <?php
                    $totalBayar = 0;
                    foreach ($detailPenjualan as $item) {
                        $totalBayar += $item['harga'] * $item['jumlah'];
                    }
                    ?>
                    <input class="form-control" type="number" name="total" id="total" value="{{$totalBayar}}">
                    @error('total')
                        <div class="text-danger">
                            {{$message}}
                        </div>
                    @enderror
                    <br>
                    <input class="form-control" type="number" name="dibayar" id="dibayar" placeholder="Dibayar" oninput="pengurangan()">
                    @error('dibayar')
                        <div class="text-danger">
                            {{$message}}
                        </div>
                    @enderror
                    <br>
                    <input class="form-control" type="number" name="kembalian" id="kembalian" placeholder="Kembalian">
                    @error('kembalian')
                        <div class="text-danger">
                            {{$message}}
                        </div>
                    @enderror
                    <br>
                    <input class="form-control" type="date" name="tanggal" id="tanggal" value="{{date('Y-m-d')}}">
                    <br>
                    <input class="form-control" type="hidden" name="pelanggan_id" id="pelanggan_id" value="{{$pelanggan->id}}">
                    <input class="form-control" type="hidden" name="user_id" id="user_id" value="{{Auth::user()->id}}">
                    <button type="submit" class="btn btn-primary" name="action" value="bayar">Bayar</button>
                    <button type="submit" class="btn btn-secondary" name="action" value="batal">Batal</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
