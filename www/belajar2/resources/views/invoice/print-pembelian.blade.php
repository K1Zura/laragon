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
    <h1 style="font-family: 'Times New Roman', Times, serif">Detail Pembelian</h1>
    ==============================
    <p>Nama: {{$pembelian->suplier->nama}}</p>
    <p>Alamat: {{$pembelian->suplier->alamat}}</p>
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
            @foreach ($DetailPembelian as $item)
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
    <h3 style="font-family: 'Times New Roman', Times, serif">Total: {{$pembelian->total}}</h3>
    <h3 style="font-family: 'Times New Roman', Times, serif">Total Barang: {{$pembelian->jumlah}}</h3>
    ==============================
    <h1 style="font-family: 'Times New Roman', Times, serif">Terima Kasih</h1>
    ==============================
</center>

<script>
    window.onload = function() {
        window.print();
        setTimeout(function(){
            window.location.href = "{{ route('invoice-pembelian', $pembelian->id) }}";
        }, 1000);
    }
</script>
</body>
</html>
