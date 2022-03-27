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
                        <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">LAPORAN KEUANGAN</h3>
                    </div>
                </div>
                {{-- alert --}}
                {{-- <div class="row">
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
                </div> --}}
                <br>
                {{-- isi laporan --}}
                <div class="card">
                    <div class="col-12">
                        <div class="card-body">
                            <div class="row" class="col-12">
                                <div class="form-group row col-6">
                                    <label for="tanggal" class="col-4 col-form-label">mulai tanggal</label>
                                    <div class="col-6 ml-auto">
                                        <input type="date" class="date-picker form-control ml-auto" id="tanggal" placeholder="Nama" name="tanggal">
                                    </div>
                                </div>
                                <div class="form-group row col-6">
                                    <label for="tanggal" class="col-4 col-form-label">sampai tanggal</label>
                                    <div class="col-6 ml-auto">
                                        <input type="date" class="date-picker form-control ml-auto" id="tanggal" placeholder="Nama" name="tanggal">
                                    </div>
                                </div>
                            </div>
                            <div class="row col-12">
                                <div class="row col-2">
                                    <button type="submit" class="btn btn-primary">Tampilkan</button>
                                </div>
                            </div>
                            <div class="table-responsive mt-4" style="padding-top:0px ">
                                <table id="zero_config" class="table table-striped table-bordered no-wrap mt--4">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal</th>
                                            <th>Jumlah Paket</th>
                                            <th>Keuntungan</th>
                                            <th>Pemasukan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>2022-03-25</td>
                                            <td>3</td>
                                            <td>9000</td>
                                            <td>39000</td>
                                            <td><button class="btn btn-outline-primary">detail</button></td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="3" align="right"><b>TOTAL</b></td>
                                            <td id="totalKeuntungan"></td>
                                            <td colspan="2" id="totalPemasukan"></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- end laporan --}}
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
@endsection
