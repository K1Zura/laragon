@extends('template.app')
@section('content')
@section('tite', 'Produk')
<h1 style="font-family: 'Times New Roman', Times, serif">Produk</h1>
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
            @if ($tampilAdmin)
            <div class="col-md-1">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahProduk">
                    Tambah
                </button>
            </div>
            <div class="col-md-1">
                <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#print">
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
                            <th>Kode Produk</th>
                            <th>Nama Produk</th>
                            <th>Stok</th>
                            <th>Harga</th>
                            @if ($tampilAdmin)
                            <th>Aksi</th>
                            @endif

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($produk as $item)
                        <form action="/produk/{{$item->id}}" method="post">
                            @method('DELETE')
                            @csrf
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->kode_produk}}</td>
                            <td>{{$item->nama_produk}}</td>
                            <td>{{$item->stok}}</td>
                            <td>{{$item->harga}}</td>
                            @if ($tampilAdmin)
                            <td>
                                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#updateProduk{{$item->id}}">
                                    Update
                                </button>
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin?')">Hapus</button>
                            </form>
                                <!-- Modal -->
                                <div class="modal fade" id="updateProduk{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLabel">Update Produk</h5>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                        <form action="/produk/{{$item->id}}" method="post">
                                            @method('PUT')
                                            @csrf
                                            <input type="text" placeholder="Kode Produk" class="form-control" name="kode_produk" id="kode_produk" value="{{$item->kode_produk}}">
                                            <br>
                                            <input type="text" placeholder="Nama Produk" class="form-control" name="nama_produk" id="nama_produk" value="{{$item->nama_produk}}">
                                            <br>
                                            <input type="number" placeholder="Stok" class="form-control" name="stok" id="stok" value="{{$item->stok}}">
                                            <br>
                                            <input type="number" placeholder="Harga" class="form-control" name="harga" id="harga" value="{{$item->harga}}">
                                            <br>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                        </form>
                                      </div>
                                    </div>
                                </div>
                            </td>
                            @endif

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="tambahProduk" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Produk</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <form action="/produk" method="post">
            @csrf
            <input type="text" placeholder="Kode Produk" class="form-control" name="kode_produk" id="kode_produk">
            <br>
            <input type="text" placeholder="Nama Produk" class="form-control" name="nama_produk" id="nama_produk">
            <br>
            <input type="number" placeholder="Stok" class="form-control" name="stok" id="stok">
            <br>
            <input type="number" placeholder="Harga" class="form-control" name="harga" id="harga">
            <br>
            <input type="date" value="{{date('Y-m-d')}}" class="form-control" name="tanggal" id="tanggal">
            <br>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
        </form>
      </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="print" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Laporan Produk</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <form action="/print-produk" method="get">
            <select name="status" id="status" class="form-control">
                <option value="ada">Ada</option>
                <option value="habis">Habis</option>
                <option value="semua">Semua</option>
            </select>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Tampil</button>
        </div>
        </form>
      </div>
    </div>
</div>
@endsection
