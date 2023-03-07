<?php

namespace App\Http\Controllers;

use App\Models\BarangModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BarangAdmin extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        // mengambil data dari table barang
        $pgw = DB::table('barang')->get();
    	// mengirim data barang ke view index
        return view('pages/admin/barang/index',['pgw' => $pgw]);
    }

    public function tambah(){
		$kode = BarangModel::kode();
        return view('pages/admin/barang/tambah', ['kode'=>$kode]);
    }

    public function store(Request $request){
	// insert data ke table barang
	DB::table('barang')->insert([
		'ID_Barang' => $request->id_barang,
        'Nama' => $request->nama_barang,
        'Varian' => $request->varian_barang,
        'Stok' => $request->stok_barang,
        'Harga' => $request->harga_barang
	]);
	// alihkan halaman ke halaman barang
	return redirect('/admin/barang/')->withSuccess('Data berhasil disimpan');
    }

    public function edit($id)
	{
		// mengambil data barang berdasarkan id yang dipilih
		$pgw = DB::table('barang')->where('ID_barang',$id)->get();
		// passing data barang yang didapat ke view edit.blade.php
		return view('pages/admin/barang/edit',['pgw' => $pgw]);
	}

	// update data barang
	public function update(Request $request){
		// update data barang
		DB::table('barang')->where('ID_Barang',$request->id_barang)->update([
			'Nama' => $request->nama_barang,
			'Varian' => $request->varian_barang,
			'Stok' => $request->stok_barang,
			'Harga' => $request->harga_barang
		]);
		// alihkan halaman ke halaman barang
		return redirect('/admin/barang')->withSuccess('Data berhasil diperbaharui');
	}

	// method untuk hapus data barang
	public function hapus($id){
		// menghapus data barang berdasarkan id yang dipilih
		DB::table('barang')->where('ID_barang',$id)->delete();
		
		// alihkan halaman ke halaman barang
		return redirect('/admin/barang')->withDanger('Data berhasil dihapus');
	}
}