<?php

namespace App\Http\Controllers;

use App\Models\CustomerModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerAdmin extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        // mengambil data dari table customer
        $pgw = DB::table('customer')->get();
    	// mengirim data customer ke view index
        return view('pages/admin/customer/index',['pgw' => $pgw]);
    }

    public function tambah(){
		$kode = CustomerModel::kode();
        return view('pages/admin/customer/tambah', ['kode'=>$kode]);
    }

    public function store(Request $request){
	// insert data ke table customer
	DB::table('customer')->insert([
		'ID_Customer' => $request->id_customer,
        'Nama_Customer' => $request->nama_customer,
        'Alamat' => $request->alamat,
        'No_Telepon' => $request->no_telepon
	]);
	// alihkan halaman ke halaman customer
	return redirect('/admin/customer/')->withSuccess('Data berhasil disimpan');
    }

    public function edit($id)
	{
		// mengambil data customer berdasarkan id yang dipilih
		$pgw = DB::table('customer')->where('ID_Customer',$id)->get();
		// passing data customer yang didapat ke view edit.blade.php
		return view('pages/admin/customer/edit',['pgw' => $pgw]);
	}

	// update data customer
	public function update(Request $request){
		// update data customer
		DB::table('customer')->where('ID_Customer',$request->id_customer)->update([
            'Nama_Customer' => $request->nama_customer,
            'Alamat' => $request->alamat,
            'No_Telepon' => $request->no_telepon
		]);
		// alihkan halaman ke halaman customer
		return redirect('/admin/customer')->withSuccess('Data berhasil diperbaharui');
	}

	// method untuk hapus data customer
	public function hapus($id){
		// menghapus data customer berdasarkan id yang dipilih
		DB::table('customer')->where('ID_Customer',$id)->delete();
		
		// alihkan halaman ke halaman customer
		return redirect('/admin/customer')->withDanger('Data berhasil dihapus');
	}
}