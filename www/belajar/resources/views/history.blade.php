@extends('template.app')
@section('content')
@section('title', 'History')
<h1 style="font-family: 'Times New Roman', Times, serif">History</h1>
<br>
<div class="input-group mb-2">
    <a href="/" class="btn btn-primary">Kembali</a>
</div>
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
    <div class="card">
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kegiatan</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($history as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->kegiatan}}</td>
                        <td>{{$item->tanggal}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
