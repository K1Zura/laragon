@extends('template.app')
@section('content')
@section('title', 'Pencarian')

<style>
    .invalid-row {
    background-color: #ffcccc; /* Light red background for invalid rows */
}
</style>

<div class="container">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <h2 class="my-3 text-center">Pencarian Siswa Pembayaran</h2>
            <div class="input-group mb-3">
                <input type="text" name="search" id="search" class="form-control" placeholder="Search here...">
                <div class="input-group-append">
                    <button class="btn btn-primary" id="searchBtn" type="button"><i class="las la-search"></i></button>
                </div>
            </div>
            <br>
            <table class="table">
                <thead>
                    <tr>
                        <th>NIS</th>
                        <th>Nama</th>
                        <th>Kelas</th>
                        <th>Kejuruan</th>
                        <th>Tahun Ajaran</th>
                        <th>Pembayaran</th>
                        <th>Nominal</th>
                        <th>Kondisi</th>
                    </tr>
                </thead>
                <tbody id="siswaTableBody">
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
