<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Penjualan</title>
    <link rel="shortcut icon" type="image/png" href="../assets/images/logos/favicon.png" />
    <link rel="stylesheet" href="../assets/css/styles.min.css" />
</head>
<body>
<center>
    <h1 style="font-family: 'Times New Roman', Times, serif">Laporan Penjualan</h1>
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Penjualan</th>
                <th>Nama Pelanggan</th>
                <th>Total</th>
                <th>Operator</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($penjualan as $item)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$item->kode_penjualan}}</td>
                <td>{{$item->pelanggan->nama}}</td>
                <td>{{$item->total}}</td>
                <td>{{$item->user->name}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</center>

<script src="../assets/libs/jquery/dist/jquery.min.js"></script>
<script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="../assets/js/sidebarmenu.js"></script>
<script src="../assets/js/app.min.js"></script>
<script src="../assets/libs/apexcharts/dist/apexcharts.min.js"></script>
<script src="../assets/libs/simplebar/dist/simplebar.js"></script>
<script src="../assets/js/dashboard.js"></script>
<script>
    window.onload = function() {
        window.print();
        setTimeout( function() {
            window.location.href = "{{ route('index-penjualan') }}";
        }, 1000);
    }
</script>
</body>
</html>
