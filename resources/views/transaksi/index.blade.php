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
                            @include('transaksi.form')
                            @include('transaksi.data')
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
        total = subtotal - Number($('#diskon').val()) + Number($('#pajak-harga').val())
        $('#subtotal').text(subtotal)
        $('#total').text(total)
    }

    //function hitung total
    function hitungTotalAkhir(a){
        let qty = Number($(a).closest('tr').find('.qty').val());
        let harga = Number($(a).closest('tr').find('td:eq(1)').text());
        let subTotalAwal = Number($(a).closest('tr').find('.subTotal').text());
        let count = qty*harga;
        subtotal = subtotal - subTotalAwal + count
        total = subtotal - Number($('#diskon').val())+Number($('#pajak-harga').val())
        $(a).closest('tr').find('.subTotal').text(count)
        $('#subtotal').text(subtotal)
        $('#total').text(total)
    }

    //perubahan qty
    $('#tblTransaksi').on('change','.qty',function(){
        hitungTotalAkhir(this)
    })

    //remove paket
    $('#tblTransaksi').on('click','btnRemovePaket',function(){
        let subTotalAwal = parseFloat($(this).closest(' tr').find('.subTotal').text());
        subtotal -= subTotalAwal
        total -= subTotalAwal;
        $currentRow = $(this).closest('tr').remove();
        $('#subtotal').text(subtotal)
        $('#total').text(total)
    })

</script>
@endpush