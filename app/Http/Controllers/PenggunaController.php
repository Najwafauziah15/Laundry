<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Imports\MemberImport;
use App\Exports\MemberExport;
use Maatwebsite\Excel\Facades\Excel;

class PenggunaController extends Controller
{
    /**
     * Untuk menampilkan halaman member dan memberikan data member
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengguna ['pengguna'] = Member::all();
        return view('pengguna.index', $pengguna);
    }

    /**
     * menginput/menyimpan data member ke tabel member di database
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
            'tlp' => 'required'
        ]);
        
        Member::create($validate);

        return redirect('/pengguna')->with('success', 'Data Member Berhasil Ditambahkan');
    }

    /**
     * mengedit/mengubah data member ke tabel member di database
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Member $pengguna)
    {
        //validasi
        $validate = $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
            'tlp' => 'required'
        ]);

        Member::where('id',$pengguna->id)
        ->update($validate);
        return redirect('/pengguna')->with('success', 'Data Berhasil Di Edit');
    }

    /**
     * Menghapus data member di database dengan mengambil id member
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $pengguna, $id)
    {
        $pengguna = Member::find($id);
        $pengguna->delete();
        return redirect('/pengguna')->with('success', 'Data Pengguna Berhasil Dihapus');
    }

    /**
     * export data member ke excel
     */
    public function export() 
    {
        return Excel::download(new MemberExport, 'Member Laundry.xlsx');
    }

    /**
     * import data member di excel ke tabel member
     */
    public function import(Request $request)
    {
        $request->validate([
            'file2' => 'file|required|mimes:xlsx',
        ]);

        if ($request) {
            Excel::import(new MemberImport, $request->file('file2'));
        } else {
            return back()->withErrors([
                'file2' => 'file belum terisi',
            ]);
        }

        return redirect()->route('pengguna.index')->with('success', 'Data Berhasil Di Import!');
    }
}
