@extends('template.header', ['title'=>'LAUNA'])

@section('content')
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <h2>TRANSAKSI</h2>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-title m-3">
                                <h6>Pembayaran Cucian</h6>
                            </div>
                            <div class="card-body">
                            {{-- form atas 1 --}}
                                <form action="{{ route('transaksi.store') }}" method="post" id="formTransaksi" class="form-horizontal form-label-left input_mask">
                                    @csrf
                                    
                                        <div class="col-md-6 col-sm-6 col-xs-6 form-group">
                                            <label for="" class="control-label col-md-6 col-sm-6 col-xs-6"> Tanggal Pembelian</label>
                                            <div class="col-md-6 col-sm-6 col-xs-6">
                                                <input type="date" class="date-picker form-control col-md-12 col-xs-12" value="{{ date('Y-m-d') }}" name="tanggal_masuk" required>
                                            </div>
                                        </div>
                                    
                                        <div class="col-md-6 col-sm-6 col-xs-6 form-group">
                                            <label for="" class="control-label col-md-6 col-sm-6 col-xs-6"> Pelanggan </label>
                                            <div class="col-md-6 col-sm-6 col-xs-6">
                                                <select name="pemasok_id" id="" class=" form-control col-md-12 col-xs-12">
                                                    <option value="">-pilih-</option>
                                                    @foreach ($member as $o)
                                                        <option value="{{ $o->id }}">{{ $o->nama }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    
                                        {{-- button tanggal pembelian dan tambah Paket --}}
                                        <div class="col-md-6 col-sm-6 col-xs-6 form-group">
                                            <div class="col-md-6 col-sm-6 col-xs-6">
                                                <button type="button" class="btn btn-outline-info" id="tambahBarangBtn" data-toggle="modal"
                                                data-target="#tblBarangModal">Tambah Paket</button>
                                            </div>
                                        </div>
                                    
                                        {{-- detail pembelian --}}
                                        <div>
                                            <div class="card-box table-responsive">
                                                <table id="tblTransaksi" class="table table-striped table-bordered bulk_action" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>Nama Paket</th>
                                                        <th>Harga</th>
                                                        <th>Qty</th>
                                                        <th>Jenis</th>
                                                        <th>Biaya Tambahan</th>
                                                        <th>Diskon</th>
                                                        <th>Pajak</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    {{-- <tr>
                                                        <td colspan="6" style="text-align: center"><i>Belum Ada Data</i></td>
                                                    </tr> --}}
                                                </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    
                                        {{-- bagian total submit data hidden --}}
                                        <div class="row" style="text-align: right; margin-bottom:10px">
                                            <div class="col-md-12">
                                                <div class="col-md-12 col-sm-12 col-xs-12 col-md-offset-6" style="text-align: right">
                                                    {{-- <label for="" class="control-labe col-sm-3 col-xs-12 col-md-6 col-xs-12">
                                                        Total Harga
                                                    </label>
                                                    <div class="col-md-3 col-sm-3 col-xs-12" style="text-align: right;margin-right:0;padding-right:0">
                                                        <input type="text" name="sub_total" id="totalHarga" class="form-control col-md-6 col-xs-12" required>
                                                    </div> --}}
                                                    <div class="card">
                                                        <div class="card-body bg-dark">
                                                            <h5 style="color: white; text-align:center">Total Harga</h5>
                                                            <h1>
                                                            <input type="text" name="total" id="totalHarga" style="text-align: center;color: white" class="col-md-12 col-sm-12 col-xs-12 col-md-offset-6 bg-dark" readonly>
                                                            </h1>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 col-sm-6 col-xs-12" style="text-align: right;margin-right:0;padding-right:0">
                                                <div class="col-md-12 col-sm-9 col-xs-12">
                                                    <button type="submit" class="btn btn-outline-info">Simpan Transaksi</button>
                                                </div>
                                            </div>
                                        </div>
                                    
                                        {{-- modal Paket --}}
                                        <div class="modal fade" id="tblBarangModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h3 class="modal-title" id="exampleModalLongTitle">
                                                        PILIH BARANG   
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
                                                                            <table id="tblBarang2" class="table table-striped table-bordered no-wrap mt--4">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th>No</th>
                                                                                        <th>Nama Outlet</th>
                                                                                        <th>Jenis</th>
                                                                                        <th>Nama Paket</th>
                                                                                        <th>Harga</th>
                                                                                        <th>Aksi</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    @foreach ($paket as $pk)
                                                                                    <tr>
                                                                                        <td>
                                                                                            {{ $i=(isset($i)?++$i:$i=1) }}
                                                                                            <input type="hidden" class="idBarang" value="{{ $pk->id }}">
                                                                                        </td>
                                                                                        <td>{{ $pk->outlet->nama }}</td>
                                                                                        <td>{{ $pk->jenis }}</td>
                                                                                        <td>{{ $pk->nama_paket }}</td> 
                                                                                        <td>{{ $pk->harga }}</td> 
                                                                                        <td><button class="pilihBarangBtn" type="button">Pilih</button></td>
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
                                        
                                    </form>
                                    {{-- form bawah 1 --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
@endsection
@push('script')
<script>
    let totalHarga = 0;
    function tambahBarang(a){
        let d = $(a).closest('tr');
        let kodeBarang = d.find('td:eq(1)').text();
        let namaBarang = d.find('td:eq(2)').text();
        let hargaBarang = d.find('td:eq(3)').text();
        let idBarang = d.find('.idBarang').val();
        // let idBarang = $(a).data('.idBarang');
        let data = '';
        let tbody = $('#tblTransaksi tbody tr td').text();
        data +='<tr>';
        data +='<td>'+kodeBarang+'</td>';
        data +='<td>'+namaBarang+'</td>';
        data +='<td>'+hargaBarang+'</td>';
        data +='<input type="hidden" name="barang_id[]" value="'+idBarang+'">'
        data +='<input type="hidden" name="harga_beli[]" value="'+hargaBarang+'">'
        // data +='<input type="hidden" name="sub_total[]" value="'+hargaBarang*parseInt($('#qty_barang').val())+'">'
        // data +='<td><input type="number" value="1" name="qty[]" class="qty"></td>';
        data +='<td><input type="number" value="1" min="1" name="jumlah[]" class="qty"></td>';
        // data +='<td><span class="subTotal">'+hargaBarang+'</span></td>';
        data +='<td><input type="text" readonly name="sub_total[]" class="subTotal" value="'+hargaBarang+'"></td>'
        data +='<td><button type="button" class="btnRemoveBarang btn btn-danger" >hapus</button></td>';
        data +='</tr>'
        if(tbody == 'Belum ada data') $('#tblTransaksi tbody tr').remove();

        $('#tblTransaksi tbody').append(data);
        totalHarga += parseFloat(hargaBarang);
        $('#totalHarga').val(totalHarga);
        $('#tblBarangModal').modal('hide');
    }

    function calcSubTotal(a){
        let qty = parseInt($(a).closest('tr').find('.qty').val());
        let hargaBarang = parseFloat($(a).closest('tr').find('td:eq(2)').text());
        let subTotalAwal = parseFloat($(a).closest('tr').find('.subTotal').val());
        let subTotal = qty * hargaBarang;
        totalHarga += subTotal - subTotalAwal;
        $(a).closest('tr').find('.subTotal').text(subTotal);
        $('#totalHarga').val(totalHarga);
        
    }

    $(function(){
        $('#tblBarang2').DataTable();

        //pemilihan Barang
        $('#tblBarangModal').on('click','.pilihBarangBtn',function(){
            tambahBarang(this);
        });

        //change qty event
        $('#tblTransaksi').on('change','.qty',function(){
            calcSubTotal(this);
        })
        //remove Barang
        $('#tblTransaksi').on('click', '.btnRemoveBarang',function(){
            let subTotalAwal = parseFloat($(this).closest('tr').find('.subTotal').text());
            totalHarga -= subTotalAwal;

            $currentRow = $(this).closest('tr').remove();
            $('#totalHarga').val(totalHarga);
        })
    });

</script>
@endpush