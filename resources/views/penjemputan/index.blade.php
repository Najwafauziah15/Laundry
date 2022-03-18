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
                        <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Penjemputan Laundry</h3>
                    </div>
                </div>
                <div class="row">
                    <button type="button" style="width: 115px" class="btn btn-rounded btn-outline-info m-2" data-toggle="modal" data-target="#formInputModal">
                        + Tambah
                    </button>
                    <a href="{{ route('export_penjemputan') }}" style="width: 115px" class="btn btn-outline-success m-2"><i class="icon-printer"> Excel</i></a>
                    <a href="penjemputan/cetak" style="width: 115px" class="btn btn-outline-warning m-2"><i class="icon-printer"> Word</i></a>
                    <form method="POST" action="{{ route('import_penjemputan') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="file" name="file2" class="form-control border" placeholder="Pilih file excel(.xlsx)">
                                </div>
                                @error('file2')
                                <div class="'alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-warning" id="submit"> <i class="ni ni-bold-left"></i> Import</button>
                            </div>
                        </div>
                    </form>
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
                                                <th>Nama Pelanggan</th>
                                                <th>Alamat Pelanggan</th>
                                                <th>No.Hp Pelanggan</th>
                                                <th>Petugas Penjemputan</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($penjemputan as $pj)
                                            <tr>
                                                <td>{{ $i=(isset($i)?++$i:$i=1) }}</td>
                                                <td>{{ $pj->member->nama }}</td>
                                                <td>{{ $pj->member->alamat }}</td>
                                                <td>{{ $pj->member->tlp }}</td> 
                                                <td>{{ $pj->petugas }}</td> 
                                                <td>
                                                    <select class="form-control form-select-lg mb-3" aria-label=".form-select-lg example" id="status" name="status">
                                                        <option value="{{ $pj->status }}">{{ $pj->status }}</option>
                                                        <option value="tercatat">tercatat</option>
                                                        <option value="penjemputan">penjemputan</option>
                                                        <option value="selesai">selesai</option>
                                                    </select>
                                                </td> 
                                                <td> 
                                                    {{-- delete-penjemputan --}}
                                                    <form action="{{ url($pj->id. '/penjemputan/delete')}}" method="POST">
                                                        @csrf
                                                        @method("delete")
                                                        <button type="submit" class="btn btn-outline-danger delete">hapus</button>
                                                    </form>
                                                    {{-- edit penjemputan --}}
                                                    <button type="submit" class="btn btn-outline-success mt-1" data-toggle="modal" data-target="#formEditModal{{ $pj->id }}">
                                                        Edit
                                                    </button>
                                                </td>
                                            </tr>
                                            @include('penjemputan.edit')
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
@include('penjemputan.form')
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
    })
    </script>
@endpush