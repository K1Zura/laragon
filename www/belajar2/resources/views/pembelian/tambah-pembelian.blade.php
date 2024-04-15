@extends('template.app')
@section('content')
@section('tite', 'Tambah Pembelian')
<h1 style="font-family: 'Times New Roman', Times, serif">Tambah Pembelian</h1>
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
            <h5 class="card-header">Barang</h5>
            <div class="card-body">
                <form action="/pembelian" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <select name="barang_id" id="barang_id" class="form-control" onchange="this.form.submit()">
                            <option value="">...</option>
                            @foreach ($produk as $item)
                                <option value="{{$item->id}}">{{$item->nama_produk}}</option>
                            @endforeach
                        </select>
                        <input type="hidden" name="jumlah" value="1">
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
                        @foreach ($detailPembelian as $index => $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item['nama_produk']}}</td>
                            <td>
                                <form action="/pembelian" method="post">
                                    @method('PUT')
                                    @csrf
                                    <input type="number" name="jumlah" id="jumlah" class="form-control" size="2" value="{{$item['jumlah']}}" onchange="this.form.submit()">
                                    <input type="hidden" name="barang_id" value="{{$item['barang_id']}}">
                                </form>
                            </td>
                            <td>{{$item['harga']}}</td>
                            <td>
                                <form action="/pembelian/{{$item['barang_id']}}" method="post">
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
                <form action="/tambahPembelian" method="post">
                    @csrf
                    <?php
                    $totalBayar = 0;
                    foreach ($detailPembelian as $item) {
                        $totalBayar = $item['harga'] * $item['jumlah'];
                    }
                    ?>
                    <?php
                    $totalJumlah = 0;
                    foreach ($detailPembelian as $item) {
                        $totalJumlah += $item['jumlah'];
                    }
                    ?>
                    <input type="number" name="total" id="total" class="form-control" value="{{$totalBayar}}" required>
                    @error('total')
                        <div class="text-danger">
                            {{$message}}
                        </div>
                    @enderror
                    <br>
                    <input type="number" name="jumlah" id="jumlah" placeholder="Jumlah" class="form-control" value="{{$totalJumlah}}" required>
                    @error('jumlah')
                        <div class="text-danger">
                            {{$message}}
                        </div>
                    @enderror
                    <br>
                    <input type="date" name="tanggal" id="tanggal" class="form-control" value="{{date('Y-m-d')}}" required>
                    <br>
                    <input type="hidden" name="suplier_id" value="{{$suplier->id}}">
                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                    <button type="submit" class="btn btn-primary" name="action" value="bayar">Bayar</button>
                    <button type="submit" class="btn btn-secondary" name="action" value="batal">Batal</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
