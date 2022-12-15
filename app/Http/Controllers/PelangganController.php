<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Http\Requests\StorePelangganRequest;
use App\Http\Requests\UpdatePelangganRequest;
use App\Models\TransaksiPelanggan;
use Yajra\DataTables\DataTables;
use Yajra\DataTables\Utilities\Request;

class PelangganController extends Controller
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
        $pelanggan=Pelanggan::with('transaksiPelanggan')->get();
        //return response()->json($pelanggan);
        return view('pelanggan.index', compact('pelanggan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pelanggan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePelangganRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePelangganRequest $request)
    {
        $validationData = $request->validate([
            'nama_pelanggan' => 'required',
            'alamat_pelanggan' => 'required',
            'kontak_pelanggan' => 'required'
        ],
        [
            'nama_pelanggan.required' => 'Nama pelanggan harus diisi',
            'keterangan.required' => 'Keterangan harus diisi',
            'kontak_pelanggan.required' => 'Kontak pelanggan harus diisi'
        ]);

        $pelanggan=Pelanggan::create([
            'nama_pelanggan' => $request->get('nama_pelanggan'),
            'alamat_pelanggan' => $request->get('alamat_pelanggan'),
            'kontak_pelanggan' => $request->get('kontak_pelanggan'),
        ]);
        //return response()->json('Berhasil Disimpan');
        //return response()->json('Kesimpen');
        if ($pelanggan) {
            return response()->json(['success' => 'Data berhasil disimpan!']);
        } else {
            return response()->json(['errors' => 'Data gagal disimpan!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function show(Pelanggan $pelanggan)
    {
        //untuk testing
        //return response()->json($pelanggan);
        return view('pelanggan.show', compact('pelanggan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pelanggan $pelanggan)
    {
        $id = $pelanggan->id;
        $pelanggan = Pelanggan::find($id);
        return response()->json($pelanggan);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePelangganRequest  $request
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePelangganRequest $request, Pelanggan $pelanggan)
    {

        $validationData = $request->validate([
            'nama_pelanggan' => 'required',
            'alamat_pelanggan' => 'required',
            'kontak_pelanggan' => 'required'
        ],
        [
            'nama_pelanggan.required' => 'Nama pelanggan harus diisi',
            'keterangan.required' => 'Keterangan harus diisi',
            'kontak_pelanggan.required' => 'Kontak pelanggan harus diisi'
        ]);

        $pelanggan->update([
            'nama_pelanggan' => $request->get('nama_pelanggan'),
            'alamat_pelanggan' => $request->get('alamat_pelanggan'),
            'kontak_pelanggan' => $request->get('kontak_pelanggan'),
        ]);

        if ($pelanggan) {
            return response()->json(['success' => 'Data berhasil disimpan!']);
        } else {
            return response()->json(['errors' => 'Data gagal disimpan!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pelanggan $pelanggan)
    {
        $pelanggan->delete();
        //return response()->json('Berhasil Dihapus');
        return response()->json(['success' => 'Data berhasil dihapus!']);
    }

    public function getTable(Request $request){
        if ($request->ajax()) {
            $data = Pelanggan::all();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="'. route('pelanggan.show', $row->id) .'" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Detail" class="btn btn-sm btn-success mx-1 shadow detail"><i class="fas fa-sm fa-fw fa-eye"></i> Detail</a>';
                    $btn .= '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="btn btn-sm btn-primary mx-1 shadow edit"><i class="fas fa-sm fa-fw fa-edit"></i> Edit</a>';
                    $btn .= '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-sm btn-danger mx-1 shadow delete"><i class="fas fa-sm fa-fw fa-trash"></i> Delete</a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function getTransaksi(Request $request){

        if ($request->ajax()) {
            $id = $request->id;
            $data = TransaksiPelanggan::with('pelanggan')->where('pelanggan_id', $id)->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="'. route('transaksiPelanggan.show', $row->id) .'" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Detail" class="btn btn-sm btn-success mx-1 shadow detail"><i class="fas fa-sm fa-fw fa-eye"></i> Detail</a>';


                    return $btn;
                })
                ->editColumn('total_harga', function ($row) {
                    return 'Rp. '. number_format($row->total_harga, 0, ',', '.');
                })
                ->editColumn('created_at', function ($row) {
                    return $row->created_at->format('d-m-Y H:i:s');
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

}
