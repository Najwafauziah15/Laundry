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
     * Display a listing of the resource.
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

     // export PDF
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

    public function export() 
    {
        return Excel::download(new DetailExport, 'detail.xlsx');
    }
}
