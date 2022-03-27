<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\Outlet;
use App\Imports\OutletImport;
use App\Exports\OutletExport;
use Maatwebsite\Excel\Facades\Excel;

class OutletController extends Controller
{
    /**
     * Untuk menampilkan halaman outlet dan memberikan data outlet
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $outlet ['outlet'] = Outlet::all();
        return view('outlet.index', $outlet);
    }

    /**
     * menginput/menyimpan data outlet ke tabel outlet di database
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'tlp' => 'required'
        ]);
        
        Outlet::create($validate);

        return redirect('/outlet')->with('success', 'Data Outlet Berhasil Ditambahkan');
    }

    /**
     * mengedit/mengubah data outlet ke tabel outlet di database
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Outlet $outlet)
    {
        //validasi
        $validate = $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'tlp' => 'required'
        ]);

        Outlet::where('id',$outlet->id)
        ->update($validate);
        return redirect('/outlet')->with('success', 'Data Berhasil Di Edit');
    }

    /**
     * Menghapus data outlet di database dengan mengambil id outlet
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Outlet $outlet, $id)
    {
        $outlet = Outlet::find($id);
        $outlet->delete();
        return redirect('/outlet')->with('success', 'Data Outlet Berhasil Dihapus');
    }

    /**
     * export data outlet ke excel
    */
    public function export() 
    {
        return Excel::download(new OutletExport, 'Outlet Laundry.xlsx');
    }

    /**
     * import data outlet di excel ke tabel outlet
    */
    public function import(Request $request)
    {
        $request->validate([
            'file2' => 'file|required|mimes:xlsx',
        ]);

        if ($request) {
            Excel::import(new OutletImport, $request->file('file2'));
        } else {
            return back()->withErrors([
                'file2' => 'file belum terisi',
            ]);
        }

        return redirect()->route('outlet.index')->with('success', 'File Berhasil Di Import!');
    }
}
