<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BarangKeluar;
use App\Models\Departemen;
use App\Models\Lokasi;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class BarangKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $brg_klr = BarangKeluar::join('barang', 'barang.id', '=', 'barang_keluar.id_barang')
                 ->join('kategori', 'kategori.id', '=', 'barang.id_kategori')
                 ->join('pegawai', 'pegawai.id', '=', 'barang_keluar.id_pegawai')
                 ->join('lokasi', 'lokasi.id', '=', 'barang_keluar.id_lokasi')
                 ->join('departemen', 'departemen.id', '=', 'barang_keluar.id_departemen')
                 ->select('barang_keluar.*', 'kategori.nama_kategori', 'barang.harga', 'barang.nama_barang', 'pegawai.nama_pegawai', 'lokasi.nama_lokasi', 'departemen.nama_departemen')
                 ->get();
        $barang = Barang::all();
        $pegawai = Pegawai::all();
        $departemen = Departemen::all();
        $lokasi = Lokasi::all();


        return view('gudang.transaksi.barang_keluar.barang_keluar', compact('barang', 'brg_klr', 'pegawai', 'departemen', 'lokasi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $barang = Barang::all();
        $pegawai = Pegawai::all();
        $departemen = Departemen::all();
        $lokasi = Lokasi::all();
        $q = DB::table('barang_keluar')->select(DB::raw('MAX(RIGHT(no_barang_keluar,4)) as kode'));
        $kd="";
        if($q->count()>0)
        {
            foreach($q->get() as $k)
            {
                $tmp = ((int)$k->kode)+1;
                $kd = sprintf("%04s", $tmp);
            }
        }
        else
        {
            $kd = "0001";
        }

        return view('gudang.transaksi.barang_keluar.add', compact('barang','kd','pegawai', 'departemen', 'lokasi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $barang = Barang::find($request->id_barang);

        if ($barang->stok < $request->jml_brg_keluar) {
            return redirect('/barangkeluar/create')->with('success', 'data data melebihi stok');
        } else {

            BarangKeluar::create([
                'no_barang_keluar'  =>  $request->no_barang_keluar,
                'id_barang'         =>  $request->id_barang,
                'no_asset'          =>  $request->no_asset,
                'id_user'           =>  $request->id_user,
                'id_pegawai'        =>  $request->id_pegawai,
                'id_lokasi'         =>  $request->id_lokasi,
                'id_departemen'     =>  $request->id_departemen,
                'tgl_brg_keluar'    =>  $request->tgl_brg_keluar,
                'jml_brg_keluar'    =>  $request->jml_brg_keluar,
                'total'             =>  $request->total
            ]);


            $barang->stok -= $request->jml_brg_keluar;
            $barang->save();
            return redirect('/barangkeluar')->with('success', 'data berhasil disimpan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function ajax(Request $request)
    {
        $id_barang['id_barang'] = $request->id_barang;
        $ajax = Barang::where('id', $id_barang)->get();

        return view('gudang.transaksi.barang_keluar.ajax', compact('ajax'));
    }
}
