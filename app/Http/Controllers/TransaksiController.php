<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\Paket;
use App\Models\Detail_Transaksi;
use App\Models\Member;
use PDF;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use App\Http\Requests\StoreTransaksiRequest;
use PhpParser\Builder\Trait_;

class TransaksiController extends Controller
{
    /**
     * Menampilkan halaman transaksi
     * dan memasukan/memberikan data untuk member dan paket yang ada di outlet autentikasi
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['detail_transaksi'] = Detail_Transaksi::all();
        $data ['member'] = Member::get();
        $data ['paket'] = Paket::where('id_outlet',auth()->user()->id_outlet)->get();
        return view('transaksi/index',$data); 
    }

    /**
     * untuk menambah/mengirim input data transaksi dan detail transaksi ke database
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTransaksiRequest $request)
    {
        // dd($request);
        // $request->validate();
        $request['id_outlet'] = auth()->user()->id_outlet;
        $request['kode_invoice'] = $this->generateKodeInvoice();
        $request['tgl_bayar'] = ($request->bayar == 0?NULL:date('Y-m-d H:i:s'));
        $request['status'] = 'baru';
        $request['dibayar'] = ($request->bayar == 0?'belum_dibayar':'dibayar');
        $request['id_user'] = auth()->user()->id;
        $request['total'] = ($request->total);
        $request['subtotal'] = ($request->subtotal);

        //input transaksi
        $input_transaksi = Transaksi::create($request->all());
        if ($input_transaksi == null){
            return back()->withErrors([
                'transaksi' => 'Input Transaksi Gagal!',
            ]);
        }

        //input detail pembelian
        foreach($request->id_paket as $i => $v){
            $input_detail = Detail_Transaksi::create([
                'id_transaksi' => $input_transaksi->id,
                'id_paket' => $request->id_paket[$i],
                'qty' => $request->qty[$i],
                'keterangan' => ''
            ]);
        }

        return redirect('/transaksi')->with('success','Input Transaksi Berhasil');
    }

    /**
    * untuk mengubah status di data transaksi
    * 
    */
    public function status(request $request){
        $data = Transaksi::where('id',$request->id)->first();
        $data->status = $request->status;
        $update = $data->save();

        return 'Data Gagal Ditarik';
    }

    /**
    * untuk membuat kode invoice terbaru dengan mengambil data transaksii terakhir
    * 
    */
    private function generateKodeInvoice(){
        $last = Transaksi::orderBy('id','desc')->first();
        $last = ($last == null?1:$last->id+1);
        $kode = sprintf('TRS'.date('Ymd').'%06d',$last);
        return $kode;
    }

    /**
    * untuk membuat faktur/pdf detail transaksi
    * 
    */
    public function faktur(Request $request, $id) {
       
        // $request = Detail_Transaksi::find($id);
        $data ['detail_transaksi'] = Detail_Transaksi::where('id_transaksi', $id)->get();

        $pdf = PDF::loadView('transaksi.faktur',  $data);
        return $pdf->stream();
    }
}
