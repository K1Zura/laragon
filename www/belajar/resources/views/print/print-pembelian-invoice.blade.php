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
    <h1>Detail Pembelian</h1>
=====================================
    <p>Nama: {{ $pembelian->suplier->nama }}</p>
    <p>Tanggal: {{ $pembelian->tanggal }}</p>
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
            @foreach($DetailPembelian as $detail)
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
    <p>Total Bayar: {{ $pembelian->total }}</p>
    <p>Dibayar: {{ $pembelian->dibayar }}</p>
    <p>Kembalian: {{ $pembelian->kembalian }}</p>
=====================================
    <h2 style="font-family: 'Times New Roman', Times, serif">------------Terima Kasih------------</h2>
=====================================
</center>
</div>
    <script>
        window.onload = function() {
            window.print();
            setTimeout(function() {
                window.location.href = "{{ route('invoice-pembelian', $pembelian->id) }}";
            }, 1000);
        }
    </script>
</body>
</html>