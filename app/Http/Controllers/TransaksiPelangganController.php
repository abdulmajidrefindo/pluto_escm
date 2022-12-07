<?php

namespace App\Http\Controllers;

use App\Models\TransaksiPelanggan;
use App\Http\Requests\StoreTransaksiPelangganRequest;
use App\Http\Requests\UpdateTransaksiPelangganRequest;

class TransaksiPelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksiPelanggan=TransaksiPelanggan::with('pelanggan')->get();
        $transaksiPelanggan=TransaksiPelanggan::with('barang')->get();
        return response()->json($transaksiPelanggan);
        return view('transaksiPelanggan.index',compact('transaksiPelangan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('transaksiPelanggan');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTransaksiPelangganRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTransaksiPelangganRequest $request)
    {
        $transaksiPelanggan = TransaksiPelanggan::create([
            'pelanggan_id' => $request->get('pelanggan_id'),
            'total_harga' => $request->get('total_harga'),
            'createdAt' => $request->get('createdAt'),
            'updatedAt' => $request->get('updatedAt')
        ]);
        return response()->json('Berhasil Disimpan');
        return redirect('transaksiPelangan')->with('completed','Data berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TransaksiPelanggan  $transaksiPelanggan
     * @return \Illuminate\Http\Response
     */
    public function show(TransaksiPelanggan $transaksiPelanggan)
    {
        //untuk testing
        return response()->json($transaksiPelanggan);
        return view('transaksiPelanggan.show',compact('transaksiPelanggan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TransaksiPelanggan  $transaksiPelanggan
     * @return \Illuminate\Http\Response
     */
    public function edit(TransaksiPelanggan $transaksiPelanggan)
    {
        return view('transaksiPelanggan.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTransaksiPelangganRequest  $request
     * @param  \App\Models\TransaksiPelanggan  $transaksiPelanggan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTransaksiPelangganRequest $request, TransaksiPelanggan $transaksiPelanggan)
    {
        $transaksiPelanggan->update([
            'pelanggan_id' => $request->get('pelanggan_id'),
            'total_harga' => $request->get('total_harga'),
            'createdAt' => $request->get('createdAt'),
            'updatedAt' => $request->get('updatedAt')
        ]);
        return response()->json('Berhasil diupdate');
        return redirect('/transaksiPelanggan')->with('completed','Data berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TransaksiPelanggan  $transaksiPelanggan
     * @return \Illuminate\Http\Response
     */
    public function destroy(TransaksiPelanggan $transaksiPelanggan)
    {
        $transaksiPelanggan->delete();
        return response()->json('Berhasil dihapus');
        return redirect('/transaksiPelanggan')->with('completed','Data berhasil dihapus!');
    }
}
