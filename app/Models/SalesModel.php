<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SalesModel extends Model
{
    use HasFactory;

    protected $table='sales';  
    protected $fillable=['ID_Sales','ID_Barang','ID_Customer','Qty','Tanggal_Transaksi','Harga_Sales','Metode_Pembayaran'];  
    public $timestamps = false;
    public $incrementing = false;
    protected $primaryKey = 'ID_Sales';

    public static function kode()
{
    $kode = DB::table('sales')->max('ID_Sales');
    $addNol = '';
    $kode = str_replace("IS-", "", $kode);
    $kode = (int) $kode + 1;
    $incrementKode = $kode;

    if (strlen($kode) == 1) {
        $addNol = "000";
    } elseif (strlen($kode) == 2) {
        $addNol = "00";
    } elseif (strlen($kode == 3)) {
        $addNol = "0";
    }

    $kodeBaru = "IS-".$addNol.$incrementKode;
    return $kodeBaru;
}

public static function salesjoinbarangcustomer(){
    $brng =  DB::table('sales')
    ->join('barang', 'barang.ID_Barang', '=', 'sales.ID_Barang')
    ->join('customer', 'customer.ID_Customer', '=', 'sales.ID_Customer')
    ->get();
    return $brng;
}
}