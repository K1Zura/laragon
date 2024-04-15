<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../assets/css/styles.min.css" />
    <title>Print Produk</title>
</head>
<body>
        <center>
            <h1 style="font-family: 'Times New Roman', Times, serif">Laporan Produk</h1>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Produk</th>
                                <th>Nama Produk</th>
                                <th>Stok</th>
                                <th>Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($produk as $item)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$item->kode_produk}}</td>
                                <td>{{$item->nama_produk}}</td>
                                <td>{{$item->stok}}</td>
                                <td>{{$item->harga}}</td>
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
                    window.location.href = "{{ route('produk') }}";
                }, 100);
            }
        </script>
</body>
</html>
