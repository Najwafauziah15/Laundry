<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paket;
use App\Models\Outlet;
use App\Exports\PaketExport;
use App\Imports\PaketImport;
use Maatwebsite\Excel\Facades\Excel;

class PaketController extends Controller
{
    /**
     * Untuk menampilkan halaman paket 
     * dan memberikan data paket serta outlet
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['paket'] = Paket::all();
        $outlet['outlet'] = Outlet::all();
        return view('paket.index', $data, $outlet);
    }

    /**
     * menginput/menyimpan data paket ke tabel paket di database
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'id_outlet' => 'required',
            'jenis' => 'required',
            'nama_paket' => 'required',
            'harga' => 'required'
        ]);
        
        Paket::create($validate);

        return redirect('/paket')->with('success', 'Data Paket Berhasil Ditambahkan');
    }

    /**
     * mengedit/mengubah data paket ke tabel paket di database
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Paket $paket)
    {
        //validasi
        $validate = $request->validate([
            'id_outlet' => 'required',
            'jenis' => 'required',
            'nama_paket' => 'required',
            'harga' => 'required'
        ]);

        Paket::where('id',$paket->id)
        ->update($validate);
        return redirect('/paket')->with('success', 'Data Berhasil Di Edit');
    }

    /**
     * Menghapus data paket di database dengan mengambil id paket
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Paket $paket, $id)
    {
        $paket = Paket::find($id);
        $paket->delete();
        return redirect('/paket')->with('success', 'Data Paket Berhasil Dihapus');
    }

    /**
     * export data paket ke excel
    */
    public function export() 
    {
        return Excel::download(new PaketExport, 'Paket Laundry.xlsx');
    }

    /**
     * import data paket di excel ke tabel paket
    */
    public function import(Request $request)
    {
        $request->validate([
            'file2' => 'file|required|mimes:xlsx',
        ]);

        if ($request) {
            Excel::import(new PaketImport, $request->file('file2'));
        } else {
            return back()->withErrors([
                'file2' => 'file belum terisi',
            ]);
        }

        return redirect()->route('paket.index')->with('success', 'File Berhasil Di Import!');
    }
}
