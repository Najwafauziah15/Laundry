<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['barang_inventaris'] = Barang::all();
        return view('barang.index', $data);
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
            'nama_barang' => 'required',
            'merk_barang' => 'required',
            'qty' => 'required',
            'kondisi' => 'required',
            'tanggal_pengadaan' => 'required'
        ]);
        
        Barang::create($validate);

        return redirect('/barang')->with('success', 'Data Paket Berhasil Ditambahkan');
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
    // public function update(Request $request, Barang $barang_inventaris)
    // {
    //     //validasi
    //     $validated = $request->validate([
    //         'nama_barang' => 'required',
    //         'merk_barang' => 'required',
    //         'qty' => 'required',
    //         'kondisi' => 'required',
    //         'tanggal_pengadaan' => 'required'
    //     ]);

    //     $barang_inventaris->update([
    //     'nama_barang' => $request->nama_barang,
    //     'merk_barang' => $request->merk_barang,
    //     'qty' => $request->qty,
    //     'kondisi' => $request->kondisi,
    //     'tanggal_pengadaan' => $request->tanggal_pengadaan
    //     ]);
    //     return redirect('/barang')->with('success', 'Data Berhasil Di Edit');
    // }

    public function update(Request $request, Barang $b, $id)
    {
        //validasi
        $validated = $request->validate([
            'nama_barang' => 'required',
            'merk_barang' => 'required',
            'qty' => 'required',
            'kondisi' => 'required',
            'tanggal_pengadaan' => 'required'
        ]);
        $b = Barang::find($id);

        // echo $b->id;
        // echo $b->nama_barang;
        // echo $b->merk_barang;
        // echo $b->qty;
        // echo $b->kondisi;
        // echo $b->tanggal_pengadaan;

        Barang::where('id', $b->id)
        ->update($validated);
        return redirect('/barang')->with('success', 'Data Berhasil Di Edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Barang $barang_inventaris, $id)
    {
        $barang_inventaris = Barang::find($id);
        $barang_inventaris->delete();
        return redirect('/barang')->with('success', 'Data Barang Berhasil Dihapus');
    }
}
