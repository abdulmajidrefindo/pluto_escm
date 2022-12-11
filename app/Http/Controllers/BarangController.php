<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Produk;
use App\Models\Pemasok;
use App\Models\Merek;

use App\Providers\RouteServiceProvider;
use App\Providers\SisaStokEvent;

use App\Http\Requests\StoreBarangRequest;
use App\Http\Requests\UpdateBarangRequest;

class BarangController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Menampilkan data barang
        //$barang = Barang::with('transaksiPemasok')->get();
        //$barang = Barang::with('pemasok')->get();
        //$barang = Barang::with('user')->get();
        $barang = Barang::with('produk','pemasok','merek')->get();
        $produk = Produk::all('id','nama_produk');
        $pemasok = Pemasok::all('id','nama_pemasok');
        $merek = Merek::all('id','nama_merek');
        //return response()->json($barang);
        return view('barang.index', compact('barang','produk','pemasok','merek'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('barang.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBarangRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBarangRequest $request)
    {
        $validationData = $request->validate([
            'merek_id' => 'required|numeric',
            'produk_id' => 'required|numeric',
            'pemasok_id' => 'required|numeric',
            'sku' => 'required|numeric',
            'harga' => 'required|numeric',
            'total_stok' => 'required|numeric'
        ],
        [
            'merek_id.required'=>'Merek harus diisi',
            'merek_id.numeric'=>'Masukkan merek dengan benar',
            'produk_id.required'=>'Produk harus diisi',
            'produk_id.numeric'=>'Masukkan produk dengan benar',
            'pemasok_id.required'=>'Pemasok harus diisi',
            'pemasok_id.numeric'=>'Masukkan pemasok dengan benar',
            'sku.required'=>'SKU harus diisi',
            'sku.numeric'=>'SKU harus berupa angka',
            'harga.required'=>'Harga harus diisi',
            'harga.numeric'=>'Harga harus berupa angka',
            'total_stok.required'=>'Stok harus diisi. Masukkan angka 0 jika tidak ada stok!',
            'total_stok.numeric'=>'Stok harus berupa angka'
        ]);
        $barang = Barang::create([
            'merek_id' => $request->get('merek_id'),
            'produk_id' => $request->get('produk_id'),
            'pemasok_id' => $request->get('pemasok_id'),
            'sku' => $request->get('sku'),
            'harga' => $request->get('harga'),
            'total_stok' => $request->get('total_stok')
        ]);
        //return response()->json('Berhasih Disimpan');
        return redirect('/barang')->with('message', 'Data kategori berhasil tersimpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show(Barang $barang)
    {
        //Untuk Testing
        $id = $barang->id;
        $barang = Barang::with('produk')->where('id',$id)->first();
        //return response()->json($barang);
        return view('barang.show', compact('barang'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit(Barang $barang)
    {
        return view('barang.edit', compact('barang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBarangRequest  $request
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBarangRequest $request, Barang $barang)
    {
        $validationData = $request->validate([
            'merek_id' => 'numeric',
            'produk_id' => 'numeric',
            'pemasok_id' => 'numeric',
            'sku' => 'numeric',
            'harga' => 'numeric',
            'total_stok' => 'numeric'
        ],
        [
            'merek_id.numeric'=>'Masukkan merek dengan benar',
            'produk_id.numeric'=>'Masukkan produk dengan benar',
            'pemasok_id.numeric'=>'Masukkan pemasok dengan benar',
            'sku.numeric'=>'SKU harus berupa angka',
            'harga.numeric'=>'Harga harus berupa angka',
            'total_stok.numeric'=>'Stok harus berupa angka'
        ]);
        $barang->update([
            'merek_id' => $request->get('merek_id'),
            'produk_id' => $request->get('produk_id'),
            'pemasok_id' => $request->get('pemasok_id'),
            'sku' => $request->get('sku'),
            'harga' => $request->get('harga'),
            'total_terjual' => $request->get('total_terjual'),
            'total_masuk' => $request->get('total_masuk'),
            'total_stok' => $request->get('total_stok'),

        ]);
        //return response()->json($barang->id);

        //Cek sisa stok barang, kalo tinggal dikit kirim notifikasi
        //event(new SisaStokEvent($barang->id,20));
        return redirect('/barang')->with('completed', 'Data barang berhasil diperbaharui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Barang $barang)
    {
        $barang->delete();
        //return response()->json("Berhasil Dihapus");
        return redirect('/barang')->with('completed', 'Data barang berhasil dihapus!');
    }

    //fetch semua barang
    public function fetchAllBarang()
    {
        $barang = Barang::with('produk','merek')->get();
        return response()->json($barang);
    }


}
