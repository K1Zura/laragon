@extends('template.app')
@section('content')
@section('title', 'Pengguna')
<h1 style="font-family: 'Times New Roman', Times, serif">Pengguna</h1>
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
    <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#tambahPengguna">
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
                    <th>Email</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($user as $item)
                <form action="/pengguna/{{$item->id}}" method="post">
                    @method('DELETE')
                    @csrf
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->email}}</td>
                        <td>
                            <button class="btn btn-success" type="button" data-bs-toggle="modal" data-bs-target="#updatePengguna{{$item->id}}">
                                Update
                            </button>
                            {{-- Modal --}}
                            <div class="modal fade" id="updatePengguna{{$item->id}}" tabindex="-1" aria-labelledby="updatePengguna{{$item->id}}Label" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Update Pengguna</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                    <form action="/pengguna/{{$item->id}}" method="post">
                                        @method('PUT')
                                        @csrf
                                        <input type="text" value="{{$item->nama}}" name="nama" class="form-control" placeholder="Nama" required>
                                        <br>
                                        <input type="email" value="{{$item->email}}" name="email" class="form-control" placeholder="Email" required>
                                        <br>
                                        <input type="password" value="{{$item->password}}" name="password" class="form-control" placeholder="Password" required>
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
<div class="modal fade" id="tambahPengguna" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Pengguna</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <form action="/pengguna" method="post">
            @csrf
            <input type="text" name="name" class="form-control" placeholder="Nama" required>
            <br>
            <input type="email" name="email" class="form-control" placeholder="Email" required>
            <br>
            <input type="password" name="password" class="form-control" placeholder="Password" required>
            <input type="hidden" name="role_id" value="2" class="form-control" placeholder="role_id" required>
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
