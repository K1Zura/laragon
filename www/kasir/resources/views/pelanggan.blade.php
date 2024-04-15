@extends('template.app')
@section('content')
@section('title', 'Pelanggan')
<h1 style="font-family: 'Times New Roman', Times, serif">Pelanggan</h1>
<br>
<div>
    <a href="/tambah-pelanggan" class="btn btn-primary">Tambah</a>
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
            @foreach ($pelanggan as $item)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$item->nama}}</td>
                <td>{{$item->alamat}}</td>
                <td>{{$item->telp}}</td>
                <td>
                    <a href="/update-pelanggan/{{$item->id}}" class="btn btn-success">Edit</a>
                    <form action="/deletePelanggan/{{$item->id}}" method="POST">
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
