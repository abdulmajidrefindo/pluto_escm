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
        // Menampilkan data merek
        $merek = Merek::all();
        //return response()->json($merek);
        return view('merek.index', compact('merek'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('merek.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMerekRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMerekRequest $request)
    {
        $validationData = $request->validate([
            'nama_merek' => 'required',
            'keterangan' => 'required',
        ],
        [
            'nama_merek.required' => 'Nama merek harus diisi',
            'keterangan.required' => 'Keterangan harus diisi'
        ]);
        $merek = Merek::create([
            'nama_merek' => $request->get('nama_merek'),
            'keterangan' => $request->get('keterangan'),
            'createdAt' => $request->get('createdAt'),
            'updatedAt' => $request->get('updatedAt')
        ]);
        //return response()->json('Berhasil Disimpan');
        return redirect('/merek')->with('message', 'Data merek berhasil tersimpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Merek  $merek
     * @return \Illuminate\Http\Response
     */
    public function show(Merek $merek)
    {
        //untuk testing
        //return response()->json($merek);
        return view('merek.show', compact('merek'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Merek  $merek
     * @return \Illuminate\Http\Response
     */
    public function edit(Merek $merek)
    {
        return view('merek.edit', compact('merek'));
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
        $merek->update([
            'nama_merek' => $request->get('nama_merek'),
            'keterangan' => $request->get('keterangan')
        ]);
        return redirect('/merek')->with('message', 'Data merek berhasil diperbaharui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Merek  $merek
     * @return \Illuminate\Http\Response
     */
    public function destroy(Merek $merek)
    {
        $merek->delete();
        //return response()->json("Terhapus");
        return redirect('/merek')->with('message', 'Data merek berhasil terhapus!');
    }
}
