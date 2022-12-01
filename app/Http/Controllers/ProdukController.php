<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Http\Requests\StoreProdukRequest;
use App\Http\Requests\UpdateProdukRequest;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produk=Produk::all();
        return response()->json($produk);
        return view('produk.index',compact('produk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('produk.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProdukRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProdukRequest $request)
    {
        $produk = Produk::create([
            'nama_produk' => $request->get('nama_produk'),
            'unit' => $request->get('unit'),
            'keterangan' => $request->get('keterangan'),
            'createdAt' => $request->get('createdAt'),
            'updatedAt' => $request->get('updatedAt')
        ]);
        return response()->json('Berhasil Disimpan');
        return redirect('produk')->with('completed','Data berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function show(Produk $produk)
    {
        //untuk testing
        return response()->json($produk);
        return view('produk.show',compact('produk'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function edit(Produk $produk)
    {
        return view ('produk.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProdukRequest  $request
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProdukRequest $request, Produk $produk)
    {
        $produk->update([
            'nama_produk' => $request->get('nama_produk'),
            'unit' => $request->get('unit'),
            'keterangan' => $request->get('keterangan'),
            'createdAt' => $request->get('createdAt'),
            'updatedAt' => $request->get('updatedAt')
        ]);
        return response()->json('Berhasil Disimpan');
        return redirect('/produk')->with('completed','Data berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produk $produk)
    {
        $produk->delete();
        return response()->json('Berhasil Dihapus');
        return redirect('/produk')->with('completed','Data berhasil dihapus!');
    }
}
