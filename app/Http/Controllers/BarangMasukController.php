<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BarangMasuk;
use App\Models\Lokasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BarangMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $brg_msk = BarangMasuk::join('barang', 'barang.id', '=', 'barang_masuk.id_barang')
                 ->join('kategori', 'kategori.id', '=', 'barang.id_kategori')
                 ->join('lokasi', 'lokasi.id', '=', 'barang_masuk.id_lokasi')
                 ->select('barang_masuk.*', 'kategori.nama_kategori', 'barang.harga', 'barang.nama_barang', 'nama_lokasi')
                 ->get();
        $barang = Barang::all();
        $lokasi = Lokasi::all();

        return view('gudang.transaksi.barang_masuk.barang_masuk', compact('barang', 'brg_msk', 'lokasi'));
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
        $lokasi = Lokasi::all();



        $q = DB::table('barang_masuk')->select(DB::raw('MAX(RIGHT(no_barang_masuk,4)) as kode'));
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


        $k = DB::table('barang_masuk')->select(DB::raw('MAX(RIGHT(no_asset,4)) as kode'));
        $ko="";
        if($k->count()>0)
        {
            foreach($k->get() as $o)
            {
                $tmp = ((int)$o->kode)+1;
                $ko = sprintf("%04s", $tmp);
            }
        }
        else
        {
            $ko = "0001";
        }

        // return $kd;


        return view('gudang.transaksi.barang_masuk.add', compact('barang','kd', 'ko','lokasi'));
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
        BarangMasuk::create([
            'no_barang_masuk'   => $request->no_barang_masuk,
            'no_asset'          => $request->no_asset,
            'id_barang'         => $request->id_barang,
            'id_user'           => $request->id_user,
            'id_lokasi'         => $request->id_lokasi,
            'kodisi'            => $request->kodisi,
            'tgl_brg_masuk'     => $request->tgl_brg_masuk,
            'jml_brg_masuk'     => $request->jml_brg_masuk,
            'total'             => $request->total
        ]);


        $barang = Barang::find($request->id_barang);
        $barang->stok += $request->jml_brg_masuk;
        $barang->save();


        return redirect('/barangmasuk')->with('success', 'data berhasil ditambah');
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

        return view('gudang.transaksi.barang_masuk.ajax', compact('ajax'));
    }

}
