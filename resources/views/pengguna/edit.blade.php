<div class="row">
    <div class="col-md-6">
        <div class="card">
                <!-- Info Header Modal -->
                <div id="formEditModal{{ $pk->id }}" class="modal fade" tabindex="-1" role="dialog"
                    aria-labelledby="info-header-modalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header modal-colored-header bg-info">
                                <h4 class="modal-title" id="info-header-modalLabel">Edit Data Paket</h4>
                                <button type="button" class="close" data-dismiss="modal"
                                    aria-hidden="true">×</button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('paket.update',$pk->id) }}" method="POST">
                                    @csrf
                                    @method('patch')
                                    <div id="method"></div>
                                    <div class="card-body">
                                        <input type="hidden" id="id" name="id">
                                        <div class="form-group mb-3">
                                            <label for="id_outlet" class="form-label">ID Outlet</label>
                                            <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" id="id_outlet" name="id_outlet">
                                                <option selected value="{{ $pk->id_outlet }}">{{ $pk->id_outlet }}</option>
                                                @foreach ($outlet as $o )
                                                <option value="{{ $o->id }}">{{ $o->nama }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="jenis" class="form-label">Jenis</label>
                                            <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" id="jenis" name="jenis">
                                            <option value="{{ $pk->jenis }}">{{ $pk->jenis }}</option>
                                            <option name="jenis" value="kiloan">Kiloan</option>
                                            <option name="jenis" value="selimut">Selimut</option>
                                            <option name="jenis" value="bed_cover">Bed Cover</option>
                                            <option name="jenis" value="kaos">Kaos</option>
                                            <option name="jenis" value="lain">Lainnya</option>
                                            </select>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="nama_paket" class="form-label">Nama Paket</label>
                                            <input type="text" id="nama_paket" name="nama_paket" value="{{ $pk->nama_paket }}" class="form-control" placeholder="Nama Paket" required>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="harga" class="form-label">Harga</label>
                                            <input type="text" id="harga" name="harga" value="{{ $pk->harga }}" class="form-control" placeholder="Harga" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" id="btn-submit" class="btn btn-info">Edit Paket</button>
                                    </div>
                                </form>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
        </div> <!-- end card-->
    </div> <!-- end col-->
</div> <!-- end row-->