<?php

namespace App\Http\Controllers;

use App\Models\Pemasok;
use App\Http\Requests\StorePemasokRequest;
use App\Http\Requests\UpdatePemasokRequest;

class PemasokController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pemasok=Pemasok::all();
        //return response()->json($pemasok);
        return view('pemasok.index',compact('pemasok'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pemasok.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePemasokRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePemasokRequest $request)
    {
        $pemasok=Pemasok::create([
            'nama_pemasok' => $request->get('nama_pemasok'),
            'alamat_pemasok' => $request->get('alamat_pemasok'),
            'kontak_pemasok' => $request->get('kontak_pemasok'),
        ]);
        //return response()->json('Berhasil Disimpan');
        return redirect('/pemasok')->with('completed','Data berhasil tersimpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pemasok  $pemasok
     * @return \Illuminate\Http\Response
     */
    public function show(Pemasok $pemasok)
    {
        //untuk testing
        return response()->json($pemasok);
        return view('pemasok.show',compact('pemasok'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pemasok  $pemasok
     * @return \Illuminate\Http\Response
     */
    public function edit(Pemasok $pemasok)
    {
        return view('pemasok.edit',compact('pemasok'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePemasokRequest  $request
     * @param  \App\Models\Pemasok  $pemasok
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePemasokRequest $request, Pemasok $pemasok)
    {
        $pemasok->update([
            'nama_pemasok' => $request->get('nama_pemasok'),
            'alamat_pemasok' => $request->get('alamat_pemasok'),
            'kontak_pemasok' => $request->get('kontak_pemasok'),
        ]);
        //return response()->json('Berhasil Diupdate');
        return redirect('/pemasok')->with('completed','Data berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pemasok  $pemasok
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pemasok $pemasok)
    {
        $pemasok->delete();
        //return response()->json('Berhasil Dihapur');
        return redirect('/pemasok')->with('completed','Data berhasil dihapus');
    }
}
