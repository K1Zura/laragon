@extends('template.app')
@section('content')
@section('title', 'Tambah')
<h1 style="font-family: 'Times New Roman', Times, serif">Tambah Pelanggan</h1>
<br>
<div class="card-body">
    <div class="card">
      <div class="card-body">
        <form action="/tambahPelanggan" method="POST">
            @csrf
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Nama</label>
            <input type="text" placeholder="Masukkan Nama..." name="nama" class="form-control" id="exampleInputPassword1">
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Alamat</label>
            <input type="text" placeholder=" Masukkan Alamat..." name="alamat" class="form-control" id="exampleInputPassword1">
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Telp</label>
            <input type="number" placeholder="Masukkan Telp..." name="telp" class="form-control" id="exampleInputPassword1">
          </div>
          <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
      </div>
    </div>
</div>

@endsection
