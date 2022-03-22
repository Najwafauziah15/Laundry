{{-- modal Paket --}}
<div class="modal fade" id="modalStatus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLongTitle">
                PILIH PAKET
                </h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <form action="{{ route('transaksi.update', $t->transaksi->id) }}" method="POST">
                        @csrf
                        <div id="method"></div>
                        {{-- <input type="hidden" value="{{ $t->transaksi->id }}" id="id" name="id"> --}}
                        {{-- <input type="hidden" value="{{ $t->transaksi-> }}" id="id" name="id"> --}}
                        <select class="form-control form-select-lg mb-3" aria-label=".form-select-lg example" id="status" name="status">
                        <option value="{{ $t->transaksi->status }}">{{ $t->transaksi->status }}</option>
                        <option value="proses">proses</option>
                        <option value="selesai">selesai</option>
                        <option value="dambil">diambil</option>
                        </select>
                        <div class="modal-footer">
                            <button type="submit" id="btn-submit" class="btn btn-info">Ubah Status</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- end modal member --}}