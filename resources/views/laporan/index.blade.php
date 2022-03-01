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
                        <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">DATA TRANSAKSI</h3>
                    </div>
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
                <div class="row">
                    <div class="col-12">
                        <a href="/export" class="btn btn-outline-success"><i class="icon-printer"> Excel</i></a>
                    </div>
                </div>
                <br>
                <!-- basic table -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered no-wrap">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Kode Invoice</th>
                                                <th>Nama Paket</th>
                                                <th>Status</th>
                                                <th>Dibayar</th>
                                                <th>Tanggal</th>
                                                <th>Estimasi</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($detail_transaksi as $t)
                                            <tr>
                                                <td>{{ $i=(isset($i)?++$i:$i=1) }}</td>
                                                <td>{{ $t->transaksi->kode_invoice }}</td>
                                                <td>{{ $t->paket->nama_paket }}</td>
                                                <td>{{ $t->transaksi->status }}</td>
                                                <td>{{ $t->transaksi->dibayar }}</td> 
                                                <td>{{ $t->transaksi->tgl }}</td> 
                                                <td>{{ $t->transaksi->batas_waktu }}</td> 
                                                <td> 
                                                    <button type="submit" class="btn btn-outline-info mt-1" data-toggle="modal" data-target="#DetailModal{{ $t->id_transaksi }}">
                                                        <i class="icon-note"></i>
                                                    </button>
                                                    {{-- <a href="/cetak" class="btn btn-outline-warning"><i class="icon-printer"></i></a> --}}
                                                    <a href="{{ url($t->id. '/cetak')}}" class="btn btn-outline-warning"><i class="icon-printer"></i></a>
                                                </td>
                                            </tr>
                                            @include('laporan.detail')
                                            {{-- @include('transaksi.faktur') --}}
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
@include('pengguna.form')
@endsection
