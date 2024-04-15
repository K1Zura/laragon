@extends('template.app')
@section('content')
@section('title', 'Produk')
<h1 style="font-family: 'Times New Roman', Times, serif">Produk</h1>
<br>
<div>
    <a href="/tambah-produk" class="btn btn-primary">Tambah</a>
</div>
<br>
<div class="card">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Kode Produk</th>
                <th scope="col">Nama</th>
                <th scope="col">Stok</th>
                <th scope="col">Harga</th>
                <th scope="col">Suplier</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($produk as $item)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$item->kode_produk}}</td>
                <td>{{$item->nama}}</td>
                <td>{{$item->stok}}</td>
                <td>{{$item->harga}}</td>
                <td>{{$item->suplier->nama}}</td>
                <td>
                    <a href="/update-produk/{{$item->id}}" class="btn btn-success">Edit</a>
                    <form action="/deleteProduk/{{$item->id}}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin?')">Hapus</button>

                    </form>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
</div>

@endsection
