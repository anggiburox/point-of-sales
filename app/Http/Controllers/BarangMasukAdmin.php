<?php

namespace App\Http\Controllers;

use App\Models\BarangModel;
use App\Models\BarangMasukModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BarangMasukAdmin extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        // mengambil data dari table barang
        $pgw = BarangMasukModel::barangjoinbarangmasuk();
    	// mengirim data barang ke view index
        return view('pages/admin/barang_masuk/index',['pgw' => $pgw]);
    }

    public function tambah(){
		$kode = BarangModel::all();
        return view('pages/admin/barang_masuk/tambah', ['kode'=>$kode]);
    }

    public function store(Request $request){
	// insert data ke table barang
	DB::table('barang_masuk')->insert([
		'ID_Barang' => $request->id_barang,
        'Jumlah_Barang_Masuk' => $request->jumlah_barang_masuk,
        'Tanggal_Barang_Masuk' => $request->tanggal_barang_masuk
	]);
    
    DB::table('barang')
    ->where('ID_Barang', $request->id_barang)
    ->update(['Stok' => DB::raw('Stok + '.$request->jumlah_barang_masuk)]);
	// alihkan halaman ke halaman barang
	return redirect('/admin/barang_masuk/')->withSuccess('Data berhasil disimpan');
    }
    
	// method untuk hapus data barang
	public function hapus($id)
{
    // menghapus data barang masuk berdasarkan id yang dipilih
    $barangMasuk = BarangMasukModel::findOrFail($id);
    $barangMasuk->delete();
    
    // alihkan halaman ke halaman barang masuk
    return redirect('/admin/barang_masuk')->withDanger('Data berhasil dihapus');
}

}