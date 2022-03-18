<?php

namespace App\Http\Controllers;

use App\Models\Penjemputan;
use App\Models\Member;
use Illuminate\Http\Request;
use App\Exports\PenjemputanExport;
use App\Imports\PenjemputanImport;
use PDF;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use Maatwebsite\Excel\Facades\Excel;

class PenjemputanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() //method
    {
        $data['penjemputan'] = Penjemputan::all();
        $data['member'] = Member::all();
        return view('penjemputan.index', $data); //interface
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
        $validate = $request->validate([
            'id_member' => 'required',
            'petugas' => 'required',
            'status' => 'required'
        ]);
        
        Penjemputan::create($validate);

        return redirect('/penjemputan')->with('success', 'Penjemputan Berhasil Ditambahkan');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Penjemputan $penjemputan)
    {
        //validasi
        $validate = $request->validate([
            'id_member' => 'required',
            'petugas' => 'required',
            'status' => 'required',
        ]);

        Penjemputan::where('id',$penjemputan->id)
        ->update($validate);
        return redirect('/penjemputan')->with('success', 'Data Berhasil Di Edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Penjemputan $penjemputan, $id)
    {
        $penjemputan = Penjemputan::find($id);
        $penjemputan->delete();
        return redirect('/penjemputan')->with('success', 'Penjemputan Berhasil Dihapus');
    }

    public function export() 
    {
        return Excel::download(new PenjemputanExport, 'Penjemputan.xlsx');
    }

    public function import(Request $request)
    {
        $request->validate([
            'file2' => 'file|required|mimes:xlsx',
        ]);

        if ($request) {
            Excel::import(new PenjemputanImport, $request->file('file2'));
        } else {
            return back()->withErrors([
                'file2' => 'file belum terisi',
            ]);
        }

        return redirect()->route('penjemputan.index')->with('success', 'Data Berhasil Di Import');
    }

    public function cetak(Request $request, $id) {
       
        $data = Penjemputan::all();
        $pdf = PDF::loadView('penjemputan.cetak',  $data);
        return $pdf->stream();
    }
}