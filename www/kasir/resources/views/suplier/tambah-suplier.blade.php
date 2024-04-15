@extends('template.app')
@section('content')
@section('title', 'Tambah')
<h1 style="font-family: 'Times New Roman', Times, serif">Tambah Suplier</h1>
<br>
<div class="card-body">
    <div class="card">
      <div class="card-body">
        <form action="/tambahSuplier" method="POST">
            @csrf
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Nama</label>
            <input type="text" placeholder="Masukkan Nama Suplier..." name="nama" class="form-control" id="exampleInputPassword1">
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">CV</label>
            <input type="text" placeholder=" Masukkan CV..." name="cv" class="form-control" id="exampleInputPassword1">
          </div>
          <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
      </div>
    </div>
</div>

@endsection
