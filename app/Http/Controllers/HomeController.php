<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BarangKeluar;
use App\Models\BarangMasuk;
use App\Models\Kategori;
use App\Models\User;
use BarangMsk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(){
        $user = User::count();
        $barang = Barang::count();
        $kategori = Kategori::count();

        $date = date('Y-m-d');

        $brg_masuk = BarangMasuk::where('tgl_brg_masuk','=',$date)->count();

        $brg_keluar = BarangKeluar::where('tgl_brg_keluar','=',$date)->count();

        $brg_msk = BarangMasuk::count();
        $brg_klr = BarangKeluar::count();

        $jan =  DB::table('barang_masuk')
                ->whereMonth('tgl_brg_masuk', '01')
                ->count();



        return view('home', compact('user','barang','kategori','brg_masuk','brg_keluar','brg_msk','brg_klr'));
    }
}
