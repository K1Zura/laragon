@extends('template.app')
@section('content')
@section('title', 'Data Master')

<div class="col-sm-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
          <center><h4 class="card-title" style="font-family: Georgia, 'Times New Roman', Times, serif">Data Siswa</h4></center>
          <a href="/data-siswa" class="btn btn-primary col-sm-12 grid-margin">Detail</a>
      </div>
    </div>
</div>
<div class="col-sm-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
        <center><h4 class="card-title" style="font-family: Georgia, 'Times New Roman', Times, serif">Data Kelas</h4></center>
        <a href="/data-kelas" class="btn btn-primary col-sm-12 grid-margin">Detail</a>
    </div>
  </div>
</div>
<div class="col-sm-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
          <center><h4 class="card-title" style="font-family: Georgia, 'Times New Roman', Times, serif">Program Kejuruan</h4></center>
          <a href="/data-kejuruan" class="btn btn-primary col-sm-12 grid-margin">Detail</a>
      </div>
    </div>
  </div>
  <div class="col-sm-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
          <center><h4 class="card-title" style="font-family: Georgia, 'Times New Roman', Times, serif">Tahun Ajaran</h4></center>
          <a href="/data-tahun-ajaran" class="btn btn-primary col-sm-12 grid-margin">Detail</a>
      </div>
    </div>
  </div>
  <div class="col-sm-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
          <center><h4 class="card-title" style="font-family: Georgia, 'Times New Roman', Times, serif">Jenis Pembayaran</h4></center>
          <a href="/data-pembayaran" class="btn btn-primary col-sm-12 grid-margin">Detail</a>
      </div>
    </div>
  </div>

@endsection
