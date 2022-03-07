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
                        <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">DATA BARANG INVENTARIS</h3>
                    </div>
                </div>
                <div class="row">
                    <button type="button" style="width: 115px" class="btn btn-rounded btn-outline-info" data-toggle="modal" data-target="#formInputModal">
                        + Tambah
                    </button>
                    <a href="paket/export" style="width: 115px" class="btn btn-outline-success"><i class="icon-printer"> Excel</i></a>
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
                                                <th>Nama</th>
                                                <th>Merk</th>
                                                <th>Jumlah</th>
                                                <th>Kondisi</th>
                                                <th>Tanggan Pengadaan</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($barang_inventaris as $b)
                                            <tr>
                                                <td>{{ $i=(isset($i)?++$i:$i=1) }}</td>
                                                <td>{{ $b->nama_barang }}</td>
                                                <td>{{ $b->merk_barang }}</td>
                                                <td>{{ $b->qty }}</td> 
                                                <td>{{ $b->kondisi }}</td> 
                                                <td>{{ $b->tanggal_pengadaan }}</td> 
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
            })
        })

        // $('#datatable1').DataTable({
        //     "responsive":true, "lengthChange":false, "autoWidth":false,
        //     "button":["copy", "csv", "excel", "pdf", "print"]
        // }).buttons().container().appendTo('#datatable1_wrapper .col-md-6:eq(0)');

        // $('.datatable').DataTable({
        //     "responsive":true, "lengthChange":false, "autoWidth":false,
        //     "button":["copy", "csv", "excel", "pdf", "print"]
        // }).buttons().container().appendTo('#example_wrapper .col-md-6:eq(0)');

        // $('.datatable2').DataTable({
        //     "paging":true,
        //     "lengthChange":false,
        //     "searching":true,
        //     "ordering":true,
        //     "info":true,
        //     "autoWidth":true,
        //     "responsive":true,
        // });

    </script>
@endpush