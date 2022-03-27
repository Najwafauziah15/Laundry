<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Outlet;
use Illuminate\Support\Facades\Hash;
use App\Exports\UserExport;
use App\Exports\UserImport;
use App\Imports\UserImport as ImportsUserImport;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    /**
     * Untuk menampilkan halaman user
     * dengan memberikan data user dan outlet
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['user'] = User::all();
        $data['outlet'] = Outlet::all();
        return view('user.index', $data);
    }

    /**
     *
     * menginput/menyimpan data user ke tabel user di database
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => ['required', 'min:3', 'max:255'],
            'username' => ['required', 'min:3', 'unique:users'],
            'id_outlet' => 'required',
            'password' => ['required', 'min:5', 'max:255'],
            'role' => 'required'
        ]);

        //$validateData ['password'] = bcrypt($validateData['password']);
        $validateData['password'] = Hash::make($validateData['password']);

        User::create($validateData);

        //$request->session()->flash('success', 'registration successfull! please login');

        return redirect('/user')->with('success', 'registration successfull!');
    }

    /**
     * mengedit/mengubah data user ke tabel user di database
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $validateData = $request->validate([
            'name' => ['required', 'min:3', 'max:255'],
            'username' => ['required', 'min:3'],
            'id_outlet' => ['required'],
            'role' => 'required'
        ]);

        if ($request->has('password')&& $request->password !=''){
            $validateData['password'] = Hash::make($request->password);
        }

        User::where('id',$user->id)
        ->update($validateData);
        return redirect('/user')->with('success', 'Data Berhasil Di Edit');
    }

    /**
     * Menghapus data user di database dengan mengambil id user
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user, $id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('/user')->with('success', 'Data User Berhasil Dihapus');
    }

    /**
     * export data user ke excel
    */
    public function export() 
    {
        return Excel::download(new UserExport, 'Pengguna Laundry.xlsx');
    }

    /**
     * import data user di excel ke tabel user
    */
    public function import(Request $request)
    {
        $request->validate([
            'file2' => 'file|required|mimes:xlsx',
        ]);

        if ($request) {
            Excel::import(new ImportsUserImport, $request->file('file2'));
        } else {
            return back()->withErrors([
                'file2' => 'file belum terisi',
            ]);
        }

        return redirect()->route('paket.index')->with('success', 'File Berhasil Di Import!');
    }
}
