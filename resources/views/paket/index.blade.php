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
                        <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">DATA PAKET</h3>
                    </div>
                </div>
                <div class="row">
                    <button type="button" style="width: 115px" class="btn btn-rounded btn-outline-info" data-toggle="modal" data-target="#formInputModal">
                        + Tambah
                    </button>
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
                                                <th>Nama Outlet</th>
                                                <th>Jenis</th>
                                                <th>Nama Paket</th>
                                                <th>Harga</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($paket as $pk)
                                            <tr>
                                                <td>{{ $i=(isset($i)?++$i:$i=1) }}</td>
                                                <td>{{ $pk->outlet->nama }}</td>
                                                <td>{{ $pk->jenis }}</td>
                                                <td>{{ $pk->nama_paket }}</td> 
                                                <td>{{ $pk->harga }}</td> 
                                                <td> 
                                                    {{-- delete-mobil --}}
                                                    <form action="{{ url($pk->id. '/paket/delete')}}" method="POST">
                                                        @csrf
                                                        @method("delete")
                                                        <button type="submit" class="btn btn-outline-danger" onclick="return confirm('apakah data mau dihapus')">hapus</button>
                                                    </form>
                                                    {{-- <form action="{{ url($b->id. '/barang/edit')}}" method="GET"> --}}
                                                    <button type="submit" class="btn btn-outline-success mt-1" data-toggle="modal" data-target="#formEditModal{{ $pk->id }}">
                                                        Edit
                                                    </button>
                                                    {{-- </form> --}}
                                                </td>
                                            </tr>
                                            @include('paket.edit')
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
@include('paket.form')
@endsection