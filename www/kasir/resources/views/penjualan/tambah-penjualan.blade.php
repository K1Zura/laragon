@extends('template.app')
@section('content')
@section('title', 'Tambah')
<h1 style="font-family: 'Times New Roman', Times, serif">Tambah Penjualan</h1>
<br>
<div class=" col-6">
    <!-- Basic Bootstrap Table -->
    <div class="card">
        <h5 class="card-header">Daftar Barang</h5>
        <div class="table-responsive text-nowrap m-3">
            <table class="table" id="example">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode barang</th>
                        <th>Nama barang</th>
                        <th>Stok</th>
                        <th>Harga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($produk as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->kode_produk}}</td>
                            <td>{{$item->nama}}</td>
                            <td>{{$item->stok}}</td>
                            <td>{{$item->harga}}</td>
                            <td>
                                <a href="" class="btn btn-success"><i class="ti ti-plus"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="col-6">
    <div class="card mb-4">
        <div class="card-body">
            <h5>Pembelian Barang</h5>
            <table class="table mt-4">
                <thead>
                    <tr>
                        <th>Barang</th>
                        <th>Jumlah</th>
                        <th>Harga beli</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
            <hr>
            <span>Total Harga = Rp</span>
                <form action="" method="post">
                <div class="mb-3 mt-3" style="width: 250px;">
                    <select name="metode_pembayaran" class="form-select" aria-label="Default select example">
                        <option selected>Metode Pembayaran</option>
                        <option value="tunai">Tunai</option>
                        <option value="non Tunai">Non Tunai</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Bayar</button>
            </form>
        </div>
    </div>
</div>

@endsection
