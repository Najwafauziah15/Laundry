<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="zero_config" class="table table-striped table-bordered no-wrap">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Invoice</th>
                                <th>Nama Paket</th>
                                <th>Status</th>
                                <th>Dibayar</th>
                                <th>Tanggal</th>
                                <th>Estimasi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($detail_transaksi as $t)
                            <tr>
                                <td>{{ $i=(isset($i)?++$i:$i=1) }}
                                    <input type="text" hidden class="id" value="{{ $t->id }}"> 
                                </td>
                                <td>{{ $t->transaksi->kode_invoice }}</td>
                                <td>{{ $t->paket->nama_paket }}</td>
                                <td>
                                    <select name="status" class="status statusTransaksi form-control" id="one">
                                        {{-- <option value="{{ $t->transaksi->status }}">{{ $t->transaksi->status }}</option> --}}
                                        <option value="baru"
                                        {{ $t->transaksi->status == 'baru' ? 'selected' : '' }}>baru</option>
                                        <option value="proses"
                                        {{ $t->transaksi->status == 'proses' ? 'selected' : '' }}>proses</option>
                                        <option value="selesai"
                                        {{ $t->transaksi->status == 'selesai' ? 'selected' : '' }}>selesai</option>
                                        <option value="diambil"
                                        {{ $t->transaksi->status == 'diambil' ? 'selected' : '' }}>diambil</option>
                                    </select>
                                </td>
                                <td>{{ $t->transaksi->dibayar }}</td> 
                                <td>{{ $t->transaksi->tgl }}</td> 
                                <td>{{ $t->transaksi->batas_waktu }}</td> 
                                <td> 
                                    <button type="submit" class="btn btn-outline-info mt-1" data-toggle="modal" data-target="#DetailModal{{ $t->id_transaksi }}">
                                        <i class="icon-note"></i>
                                    </button>
                                    {{-- <a href="/cetak" class="btn btn-outline-warning"><i class="icon-printer"></i></a> --}}
                                    <a href="{{ url($t->id. '/cetak')}}" target="blank" class="btn btn-outline-danger"><i class="icon-printer"></i></a>
                                </td>
                            </tr>
                            @include('laporan.detail')
                            {{-- @include('transaksi.faktur') --}}
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@push('script')
    <script>
    $(function(){
        $('#zero_config').on('change', '.status', function() {
            let status = $(this).closest('tr').find('.status').val()
            let id = $(this).closest('tr').find('.id').val()
            let data = {
            id: id,
            status: status,
            _token: "{{ csrf_token() }}"
            };
            $.post('{{ route('transaksi_status') }}', data, function(msg) {

            })
            console.log(id);
            console.log(status);
        })

        // status konfirmasi ubah status
        $('.statusTransaksi').change(function(e) {
                swal.fire({
                        text: "Status tersebut diganti",
                        icon: "success",
                        buttons: true,
                        dangerMode: false,
                    })
                    .then((req) => {
                        if (req) $(e.target).closest('form').submit()
                        else swal.close()
                    })
            });
    });
    </script>
@endpush