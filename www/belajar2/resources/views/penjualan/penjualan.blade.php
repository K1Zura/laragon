@extends('template.app')
@section('content')
@section('tite', 'Penjualan')
<h1 style="font-family: 'Times New Roman', Times, serif">Penjualan</h1>
<br>
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
    <div class="container">
        <div class="input-group mb-3">
            @if ($tampilPetugas)
            <div class="col-md-1">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambah">
                    Tambah
                </button>
            </div>
            @endif
            @if ($tampilAdmin)
            <div class="col-md-1">
                <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#printPenjualan">
                    Print
                </button>
            </div>
            @endif
        </div>
        <div class="card">
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pelanggan</th>
                            <th>Total</th>
                            @if ($tampilPetugas)
                            <th>Aksi</th>
                            @endif

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($penjualan as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->pelanggan->nama}}</td>
                            <td>{{$item->total}}</td>
                            @if ($tampilPetugas)
                            <td>
                                <a href="/invoice-penjualan/{{$item->id}}" class="btn btn-primary">Invoice</a>
                            </td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="printPenjualan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Penjualan</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/print-penjualan" method="get">
                    <label for="">Tanggal Mulai</label>
                    <input type="date" class="form-control" name="tanggal_mulai" id="tanggal_mulai" value="{{date('Y-m-d')}}">
                    <br>
                    <label for="">Tanggal Selesai</label>
                    <input type="date" class="form-control" name="tanggal_selesai" id="tanggal_selesai" value="{{date('Y-m-d')}}">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Tampil</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<!-- Modal -->
<div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Penjualan</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pelanggan as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->nama}}</td>
                        <td>
                            <a href="penjualan/{{$item->id}}" class="btn btn-primary">Tambah</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
      </div>
    </div>
</div>
@endsection
