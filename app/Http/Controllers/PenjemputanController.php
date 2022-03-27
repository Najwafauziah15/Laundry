<?php

namespace App\Http\Controllers;

//packages
use App\Models\Penjemputan;
use App\Models\Logging;
use App\Models\Member;
use Illuminate\Http\Request;
use App\Exports\PenjemputanExport;
use App\Exports\FormatPenjemputanExport;
use App\Imports\PenjemputanImport;
use PDF;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Response;

class PenjemputanController extends Controller
{
    /**
     * Untuk menampilkan halaman penjemputan dan memberikan data penjemputan
     *
     * @return \Illuminate\Http\Response
     */
    public function index() //method
    {
        $data['penjemputan'] = Penjemputan::all();
        $data['member'] = Member::all();
        // $data['logging'] = Logging::all();
        return view('penjemputan.index', $data); //interface(?)
    }

    /**
     * menginput/menyimpan data penjemputan ke tabel penjemputan di database
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
     * mengedit/mengubah data penjemputan ke tabel penjemputan di database
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
     * mengedit/mengubah status penjemputan ke tabel penjemputan di database
     *
     */
    public function status(request $request){
        $data = Penjemputan::where('id',$request->id)->first();
        $data->status = $request->status;
        $update = $data->save();

        return 'Data Gagal Ditarik';
    }
    
    /**
     * Menghapus data penjemputan di database dengan mengambil id penjemputan
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

    /**
     * export data penjemputan ke excel
     */
    public function export() 
    {
        return Excel::download(new PenjemputanExport, 'Penjemputan.xlsx');
    }

    /**
     * export format import data penjemputan ke excel
     */
    public function format() 
    {
        return Excel::download(new FormatPenjemputanExport, 'Format Penjemputan.xlsx');
    }

    /**
     * import data penjemputan di excel ke tabel penjemputan
     */
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

    /**
     * export data penjemputan ke pdf
     */
    public function cetak() {
       
        $data = Penjemputan::all();
        $pdf = PDF::loadView('penjemputan.cetak', ['penjemputan' => $data]);
        
        return $pdf->stream('penjemputan.pdf');
    }

}