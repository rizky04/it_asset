<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriController;
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

    Route::get('/barangkeluar', [BarangMasukController::class,'index'])->name('barangkeluar');
    Route::post('/barangkeluar', [BarangMasukController::class,'create'])->name('addKeluarMasuk');
    Route::post('/barangkeluar', [BarangMasukController::class,'store'])->name('createKeluarMasuk');
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
});



