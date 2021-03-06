<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Detail_Transaksi;
use App\Models\Transaksi;
use App\Models\Paket;
use App\Models\Member;
use PDF;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use App\Exports\DetailExport;
use Maatwebsite\Excel\Facades\Excel;

class LaporanController extends Controller
{
    /**
     * Untuk menampilkan halaman laporan 
     * dan memberikan data detail transaksi,transaksi,member,paket
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['detail_transaksi'] = Detail_Transaksi::all();
        $data['transaksi'] = Transaksi::all();
        $data ['member'] = Member::get();
        $data ['paket'] = Paket::get();

        return view('laporan.index', $data);
    }

    /**
     * export data barang ke pdf
     */
    public function faktur(Request $request, $id) {
       
        // $request = Detail_Transaksi::find($id);
        $data ['detail_transaksi'] = Detail_Transaksi::where('id_transaksi', $id)->get();

        // $data = Transaksi::find($id);
        // $data ['detail_transaksi'] = Detail_Transaksi::all();
        // $data ['t'] = Detail_Transaksi::all();
        // $t ['detail_transaksi'] = Detail_Transaksi::find($id);

        // echo $t->$id
        // $data ['outlet'] = Auth::user()->outlet;

        $pdf = PDF::loadView('transaksi.faktur',  $data);
        return $pdf->stream();
    }

    /**
     * export data barang ke excel
     */
    public function export() 
    {
        return Excel::download(new DetailExport, 'detail.xlsx');
    }
}
