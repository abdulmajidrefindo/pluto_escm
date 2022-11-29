<?php

namespace App\Http\Controllers;

use App\Models\MerekBarang;
use App\Http\Requests\StoreMerekBarangRequest;
use App\Http\Requests\UpdateMerekBarangRequest;

class MerekBarangController extends Controller
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
     * @param  \App\Http\Requests\StoreMerekBarangRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMerekBarangRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MerekBarang  $merekBarang
     * @return \Illuminate\Http\Response
     */
    public function show(MerekBarang $merekBarang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MerekBarang  $merekBarang
     * @return \Illuminate\Http\Response
     */
    public function edit(MerekBarang $merekBarang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMerekBarangRequest  $request
     * @param  \App\Models\MerekBarang  $merekBarang
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMerekBarangRequest $request, MerekBarang $merekBarang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MerekBarang  $merekBarang
     * @return \Illuminate\Http\Response
     */
    public function destroy(MerekBarang $merekBarang)
    {
        //
    }
}
