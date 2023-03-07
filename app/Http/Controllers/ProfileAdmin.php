<?php

namespace App\Http\Controllers;
use App\Models\UsersModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileAdmin extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        // mengambil data dari table 
        $profile = UsersModel::fetchUser(session()->get('nama'));
    	// mengirim data ke view index
        return view('pages/admin/profile', ['profile'=>$profile]);
    }

    public function editprofile(Request $request){
        DB::table('users')->where('ID_User',$request->id)->update([
            'Nama' => $request->nama,
            'Username' => $request->username,
            'Password' => $request->password
		]);
		// alihkan halaman ke halaman pegawai
		return redirect('/admin/profile')->withSuccess('Data berhasil diperbaharui');
    }
}