<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Barang</title>
</head>
<body>
    <div class="row" style="font-size:11">
        <h3 style="padding-left:40%;line-height: 0.5em">DATA BARANG</h3>
        <br>
        <table border="1" cellspacing="0" style="width:100%">
            <tbody style="text-align: center">
                <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                    <th>Waktu Beli</th>
                    <th>Supplier</th>
                    <th>Status Barang</th>
                    <th>Waktu Update Status</th>
                </tr>
            @foreach ($barang as $b)
                <tr>
                    <td width="5%">{{ $i=(isset($i)?++$i:$i=1) }}</td>
                    <td>{{ $b->nama_barang }}</td>
                    <td>{{ $b->qty }}</td>
                    <td>{{ $b->harga }}</td>
                    <td>{{ $b->waktu_beli }}</td>
                    <td>{{ $b->supplier }}</td>
                    <td>{{ $b->status }}</td>
                    <td>{{ $b->waktu_update }}</td>
                </tr>
            @endforeach
        </tbody>
        </table>
    </div>
</body>
</html>