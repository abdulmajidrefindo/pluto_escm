<?php

namespace App\Http\Controllers;

use App\Models\Merek;
use App\Http\Requests\StoreMerekRequest;
use App\Http\Requests\UpdateMerekRequest;
use Yajra\DataTables\DataTables;
use Yajra\DataTables\Utilities\Request;

class MerekController extends Controller
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
        $validationData = $request->validate(
            [
                'nama_merek' => 'required',
                'keterangan' => 'required',
            ],
            [
                'nama_merek.required' => 'Nama merek harus diisi',
                'keterangan.required' => 'Keterangan harus diisi'
            ]
        );
        $merek = Merek::create([
            'nama_merek' => $request->get('nama_merek'),
            'keterangan' => $request->get('keterangan'),
        ]);
        if ($merek) {
            return response()->json(['success' => 'Data berhasil disimpan!']);
        } else {
            return response()->json(['errors' => 'Data gagal disimpan!']);
        }
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
        $id = $merek->id;
        $merek = Merek::find($id);
        return response()->json($merek);
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
        $validationData = $request->validate(
            [
                'nama_merek' => 'required',
                'keterangan' => 'required',
            ],
            [
                'nama_merek.required' => 'Nama merek harus diisi',
                'keterangan.required' => 'Keterangan harus diisi'
            ]
        );

        $merek->update([
            'nama_merek' => $request->get('nama_merek'),
            'keterangan' => $request->get('keterangan')
        ]);

        if ($merek) {
            return response()->json(['success' => 'Data berhasil disimpan!']);
        } else {
            return response()->json(['errors' => 'Data gagal disimpan!']);
        }
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
        return response()->json(['success' => 'Data berhasil dihapus!']);
    }

    public function getTable(Request $request)
    {
        if ($request->ajax()) {
            $data = Merek::all();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="'. route('merek.show', $row->id) .'" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Detail" class="btn btn-sm btn-success mx-1 shadow detail"><i class="fas fa-sm fa-fw fa-eye"></i> Detail</a>';
                    $btn .= '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="btn btn-sm btn-primary mx-1 shadow edit"><i class="fas fa-sm fa-fw fa-edit"></i> Edit</a>';
                    $btn .= '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-sm btn-danger mx-1 shadow delete"><i class="fas fa-sm fa-fw fa-trash"></i> Delete</a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    //get Produk with this merek
    public function getBarang(Request $request) {

        if ($request->ajax()) {

            $data = Merek::find($request->id)->barang;
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
