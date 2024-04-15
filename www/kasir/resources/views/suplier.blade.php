@extends('template.app')
@section('content')
@section('title', 'Supliaer')
<h1 style="font-family: 'Times New Roman', Times, serif">Suplier</h1>
<br>
<div>
    <a href="/tambah-suplier" class="btn btn-primary">Tambah</a>
</div>
<br>
<div class="card">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">CV</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($suplier as $item)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$item->nama}}</td>
                <td>{{$item->cv}}</td>
                <td>
                    <a href="/update-suplier/{{$item->id}}" class="btn btn-success">Edit</a>
                    <form action="/deleteSuplier/{{$item->id}}" method="POST">
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
