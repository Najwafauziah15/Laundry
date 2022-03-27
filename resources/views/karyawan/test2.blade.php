@extends('template.header', ['title'=>'LAUNA'])
 
@section('content')
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                {{-- form card --}}
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Simulasi Transaksi Barang</h3>
                            </div>
                            <div class="card-body">
                                <form action="" id="formBarang">
                                    <div class="row" class="col-12">
                                        <div class="form-group row col-6">
                                            <label for="id" class="col-sm-4 col-form-label">ID karyawan</label>
                                            <div class="col-sm-3">
                                                <input type="text" class="form-control" id="id" placeholder="id" name="id">
                                            </div>
                                        </div>
                                        <div class="form-group row col-6">
                                            <label for="tanggal" class="col-6 col-form-label">tanggal beli</label>
                                            <div class="col-6 ml-auto">
                                                <input type="date" class="date-picker form-control ml-auto" value="{{ date('Y-m-d') }}" id="tanggal" placeholder="Nama" name="tanggal">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" class="col-12">
                                        <div class="form-group row col-6">
                                            <label for="id" class="col-sm-4 col-form-label">Nama Barang</label>
                                            <div class="col-sm-3">
                                                <select class="form-select" aria-label=".form-select example" id="nama_barang" name="nama_barang" required autofocus value="{{ old('nama_barang') }}">
                                                    <option>Pilih Barang</option>
                                                    <option name="nama_barang" value="detergen">Detergen</option>
                                                    <option name="nama_barang" value="pewangi">Pewangi</option>
                                                    <option name="nama_barang" value="detergen_sepatu">Detergen Sepatu</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row col-6">
                                            <label for="tanggal" class="col-6 col-form-label">Harga Barang</label>
                                            <div class="col-6 ml-auto">
                                                <input type="number" class="form-control" name="harga" id="harga" placeholder="Harga" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" class="col-12">
                                        <div class="form-group row col-6">
                                            <label for="id" class="col-sm-4 col-form-label">Jumlah</label>
                                            <div class="col-sm-3">
                                                <input type="number" class="form-control" name="qty" id="qty" placeholder="Jumlah" required>
                                            </div>
                                        </div>
                                        <div class="form-group row col-6">
                                            <label for="jenis" class="col-sm-4 col-form-label"> Jenis Pembayaran</label>
                                            <div class="col-sm-8"> 
                                                <input class="form-check-input" type="radio" value="cash" name="jenis" id="jenis">
                                                <label class="form-check-label ml-1">Cash</label>
                                                <input class="form-check-input ml-4" type="radio" value="e-money" name="jenis" id="jenis">
                                                <label class="form-check-label ml-5">E-Money / Transfer</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="nama" class="col-sm-2 col-form-label"></label>
                                        <div class="col-sm-10">
                                            <button class="btn btn-primary" id="btnSimpan" type="submit">Simpan</button>
                                            <button class="btn btn-dark" id="btnReset" type="reset">Reset</button>
                                        </div>
                                    </div>
                                    <input type="hidden" id="diskon" name="diskon" value="">
                                    <input type="hidden" id="total" name="total" value="">
                                    <input type="hidden" id="totaldiskon" name="totaldiskon" value="">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- end form card --}}

                {{-- form card --}}
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group row">
                                    <div class="col-sm-2">
                                        <button class="btn btn-success" type="button" id="sorting">Sorting</button>
                                    </div>
                                    <div class="col-sm-5">
                                        <input class="form-check-input" type="checkbox" value="cash" name="jenis" id="jenis">
                                        <label class="form-check-label ml-1">Cash</label>
                                        <input class="form-check-input ml-4" type="checkbox" value="e-money" name="jenis" id="jenis">
                                        <label class="form-check-label ml-5">E-Money / Transfer</label>
                                    </div>
                                    <input type="search" name="search" id="search" class="form-control col-sm-2">
                                    <button class="btn btn-success col-sm-1 ml-2" type="button" id="btnSearch">Cari</button>
                                </div>
                                <div class="table-responsive" style="padding-top:0px ">
                                    <table id="tblBarang" class="table table-striped table-bordered no-wrap mt--4">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Tanggal Beli</th>
                                                <th>Nama Barang</th>
                                                <th>Harga</th>
                                                <th>Qty</th>
                                                <th>Diskon</th>
                                                <th>Total Harga</th>
                                                <th>Jenis Bayar</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="3" align="right"><b>TOTAL</b></td>
                                                <td id="totalBayar"></td>
                                                <td id="totalQty"></td>
                                                <td id="totalDiskon"></td>
                                                <td colspan="2" id="totalAkhir"></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- end form card --}}
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
@endsection
@push('script')
<script>
    //method
    function insert(){
        const data = $('#formBarang').serializeArray()
        let newData = {}
        
        // tg = gaji_awal + tt;
        let dataBarang = JSON.parse(localStorage.getItem('dataBarang')) || []
        data.forEach(function(item,index){
            let name = item ['name']
            let value = (name === 'id'||
                        name === 'harga' ||
                        name === 'qty' ||
                        name === 'diskon' ||
                        name === 'total'
                         ?  Number(item['value']):item['value'])
            newData [name] = value
        })
        console.log(newData)
        localStorage.setItem('dataBarang', JSON.stringify([... dataBarang, newData]))
        return newData
    }
    
    function showData(dataBarang){
        let row = ''
        let totalBayar = 0
        let totalQty = 0
        let totalDiskon = 0
        let totalAkhir = 0

        if(dataBarang.length == 0){
            return row = `<tr><td colspan="8" align="center"> Belum Ada Data</td></tr>`
        }
        dataBarang.forEach(function(item,index){
            let diskon = 0
            let subTotal = item['harga'] * item['qty']
            if (subTotal > 50000){
                diskon = 15/100 * subTotal
            }
            let totalHarga = subTotal - diskon
            row += `<tr>`
            row += `<td>${item['id']}</td>`
            row += `<td>${item['tanggal']}</td>`
            row += `<td>${item['nama_barang']}</td>`
            row += `<td>${item['harga']}</td>`
            row += `<td>${item['qty']}</td>`
            row += `<td>${diskon}</td>`
            row += `<td>${totalHarga}</td>`
            row += `<td>${item['jenis']}</td>`
            row += `</tr>`;

            totalBayar += item.harga;
            totalQty += item.qty;
            totalDiskon += diskon;
            totalAkhir += totalHarga;
        })
        // console.log(row);
        $('#tblBarang tbody').html(row);
        $('#totalBayar').html(totalBayar);
        $('#totalQty').html(totalQty);
        $('#totalDiskon').html(totalDiskon)
        $('#totalAkhir').html(totalAkhir)
        return row
    }

    $('#nama_barang').on('change', function() {
            let value = $('#nama_barang').val()
            console.log(value)
            if (value === 'detergen') {
                $('#harga').val(15000)
            }
            else if(value === 'pewangi') {
                $('#harga').val(10000)
            }
            else {
                $('#harga').val(25000)
            }
    })

    function searching(arr,key,teks){
        for(let i = 0; i < arr.length; i++){
            if(arr[i] [key] == teks)
            return i
        }
        return -1
    }

    //after load
    $(function(){ //namanya dokumen ready function
        //initialize
        let dataBarang = JSON.parse(localStorage.getItem('dataBarang')) || [] //pilih local storage(localStorage) atau (||) array([]) kosong
        // console.log(dataBarang) //console log adalah perintah untuk menampilkan data di console

        $('#tblBarang tbody').html(showData(dataBarang))

        //$() = element
        // # = id
        //events
        $('#formBarang').on('submit', function(e){
            e.preventDefault();
            // insert()
            dataBarang.push(insert())
            $('#tblBarang tbody').html(showData(dataBarang))
        })

        //event sorting
        $('#sorting').on('click',function(){
        dataBarang = insertionSort (dataBarang, "id")
        $('#tblBarang tbody').html(showData(dataBarang))
        console.log(dataBarang)
        })
        //end event

        //event searching
        $('#btnSearch').on('click',function(e){
            let teksSearch = $('#search').val()
            let id = searching (dataBarang, 'id', teksSearch)
            let data = []
            if (id>=0)
            data.push(dataBarang[id])
            // console.log(id)
            // console.log(data)
            $('#tblBarang tbody').html(showData(data))
        })
    })

    function insertionSort(arr,key){
        let i,j,id,value;

        for (i=1; i < arr.length; i++)
        {
            value = arr[i]; //data ke-2
            id = arr[i][key] // =2
            j = i - 1; // =0
            while (j >= 0 && arr [j][key] > id) // 1 < 2
            {
                arr[j+1] = arr[j]; //data ke 2 = data ke 1, jadi di balikin
                j--; // -1
            }
            arr[j+1] = value; //data ke 1 = data ke 2
        }
        return arr
    }
</script>
@endpush