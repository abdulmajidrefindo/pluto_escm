<?php

namespace App\Http\Controllers;

use App\Models\KategoriProduk;
use App\Http\Requests\StoreKategoriProdukRequest;
use App\Http\Requests\UpdateKategoriProdukRequest;

class KategoriProdukController extends Controller
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
     * @param  \App\Http\Requests\StoreKategoriProdukRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreKategoriProdukRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KategoriProduk  $kategoriProduk
     * @return \Illuminate\Http\Response
     */
    public function show(KategoriProduk $kategoriProduk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KategoriProduk  $kategoriProduk
     * @return \Illuminate\Http\Response
     */
    public function edit(KategoriProduk $kategoriProduk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKategoriProdukRequest  $request
     * @param  \App\Models\KategoriProduk  $kategoriProduk
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateKategoriProdukRequest $request, KategoriProduk $kategoriProduk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KategoriProduk  $kategoriProduk
     * @return \Illuminate\Http\Response
     */
    public function destroy(KategoriProduk $kategoriProduk)
    {
        //
    }
}
