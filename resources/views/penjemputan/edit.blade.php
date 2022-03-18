<div class="row">
    <div class="col-md-6">
        <div class="card">
                <!-- Info Header Modal -->
                <div id="formEditModal{{ $pj->id }}" class="modal fade" tabindex="-1" role="dialog"
                    aria-labelledby="info-header-modalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header modal-colored-header bg-info">
                                <h4 class="modal-title" id="info-header-modalLabel">Edit Data Barang</h4>
                                <button type="button" class="close" data-dismiss="modal"
                                    aria-hidden="true">×</button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('penjemputan.update',$pj->id) }}" method="POST">
                                    @csrf
                                    @method('patch')
                                    <div id="method"></div>
                                    <div class="card-body">
                                        <input type="hidden" id="id" name="id">
                                        <div class="form-group mb3">
                                            <label for="id_member" class="form-label">ID Member</label>
                                            <select class="form-control form-select-lg mb-3" aria-label=".form-select-lg example" id="id_member" name="id_member">
                                                <option selected value="{{ $pj->id_member }}" >{{ $pj->member->nama }}</option>
                                                @foreach ($member as $m )
                                                <option value="{{ $m->id }}">{{ $m->nama }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="petugas" class="form-label">Petugas</label>
                                            <input type="text" id="petugas" name="petugas" value="{{ $pj->petugas }}" class="form-control" placeholder="Petugas" required>
                                        </div>
                                        <div class="form-group mb3">
                                            <label for="id_member" class="form-label">Status</label>
                                            <select class="form-control form-select-lg mb-3" aria-label=".form-select-lg example" id="status" name="status">
                                                <option value="{{ $pj->status }}">{{ $pj->status }}</option>
                                                <option value="tercatat">tercatat</option>
                                                <option value="penjemputan">penjemputan</option>
                                                <option value="selesai">selesai</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" id="btn-submit" class="btn btn-info">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
        </div> <!-- end card-->
    </div> <!-- end col-->
</div> <!-- end row-->