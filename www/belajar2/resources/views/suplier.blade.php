@extends('template.app')
@section('content')
@section('tite', 'Suplier')
<h1 style="font-family: 'Times New Roman', Times, serif">Suplier</h1>
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
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahSuplier">
                Tambah
            </button>
        </div>
        <div class="card">
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Telephon</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($suplier as $item)
                        <form action="/suplier/{{$item->id}}" method="post">
                            @method('DELETE')
                            @csrf
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->nama}}</td>
                            <td>{{$item->alamat}}</td>
                            <td>{{$item->telp}}</td>
                            <td>
                                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#update{{$item->id}}">
                                    Update
                                </button>
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin?')">Hapus</button>
                            </form>
                                <!-- Modal -->
                                <div class="modal fade" id="update{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLabel">Update Suplier</h5>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                        <form action="/suplier/{{$item->id}}" method="post">
                                            @method('PUT')
                                            @csrf
                                            <input type="text" placeholder="Nama" class="form-control" name="nama" id="nama" value="{{$item->nama}}">
                                            <br>
                                            <input type="text" placeholder="Alamat" class="form-control" name="alamat" id="alamat" value="{{$item->alamat}}">
                                            <br>
                                            <input type="text" placeholder="Telephon" class="form-control" name="telp" id="telp" value="{{$item->telp}}">
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
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="tambahSuplier" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Suplier</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <form action="/suplier" method="post">
            @csrf
            <input type="text" placeholder="Nama" class="form-control" name="nama" id="nama">
            <br>
            <input type="text" placeholder="Alamat" class="form-control" name="alamat" id="alamat">
            <br>
            <input type="text" placeholder="Telephon" class="form-control" name="telp" id="telp">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
        </form>
      </div>
    </div>
</div>
@endsection
