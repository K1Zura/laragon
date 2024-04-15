@extends('template.app')
@section('content')
@section('title', 'Update')
<h1 style="font-family: 'Times New Roman', Times, serif">Update Suplier</h1>
<br>
<div class="card-body">
    <div class="card">
      <div class="card-body">
        <form action="/updateSuplier/{{$suplier->id}}" method="POST">
            @method('PUT')
            @csrf
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Nama</label>
            <input type="text" value="{{$suplier->nama}}" name="nama" class="form-control" id="exampleInputPassword1">
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">CV</label>
            <input type="text" value="{{$suplier->cv}}" name="cv" class="form-control" id="exampleInputPassword1">
          </div>
          <button type="submit" class="btn btn-primary">Update</button>
        </form>
      </div>
    </div>
</div>

@endsection
