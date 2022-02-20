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
                    {{-- <div class="col-lg-6"> --}}
                        <div class="card">
                            @if (session('success'))
                            <div class="alert alert-success" role="alert" id="success-alert">
                                {{ session('success') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif
                            @if ($errors->any())
                            <div class="card-header">
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                    <button type="button" class="colse" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                            @endif
                            <form action="/transaksi" method="post">
                            @csrf
                            @include('transaksi.form')
                            @include('transaksi.data')
                            <input type="hidden" name="id_member" id="id_member">
                            </form>
                        </div> <!-- end card-->
                    {{-- </div> <!-- end col --> --}}
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
@endsection
@push('script')
<script>

    //inisialisasi
    let subtotal = total = 0;
    $(function(){
        $('#tblMember').DataTable();
        $('#tblPaket').DataTable();
    })
        
    //pilih member
    $('#tblMember').on('click','.pilihMember',function(){
        pilihMember(this)
        $('#modalMember').modal('hide')
    })
    //pilih paket
    $('#tblPaket').on('click','.pilihPaket',function(){
        pilihPaket(this)
        $('#modalPaket').modal('hide')
    })

    //function pilih member
    function pilihMember(x){
        const tr = $(x).closest('tr')
        const namaJK = tr.find('td:eq(1)').text()+"/"+tr.find('td:eq(3)').text()
        const biodata = tr.find('td:eq(2)').text()+"/"+tr.find('td:eq(4)').text()
        const idMember = tr.find('.idMember').val()
        $('#nama-pelanggan').text(namaJK)
        $('#biodata-pelanggan').text(biodata)
        $('#id_member').val(idMember)
    }

    //function pilih paket
    function pilihPaket(a){
        const tr = $(a).closest('tr')
        const namaPaket = tr.find('td:eq(1)').text();
        const harga = tr.find('td:eq(3)').text();
        const idPaket = tr.find('.idPaket').val();

        let data = '';
        let tbody = $('#tblTransaksi tbody tr td').text()
        data +='<tr>'
        data +=`<td> ${namaPaket} </td>`
        data +=`<td> ${harga} </td>`;
        data +=`<input type="hidden" name="id_paket[]" value="${idPaket}">`
        data +=`<td><input type="number" value="1" min="1" class="qty" name="qty[]" size="2" style="width:40px"></td>`;
        data +=`<td><label name="sub_total[]" class="subTotal">${harga}</label></td>`;
        data +=`<td><button type="button" class="btnRemovePaket btn btn-danger">hapus</button></td>`;
        data +='</tr>'

        if(tbody == 'Belum ada data') $('#tblTransaksi tbody tr').remove();
        $('#tblTransaksi tbody').append(data);

        subtotal += Number(harga)
        total = subtotal - Number($('#diskon').val()) + Number($('#pajak-persen').val())
        $('#subtotal').val(subtotal)
        $('#total').val(total)
    }

    //function hitung total
    function hitungTotalAkhir(a){
        let qty = Number($(a).closest('tr').find('.qty').val());
        let harga = Number($(a).closest('tr').find('td:eq(1)').text());
        let subTotalAwal = Number($(a).closest('tr').find('.subTotal').text());
        let count = qty*harga;
        subtotal = subtotal - subTotalAwal + count;
        let pajak = Number($('#pajak-persen').val())/100 * subtotal;
        total = subtotal - Number($('#diskon').val())+Number($('#biaya-tambahan').val()) + pajak;
        $(a).closest('tr').find('.subTotal').text(count)
        // $('#pajak-harga').text(pajak)
        $('#subtotal').val(subtotal)
        $('#total').val(total)
    }

    //perubahan qty
    $('#tblTransaksi').on('change','.qty',function(){
        hitungTotalAkhir(this)
    })

    //remove paket
    $('#tblTransaksi').on('click','.btnRemovePaket',function(){
        let subTotalAwal = parseFloat($(this).closest('tr').find('.subTotal').text());
        subtotal -= subTotalAwal
        total -= subTotalAwal;
        $currentRow = $(this).closest('tr').remove();
        $('#subtotal').val(subtotal)
        $('#total').val(total)
    })

</script>
@endpush