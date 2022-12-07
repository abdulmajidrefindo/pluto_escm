<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Produk;
use App\Models\Pemasok;
use App\Models\Merek;

use App\Http\Requests\StoreBarangRequest;
use App\Http\Requests\UpdateBarangRequest;

class BarangController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Menampilkan data barang
        //$barang = Barang::with('transaksiPemasok')->get();
        //$barang = Barang::with('pemasok')->get();
        //$barang = Barang::with('user')->get();
        $barang = Barang::with('produk','pemasok','merek')->get();
        $produk = Produk::all('id','nama_produk');
        $pemasok = Pemasok::all('id','nama_pemasok');
        $merek = Merek::all('id','nama_merek');
        //return response()->json($barang);
        return view('barang.index', compact('barang','produk','pemasok','merek'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('barang.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBarangRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBarangRequest $request)
    {
        $barang = Barang::create([
            'merek_id' => $request->get('merek_id'),
            'produk_id' => $request->get('produk_id'),
            'pemasok_id' => $request->get('pemasok_id'),
            'sku' => $request->get('sku'),
            'harga' => $request->get('harga'),
            'total_stok' => $request->get('total_stok'),
        ]);
        //return response()->json('Berhasih Disimpan');
        return redirect('/barang')->with('message', 'Data kategori berhasil tersimpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show(Barang $barang)
    {
        //Untuk Testing
        //return response()->json($barang);
        return view('barang.show', compact('barang'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit(Barang $barang)
    {
        return view('barang.edit', compact('barang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBarangRequest  $request
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBarangRequest $request, Barang $barang)
    {
        $barang->update([
            'merek_id' => $request->get('merek_id'),
            'produk_id' => $request->get('produk_id'),
            'pemasok_id' => $request->get('pemasok_id'),
            'sku' => $request->get('sku'),
            'harga' => $request->get('harga'),
            'total_terjual' => $request->get('total_terjual'),
            'total_masuk' => $request->get('total_masuk'),
            'total_stok' => $request->get('total_stok'),

        ]);
        //return response()->json("Berhasil Diupdate");
        return redirect('/barang')->with('completed', 'Data barang berhasil diperbaharui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Barang $barang)
    {
        $barang->delete();
        //return response()->json("Berhasil Dihapus");
        return redirect('/barang')->with('completed', 'Data barang berhasil dihapus!');
    }
}
