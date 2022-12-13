<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Http\Requests\StoreKategoriRequest;
use App\Http\Requests\UpdateKategoriRequest;

class KategoriController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Menampilkan data kategori
        $kategori = Kategori::all()->skip(1);
        //return response()->json($kategori);
        return view('kategori.index', compact('kategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreKategoriRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreKategoriRequest $request, Kategori $kategori)
    {
        $validationData = $request->validate([
            'nama_kategori' => 'required',
            'keterangan' => 'required'
        ],
        [
            'nama_kategori.required' => 'Nama kategori harus diisi',
            'keterangan.required' => 'Keterangan'
        ]);
        $kategori->create([
            'nama_kategori' => $request->get('nama_kategori'),
            'keterangan' => $request->get('keterangan')
        ]);

        //return response()->json('Kesimpen');
        return redirect('kategori')->with('message', 'Data kategori berhasil tersimpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function show(Kategori $kategori)
    {
        //Untuk Testing
        //return response()->json($kategori);
        return view('kategori.show', compact('kategori'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function edit(Kategori $kategori)
    {
        return view('kategori.edit', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKategoriRequest  $request
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateKategoriRequest $request, Kategori $kategori)
    {
        $kategori->update([
            'nama_kategori'=>$request->get('nama_kategori'),
            'keterangan'=>$request->get('keterangan')
        ]);
        //return response()->json("Terupdate");
        return redirect('/kategori')->with('message', 'Data kategori berhasil diperbaharui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kategori $kategori)
    {
        $kategori->delete();
        //return response()->json("Terhapus");
        return redirect('/kategori')->with('message', 'Data kategori berhasil terhapus!');
    }


}
