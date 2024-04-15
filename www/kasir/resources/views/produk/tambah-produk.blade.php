@extends('template.app')
@section('content')
@section('title', 'Tambah')
<h1 style="font-family: 'Times New Roman', Times, serif">Tambah Produk</h1>
<br>
<div class="card-body">
    <div class="card">
      <div class="card-body">
        <form action="/tambahProduk" method="POST">
            @csrf
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Kode Produk</label>
            <input type="text" placeholder="Masukkam Kode..." class="form-control" name="kode_produk" id="exampleInputEmail1" aria-describedby="emailHelp">
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Nama</label>
            <input type="text" placeholder="Masukkan Nama Produk..." name="nama" class="form-control" id="exampleInputPassword1">
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Stok</label>
            <input type="number" placeholder=" Masukkan Stok..." name="stok" class="form-control" id="exampleInputPassword1">
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Harga</label>
            <input type="number" placeholder="Masukkan Harga..." name="harga" class="form-control" id="exampleInputPassword1">
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Suplier</label>
            <select name="suplier_id" id="suplier" class="form-control">
                <option value="">...</option>
                @foreach ($suplier as $item)
                    <option value="{{$item->id}}">{{$item->nama}}</option>
                @endforeach
            </select>
          </div>
          <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
      </div>
    </div>
</div>

@endsection
