@extends('template.app')
@section('content')
@section('title', 'Penjualan')
<h1 style="font-family: 'Times New Roman', Times, serif">Penjualan</h1>
<br>
<div>
    <a href="/tambah-penjualan" class="btn btn-primary">Tambah</a>
</div>
<br>
<div class="card">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Alamat</th>
                <th scope="col">Telp</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>

@endsection
