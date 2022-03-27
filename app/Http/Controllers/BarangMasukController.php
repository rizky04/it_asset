<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BarangMasuk;
use Illuminate\Http\Request;

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
        $brg_msk   = BarangMasuk::join('barang', 'barang.id', '=', 'barang_masuk.id_barang')
                ->join('kategori', 'kategori.id', '=', 'barang.id_kategori')
                ->select('barang_masuk.*', 'kategori.nama_kategori', 'barang.harga', 'barang.nama_barang')
                ->get();
        $barang = Barang::all();

        return view('gudang.transaksi.barang_masuk.barang_masuk', compact('barang', 'brg_msk'));
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

        return view('gudang.transaksi.barang_masuk.add', compact('barang'));
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
            'id_barang'         => $request->id_barang,
            'id_user'           => $request->id_user,
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
