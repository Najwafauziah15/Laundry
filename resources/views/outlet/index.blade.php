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
                        <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">OUTLET</h3>
                    </div>
                </div>
                <div class="row">
                    <button type="button" style="width: 115px" class="btn btn-rounded btn-outline-info m-2" data-toggle="modal" data-target="#formInputModal">
                        + Tambah
                    </button>
                    <a href="{{ route('export_outlet') }}" style="width: 200px" class="btn btn-outline-success m-2"><i class="icon-arrow-down-circle"> Export Ke Excel</i></a>
                    <form method="POST" action="{{ route('import_outlet') }}" enctype="multipart/form-data">
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
                                    <table id="zero_config" class="table table-striped table-bordered no-wrap">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Alamat</th>
                                                <th>No.Telepon</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($outlet as $o)
                                            <tr>
                                                <td>{{ $i=(isset($i)?++$i:$i=1) }}</td>
                                                <td>{{ $o->nama }}</td>
                                                <td>{{ $o->alamat }}</td>
                                                <td>{{ $o->tlp }}</td> 
                                                <td> 
                                                    {{-- delete --}}
                                                    @if ($o->canDelete())
                                                    <form action="{{ url($o->id. '/outlet/delete')}}" method="POST">
                                                        @csrf
                                                        @method("delete")
                                                        <button type="submit" class="btn btn-outline-danger delete">hapus</button>
                                                    </form>
                                                    @else
                                                    <div class="">
                                                    {{-- delete --}}
                                                    <button type="submit" class="btn btn-outline-secondary" disabled>hapus</button>
                                                    </div>
                                                    @endif
                                                    {{-- <form action="{{ url($b->id. '/barang/edit')}}" method="GET"> --}}
                                                    <button type="submit" class="btn btn-outline-success mt-1" data-toggle="modal" data-target="#formEditModal{{ $o->id }}">
                                                        Edit
                                                    </button>
                                                    {{-- </form> --}}
                                                </td>
                                            </tr>
                                            @include('outlet.edit')
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
@include('outlet.form')
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
    </script>
@endpush