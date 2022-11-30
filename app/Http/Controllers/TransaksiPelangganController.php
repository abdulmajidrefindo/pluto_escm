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
        //
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
     * @param  \App\Http\Requests\StoreTransaksiPelangganRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTransaksiPelangganRequest $request)
    {
        $transaksiPelanggan = new TransaksiPelanggan([
            'pelanggan_id' => $request->get('pelanggan_id'),
            'total_harga' => $request->get('total_harga'),
            'createdAt' => $request->get('createdAt'),
            'updatedAt' => $request->get('updatedAt')]);
        $transaksiPelanggan->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TransaksiPelanggan  $transaksiPelanggan
     * @return \Illuminate\Http\Response
     */
    public function show(TransaksiPelanggan $transaksiPelanggan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TransaksiPelanggan  $transaksiPelanggan
     * @return \Illuminate\Http\Response
     */
    public function edit(TransaksiPelanggan $transaksiPelanggan)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TransaksiPelanggan  $transaksiPelanggan
     * @return \Illuminate\Http\Response
     */
    public function destroy(TransaksiPelanggan $transaksiPelanggan)
    {
        //
    }
}
