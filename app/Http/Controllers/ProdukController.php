<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\KategoriProduk;
use App\Models\Produk;
use App\Models\Kategori;
use App\Http\Requests\StoreProdukRequest;
use App\Http\Requests\UpdateProdukRequest;
use Yajra\DataTables\DataTables;
use Yajra\DataTables\Utilities\Request;

class ProdukController extends Controller
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
        $produk = Produk::with('kategori')->get();
        $kategori = Kategori::all()->skip(1);
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
            'unit' => 'required|max:20',
            'keterangan' => 'nullable|max:100',

        ],
        [
            'nama_produk.required' => 'Nama produk harus diisi',
            'unit.required' => 'Unit satuan produk harus diisi',
            'unit.max' => 'Unit satuan produk maksimal 20 karakter',
            'keterangan.max' => 'Keterangan produk maksimal 100 karakter',


        ]);


        $produk = Produk::create([
            'nama_produk' => $request->get('nama_produk'),
            'unit' => $request->get('unit'),
            'jenis_produk' => $request->get('jenis_produk'),
            'keterangan' => $request->get('keterangan'),

        ]);

        //attach to kategori
        $kategori = $request->get('kategori_id');
        if($kategori){
            foreach($kategori as $k){
                $produk->kategori()->attach($k);
            }
        } else {
            $produk->kategori()->attach(1);
        }



        if($produk){
            return response()->json(['success' => 'Data berhasil disimpan!']);
        } else {
            return response()->json(['errors' => 'Data gagal disimpan!']);
        }
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
        $kategori = Kategori::all()->skip(1);
        //return response()->json($produk);
        return view('produk.show',compact('produk','kategori'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function edit(Produk $produk)
    {
        $id = $produk->id;
        //return json value for ajax
        $produk = Produk::with('kategori')->where('id',$id)->first();
        return response()->json($produk);

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
        $validationData = $request->validate([
            'nama_produk' => 'required',
            'unit' => 'required|max:20',
            'keterangan' => 'nullable|max:100',

        ],
        [
            'nama_produk.required' => 'Nama produk harus diisi',
            'unit.required' => 'Unit satuan produk harus diisi',
            'unit.max' => 'Unit satuan produk maksimal 20 karakter',
            'keterangan.max' => 'Keterangan produk maksimal 100 karakter',


        ]);


        //update
        $produk->update([
            'nama_produk' => $request->get('nama_produk'),
            'unit' => $request->get('unit'),
            'keterangan' => $request->get('keterangan'),

        ]);

        //attach to kategori
        $kategori = $request->get('kategori_id');
        if($kategori){
            $produk->kategori()->detach();
            foreach($kategori as $k){
                $produk->kategori()->attach($k);
            }
        } else {
            $produk->kategori()->attach(1);
        }



        if($produk){
            return response()->json(['success' => 'Data berhasil disimpan!']);
        } else {
            return response()->json(['errors' => 'Data gagal disimpan!']);
        }
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
                $btn = '<a href="'. route('produk.show', $row->id) .'" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Detail" class="btn btn-sm btn-success mx-1 shadow detail"><i class="fas fa-sm fa-fw fa-eye"></i> Detail</a>';
                $btn .= '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="btn btn-sm btn-primary mx-1 shadow edit"><i class="fas fa-sm fa-fw fa-edit"></i> Edit</a>';
                $btn .= '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-sm btn-danger mx-1 shadow delete"><i class="fas fa-sm fa-fw fa-trash"></i> Delete</a>';

                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
        }

    }

    //get barang with this produk
    public function getBarang(Request $request)
    {
        $id = $request->id;

        if ($request->ajax()) {
            $data = Barang::with('produk','merek','pemasok')->where('produk_id',$id)->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="'. route('barang.show', $row->id) .'" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Detail" class="btn btn-sm btn-success mx-1 shadow detail"><i class="fas fa-sm fa-fw fa-eye"></i> Detail</a>';
                    return $btn;
                })
                ->editColumn('created_at', function ($row) {
                    return $row->created_at->format('d-m-Y H:i:s');
                })
                ->editColumn('updated_at', function ($row) {
                    return $row->updated_at->format('d-m-Y H:i:s');
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

}
