@extends('template.app')
@section('content')
@section('title', 'Update')
<h1 style="font-family: 'Times New Roman', Times, serif">Update Produk</h1>
<br>
<div class="card-body">
    <div class="card">
      <div class="card-body">
        <form action="/updateProduk/{{$produk->id}}" method="POST">
            @method('PUT')
            @csrf
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Kode Produk</label>
            <input type="text" value="{{$produk->kode_produk}}" class="form-control" name="kode_produk" id="exampleInputEmail1" aria-describedby="emailHelp">
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Nama</label>
            <input type="text" value="{{$produk->nama}}" name="nama" class="form-control" id="exampleInputPassword1">
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Stok</label>
            <input type="number" value="{{$produk->stok}}" name="stok" class="form-control" id="exampleInputPassword1">
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Harga</label>
            <input type="number" value="{{$produk->harga}}" name="harga" class="form-control" id="exampleInputPassword1">
          </div>
          <button type="submit" class="btn btn-primary">Update</button>
        </form>
      </div>
    </div>
</div>

@endsection
