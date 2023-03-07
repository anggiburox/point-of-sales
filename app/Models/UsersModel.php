<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class UsersModel extends Model
{
    use HasFactory;

    protected $table='users';  
    protected $fillable=['ID_User','Nama','Username','Password'];  
    public $timestamps = false;
    public $incrementing = false;
    protected $primaryKey = 'ID_User';


    public static function fetchUser($id)
    {   
        $brng =  DB::table('users')
        ->where('users.Nama', $id)
        ->get();
        return $brng;
    }
}