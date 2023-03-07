<?php

namespace App\Http\Controllers;

use App\Models\SalesModel;
use App\Models\BarangModel;
use App\Models\CustomerModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SalesAdmin extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        // mengambil data dari table sales
        $pgw = SalesModel::salesjoinbarangcustomer();
    	// mengirim data sales ke view index
        return view('pages/admin/sales/index',['pgw' => $pgw]);
    }

    public function tambah(){
		$kode = SalesModel::kode();
		$barang = BarangModel::all();
		$customer = CustomerModel::all();
        return view('pages/admin/sales/tambah', ['kode'=>$kode, 'barang'=>$barang, 'customer'=>$customer]);
    }

    public function store(Request $request){
        $barang = DB::table('barang')->where('ID_Barang', $request->id_barang)->first();
        if ($request->qty > $barang->Stok) {
            return redirect('/admin/sales/tambah')->withError('Stok tidak mencukupi');
        } else {
            // insert data ke table sales
            DB::table('sales')->insert([
                'ID_Sales' => $request->id_sales,
                'ID_Barang' => $request->id_barang,
                'ID_Customer' => $request->id_customer,
                'Qty' => $request->qty,
                'Tanggal_Transaksi' => $request->tanggal_transaksi,
                'Harga_Sales' => $request->harga,
                'Metode_Pembayaran' => $request->metode
            ]);
    
            DB::table('barang')
            ->where('ID_Barang', $request->id_barang)
            ->update(['Stok' => DB::raw('Stok - '.$request->qty)]);
    
            // alihkan halaman ke halaman sales
            return redirect('/admin/sales/')->withSuccess('Data berhasil disimpan');
        }
    }

	// method untuk hapus data sales
	public function hapus($id){
		// menghapus data sales berdasarkan id yang dipilih
		DB::table('sales')->where('ID_Sales',$id)->delete();
		
		// alihkan halaman ke halaman sales
		return redirect('/admin/sales')->withDanger('Data berhasil dihapus');
	}
}