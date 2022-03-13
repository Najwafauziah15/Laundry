<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <link rel="stylesheet" href="{{ asset('css') }}/bootstrap.min.css"> --}}

    <title>Document</title>
</head>
<body>
    <div class="row" style="font-size:11">
    <h3 style="padding-left:35%;line-height: 0.5em">FAKTUR PEMBAYARAN</h3>
    <br>
    @foreach ($detail_transaksi as $t)
    {{-- <h5 class="text-dark my-auto"><u>Keterangan</u></h5> 
    {{ auth()->user()->name }}</--}}
    <h4 class="my-auto"><b style="line-height: 0.5em">PT.{{ $t->paket->outlet->nama }}</b><b style="float: right" line-height: 0.5em>{{ $t->transaksi->kode_invoice }}</b></h4>
    <h4 class="my-auto"><b style="line-height: 0.5em">{{ $t->paket->outlet->alamat }}</b></h4>
    <h4 class="my-auto"><b style="line-height: 0.5em">{{ $t->paket->outlet->tlp }}</b></h4>
    <table border="1" cellspacing="0" style="width:100%">
        <tbody style="text-align: center">
            <tr>
                <td colspan="4">
                    <p class="my-auto" style="text-align: left" >Nama Pembeli    : {{ $t->transaksi->member->nama }}</p>
                    <p class="my-auto" style="text-align: left" >Alamat Pembeli  : {{ $t->transaksi->member->alamat }}</p>
                    <p class="my-auto" style="text-align: left" >Telepon Pembeli : {{ $t->transaksi->member->tlp }}</p>
                </td>
            </tr>
            <tr>
                <td>No</td>
                <td>Nama Paket</td>
                <td>Jumlah Paket</td>
                <td>Harga Paket</td>
            </tr>
            <tr>
                <td width="5%">{{ $i=(isset($i)?++$i:$i=1) }}</td>
                <td>{{ $t->paket->nama_paket }}</td>
                <td width="15%">{{ $t->qty }}</td>
                <td>{{ $t->paket->harga }}</</td>
            </tr>
            <tr>
                <td colspan="3" style="text-align: left"><b style="padding-right: 6">Total Awal</b></td>
                <td>{{ $t->transaksi->subtotal }}</td>
            </tr>
            <tr>
                <td colspan="3" style="text-align: left">Diskon</td>
                <td>{{ $t->transaksi->diskon }}%</td>
            </tr>
            <tr>
                <td colspan="3" style="text-align: left">Pajak</td>
                <td>{{ $t->transaksi->pajak }}%</td>
            </tr>
            <tr>
                <td colspan="3" style="text-align: left">Biaya Tambahan</td>
                <td>{{ $t->transaksi->biaya_tambahan }}</td>
            </tr>
            <tr>
                <td colspan="3" style="text-align: right"><b style="padding-right: 6">Total Akhir</b></td>
                <td>{{ $t->transaksi->total }}</td>
            </tr>
        </tbody>
    </table>
    <p style="text-align: left; line-height: 0.5em;font-size:9"><b>Perhatian</b></p>
    <p style="text-align: left; line-height: 0.5em;font-size:9">- Pengabilan barang harus disertai nota</p>
    <p style="text-align: left; line-height: 0.5em;font-size:9">- Klaim berlaku 24 jam setelah barang di ambil</p>
    <p style="text-align: left; line-height: 0.5em;font-size:9">- Kain luntur, berkerut karena sifat kain diluar tanggungan</p>
    <p style="text-align: left; line-height: 0.5em;font-size:9">- Cucian yang tidak di ambil dalam waktu 1 bulan, bila rusak/hilang bukan tanggung jawab kami</p>
    <p style="text-align: right; line-height: 0.5em"><b>Hormat kami,</b></p>
    <br><br>
    <p style="text-align: right; line-height: 0.5em"><b>.......................................</b></p>
    @endforeach
    </div>
</body>
</html>