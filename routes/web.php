<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardAdmin;
use App\Http\Controllers\CustomerAdmin;
use App\Http\Controllers\BarangAdmin;
use App\Http\Controllers\BarangMasukAdmin;
use App\Http\Controllers\SalesAdmin;
use App\Http\Controllers\Auth;
use App\Http\Controllers\ProfileAdmin;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::post('/login', [Auth::class, 'login']);
Route::get('/logout', [Auth::class, 'logout']);
Route::get('/', [Auth::class, 'index'])->name('login');

Route::middleware(['admin'])->group(function () {
 //route admin dashboard    
Route::get('/admin/dashboard', [DashboardAdmin::class, 'index']);

  //route admin profile
Route::get('/admin/profile', [ProfileAdmin::class, 'index']);
Route::post('/admin/profile/{id}',[ProfileAdmin::class, 'editprofile']);

//route admin barang
Route::get('/admin/barang/', [BarangAdmin::class, 'index']);
Route::get('/admin/barang/tambah', [BarangAdmin::class, 'tambah']);
Route::post('/admin/barang/store', [BarangAdmin::class, 'store']);
Route::get('/admin/barang/edit/{id}',[BarangAdmin::class, 'edit']);
Route::post('/admin/barang/update',[BarangAdmin::class, 'update']);
Route::get('/admin/barang/hapus/{id}',[BarangAdmin::class, 'hapus']);

//route admin barang masuk
Route::get('/admin/barang_masuk/', [BarangMasukAdmin::class, 'index']);
Route::get('/admin/barang_masuk/tambah', [BarangMasukAdmin::class, 'tambah']);
Route::post('/admin/barang_masuk/store', [BarangMasukAdmin::class, 'store']);
Route::get('/admin/barang_masuk/hapus/{id}',[BarangMasukAdmin::class, 'hapus']);

//route admin sales
Route::get('/admin/sales/', [SalesAdmin::class, 'index']);
Route::get('/admin/sales/tambah', [SalesAdmin::class, 'tambah']);
Route::post('/admin/sales/store', [SalesAdmin::class, 'store']);
Route::get('/admin/sales/hapus/{id}',[SalesAdmin::class, 'hapus']);

//route admin customer
Route::get('/admin/customer/', [CustomerAdmin::class, 'index']);
Route::get('/admin/customer/tambah', [CustomerAdmin::class, 'tambah']);
Route::post('/admin/customer/store', [CustomerAdmin::class, 'store']);
Route::get('/admin/customer/edit/{id}',[CustomerAdmin::class, 'edit']);
Route::post('/admin/customer/update',[CustomerAdmin::class, 'update']);
Route::get('/admin/customer/hapus/{id}',[CustomerAdmin::class, 'hapus']);

});