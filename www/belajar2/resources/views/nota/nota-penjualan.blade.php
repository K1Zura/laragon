<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nota</title>
</head>
<body>
<center>
    <h1 style="font-family: 'Times New Roman', Times, serif">Detail Transaksi</h1>
    ==============================
    <p>Nama: {{$penjualan->pelanggan->nama}}</p>
    <p>Alamat: {{$penjualan->pelanggan->alamat}}</p>
    ==============================
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Produk</th>
                <th>Jumlah</th>
                <th>Harga</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($DetailPenjualan as $item)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$item->produk->nama_produk}}</td>
                <td>{{$item->jumlah}}</td>
                <td>{{$item->produk->harga}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    ==============================
    <h3 style="font-family: 'Times New Roman', Times, serif">Total: {{$penjualan->total}}</h3>
    <h3 style="font-family: 'Times New Roman', Times, serif">Total Bayar: {{$penjualan->dibayar}}</h3>
    <h3 style="font-family: 'Times New Roman', Times, serif">Kembalian: {{$penjualan->kembalian}}</h3>
    ==============================
    <h1 style="font-family: 'Times New Roman', Times, serif">Terima Kasih</h1>
    ==============================
</center>

<script>
    window.onload = function() {
        window.print();
        setTimeout(function(){
            window.location.href = "{{ route('index-penjualan') }}";
        }, 1000);
    }
</script>
</body>
</html>
