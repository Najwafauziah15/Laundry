<div class="row">
    <div class="col-md-6">
        <div class="card">
                <!-- Info Header Modal -->
                <div id="DetailModal{{ $t->id_transaksi }}" class="modal fade" tabindex="-1" role="dialog"
                    aria-labelledby="info-header-modalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header modal-colored-header bg-info">
                                <h4 class="modal-title" id="info-header-modalLabel">Detail Transaksi</h4>
                                <button type="button" class="close" data-dismiss="modal"
                                    aria-hidden="true">×</button>
                            </div>
                            <div class="modal-body">
                                <h3>{{ $t->transaksi->kode_invoice }}</h3>
                                <p class="my-auto">status transaksi : {{ $t->transaksi->status }}</p>
                                <p class="my-auto">pembayaran : {{ $t->transaksi->dibayar }}</p>
                                <p class="my-auto">nama paket : {{ $t->paket->nama_paket }}</p>
                                <p class="my-auto">jenis paket : {{ $t->paket->jenis }}</p>
                                <p class="my-auto">harga paket : {{ $t->paket->harga }}</p>
                                <p class="my-auto">nama member : {{ $t->transaksi->member->nama }}</p>
                                <p class="my-auto">harga total : {{ $t->transaksi->member->nama }}</p>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
        </div> <!-- end card-->
    </div> <!-- end col-->
</div> <!-- end row-->