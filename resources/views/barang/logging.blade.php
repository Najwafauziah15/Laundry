<div class="row">
    <div class="col-md-12">
        <div class="card">
                <!-- Info Header Modal -->
                <div class="modal fade" id="modalLogging" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="info-header-modalLabel">Logging Data Barang</h4>
                                <button type="button" class="close" data-dismiss="modal"
                                    aria-hidden="true">×</button>
                            </div>
                            <div class="modal-body">
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
                                                                <th>Aksi</th>
                                                                <th>Nama Tabel</th>
                                                                <th>Waktu</th>
                                                                {{-- <th>User</th> --}}
                                                            </tr>
                                                        </thead>
                                                        <tbody>     
                                                            @foreach ($logging as $l)
                                                            <tr>
                                                                <td>{{ $j=(isset($j)?++$j:$j=1) }}</td>
                                                                <td>{{ $l->aksi }}</td>
                                                                <td>{{ $l->nama_table }}</td>
                                                                <td>{{ $l->waktu }}</td> 
                                                                {{-- <td>{{ $l->user->username }}</td>  --}}
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end table -->
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
        </div> <!-- end card-->
    </div> <!-- end col-->
</div> <!-- end row-->