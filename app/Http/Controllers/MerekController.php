<?php

namespace App\Http\Controllers;

use App\Models\Merek;
use App\Http\Requests\StoreMerekRequest;
use App\Http\Requests\UpdateMerekRequest;

class MerekController extends Controller
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
     * @param  \App\Http\Requests\StoreMerekRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMerekRequest $request)
    {
        $merek = new Merek([
            'nama_merek' => $request->get('nama_merek'),
            'keterangan' => $request->get('keterangan'),
            'createdAt' => $request->get('createdAt'),
            'updatedAt' => $request->get('updatedAt')]);
        $merek->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Merek  $merek
     * @return \Illuminate\Http\Response
     */
    public function show(Merek $merek)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Merek  $merek
     * @return \Illuminate\Http\Response
     */
    public function edit(Merek $merek)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMerekRequest  $request
     * @param  \App\Models\Merek  $merek
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMerekRequest $request, Merek $merek)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Merek  $merek
     * @return \Illuminate\Http\Response
     */
    public function destroy(Merek $merek)
    {
        //
    }
}
