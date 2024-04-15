<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Transaksi</title>
</head>
<body>
<div class="container">
    <center>
    <h1>Detail Transaksi</h1>
=====================================
    <p>Nama: {{ $penjualan->pelanggan->nama }}</p>
    <p>Tanggal: {{ $penjualan->tanggal }}</p>
=====================================
    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>Jumlah</th>
                <th>Harga</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($DetailPenjualan as $detail)
            <tr>
                <td>{{ $detail->produk->nama_produk }}</td>
                <td>{{ $detail->jumlah }}</td>
                <td>{{ $detail->produk->harga }}</td>
                <td>{{ $detail->subTotal }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
=====================================
    <p>Total Bayar: {{ $penjualan->total }}</p>
    <p>Dibayar: {{ $penjualan->dibayar }}</p>
    <p>Kembalian: {{ $penjualan->kembalian }}</p>
=====================================
    <h2 style="font-family: 'Times New Roman', Times, serif">------------Terima Kasih------------</h2>
=====================================
</center>
</div>
    <script>
        window.onload = function() {
            window.print();
            setTimeout(function() {
                window.location.href = "{{ route('home-pembelian') }}";
            }, 1000);
        }
    </script>
</body>
</html>
