<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BarangMasukModel extends Model
{
    use HasFactory;

    protected $table='barang_masuk';  
    protected $fillable=['ID_Barang_Masuk','ID_Barang','Jumlah_Barang_Masuk','Tanggal_Barang_Masuk'];  
    public $timestamps = false;
    public $incrementing = false;
    protected $primaryKey = 'ID_Barang_Masuk';

    
public static function barangjoinbarangmasuk(){
    $brng =  DB::table('barang_masuk')
    ->join('barang', 'barang.ID_Barang', '=', 'barang_masuk.ID_Barang')
    ->get();
    return $brng;
}

protected static function boot()
{
    parent::boot();

    static::deleted(function ($barangMasuk) {
        DB::table('barang')
            ->where('ID_Barang', $barangMasuk->ID_Barang)
            ->decrement('Stok', $barangMasuk->Jumlah_Barang_Masuk);
    });
}

}