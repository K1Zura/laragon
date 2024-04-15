@extends('template.app')
@section('content')
@section('title', 'Penjualan')
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
    <div class="input-group mb-3">
        <div class="col-md-1">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahPenjualan">
                Tambah
            </button>
        </div>
        <div class="col-md-1">
            <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#printPenjualan">
                Laporan
            </button>

              <!-- Modal -->
            <div class="modal fade" id="printPenjualan" tabindex="-1" aria-labelledby="printPenjualanLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="printPenjualanLabel">Print Penjualan</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <form action="/print-penjualan" method="get">
                        <label for="tanggal">Tanggal Mulai</label>
                        <input type="date" class="form-control" name="tanggal_mulai" id="tanggal_mulai">
                        @error('tanggal_mulai')
                            <div class="text-danger">
                                {{$message}}
                            </div>
                        @enderror
                        <br>
                        <label for="tanggal">Tanggal Akhir</label>
                        <input type="date" class="form-control" name="tanggal_akhir" id="tanggal_akhir">
                        @error('tanggal_akhir')
                            <div class="text-danger">
                                {{$message}}
                            </div>
                        @enderror
                        <br>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                      <button type="submit" class="btn btn-primary">Tampil</button>
                    </div>
                </form>
                  </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pelanggan</th>
                        <th>Total</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($penjualan as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->pelanggan->nama}}</td>
                            <td>{{$item->total}}</td>
                            <td>{{$item->tanggal}}</td>
                            <td>
                                <a href="/invoice/{{$item->id}}" class="btn btn-primary">Invoice</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- Modal --}}
<div class="modal fade" id="tambahPenjualan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <th>Nama Pelanggan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pelanggan as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->nama}}</td>
                        <td>
                            <a href="/penjualan/{{$item->id}}" class="btn btn-primary">Transaksi</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
      </div>
    </div>
</div>


@endsection
