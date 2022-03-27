<div class="row">
    <div class="col-md-6">
        <div class="card">
                <!-- Info Header Modal -->
                <div id="formInputModal" class="modal fade" tabindex="-1" role="dialog"
                    aria-labelledby="info-header-modalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header modal-colored-header bg-info">
                                <h4 class="modal-title" id="info-header-modalLabel">Tambah Data Barang</h4>
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
                                            <label for="qty" class="form-label">Jumlah</label>
                                            <input type="number" min="1" id="qty" name="qty" class="form-control" placeholder="Jumlah" required>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="harga" class="form-label">Harga</label>
                                            <input type="number" id="harga" name="harga" class="form-control" placeholder="Harga" required>
                                        </div>
                                            <input type="date" hidden name="waktu_beli" id="waktu_beli" value="{{ date('Y-m-d h:i:s') }}" required>
                                        <div class="form-group mb-3">
                                            <label for="supplier" class="form-label">Supplier</label>
                                            <input type="text" id="supplier" name="supplier" class="form-control" placeholder="Supplier" required>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="status" class="form-label">Status</label>
                                            <select class="form-control form-select-lg mb-3" aria-label=".form-select-lg example" id="status" name="status">
                                            <option>Pilih Status</option>
                                            <option name="status" value="diajukan_beli">Diajukan Beli</option>
                                            <option name="status" value="habis">Habis</option>
                                            <option name="status" value="tersedia">Tersedia</option>
                                            </select>
                                        </div>
                                            <input type="date" hidden name="waktu_update" id="waktu_update" value="{{ date('Y-m-d h:i:s') }}" required>
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