<?php

namespace App\Http\Controllers;

use App\Models\TransaksiPemasok;
use App\Models\Pemasok;
use App\Http\Requests\StoreTransaksiPemasokRequest;
use App\Http\Requests\UpdateTransaksiPemasokRequest;

class TransaksiPemasokController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksiPemasok = TransaksiPemasok::with('pemasok')->get();
        $transaksiPemasok = TransaksiPemasok::with('barang')->get();
        $transaksiPemasok = TransaksiPemasok::with('user')->get();
        return response()->json($transaksiPemasok);
        return view('transaksiPemasok.index',compact('transaksiPemasok'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pemasok = Pemasok::all();
        return view('transaksiPemasok/create',compact('pemasok'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTransaksiPemasokRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTransaksiPemasokRequest $request)
    {
        $transaksiPemasok=TransaksiPemasok::create([
            'pemasok_id'=>$request->get('pemasok_id'),
            'kuantitas'=>$request->get('kuantitas'),
            'createdAt'=>$request->get('createdAt'),
            'updatedAt'=>$request->get('updatedAt')
        ]);
        $transaksiPemasok->pemasok_id = $request->pemasok_id;
        return response()->json('Berhasil Disimpan');
        return redirect('/transaksiPemasok')->with('completed','Data berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TransaksiPemasok  $transaksiPemasok
     * @return \Illuminate\Http\Response
     */
    public function show(TransaksiPemasok $transaksiPemasok)
    {
        //untuk testing
        return response()->json($transaksiPemasok);
        return view('transaksiPemasok.show', compact('transaksiPemasok'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TransaksiPemasok  $transaksiPemasok
     * @return \Illuminate\Http\Response
     */
    public function edit(TransaksiPemasok $transaksiPemasok)
    {
        $pemasok = Pemasok::all();
        return view('transaksiPemasok.edit',compact('transaksiPemasok','pemasok'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTransaksiPemasokRequest  $request
     * @param  \App\Models\TransaksiPemasok  $transaksiPemasok
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTransaksiPemasokRequest $request, TransaksiPemasok $transaksiPemasok)
    {
        $transaksiPemasok->update([
            'pemasok_id'=>$request->get('pemasok_id'),
            'kuantitas'=>$request->get('kuantitas'),
            'createdAt'=>$request->get('createdAt'),
            'updatedAt'=>$request->get('updatedAt')
        ]);
        $transaksiPemasok->pemasok_id = $request->pemasok_id;
        return response()->json('Berhasil Diupdate');
        return redirect('/transaksiPemasok')->with('completed','Data berhasil Diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TransaksiPemasok  $transaksiPemasok
     * @return \Illuminate\Http\Response
     */
    public function destroy(TransaksiPemasok $transaksiPemasok)
    {
        $transaksiPemasok->delete();
        return response()->json('Berhasil Dihapus');
        return redirect('/transaksiPemasok')->with('completed','Data berhasil dihapus!');
    }
}
