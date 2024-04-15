@extends('template.app')
@section('content')
@section('tite', 'Dashboard')
<h1 style="font-family: 'Times New Roman', Times, serif">Dashboard</h1>
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h1 style="font-family: 'Times New Roman', Times, serif">Penjualan | Hari ini</h1>
                <p>{{number_format($penjualan->sum('total'))}}</p>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h1 style="font-family: 'Times New Roman', Times, serif">Produk Terjual | Hari ini</h1>
                <p>{{number_format($DetailPenjualan->sum('jumlah'))}}</p>
            </div>
        </div>
    </div>
</div>

@endsection
