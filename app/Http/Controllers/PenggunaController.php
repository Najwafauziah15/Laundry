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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengguna ['pengguna'] = Member::all();
        return view('pengguna.index', $pengguna);
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
            'nama' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
            'tlp' => 'required'
        ]);
        
        Member::create($validate);

        return redirect('/pengguna')->with('success', 'Data Member Berhasil Ditambahkan');
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
     * Remove the specified resource from storage.
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

    public function export() 
    {
        return Excel::download(new MemberExport, 'Member Laundry.xlsx');
    }

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
