<?php

namespace App\Http\Controllers;

use App\Models\KategoriProduk;
use App\Models\Produk;
use App\Models\Kategori;
use App\Http\Requests\StoreProdukRequest;
use App\Http\Requests\UpdateProdukRequest;
use Yajra\DataTables\DataTables;
use Yajra\DataTables\Utilities\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produk = Produk::with('kategori')->get();
        $kategori = Kategori::all();
        //return response()->json($produk);
        return view('produk.index', compact('produk','kategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('produk.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProdukRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProdukRequest $request)
    {
        $validationData = $request->validate([
            'nama_produk' => 'required',
            'unit' => 'required',
            'keterangan' => 'required'
        ],
        [
            'nama_produk.required' => 'Nama pemasok harus diisi',
            'unit.required' => 'Keterangan harus diisi',
            'keterangan.required' => 'Kontak pemasok harus diisi'
        ]);
        $produk = Produk::create([
            'nama_produk' => $request->get('nama_produk'),
            'unit' => $request->get('unit'),
            'keterangan' => $request->get('keterangan'),
        ]);

        KategoriProduk::create([
            'kategori_id' => $request->get('kategori_id'),
            'produk_id' => $produk->id
        ]);
        //return response()->json('Berhasil Disimpan');
        return redirect('/produk')->with('completed','Data berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function show(Produk $produk)
    {
        //untuk testing
        $id = $produk->id;
        $produk = Produk::with('kategori')->where('id',$id)->first();
        //return response()->json($produk);
        return view('produk.show',compact('produk'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function edit(Produk $produk)
    {
        $kategori = Kategori::all();
        return view ('produk.edit',compact('produk','kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProdukRequest  $request
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProdukRequest $request, Produk $produk)
    {
        $produk->update([
            'nama_produk' => $request->get('nama_produk'),
            'unit' => $request->get('unit'),
            'keterangan' => $request->get('keterangan'),
        ]);
        //return response()->json('Berhasil Disimpan');
        return redirect('/produk')->with('completed','Data berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produk $produk)
    {
        $produk->delete();
        //return response()->json('Berhasil Dihapus');
        return response()->json(['success' => 'Data berhasil dihapus!']);
    }

    public function getTable(Request $request)
    {
        if($request->ajax()){
            $data = Produk::with('kategori')->get();
            return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $btn = '<a href="'. route('barang.show', $row->id) .'" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Detail" class="btn btn-sm btn-success mx-1 shadow detail"><i class="fas fa-sm fa-fw fa-eye"></i> Detail</a>';
                $btn .= '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="btn btn-sm btn-primary mx-1 shadow edit"><i class="fas fa-sm fa-fw fa-edit"></i> Edit</a>';
                $btn .= '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-sm btn-danger mx-1 shadow delete"><i class="fas fa-sm fa-fw fa-trash"></i> Delete</a>';

                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
        }

    }
}
