<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../assets/css/styles.min.css" />
    <title>Print Penjualan</title>
</head>
<body>
        <center>
            <h1 style="font-family: 'Times New Roman', Times, serif">Laporan Penjualan</h1>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Penjualan</th>
                                <th>Nama Pelanggan</th>
                                <th>Total</th>
                                <th>Dibayar</th>
                                <th>Kembalian</th>
                                <th>Tanggal</th>
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
                                <td>{{$item->dibayar}}</td>
                                <td>{{$item->kembalian}}</td>
                                <td>{{$item->tanggal}}</td>
                                <td>{{$item->user->name}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
        </center>

        <script>
            window.onload = function() {
                window.print();
                setTimeout(function() {
                    window.location.href = "{{ route('home-penjualan') }}";
                }, 100);
            }
        </script>
</body>
</html>
