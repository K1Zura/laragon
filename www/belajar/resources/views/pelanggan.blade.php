@extends('template.app')
@section('content')
@section('title', 'Pelanggan')
<h1 style="font-family: 'Times New Roman', Times, serif">Pelanggan</h1>
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
    <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#tambahPelanggan">
        Tambah
    </button>
</div>
<div class="card">
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Pelanggan</th>
                    <th>Alamat</th>
                    <th>Telepon</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pelanggan as $item)
                <form action="/pelanggan/{{$item->id}}" method="post">
                    @method('DELETE')
                    @csrf
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->nama}}</td>
                        <td>{{$item->alamat}}</td>
                        <td>{{$item->telp}}</td>
                        <td>
                            <button class="btn btn-success" type="button" data-bs-toggle="modal" data-bs-target="#updatePelanggan{{$item->id}}">
                                Update
                            </button>
                            {{-- Modal --}}
                            <div class="modal fade" id="updatePelanggan{{$item->id}}" tabindex="-1" aria-labelledby="updatePelanggan{{$item->id}}Label" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Update Pelanggan</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                    <form action="/pelanggan/{{$item->id}}" method="post">
                                        @method('PUT')
                                        @csrf
                                        <input type="text" value="{{$item->nama}}" name="nama" class="form-control" placeholder="Nama Pelanggan" required>
                                        <br>
                                        <input type="text" value="{{$item->alamat}}" name="alamat" class="form-control" placeholder="Alamat" required>
                                        <br>
                                        <input type="text" value="{{$item->telp}}" name="telp" class="form-control" placeholder="Telepon" required>
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
<div class="modal fade" id="tambahPelanggan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Pelanggan</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <form action="/pelanggan" method="post">
            @csrf
            <input type="text" name="nama" class="form-control" placeholder="Nama Pelanggan" required>
            <br>
            <input type="text" name="alamat" class="form-control" placeholder="Alamat" required>
            <br>
            <input type="text" name="telp" class="form-control" placeholder="Telepon" required>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
        </form>
      </div>
    </div>
</div>
@endsection
