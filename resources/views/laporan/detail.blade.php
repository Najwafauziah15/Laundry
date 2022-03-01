<div class="row">
    <div class="col-md-6">
        <div class="card">
                <!-- Info Header Modal -->
                <div id="DetailModal{{ $t->id_transaksi }}" class="modal fade" tabindex="-1" role="dialog"
                    aria-labelledby="info-header-modalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header modal-colored-header bg-info">
                                <h3 class="modal-title text-center" id="info-header-modalLabel">DETAIL TRANSAKSI</h3>
                                <button type="button" class="close" data-dismiss="modal"
                                    aria-hidden="true">×</button>
                            </div>
                            {{-- <div class="modal-body">
                                <h1 class="my-auto text-info text-right"><b><u>{{ $t->transaksi->kode_invoice }}</u></b></h1>
                                <h5 class="text-dark my-auto"><u>Keterangan</u></h5>
                                <p class="my-auto">Status transaksi : {{ $t->transaksi->status }}</p>
                                <p class="my-auto">Status pembayaran : {{ $t->transaksi->dibayar }}</p>
                                <p class="my-auto">Nama member : {{ $t->transaksi->member->nama }}</p>
                                <p class="my-auto">Nama paket : {{ $t->paket->nama_paket }}</p>
                                <p class="my-auto">Jenis paket : {{ $t->paket->jenis }}</p>
                                <p class="my-auto">Harga paket : {{ $t->paket->harga }}</p>
                                <p class="my-auto">Jumlah paket : {{ $t->qty }}</p>
                                <p class="my-auto">Total awal : {{ $t->transaksi->subtotal }}</p>
                                <p class="my-auto ">Diskon : {{ $t->transaksi->diskon }}%</p>
                                <p class="my-auto ">Pajak : {{ $t->transaksi->pajak }}%</p>
                                <p class="my-auto ">Biaya tambahan : {{ $t->transaksi->biaya_tambahan }}</p>
                                <p class="my-auto ">Total akhir : {{ $t->transaksi->total }}</p>
                                <p class="my-auto">Tanggal masuk : {{ $t->transaksi->tgl }}</p>
                                <p class="my-auto">Tanggal bayar : {{ $t->transaksi->tgl_bayar }}</p>
                                <p class="my-auto">Estimasi : {{ $t->transaksi->batas_waktu }}</p>
                            </div> --}}
                            <div class="modal-body">
                                <ul class="nav nav-tabs nav-justified nav-bordered mb-3">
                                    <li class="nav-item">
                                        <a href="#transaksi" data-toggle="tab" aria-expanded="false" class="nav-link active" id="nav-data">
                                            <i class="mdi mdi-home-variant d-lg-none d-block mr-1"></i>
                                            <span class="d-none d-lg-block">Data Transaksi</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#paket" data-toggle="tab" aria-expanded="true" class="nav-link" id="nav-form">
                                            <i class="mdi mdi-account-circle d-lg-none d-block mr-1"></i>
                                            <span class="d-none d-lg-block">Paket</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#member" data-toggle="tab" aria-expanded="true" class="nav-link" id="nav-form">
                                            <i class="mdi mdi-account-circle d-lg-none d-block mr-1"></i>
                                            <span class="d-none d-lg-block">Member</span>
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane show active" id="transaksi">
                                        <h5 class="text-dark my-auto"><u>Keterangan</u></h5>
                                        <p class="my-auto">Status transaksi : {{ $t->transaksi->status }}</p>
                                        <p class="my-auto">Status pembayaran : {{ $t->transaksi->dibayar }}</p>
                                        <p class="my-auto">Tanggal masuk : {{ $t->transaksi->tgl }}</p>
                                        <p class="my-auto">Estimasi : {{ $t->transaksi->batas_waktu }}</p>
                                        <p class="my-auto">Nama member : {{ $t->transaksi->member->nama }}</p>
                                        <p class="my-auto">Nama paket : {{ $t->paket->nama_paket }}</p>
                                        <p class="my-auto"><b>Harga paket : {{ $t->paket->harga }}</b></p>
                                        <p class="my-auto"><b>Jumlah paket : {{ $t->qty }}</b></p>
                                        <p class="my-auto"><b>Total awal : {{ $t->transaksi->subtotal }}</b></p>
                                        <p class="my-auto "><b>Diskon : {{ $t->transaksi->diskon }}%</b></p>
                                        <p class="my-auto "><b>Pajak : {{ $t->transaksi->pajak }}%</b></p>
                                        <p class="my-auto "><b>Biaya tambahan : {{ $t->transaksi->biaya_tambahan }}</b></p>
                                        <h4 class="my-auto ">Total akhir : {{ $t->transaksi->total }}</h4>
                                        <h1 class="my-auto text-primary text-right"><b><u>{{ $t->transaksi->kode_invoice }}</u></b></h1>
                                    </div>
                                    <div class="tab-pane" id="paket">
                                        <p class="my-auto">Nama paket : {{ $t->paket->nama_paket }}</p>
                                        <p class="my-auto">Harga paket : {{ $t->paket->harga }}</p>
                                        <p class="my-auto">Jumlah paket : {{ $t->qty }}</p>
                                        <p class="my-auto">Jenis paket : {{ $t->paket->jenis }}</p>
                                        <p class="my-auto">Outlet : {{ $t->paket->outlet->nama }}</p>
                                    </div>
                                    <div class="tab-pane" id="member">
                                        <p class="my-auto">Nama : {{ $t->transaksi->member->nama }}</p>
                                        <p class="my-auto">Alamat : {{ $t->transaksi->member->alamat }}</p>
                                        <p class="my-auto">Jenis Kelamin : {{ $t->transaksi->member->jenis_kelamin }}</p>
                                        <p class="my-auto">Telepon : {{ $t->transaksi->member->tlp }}</p>
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
        </div> <!-- end card-->
    </div> <!-- end col-->
</div> <!-- end row-->