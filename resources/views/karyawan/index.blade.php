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
                                    <div class="form-group row">
                                        <label for="nama" class="col-sm-2 col-form-label"></label>
                                        <div class="col-sm-10">
                                            <button class="btn btn-primary" id="btnSimpan" type="submit">Simpan</button>
                                            <button class="btn btn-dark" id="btnReset" type="reset">Reset</button>
                                        </div>
                                    </div>
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
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{-- <tr>
                                                
                                            </tr> --}}
                                        </tbody>
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
        function insert(){
            const data = $('#formKaryawan').serializeArray()
            console.log(data);
            let newData = {}
            data.forEach(function(item,index){
                newData[item.name] = item.name == "id" ? Number(item.value):item.value
            })
            console.log(newData);
            return newData
        }

        $(function(){
            //property
            let dataKaryawan = []

            //events
            $('#formKaryawan').on('submit', function(e){
                e.preventDefault()
                dataKaryawan.push(insert())
                $('#tblKaryawan tbody').html(showData(dataKaryawan))
                console.log(dataKaryawan)
            })
            //end event

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
                console.log(id)
                console.log(data)
                $('#tblKaryawan tbody').html(showData(data))
            })
        })

        function showData(arr){
            let row =""
            if(arr.length == null){
                return row = `<tr><td colspan="3">Belum ada data</td></tr>`
            }
            arr.forEach(function(item,index){
                row += `<tr>`
                row += `<td>${item['id']}</td>`
                row += `<td>${item['nama']}</td>`
                row += `<td>${item['jk']}</td>`
                row += `</tr>`
            })
            return row
        }

        function insertionSort(arr,key){
            let i,j,id,value;
            for (i=1; i < arr.length; i++)
            {
                value = arr[i];
                id = arr[i][key]
                j = i - 1;
                while (j >= 0 && arr [j][key] > id)
                {
                    arr[j+1] = arr[j];
                    j=j-1;
                }
                arr[j+1] = value
            }
            return arr
        }

        function searching(arr,key,teks){
            for(let i = 0; i < arr.length; i ++){
                if(arr[i] [key] == teks)
                return i
            }
            return -1
        }

    </script>
@endpush