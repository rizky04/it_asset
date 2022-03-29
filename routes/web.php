<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\BarangKeluarController;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Models\BarangMasuk;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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


Route::get('/', [AuthController::class,'index'])->name('index');
Route::get('/', [AuthController::class,'index'])->name('login');

Route::post('/cek_login',[AuthController::class,'cek_login'])->name('cek_login');
Route::get('/logout', [AuthController::class,'logout'])->name('logout');

Route::group(['middleware' => ['auth', 'checkLevel:admin,gudang']], function () {
    Route::get('/home', [HomeController::class,'index'])->name('home');
});

Route::group(['middleware' => ['auth', 'checkLevel:gudang']], function () {
    //transaksi barang
    Route::get('/barangmasuk', [BarangMasukController::class,'index'])->name('barangMasuk');
    Route::get('/barangmasuk/ajax', [BarangMasukController::class,'ajax'])->name('ajax');

    Route::get('/barangmasuk/create', [BarangMasukController::class,'create'])->name('addMasuk');
    Route::post('/barangmasuk/store', [BarangMasukController::class,'store'])->name('createMasuk');


    Route::get('/barangkeluar', [BarangKeluarController::class,'index'])->name('barangKeluar');
    Route::get('/barangkeluar/ajax', [BarangKeluarController::class,'ajax'])->name('ajax');

    Route::get('/barangkeluar/create', [BarangKeluarController::class,'create'])->name('addKeluar');
    Route::post('/barangkeluar/store', [BarangKeluarController::class,'store'])->name('createKeluar');


});

Route::group(['middleware' => ['auth', 'checkLevel:admin']], function () {

    //route user
    Route::get('/user', [UserController::class,'index'])->name('user');
    Route::post('/user', [UserController::class,'store'])->name('createUser');
    Route::post('/user/{id}', [UserController::class,'update'])->name('editUser');
    Route::get('/user/{id}', [UserController::class,'destroy'])->name('deleteUser');

    //route kategori
    Route::get('/kategori', [KategoriController::class,'index'])->name('kategori');
    Route::post('kategori', [KategoriController::class,'store'])->name('createKategori');
    Route::post('/kategori/{id}', [KategoriController::class,'update'])->name('updateKategori');
    Route::get('/kategori/{id}', [KategoriController::class,'destroy'])->name('deleteKategori');

    //route barang
    Route::get('/barang', [BarangController::class,'index'])->name('barang');
    Route::post('/barang', [BarangController::class,'store'])->name('createBarang');
    Route::post('/barang{id}', [BarangController::class,'update'])->name('updateBarang');
    Route::get('/barang{id}', [BarangController::class,'destroy'])->name('hapusbarang');

    //laporan
    Route::get('/lap_user', [LaporanController::class,'lap_user'])->name('lap_user');
    Route::get('/cetak_lap_user', [LaporanController::class,'cetak_lap_user'])->name('cetak_lap_user');


    Route::get('/lap_kategori', [LaporanController::class,'lap_kategori'])->name('lap_kategori');
    Route::get('/cetak_lap_kategori', [LaporanController::class,'cetak_lap_kategori'])->name('cetak_lap_kategori');


    Route::get('/lap_barang', [LaporanController::class,'lap_barang'])->name('lap_barang');
    Route::get('/cetak_lap_barang', [LaporanController::class,'cetak_lap_barang'])->name('cetak_lap_barang');

    Route::get('/lap_barang_masuk', [LaporanController::class,'lap_barang_masuk'])->name('lap_barang_masuk');
    Route::get('/cetak_lap_barang_masuk', [LaporanController::class,'cetak_lap_barang_masuk'])->name('cetak_lap_barang_masuk');

    Route::get('/lap_barang_keluar', [LaporanController::class,'lap_barang_keluar'])->name('lap_barang_keluar');
    Route::get('/cetak_lap_barang_keluar', [LaporanController::class,'cetak_lap_barang_keluar'])->name('cetak_lap_barang_keluar');

});



