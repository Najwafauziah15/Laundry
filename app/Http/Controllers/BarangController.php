<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Logging;
use App\Exports\BarangExport;
use App\Exports\FormatBarangExport;
use App\Imports\BarangImport;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use Illuminate\Http\Response;

class BarangController extends Controller
{
    /**
     * Untuk menampilkan halaman barang dan memberikan data barang
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['barang'] = Barang::all();
        $data['logging'] = Logging::all();
        return view('barang.index', $data);
    }

    /**
     * menginput/menyimpan data barang ke tabel barang di database
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama_barang' => 'required',
            'qty' => 'required',
            'harga' => 'required',
            'waktu_beli' => 'required',
            'supplier' => 'required',
            'status' => 'required',
            'waktu_update' => 'required'
        ]);
        
        Barang::create($validate);

        return redirect('/barang')->with('success', 'Data Barang Berhasil Ditambahkan');
    }

    /**
     * mengedit/mengubah data barang ke tabel barang di database
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, Barang $b, $id)
    {
        //validasi
        $validated = $request->validate([
            'nama_barang' => 'required',
            'qty' => 'required',
            'harga' => 'required',
            'supplier' => 'required',
        ]);
        $b = Barang::find($id);

        Barang::where('id', $b->id)
        ->update($validated);
        return redirect('/barang')->with('success', 'Data Barang Berhasil Di Edit');
    }

    /**
     * mengedit/mengubah status barang ke tabel barang di database
    */
    public function status(request $request){
        $data = Barang::where('id',$request->id)->first();
        $data->status = $request->status;
        // $data->waktu_update = $request->waktu_update;
        $data->waktu_update = now();
        $update = $data->save();

        return response()->json([
            'waktu_update' =>date('Y-m-d h:i:s',strtotime($data->waktu_update))
        ]) ;
    }

    /**
     * Menghapus data barang di database dengan mengambil id barang
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Barang $barang, $id)
    {
        $barang = Barang::find($id);
        $barang->delete();
        return redirect('/barang')->with('success', 'Data Barang Berhasil Dihapus');
    }

    /**
     * export data barang ke excel
     */
    public function export() 
    {
        return Excel::download(new BarangExport, 'Barang.xlsx');
    }

    /**
     * export format import data barang ke excel
    */
    public function format() 
    {
        return Excel::download(new FormatBarangExport, 'Format Barang.xlsx');
    }

    /**
     * import data barang di excel ke tabel Barang
    */
    public function import(Request $request)
    {
        $request->validate([
            'file2' => 'file|required|mimes:xlsx',
        ]);

        if ($request) {
            Excel::import(new BarangImport, $request->file('file2'));
        } else {
            return back()->withErrors([
                'file2' => 'file belum terisi',
            ]);
        }

        return redirect()->route('barang.index')->with('success', 'Data Berhasil Di Import');
    }

    /**
     * export data barang ke pdf
     */
    public function cetak() {
       
        $data = Barang::all();
        $pdf = PDF::loadView('barang.cetak', ['barang' => $data]);
        
        return $pdf->stream('barang.pdf');
    }
}
