<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Penjemputan</title>
</head>
<body>
    <div class="row" style="font-size:11">
        <h3 style="padding-left:40%;line-height: 0.5em">PENJEMPUTAN</h3>
        <br>
        <table border="1" cellspacing="0" style="width:100%">
            <tbody style="text-align: center">
                <tr>
                    <td>No</td>
                    <td>Nama Pelanggan</td>
                    <td>Alamat Pelanggan</td>
                    <td>Telepon Pelanggan</td>
                    <td>Petugas Penjemputan</td>
                    <td>Status Penjemputan</td>
                </tr>
                @foreach ($penjemputan as $pj)
                <tr>
                    <td width="5%">{{ $i=(isset($i)?++$i:$i=1) }}</td>
                    <td>{{ $pj->member->nama }}</td>
                    <td>{{ $pj->member->alamat }}</td>
                    <td>{{ $pj->member->tlp }}</td>
                    <td>{{ $pj->petugas }}</td>
                    <td>{{ $pj->status }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>