@extends('template.app')
@section('content')
@section('title', 'Produk')
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
    <div class="input-group mb-2">
        <div class="col-md-1">
            <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#tambahProduk">
                Tambah
            </button>
        </div>
        <div class="col-md-1">
            <button class="btn btn-secondary" type="button" data-bs-toggle="modal" data-bs-target="#printProduk">
                Print
            </button>
        </div>
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
                    <th>Aksi</th>
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
                        <td>
                            <button class="btn btn-success" type="button" data-bs-toggle="modal" data-bs-target="#updateProduk{{$item->id}}">
                                Update
                            </button>
                            {{-- Modal --}}
                            <div class="modal fade" id="updateProduk{{$item->id}}" tabindex="-1" aria-labelledby="updateProduk{{$item->id}}Label" aria-hidden="true">
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
                                        <input type="text" value="{{$item->nama_produk}}" name="nama_produk" class="form-control" placeholder="Nama Produk" required>
                                        <br>
                                        <input type="text" value="{{$item->stok}}" name="stok" class="form-control" placeholder="Stok" required>
                                        <br>
                                        <input type="text" value="{{$item->harga}}" name="harga" class="form-control" placeholder="Harga" required>
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                    </form>
                                </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</div>

{{-- Modal --}}
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
            <input type="text" name="kode_produk" class="form-control" placeholder="Kode Produk" required>
            <br>
            <input type="text" name="nama_produk" class="form-control" placeholder="Nama Produk" required>
            <br>
            <input type="number" name="stok" class="form-control" placeholder="Stok" required>
            <br>
            <input type="number" name="harga" class="form-control" placeholder="Harga" required>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
        </form>
      </div>
    </div>
</div>

{{-- Modal --}}
<div class="modal fade" id="printProduk" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Print Produk</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="/print-produk" method="get">
                @csrf
                <select class="form-control" name="status" id="status">
                    <option value="ada">Ada</option>
                    <option value="habis">Habis</option>
                    <option value="semua">Semua</option>
                </select>
                <br>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button class="btn btn-primary" type="submit">Tampil</button>
            </form>
      </div>
    </div>
</div>
@endsection
