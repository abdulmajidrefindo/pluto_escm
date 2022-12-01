<?php

namespace App\Http\Controllers;

use App\Models\Barang;
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
        $barang = Barang::all();
        return response()->json($barang);
        //return view('barang.index', compact('barang'))
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
            'produk_id' => $request->get('produk_id'),
            'pemasok_id' => $request->get('pemasok_id'),
            'sku' => $request->get('sku'),
            'harga' => $request->get('harga'),
            'total_terjual' => $request->get('total_terjual'),
            'total_masuk' => $request->get('total_masuk'),
            'total_stok' => $request->get('total_stok'),
            'createdBy' => $request->get('createdBy'),
            'updatedBy' => $request->get('updatedBy'),
            'createdAt' => $request->get('createdAt'),
            'updatedAt' => $request->get('updatedAt')
        ]);
        return response()->json('Berhasih Disimpan');
        //return redirect('/barang')->with('message', 'Data kategori berhasil tersimpan!');
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
        return response()->json($barang);
        //return view('barang.show', compact('barang'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit(Barang $barang)
    {
        return view('barang.edit');
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
            'produk_id' => $request->get('produk_id'),
            'pemasok_id' => $request->get('pemasok_id'),
            'sku' => $request->get('sku'),
            'harga' => $request->get('harga'),
            'total_terjual' => $request->get('total_terjual'),
            'total_masuk' => $request->get('total_masuk'),
            'total_stok' => $request->get('total_stok'),

        ]);
        return response()->json("Berhasil Diupdate");
        //return redirect('/barang')->with('completed', 'Data barang berhasil diperbaharui!');
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
        return response()->json("Berhasil Dihapus");
        //return redirect('/barang')->with('completed', 'Data barang berhasil dihapus!');
    }
}
