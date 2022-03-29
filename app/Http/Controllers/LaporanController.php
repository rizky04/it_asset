<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BarangKeluar;
use App\Models\BarangMasuk;
use App\Models\Kategori;
use App\Models\User;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    //

    public function lap_user()
    {
        $user = User::all();

        return view('admin.laporan.user.lap_user', compact('user'));
    }
    public function cetak_lap_user()
    {
        $user = User::all();

        return view('admin.laporan.user.cetak_lap_user', compact('user'));
    }
    public function lap_kategori()
    {
        $kategori= Kategori::all();

        return view('admin.laporan.kategori.lap_kategori', compact('kategori'));
    }
    public function cetak_lap_kategori()
    {
        $kategori= Kategori::all();

        return view('admin.laporan.kategori.cetak_lap_kategori', compact('kategori'));
    }
    public function lap_barang()
    {
        $barang = Barang::join('kategori', 'kategori.id','=','barang.id_kategori')
        ->select('barang.*', 'kategori.nama_kategori')
        ->get();

        return view('admin.laporan.barang.lap_barang', compact('barang'));
    }
    public function cetak_lap_barang()
    {
        $barang = Barang::join('kategori', 'kategori.id','=','barang.id_kategori')
        ->select('barang.*', 'kategori.nama_kategori')
        ->get();

        return view('admin.laporan.barang.cetak_lap_barang', compact('barang'));
    }
    public function lap_barang_masuk()
    {
         //
         $brg_msk = BarangMasuk::join('barang', 'barang.id', '=', 'barang_masuk.id_barang')
         ->join('kategori', 'kategori.id', '=', 'barang.id_kategori')
         ->select('barang_masuk.*', 'kategori.nama_kategori', 'barang.harga', 'barang.nama_barang')
         ->get();

        return view('admin.laporan.barang_masuk.lap_barang_masuk', compact('brg_msk'));
    }
    public function cetak_lap_barang_masuk(Request $request)
    {
          //
          $tgl_awal = $request->tgl_awal;
          $tgl_akhir = $request->tgl_akhir;
          if ($tgl_awal AND $tgl_akhir) {
            $brg_msk    = BarangMasuk::join('barang', 'barang.id', '=', 'barang_masuk.id_barang')
                        ->join('kategori', 'kategori.id', '=', 'barang.id_kategori')
                        ->select('barang_masuk.*', 'kategori.nama_kategori', 'barang.harga', 'barang.nama_barang')
                        ->whereBetween('barang_masuk.tgl_brg_masuk', [$tgl_awal,$tgl_akhir])
                        ->get();
            $sum_total  = BarangMasuk::whereBetween('tgl_brg_masuk',[$tgl_awal, $tgl_akhir])
                        ->sum('total');
          }else{
            $brg_msk = BarangMasuk::join('barang', 'barang.id', '=', 'barang_masuk.id_barang')
            ->join('kategori', 'kategori.id', '=', 'barang.id_kategori')
            ->select('barang_masuk.*', 'kategori.nama_kategori', 'barang.harga', 'barang.nama_barang')
            ->get();
          }

        return view('admin.laporan.barang_masuk.cetak_lap_barang_masuk', compact('brg_msk','sum_total','tgl_awal','tgl_akhir'));
    }
    public function lap_barang_keluar()
    {
        $brg_klr = BarangKeluar::join('barang', 'barang.id', '=', 'barang_keluar.id_barang')
        ->join('kategori', 'kategori.id', '=', 'barang.id_kategori')
        ->select('barang_keluar.*', 'kategori.nama_kategori', 'barang.harga', 'barang.nama_barang')
        ->get();

        return view('admin.laporan.barang_keluar.lap_barang_keluar', compact('brg_klr'));

    }
    public function cetak_lap_barang_keluar(Request $request)
    {
        $tgl_awal = $request->tgl_awal;
        $tgl_akhir = $request->tgl_akhir;
      if($tgl_awal AND $tgl_akhir) {
          $brg_klr = BarangKeluar::join('barang', 'barang.id', '=', 'barang_keluar.id_barang')
          ->join('kategori', 'kategori.id', '=', 'barang.id_kategori')
          ->select('barang_keluar.*', 'kategori.nama_kategori', 'barang.harga', 'barang.nama_barang')
          ->whereBetween('barang_keluar.tgl_brg_keluar', [$tgl_awal,$tgl_akhir])
          ->get();
          $sum_total  = BarangKeluar::whereBetween('tgl_brg_keluar',[$tgl_awal, $tgl_akhir])
                      ->sum('total');
      }else{
          $brg_klr = BarangKeluar::join('barang', 'barang.id', '=', 'barang_keluar.id_barang')
          ->join('kategori', 'kategori.id', '=', 'barang.id_kategori')
          ->select('barang_keluar.*', 'kategori.nama_kategori', 'barang.harga', 'barang.nama_barang')
          ->get();
      }
      return view('admin.laporan.barang_keluar.cetak_lap_barang_keluar', compact('brg_klr','sum_total','tgl_awal','tgl_akhir'));
    }
}
