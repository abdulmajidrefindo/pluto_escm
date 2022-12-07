<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Http\Requests\StorePelangganRequest;
use App\Http\Requests\UpdatePelangganRequest;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pelanggan=Pelanggan::with('transaksiPelanggan');
        //return response()->json($pelanggan);
        return view('pelanggan.index', compact('pelanggan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pelanggan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePelangganRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePelangganRequest $request)
    {
        $pelanggan=Pelanggan::create([
            'nama_pelanggan' => $request->get('nama_pelanggan'),
            'alamat_pelanggan' => $request->get('alamat_pelanggan'),
            'kontak_pelanggan' => $request->get('kontak_pelanggan'),
        ]);
        //return response()->json('Berhasil Disimpan');
        return redirect('/pelanggan')->with('message', 'Data pelanggan berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function show(Pelanggan $pelanggan)
    {
        //untuk testing
        return response()->json($pelanggan);
        //return view('pelanggan.index', compact('pelanggan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pelanggan $pelanggan)
    {
        return view('pelanggan.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePelangganRequest  $request
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePelangganRequest $request, Pelanggan $pelanggan)
    {
        $pelanggan->update([
            'nama_pelanggan' => $request->get('nama_pelanggan'),
            'alamat_pelanggan' => $request->get('alamat_pelanggan'),
            'kontak_pelanggan' => $request->get('kontak_pelanggan'),
        ]);
        return redirect('/pelanggan')->with('message', 'Data pelanggan berhasil diperbaharui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pelanggan $pelanggan)
    {
        $pelanggan->delete();
        //return response()->json('Berhasil Dihapus');
        return redirect('/pelanggan')->with('completed','Data berhasil dihapus!');
    }
}
