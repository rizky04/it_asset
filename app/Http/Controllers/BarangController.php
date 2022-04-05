<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Merk;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $barang = Barang::join('kategori', 'kategori.id','=','barang.id_kategori')
                ->join('merk', 'merk.id','=','barang.id_merk')
                ->select('barang.*', 'kategori.nama_kategori','merk.nama_merk')
                ->get();
        $kategori = Kategori::all();
        $merk = Merk::all();

        return view('admin.master.barang.barang', compact('barang', 'kategori', 'merk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        Barang::create([
            'id_kategori' => $request->id_kategori,
            'id_merk' => $request->id_merk,
            'nama_barang' => $request->nama_barang,
            'spek' => $request->spek,
            'harga' => $request->harga,
            'stok' => $request->stok,
        ]);

        return redirect('/barang')->with('success', 'data berhasil disimpan');
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

        $barang = Barang::find($id);

        $barang->id_kategori = $request->id_kategori;
        $barang->id_merk = $request->id_merk;
        $barang->nama_barang = $request->nama_barang;
        $barang->spek = $request->spek;
        $barang->harga = $request->harga;
        $barang->stok = $request->stok;

        $barang->save();

        return redirect('/barang')->with('success','data berhasil diupdate');

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
        $barang = Barang::find($id);

        $barang->delete();

        return redirect('/barang')->with('success','barang berhasil dihapus');
    }
}
