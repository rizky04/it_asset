<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
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

// Route::get('/', function () {
//     return view('index');
// });
// Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/', [AuthController::class,'index'])->name('index');
Route::post('/cek_login',[AuthController::class,'cek_login'])->name('cek_login');
Route::get('/logout', [AuthController::class,'logout'])->name('logout');

Route::group(['middleware' => ['auth', 'checkLevel:admin,gudang']], function () {
    Route::get('/home', [HomeController::class,'index'])->name('home');
    // Route::get('/user', [UserController::class,'index'])->name('user');
    // Route::get('/kategori', [KategoriController::class,'index'])->name('kategori');
    // Route::get('/barang', [BarangController::class,'index'])->name('barang');
});


Route::group(['middleware' => ['auth', 'checkLevel:admin']], function () {
    Route::get('/user', [UserController::class,'index'])->name('user');
    Route::post('/user', [UserController::class,'store'])->name('createUser');
    Route::get('/kategori', [KategoriController::class,'index'])->name('kategori');
    Route::get('/barang', [BarangController::class,'index'])->name('barang');
});



