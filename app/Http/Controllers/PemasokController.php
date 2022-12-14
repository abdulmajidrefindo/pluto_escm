<?php

namespace App\Http\Controllers;

use App\Models\Pemasok;
use App\Http\Requests\StorePemasokRequest;
use App\Http\Requests\UpdatePemasokRequest;
use Yajra\DataTables\DataTables;
use Yajra\DataTables\Utilities\Request;

class PemasokController extends Controller
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
        //$pemasok=Pemasok::with('user')->get();
        //$pemasok=Pemasok::with('transaksiPemasok');
        $pemasok = Pemasok::all();

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
        $validationData = $request->validate([
            'nama_pemasok' => 'required',
            'alamat_pemasok' => 'required',
            'kontak_pemasok' => 'required'
        ],
        [
            'nama_pemasok.required' => 'Nama pemasok harus diisi',
            'keterangan.required' => 'Keterangan harus diisi',
            'kontak_pemasok.required' => 'Kontak pemasok harus diisi'
        ]);
        $pemasok=Pemasok::create([
            'nama_pemasok' => $request->get('nama_pemasok'),
            'alamat_pemasok' => $request->get('alamat_pemasok'),
            'kontak_pemasok' => $request->get('kontak_pemasok'),
        ]);

        //return response()->json('Kesimpen');
        if ($pemasok) {
            return response()->json(['success' => 'Data berhasil disimpan!']);
        } else {
            return response()->json(['errors' => 'Data gagal disimpan!']);
        }
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
        $id = $pemasok->id;
        $pemasok = Pemasok::with('barang')->where('id', $id)->first();
        //return response()->json($pemasok);
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
        $id = $pemasok->id;
        $pemasok = Pemasok::find($id);
        return response()->json($pemasok);
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

        $validationData = $request->validate([
            'nama_pemasok' => 'required',
            'alamat_pemasok' => 'required',
            'kontak_pemasok' => 'required'
        ],
        [
            'nama_pemasok.required' => 'Nama pemasok harus diisi',
            'keterangan.required' => 'Keterangan harus diisi',
            'kontak_pemasok.required' => 'Kontak pemasok harus diisi'
        ]);


        $pemasok->update([
            'nama_pemasok' => $request->get('nama_pemasok'),
            'alamat_pemasok' => $request->get('alamat_pemasok'),
            'kontak_pemasok' => $request->get('kontak_pemasok'),
        ]);

        if ($pemasok) {
            return response()->json(['success' => 'Data berhasil disimpan!']);
        } else {
            return response()->json(['errors' => 'Data gagal disimpan!']);
        }
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

        return response()->json(['success' => 'Data berhasil dihapus!']);
    }

    public function getTable(Request $request){
        if ($request->ajax()) {
            $data = Pemasok::all();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="'. route('pemasok.show', $row->id) .'" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Detail" class="btn btn-sm btn-success mx-1 shadow detail"><i class="fas fa-sm fa-fw fa-eye"></i> Detail</a>';
                    $btn .= '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="btn btn-sm btn-primary mx-1 shadow edit"><i class="fas fa-sm fa-fw fa-edit"></i> Edit</a>';
                    $btn .= '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-sm btn-danger mx-1 shadow delete"><i class="fas fa-sm fa-fw fa-trash"></i> Delete</a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function getBarang(Request $request){
        if ($request->ajax()) {
            $id = $request->id;
            $data = Pemasok::with('barang')->where('id', $id)->first();
            return DataTables::of($data->barang)
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
