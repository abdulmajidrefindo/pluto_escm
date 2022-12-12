<?php

namespace App\Http\Controllers;

use App\Models\TransaksiPemasok;
use App\Models\Pemasok;
use App\Models\Barang;

use App\Http\Requests\StoreTransaksiPemasokRequest;
use App\Http\Requests\UpdateTransaksiPemasokRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;
use Yajra\DataTables\Utilities\Request;

class TransaksiPemasokController extends Controller
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
        $transaksiPemasok = TransaksiPemasok::with('pemasok')->get();
        //return response()->json($transaksiPemasok);
        $pemasok = Pemasok::all('id', 'nama_pemasok');
        $barang = Barang::with('produk', 'merek')->get();
        return view('transaksiPemasok.index', compact('transaksiPemasok', 'pemasok', 'barang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pemasok = Pemasok::all();
        $barang = Barang::all();

        //return view('transaksiPemasok/create',compact('pemasok','barang'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTransaksiPemasokRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTransaksiPemasokRequest $request)
    {

        $validationData = Validator::make(
            $request->all(),
            [
                'pemasok_id' => 'required',
                'total_harga' => 'required',
            ],
            [
                'pemasok_id.required' => 'Pemasok harus diisi',
                'pemasok_id.numeric' => 'Masukkan pemasok dengan benar',
                'total_harga.required' => 'Harga harus diisi',
                'total_harga.numeric' => 'Harga harus berupa angka'
            ]
        );

        //jika ajax error
        if ($validationData->fails()) {
            return response()->json(['errors' => $validationData->errors()->all()]);
        }

        //insert data transaksi pemasok
        TransaksiPemasok::create([
            'pemasok_id' => $request->get('pemasok_id'),
            'total_harga' => $request->get('total_harga')
        ]);

        //insert data transaksi barang pemasok
        $transaksiPemasok = TransaksiPemasok::latest()->first();
        foreach ($request->get('data_barang') as $data) {
            $transaksiPemasok->barang()->attach($data['id'], ['users_id' => Auth::user()->id, 'kuantitas' => $data['kuantitas']]);
            Barang::find($data['id'])
                ->update([
                    'total_stok' => DB::raw('total_stok + ' . $data['kuantitas']),
                    'total_masuk' => DB::raw('total_masuk + ' . $data['kuantitas'])
                ]);
        }
        if($transaksiPemasok){
            return response()->json(['success' => 'Data berhasil disimpan!']);
        } else {
            return response()->json(['errors' => 'Data gagal disimpan!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TransaksiPemasok  $transaksiPemasok
     * @return \Illuminate\Http\Response
     */
    public function show(TransaksiPemasok $transaksiPemasok)
    {
        //untuk testing
        $id = $transaksiPemasok->id;
        $transaksiPemasok = TransaksiPemasok::with('barang')->where('id', $id)->first();
        //$barang = Barang::with('produk')->where('id',$id)->first();
        return response()->json($transaksiPemasok);
        //return view('transaksiPemasok.show', compact('transaksiPemasok'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TransaksiPemasok  $transaksiPemasok
     * @return \Illuminate\Http\Response
     */
    public function edit(TransaksiPemasok $transaksiPemasok)
    {
        $pemasok = Pemasok::all();
        $barang = Barang::with('produk', 'merek')->get();
        return view('transaksiPemasok.edit', compact('transaksiPemasok', 'pemasok', 'barang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTransaksiPemasokRequest  $request
     * @param  \App\Models\TransaksiPemasok  $transaksiPemasok
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTransaksiPemasokRequest $request, TransaksiPemasok $transaksiPemasok)
    {
        $validationData = $request->validate(
            [
                'pemasok_id' => 'numeric',
                'total_harga' => 'numeric'
            ],
            [
                'pemasok_id.numeric' => 'Masukkan pemasok dengan benar',
                'total_harga.numeric' => 'Harga harus berupa angka'
            ]
        );
        $transaksiPemasok->update([
            'pemasok_id' => $request->get('pemasok_id'),
            'total_harga' => $request->get('total_harga'),
            'created_at' => $request->get('created_at'),
            'updated_at' => $request->get('updated_at'),
        ]);
        $transaksiPemasok->pemasok_id = $request->pemasok_id;
        //return response()->json('Berhasil Diupdate');
        return redirect('/transaksiPemasok')->with('completed', 'Data berhasil Diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TransaksiPemasok  $transaksiPemasok
     * @return \Illuminate\Http\Response
     */
    public function destroy(TransaksiPemasok $transaksiPemasok)
    {
        //delete from ajax and return response
        $transaksiPemasok->delete();
        return response()->json(['success' => 'Data berhasil dihapus!']);


    }

    //get data transaksi pemasok for yajra datatable
    public function getTableTransaksiPemasok(Request $request){
        if($request->ajax()){
            $data = TransaksiPemasok::with('pemasok')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Detail" class="btn btn-sm btn-success mx-1 shadow detail"><i class="fas fa-sm fa-fw fa-eye"></i> Detail</a>';
                    $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="btn btn-sm btn-primary mx-1 shadow edit"><i class="fa fa-sm fa-fw fa-edit"></i> Edit</a>';
                    $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-sm btn-danger mx-1 shadow delete"><i class="fa fa-sm fa-fw fa-trash"></i> Hapus</a>';
                    return $btn;
                })
                ->editColumn('created_at', function($row){
                    return Carbon::parse($row->created_at)->format('d-m-Y H:i:s');
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }



}
