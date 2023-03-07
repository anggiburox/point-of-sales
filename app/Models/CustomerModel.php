<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CustomerModel extends Model
{
    use HasFactory;

    protected $table='customer';  
    protected $fillable=['ID_Customer','Nama_Customer','Alamat','No_Telepon'];  
    public $timestamps = false;
    public $incrementing = false;
    protected $primaryKey = 'ID_Customer';

    public static function kode()
{
    $kode = DB::table('customer')->max('ID_Customer');
    $addNol = '';
    $kode = str_replace("IC-", "", $kode);
    $kode = (int) $kode + 1;
    $incrementKode = $kode;

    if (strlen($kode) == 1) {
        $addNol = "000";
    } elseif (strlen($kode) == 2) {
        $addNol = "00";
    } elseif (strlen($kode == 3)) {
        $addNol = "0";
    }

    $kodeBaru = "IC-".$addNol.$incrementKode;
    return $kodeBaru;
}

}