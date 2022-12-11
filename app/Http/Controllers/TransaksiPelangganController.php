<?php

namespace App\Http\Controllers;

use App\Models\TransaksiPelanggan;
use App\Models\Pelanggan;
use App\Models\Barang;

use App\Http\Requests\StoreTransaksiPelangganRequest;
use App\Http\Requests\UpdateTransaksiPelangganRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class TransaksiPelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksiPelanggan = TransaksiPelanggan::with('pelanggan')->get();
        //return response()->json($transaksiPelanggan);
        $pelanggan = Pelanggan::all('id', 'nama_pelanggan');
        $barang = Barang::with('produk', 'merek')->get();
        return view('transaksiPelanggan.index', compact('transaksiPelanggan', 'pelanggan', 'barang'));
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

        //return view('transaksiPelanggan/create',compact('pelanggan','barang'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTransaksiPelangganRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTransaksiPelangganRequest $request)
    {

        $validationData = Validator::make(
            $request->all(),
            [
                'pelanggan_id' => 'required',
                'total_harga' => 'required',
            ],
            [
                'pelanggan_id.required' => 'Pelanggan harus diisi',
                'pelanggan_id.numeric' => 'Masukkan pelanggan dengan benar',
                'total_harga.required' => 'Harga harus diisi',
                'total_harga.numeric' => 'Harga harus berupa angka'
            ]
        );

        //jika ajax error
        if ($validationData->fails()) {
            return response()->json(['errors' => $validationData->errors()->all()]);
        }

        //insert data transaksi pelanggan
        TransaksiPelanggan::create([
            'pelanggan_id' => $request->get('pelanggan_id'),
            'total_harga' => $request->get('total_harga')
        ]);

        //insert data transaksi barang pelanggan
        $transaksiPelanggan = TransaksiPelanggan::latest()->first();
        foreach ($request->get('data_barang') as $data) {
            $transaksiPelanggan->barang()->attach($data['id'], ['users_id' => Auth::user()->id, 'kuantitas' => $data['kuantitas']]);
            DB::table('barang')->where('id', $data['id'])->update([
                'total_stok' => DB::raw('total_stok - ' . $data['kuantitas']),
                'total_terjual' => DB::raw('total_terjual + ' . $data['kuantitas'])
            ]);
        }

        if($transaksiPelanggan){
            return response()->json(['success' => 'Data berhasil disimpan!']);
        } else {
            return response()->json(['errors' => 'Data gagal disimpan!']);
        }








        //insert data transaksi pelanggan


        //return response()->json($validationData);
        //return redirect('/transaksiPelanggan')->with('completed','Data berhasil disimpan!');
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
        $transaksiPelanggan = TransaksiPelanggan::with('barang')->where('id', $id)->first();
        //$barang = Barang::with('produk')->where('id',$id)->first();
        return response()->json($transaksiPelanggan);
        //return view('transaksiPelanggan.show', compact('transaksiPelanggan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TransaksiPelanggan  $transaksiPelanggan
     * @return \Illuminate\Http\Response
     */
    public function edit(TransaksiPelanggan $transaksiPelanggan)
    {
        $pelanggan = Pelanggan::all();
        return view('transaksiPelanggan.edit', compact('transaksiPelanggan', 'pelanggan'));
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
        $validationData = $request->validate(
            [
                'pelanggan_id' => 'numeric',
                'total_harga' => 'numeric'
            ],
            [
                'pelanggan_id.numeric' => 'Masukkan pelanggan dengan benar',
                'total_harga.numeric' => 'Harga harus berupa angka'
            ]
        );
        $transaksiPelanggan->update([
            'pelanggan_id' => $request->get('pelanggan_id'),
            'total_harga' => $request->get('total_harga'),
            'created_at' => $request->get('created_at'),
            'updated_at' => $request->get('updated_at'),
        ]);
        $transaksiPelanggan->pelanggan_id = $request->pelanggan_id;
        //return response()->json('Berhasil Diupdate');
        return redirect('/transaksiPelanggan')->with('completed', 'Data berhasil Diupdate!');
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
        //return response()->json('Berhasil Dihapus');
        return redirect('/transaksiPelanggan')->with('completed', 'Data berhasil dihapus!');
    }

    //fetch barang
    public function fetchBarang(Request $request)
    {
        $id = $request->get('id');
        $barang = Barang::with('produk', 'merek')->where('id', $id)->first();
        return response()->json($barang);
    }
}
