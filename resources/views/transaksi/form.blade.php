<div class="card-body">
    {{-- judul atas --}}
    <ul class="nav nav-tabs nav-justified nav-bordered mb-3">
        <li class="nav-item">
            <a href="#dataLaundry" data-toggle="tab" aria-expanded="false" class="nav-link active" id="nav-data">
                <i class="mdi mdi-home-variant d-lg-none d-block mr-1"></i>
                <span class="d-none d-lg-block">Data Paket</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="#formLaundry" data-toggle="tab" aria-expanded="true" class="nav-link" id="nav-form">
                <i class="mdi mdi-account-circle d-lg-none d-block mr-1"></i>
                <span class="d-none d-lg-block">Cucian Baru</span>
            </a>
        </li>
    </ul>
    {{-- end judul atas --}}
    {{-- form start --}}
    <form action="">
        <div class="tab-content">
            <div class="tab-pane show active" id="dataLaundry">
                <div class="h3">Data</div>
            </div>
            <div class="tab-pane" id="formLaundry">
            {{-- isi form cucian baru --}}
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-6 form-group">
                    <label for="" class="control-label col-md-6 col-sm-6 col-xs-6"> Tanggal Transaksi </label>
                    <div class="col-md-6 col-sm-6 col-xs-6">
                        <input type="date" class="date-picker form-control col-md-12 col-xs-12" value="{{ date('Y-m-d') }}" name="tgl" required>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6 form-group">
                    <label for="" class="control-label col-md-6 col-sm-6 col-xs-6"> Estimasi Selesai </label>
                    <div class="col-md-6 col-sm-6 col-xs-6">
                        <input type="date" class="date-picker form-control col-md-12 col-xs-12" name="tgl" required>
                    </div>
                </div>
                {{-- button tambah Pelanggan --}}
                <div class="col-md-6 col-sm-6 col-xs-6 form-group">
                    <div class="col-md-6 col-sm-6 col-xs-6">
                        <button type="button" class="btn btn-outline-secondary mr-2" id="memberBtn" data-toggle="modal"
                        data-target="#modalMember"><i class="icon-plus"></i></button>
                        <label for="" class="control-label"> Nama Pelanggan/Jk </label>
                        <p id="nama-pelanggan"></p>
                    </div>
                </div>
                {{-- end button --}}
                <div class="col-md-6 form-group">
                    <label for="" class="control-label my-auto">Biodata</label>
                    <p id="biodata-pelanggan"></p>
                </div>
                {{-- button tambah Paket --}}
                <div class="col-md-6 col-sm-6 col-xs-6 form-group">
                    <div class="col-md-6 col-sm-6 col-xs-6">
                        <button type="button" class="btn btn-outline-secondary mr-2" id="tambahPaketBtn" data-toggle="modal"
                        data-target="#modalPaket"><i class="icon-plus"></i>  Paket Cucian</button>
                    </div>
                </div>
                {{-- end button --}}
                {{-- detail pembelian --}}
                <div>
                    <div class="card-box table-responsive">
                        <table id="tblTransaksi" class="table table-striped table-bordered bulk_action" style="width:100%">
                        <thead>
                            <tr>
                                <th>Nama Paket</th>
                                <th>Harga</th>
                                <th>Qty</th>
                                <th>Total</th>
                                <th width="15%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- <tr>
                                <td colspan="5" style="text-align: center"><i>Belum Ada Data</i></td>
                            </tr> --}}
                        </tbody>
                        <tfoot>
                            <tr valign="bottom">
                                <td width="" colspan="3" align="right">Jumlah Bayar</td>
                                <td><span id="subtotal">0</span></td>
                                <td rowspan="4">
                                    <label for="">Pembayaran</label>
                                    <input type="text" name="bayar" class="form-control" id="" style="width:170px" value="0">
                                    <div class="">
                                        <button class="btn btn-outline-primary" style="margin-top:10px;width170px">Bayar</button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3" align="right">Diskon</td>
                                <td><input type="number" name="diskon" value="0" id="diskon" style="width:140px"></td>
                            </tr>
                            <tr>
                                <td colspan="3" align="right">Pajak
                                    <input type="number" name="pajak" value="0" min="0" class="qty" id="pajak-persen" size="2" style="width: 40px">
                                </td>
                                <td><span id="pajak-harga">0</span></td>
                            </tr>
                            <tr style="background-color: rgb(123, 75, 255);color:white;font-weight:bold;font-size:1em">
                                <td colspan="3" align="right">Total Bayar Akhir</td>
                                <td><span id="total">0</span></td>
                            </tr>
                        </tfoot>
                        </table>
                    </div>
                </div>
                {{-- end detail pembelian --}}
            </div>
            {{-- end form cucian baru --}}
            </div>
        </div>

        {{-- modal Member --}}
        <div class="modal fade" id="modalMember" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="exampleModalLongTitle">
                        PILIH PELANGGAN
                        </h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="table-responsive" style="padding-top:0px ">
                                            <table id="tblMember" id="zero_config" class="table table-striped table-bordered no-wrap mt--4">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nama</th>
                                                        <th>Alamat</th>
                                                        <th>Jenis_kelamin</th>
                                                        <th>Telepon</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($member as $m)
                                                    <tr>
                                                        <td>
                                                            {{ $i=(isset($i)?++$i:$i=1) }}
                                                            <input type="hidden" class="idMember" value="{{ $m->id }}">
                                                        </td>
                                                        <td>{{ $m->nama }}</td>
                                                        <td>{{ $m->alamat }}</td>
                                                        <td>{{ $m->jenis_kelamin }}</td> 
                                                        <td>{{ $m->tlp }}</td> 
                                                        <td><button class="pilihMember" type="button">Pilih</button></td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- end modal member --}}

        {{-- modal Paket --}}
        <div class="modal fade" id="modalPaket" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="exampleModalLongTitle">
                        PILIH PELANGGAN
                        </h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="table-responsive" style="padding-top:0px ">
                                            <table id="tblPaket" id="zero_config" class="table table-striped table-bordered no-wrap mt--4">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nama</th>
                                                        <th>Jenis</th>
                                                        <th>Harga</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($paket as $p)
                                                    <tr>
                                                        <td>
                                                            {{ $i=(isset($i)?++$i:$i=1) }}
                                                            <input type="hidden" class="idPaket" name="idPaket" value="{{ $p->id }}">
                                                        </td>
                                                        <td>{{ $p->nama_paket }}</td>
                                                        <td>{{ $p->jenis }}</td>
                                                        <td>{{ $p->harga }}</td> 
                                                        <td><button class="pilihPaket" type="button">Pilih</button></td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- end modal member --}}
    </form>

</div> <!-- end card-body-->