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
                <div class="row">
                    <div class="col-7 align-self-center">
                        <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">DATA BARANG</h3>
                    </div>
                </div>
                <div class="row">
                    <button type="button" style="width: 200px" class="btn btn-rounded btn-outline-info m-2" data-toggle="modal" data-target="#formInputModal">
                        + Tambah
                    </button>
                    <a href="{{ route('barang_cetak') }}" target="blank" style="width: 200px" class="btn btn-outline-danger m-2"><i class="icon-arrow-down-circle"> Export Ke PDF</i></a>
                    <a href="{{ route('export_barang') }}" style="width: 200px" class="btn btn-outline-success m-2"><i class="icon-arrow-down-circle"> Export Ke Excel</i></a>
                    <a href="{{ route('format_barang') }}" style="width: 200px" class="btn btn-outline-warning m-2"><i class="icon-arrow-down-circle"> Format Import Excel</i></a>
                    <button type="button" style="width: 200px" class="btn btn-rounded btn-outline-info m-2" data-toggle="modal" data-target="#formImport">
                        <i class="icon-arrow-up-circle"> Import </i>
                    </button>
                    @include('barang.import')
                </div>

                {{-- alert --}}
                <div class="row">
                    <div style="margin-top:20px">
                        @if (session('success'))
                        <div class="alert alert-success" role="alert" id="success-alert">
                            {{ session('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif

                        @if ($errors->any())
                        <div class="alert alert-danger" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                    </div>
                </div>
                <!-- basic table -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive" style="padding-top:0px ">
                                    <table id="zero_config" class="table table-striped table-bordered no-wrap mt--4">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Barang</th>
                                                <th>Qty</th>
                                                <th>Harga</th>
                                                <th>Waktu Beli</th>
                                                <th>Supplier</th>
                                                <th>Status Barang</th>
                                                <th>Waktu Update Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($barang as $b)
                                            <tr>
                                                <td>
                                                    {{ $i=(isset($i)?++$i:$i=1)}}
                                                    <input type="text" hidden class="id" value="{{ $b->id }}"> 
                                                </td>
                                                <td>{{ $b->nama_barang }}</td>
                                                <td>{{ $b->qty }}</td> 
                                                <td>{{ $b->harga }}</td> 
                                                <td>{{ $b->waktu_beli }}</td> 
                                                <td>{{ $b->supplier }}</td>
                                                <td>
                                                    <select name="status" class="status statusBarang form-select" id="one">
                                                        <option value="diajukan_beli"
                                                        {{ $b->status == 'diajukan_beli' ? 'selected' : '' }}>Diajukan Beli</option>
                                                        <option value="habis"
                                                        {{ $b->status == 'habis' ? 'selected' : '' }}>Habis</option>
                                                        <option value="tersedia"
                                                        {{ $b->status == 'tersedia' ? 'selected' : '' }}>Tersedia</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    {{ $b->waktu_update }} 
                                                    {{-- <input type="date" hidden class="waktu_update" value="{{ date('Y-m-d') }}">  --}}
                                                </td> 
                                                <td> 
                                                    {{-- delete-mobil --}}
                                                    <form action="{{ url($b->id. '/barang/delete')}}" method="POST">
                                                        @csrf
                                                        @method("delete")
                                                        <button type="submit" class="btn btn-outline-danger delete">hapus</button>
                                                    </form>
                                                    {{-- <form action="{{ url($b->id. '/barang/edit')}}" method="GET"> --}}
                                                    <button type="submit" class="btn btn-outline-success mt-1" data-toggle="modal" data-target="#formEditModal{{ $b->id }}">
                                                        Edit
                                                    </button>
                                                    {{-- </form> --}}
                                                </td>
                                            </tr>
                                            @include('barang.edit')
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end table -->
                <button type="button" style="width: 200px" class="btn btn-rounded btn-outline-info m-2" data-toggle="modal" data-target="#modalLogging">
                    <i class="icon-search"> Logging </i>
                </button>
                @include('barang.logging')
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
@include('barang.form')
@endsection
@push('script')
    <script>
        $('.delete').click(function(e){
            e.preventDefault()
            let data = $(this).closest('form').find('button').text()
            Swal.fire({
            title: 'Are you sure?',
            text: "Kamu akan menghapus ini?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
            })
            .then((result) => {
            if (result.isConfirmed) {
                $(this).closest('form').submit()
                Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
                )
            }
            else{
                $(this).closest('form').submit()
                Swal.fire(
                'Can Not Delete!',
                'Your file can not delete.',
                'error'
                )
            }
            })
        })

        //proses ketika status di ubah
        $('#zero_config').on('change', '.status', function() {
            let status = $(this).closest('tr').find('.status').val()
            // let waktu_update = $(this).closest('tr').find('.waktu_update').val()
            let id = $(this).closest('tr').find('.id').val()
            let data = {
            id: id,
            status: status,
            // waktu_update: waktu_update,
            _token: "{{ csrf_token() }}"
            };
            let row =  $(this).closest('tr')
            $.post('{{ route('status_barang') }}', data, function(res) {
                row.find('td:eq(7)').html(res.waktu_update)
            })
            console.log(id);
            console.log(status);
            // console.log(waktu_update);
            // console.log(msg);
        })

        // status konfirmasi ubah status
        $('.statusBarang').change(function(e) {
            swal.fire({
                text: "Status Berhasil Diganti",
                icon: "success",
                buttons: true,
                dangerMode: false,
            })
            .then((req) => {
                if (req) $(e.target).closest('form').submit()
                else swal.close()
            })
        });

    </script>
@endpush