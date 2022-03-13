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
                                <h3 class="card-title">Form Data Buku</h3>
                            </div>
                            <div class="card-body">
                                <form action="" id="formBuku">
                                    <div class="form-group row">
                                        <label for="id" class="col-sm-2 col-form-label">ID</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="id" id="id" placeholder="ID" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="judul_buku" class="col-sm-2 col-form-label">Judul Buku</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="judul_buku" id="judul_buku" placeholder="Judul Buku" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="pengarang" class="col-sm-2 col-form-label">Pengarang</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="pengarang" id="pengarang" placeholder="Pengarang" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="tahun_terbit" class="col-sm-2 col-form-label">Tahun Terbit</label>
                                        <div class="form-group col-sm-10">
                                            <select name="tahun_terbit" id="tahun_terbit" class="form-control form-select-lg" aria-label=".form-select-lg example">
                                                <option>-Pilih-</option>
                                                @for ($i=date('Y'); $i > 1960; $i--)
                                                    <option value="{{ $i }}">{{ $i }}</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="harga_buku" class="col-sm-2 col-form-label">Harga Buku</label>
                                        <div class="col-sm-10">
                                            <input type="number" class="form-control" name="harga_buku" id="harga_buku" placeholder="Harga Buku" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="qty" class="col-sm-2 col-form-label">Jumlah</label>
                                        <div class="col-sm-10">
                                            <input type="number" class="form-control" name="qty" id="qty" placeholder="Jumlah" required>
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
                {{-- end form card --}}

                {{-- form card --}}
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Data Buku</h3>
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
                                    <table id="tblBuku" class="table table-striped table-bordered no-wrap mt--4">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Judul Buku</th>
                                                <th>Pengarang</th>
                                                <th>Tahun Terbit</th>
                                                <th>Harga Buku</th>
                                                <th>Jumlah</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{-- <tr>
                                                <td colspan="6" align="center"><p><i>Belum ada data</i></p></td>
                                            </tr> --}}
                                        </tbody>
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
            //const isinya tidak bisa di ubah, kalo lapse(?) isinya bisa di ubah.. isi keduanya di sebut array
            const data = $('#formBuku').serializeArray()
            let newData = {}
            let dataBuku = JSON.parse(localStorage.getItem('dataBuku')) || []
            data.forEach(function(item,index){
                let name = item ['name']
                // = ngisi data
                // == perbandingan (jadi nilainya sama)
                // === identik (nilainya sama persis)
                // || atau
                let value = (name === 'id' ||
                             name === 'qty' ||
                             name === 'harga_buku'
                             ?  Number(item['value']):item['value'])
                newData [name] = value
            })
            console.log(newData)
            //stringify adalah untuk mengubah array dan nilai lainnya menjadi string
            // kalo di local storage cuman bisa pake string
            // ... disebut script operator
            localStorage.setItem('dataBuku', JSON.stringify([... dataBuku, newData]))
            return newData
        }
        
        function showData(dataBuku){
            let row = ''
            // let arr = JSON.parse(localStorage.getItem('dataBuku')) || []
            if(dataBuku.length == 0){
                return row = `<tr><td colspan="6" align="center"> Belum Ada Data</td></tr>`
            }
            dataBuku.forEach(function(item,index){
                row += `<tr>`
                row += `<td>${item['id']}</td>`
                row += `<td>${item['judul_buku']}</td>`
                row += `<td>${item['pengarang']}</td>`
                row += `<td>${item['tahun_terbit']}</td>`
                row += `<td>${item['harga_buku']}</td>`
                row += `<td>${item['qty']}</td>`
                row += `</tr>`
            })
            return row
        }

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
            let dataBuku = JSON.parse(localStorage.getItem('dataBuku')) || [] //pilih local storage(localStorage) atau (||) array([]) kosong
            // console.log(dataBuku) //console log adalah perintah untuk menampilkan data di console

            $('#tblBuku tbody').html(showData(dataBuku))

            //$() = element
            // # = id
            //events
            $('#formBuku').on('submit', function(e){
                e.preventDefault();
                // insert()
                dataBuku.push(insert())
                $('#tblBuku tbody').html(showData(dataBuku))
            })

            //event sorting
            $('#sorting').on('click',function(){
            dataBuku = insertionSort (dataBuku, "id")
            $('#tblBuku tbody').html(showData(dataBuku))
            console.log(dataBuku)
            })
            //end event

            //event searching
            $('#btnSearch').on('click',function(e){
                let teksSearch = $('#search').val()
                let id = searching (dataBuku, 'id', teksSearch)
                let data = []
                if (id>=0)
                data.push(dataBuku[id])
                console.log(id)
                console.log(data)
                $('#tblBuku tbody').html(showData(data))
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
                    arr[j+1] = arr[j]; //daa ke 2 = data ke 1, jadi di balikin
                    j--; // -1
                }
                arr[j+1] = value; //data ke 1 = data ke 2
            }
            return arr
        }
    </script>
@endpush
