<?php

namespace App\Http\Controllers;

use App\Models\TransaksiPelanggan;
use App\Models\Pelanggan;
use App\Models\Barang;

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
        //return response()->json($transaksiPelanggan);
        $pelanggan = Pelanggan::all('id','nama_pelanggan');
        return view('transaksiPelanggan.index',compact('transaksiPelanggan', 'pelanggan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pelanggan = Pelanggan::all();
        $barang = Barang::all();
        return view('transaksiPelanggan', compact('pelanggan','barang'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTransaksiPelangganRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTransaksiPelangganRequest $request)
    {
        $validationData = $request->validate([
            'pelanggan_id' => 'required|numeric',
            'total_harga' => 'required|numeric'
        ],
        [
            'pelanggan_id.required' => 'Pelanggan harus diisi',
            'pelanggan_id.numeric' => 'Masukkan pelanggan dengan benar',
            'total_harga.required' => 'Harga harus diisi',
            'total_harga.numeric' => 'Harga harus berupa angka'
        ]);
        $transaksiPelanggan = TransaksiPelanggan::create([
            'pelanggan_id' => $request->get('pelanggan_id'),
            'total_harga' => $request->get('total_harga'),

        ]);
        //return response()->json('Berhasil Disimpan');
        return redirect('transaksiPelanggan')->with('completed','Data berhasil disimpan!');
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
        $id = $transaksiPelanggan->id;
        $transaksiPelanggan = TransaksiPelanggan::with('barang')->where('id',$id)->first();
        return response()->json($transaksiPelanggan);
        //return view('transaksiPelanggan.show',compact('transaksiPelanggan'));
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
        $validationData = $request->validate([
            'pelanggan_id' => 'numeric',
            'total_harga' => 'numeric'
        ],
        [
            'pelanggan_id.numeric' => 'Masukkan pelanggan dengan benar',
            'total_harga.numeric' => 'Harga harus berupa angka'
        ]);
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
