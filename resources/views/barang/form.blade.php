<div class="row">
    <div class="col-md-6">
        <div class="card">
                <!-- Info Header Modal -->
                <div id="formInputModal" class="modal fade" tabindex="-1" role="dialog"
                    aria-labelledby="info-header-modalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header modal-colored-header bg-info">
                                <h4 class="modal-title" id="info-header-modalLabel">Tambah Data Barang Inventaris</h4>
                                <button type="button" class="close" data-dismiss="modal"
                                    aria-hidden="true">×</button>
                            </div>
                            <div class="modal-body">
                                <form action="barang" method="POST">
                                    @csrf
                                    <div id="method"></div>
                                    <div class="card-body">
                                        <input type="hidden" id="id" name="id">
                                        <div class="form-group mb-3">
                                            <label for="nama_barang" class="form-label">Nama Barang</label>
                                            <input type="text" id="nama_barang" name="nama_barang" class="form-control" placeholder="Nama Barang" required>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="merk_barang" class="form-label">Merk Barang</label>
                                            <input type="text" id="merk_barang" name="merk_barang" class="form-control" placeholder="Merk Barang" required>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="qty" class="form-label">Jumlah</label>
                                            <input type="number" min="1" id="qty" name="qty" class="form-control" placeholder="Jumlah" required>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="kondisi" class="form-label">Kondisi</label>
                                            <select class="form-control form-select-lg mb-3" aria-label=".form-select-lg example" id="kondisi" name="kondisi">
                                            <option>Pilih Kondisi</option>
                                            <option name="kondisi" value="layak_pakai">Layak Pakai</option>
                                            <option name="kondisi" value="rusak_ringan">Rusak Ringan</option>
                                            <option name="kondisi" value="rusak_berat">Rusak Berat</option>
                                            </select>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="tanggal_pengadaan" class="form-label">Tanggal Pengadaan</label>
                                            <input type="date" class="date-picker form-control col-md-12 col-xs-12" name="tanggal_pengadaan" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" id="btn-submit" class="btn btn-info">Tambah Barang</button>
                                    </div>
                                </form>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
        </div> <!-- end card-->
    </div> <!-- end col-->
</div> <!-- end row-->