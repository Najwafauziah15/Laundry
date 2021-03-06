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
                {{-- form --}}
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3>FORM</h3>
                            </div>
                            <div class="card-body">
                                <form action="" id="formKaryawan">
                                    <div class="form-group row">
                                        <label for="id" class="col-sm-2 col-form-label">ID</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="id" id="id" placeholder="ID" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="jk" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                        <div class="form-check col-sm-2">
                                            <input type="radio" name="jk" id="jk" value="L">
                                            <label for="" class="form-check-label"> Laki Laki</label>
                                        </div>
                                        <div class="form-check col-sm-2">
                                            <input type="radio" name="jk" id="jk" value="P">
                                            <label for="" class="form-check-label"> Perempuan</label>
                                        </div>
                                    </div>
                                    <div class="form-group row my-auto">
                                        <label for="jenis" class="col-sm-2 col-form-label">Status</label>
                                        <div class="form-group col-sm-10">
                                            <select class="form-select" aria-label=".form-select example" id="jenis" name="jenis" required autofocus value="{{ old('jenis') }}">
                                                <option selected>Pilih Status</option>
                                                <option name="jenis" value="single">Single</option>
                                                <option name="jenis" value="couple">Couple</option>
                                            </select>
                                        </div>
                                    </div>
                                    {{-- @if( = "single") --}}
                                    <div class="form-group row">
                                        <label for="ja" class="col-sm-2 col-form-label">Jml Anak</label>
                                        <div class="col-sm-10">
                                            <input type="number" class="form-control jmlAnak" name="ja" id="ja" placeholder="Jml Anak">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="masa_kerja" class="col-sm-2 col-form-label">Mulai Bekerja</label>
                                        <div class="col-sm-10">
                                            <input type="date" class="form-control" name="masa_kerja" id="masa_kerja" placeholder="Mulai Bekerja" required>
                                        </div>
                                    </div>
                                    <input type="hidden" class="form-control" value="2000000" name="gaji_awal" id="gaji_awal" placeholder="Gaji Awal" required>
                                    <div class="form-group row">
                                        <label for="nama" class="col-sm-2 col-form-label"></label>
                                        <div class="col-sm-10">
                                            <button class="btn btn-primary" id="btnSimpan" type="submit">Input</button>
                                            <button class="btn btn-dark" id="btnReset" type="reset">Reset</button>
                                        </div>
                                    </div>
                                    <input type="hidden" id="tunjangan" name="tunjangan" value="">
                                    <input type="hidden" id="total" name="total" value="">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- end form --}}

                <!-- basic table -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3>Data</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <div class="col-sm-2">
                                        <button class="btn btn-success" type="button" id="sorting">Sorting</button>
                                    </div>
                                    <input type="search" name="search" id="search" class="form-control col-sm-2">
                                    <button class="btn btn-success col-sm-1" style="padding-left" type="button" id="btnSearch">Cari</button>
                                </div>
                                <div class="table-responsive" style="padding-top:0px ">
                                    <table id="tblKaryawan" class="table table-striped table-bordered no-wrap mt--4">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>JK</th>
                                                <th>Status</th>
                                                <th>JML Anak</th>
                                                <th>Mulai Bekerja</th>
                                                <th>Gaji Awal</th>
                                                <th>Tunjangan</th>
                                                <th>Total Gaji</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{-- <tr>
                                                
                                            </tr> --}}
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="6" align="right"><b>TOTAL</b></td>
                                                <td id="totalAwal"></td>
                                                <td id="totalTunjangan"></td>
                                                <td id="totalTotal"></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
@endsection
@push('script')
<script>
    //method
    function insert(){
        //const isinya tidak bisa di ubah, kalo lapse(?) isinya bisa di ubah.. isi keduanya di sebut array
        ta = tunjanganAnak($('#ja').val());
        tm = tunjanganMasaKerja(calculateTotalYear($('#masa_kerja').val()));
        tc = tunjanganCouple($('#jenis').val());
        tt = ta+tm+tc;
        $('#tunjangan').val(tt);
        $('#total').val(tt + 2000000);

        const data = $('#formKaryawan').serializeArray()
        let newData = {}
        
        // tg = gaji_awal + tt;
        let dataKaryawan = JSON.parse(localStorage.getItem('dataKaryawan')) || []
        data.forEach(function(item,index){
            let name = item ['name']
            // = ngisi data
            // == perbandingan (jadi nilainya sama)
            // === identik (nilainya sama persis)
            // || atau
            let value = (name === 'id'||
                        name === 'gaji_awal' ||
                        name === 'total' ||
                        name === 'tunjangan'
                         ?  Number(item['value']):item['value'])
            newData [name] = value
        })
        console.log(newData)
        //stringify adalah untuk mengubah array dan nilai lainnya menjadi string
        // kalo di local storage cuman bisa pake string
        // ... disebut script operator
        localStorage.setItem('dataKaryawan', JSON.stringify([... dataKaryawan, newData]))
        return newData
    }
    
    function showData(dataKaryawan){
        let row = ''
        let totalAwal = 0
        let totalTunjangan = 0
        let totalTotal = 0
        // let arr = JSON.parse(localStorage.getItem('dataKaryawan')) || []
        if(dataKaryawan.length == 0){
            return row = `<tr><td colspan="9" align="center"> Belum Ada Data</td></tr>`
        }
        dataKaryawan.forEach(function(item,index){
            row += `<tr>`
            row += `<td>${item['id']}</td>`
            row += `<td>${item['nama']}</td>`
            row += `<td>${item['jk']}</td>`
            row += `<td>${item['jenis']}</td>`
            row += `<td>${item['ja']}</td>`
            row += `<td>${item['masa_kerja']}</td>`
            row += `<td>${item['gaji_awal']}</td>`
            row += `<td>${item['tunjangan']}</td>`
            row += `<td>${item['total']}</td>`
            row += `</tr>`;
            totalAwal += item.gaji_awal;
            totalTunjangan += item.tunjangan;
            totalTotal += item.total;
        })
        console.log(row);
        $('#tblKaryawan tbody').html(row);
        $('#totalAwal').html(totalAwal);
        $('#totalTunjangan').html(totalTunjangan);
        $('#totalTotal').html(totalTotal);
        return row
    }

    function searching(arr,key,teks){
        for(let i = 0; i < arr.length; i++){
            if(arr[i] [key] == teks)
            return i
        }
        return -1
    }

        $('#jenis').on('change', function() {
            let value = $('#jenis').val()
            console.log(value)
            if (value == 'single') {
                $('#ja').val(0)
                $('#ja').attr('readonly', true)
            } else {
                $('#ja').attr('readonly', false)

            }
        })

    //after load
    $(function(){ //namanya dokumen ready function
        //initialize
        let dataKaryawan = JSON.parse(localStorage.getItem('dataKaryawan')) || [] //pilih local storage(localStorage) atau (||) array([]) kosong
        // console.log(dataKaryawan) //console log adalah perintah untuk menampilkan data di console

        $('#tblKaryawan tbody').html(showData(dataKaryawan))

        //$() = element
        // # = id
        //events
        $('#formKaryawan').on('submit', function(e){
            e.preventDefault();
            // insert()
            dataKaryawan.push(insert())
            $('#tblKaryawan tbody').html(showData(dataKaryawan))
        })

        //event sorting
        $('#sorting').on('click',function(){
        dataKaryawan = insertionSort (dataKaryawan, "id")
        $('#tblKaryawan tbody').html(showData(dataKaryawan))
        console.log(dataKaryawan)
        })
        //end event

        //event searching
        $('#btnSearch').on('click',function(e){
            let teksSearch = $('#search').val()
            let id = searching (dataKaryawan, 'id', teksSearch)
            let data = []
            if (id>=0)
            data.push(dataKaryawan[id])
            // console.log(id)
            // console.log(data)
            $('#tblKaryawan tbody').html(showData(data))
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

    const calculateTotalYear = (tanggal_awal) => {
            tanggal_awal = new Date(tanggal_awal);
            let ageDifMs = Date.now() - tanggal_awal.getTime();
            if (ageDifMs > 0) {
                let ageDate = new Date(ageDifMs);
                return Math.abs(ageDate.getUTCFullYear() - 1970);
            }
            return 0;
    }

    function tunjanganMasaKerja(lama){
        tunjanganB = lama * 150000;
        return tunjanganB
    }

    function tunjanganAnak(anak){
            if(anak > 0){
                if(anak >= 2){
                    return 300000
                }else{
                    return 150000
                }
            }
            return 0
    }
    
    function tunjanganCouple(status){
            if(status === "couple"){
                return  250000
            }else{
                return 0
            }
        }
</script>
   
@endpush