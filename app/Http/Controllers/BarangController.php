<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Produk;
use App\Models\Pemasok;
use App\Models\Merek;

use App\Models\TransaksiBarangPelanggan;
use App\Models\TransaksiBarangPemasok;
use App\Models\TransaksiPelanggan;
use App\Providers\RouteServiceProvider;
use App\Providers\SisaStokEvent;

use App\Http\Requests\StoreBarangRequest;
use App\Http\Requests\UpdateBarangRequest;
use Yajra\DataTables\DataTables;
use Yajra\DataTables\Utilities\Request;

class BarangController extends Controller
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
        // Menampilkan data barang
        //$barang = Barang::with('transaksiPemasok')->get();
        //$barang = Barang::with('pemasok')->get();
        //$barang = Barang::with('user')->get();
        $barang = Barang::with('produk', 'pemasok', 'merek')->get();
        $produk = Produk::all('id', 'nama_produk');
        $pemasok = Pemasok::all('id', 'nama_pemasok');
        $merek = Merek::all('id', 'nama_merek');

        return view('barang.index', compact('barang', 'produk', 'pemasok', 'merek'));
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
        $validationData = $request->validate(
            [
                'merek_id' => 'required|numeric',
                'produk_id' => 'required|numeric',
                'pemasok_id' => 'required|numeric',
                'sku' => 'required|numeric',
                'harga' => 'required|numeric',
                'total_stok' => 'required|numeric'
            ],
            [
                'merek_id.required' => 'Merek harus diisi',
                'merek_id.numeric' => 'Masukkan merek dengan benar',
                'produk_id.required' => 'Produk harus diisi',
                'produk_id.numeric' => 'Masukkan produk dengan benar',
                'pemasok_id.required' => 'Pemasok harus diisi',
                'pemasok_id.numeric' => 'Masukkan pemasok dengan benar',
                'sku.required' => 'SKU harus diisi',
                'sku.numeric' => 'SKU harus berupa angka',
                'harga.required' => 'Harga harus diisi',
                'harga.numeric' => 'Harga harus berupa angka',
                'total_stok.required' => 'Stok harus diisi. Masukkan angka 0 jika tidak ada stok!',
                'total_stok.numeric' => 'Stok harus berupa angka'
            ]
        );
        $barang = Barang::create([
            'merek_id' => $request->get('merek_id'),
            'produk_id' => $request->get('produk_id'),
            'pemasok_id' => $request->get('pemasok_id'),
            'sku' => $request->get('sku'),
            'harga' => $request->get('harga'),
            'total_stok' => $request->get('total_stok')
        ]);

        if($barang){
            return response()->json(['success' => 'Data berhasil disimpan!']);
        } else {
            return response()->json(['errors' => 'Data gagal disimpan!']);
        }
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
        $barang = Barang::with('produk','merek','pemasok')->where('id', $id)->first();

        $informasi = [];

        //check if have relation with transaksi
        if($barang->transaksiPemasok->count() > 0){
            $informasi['pengeluaran'] = $barang->transaksiPemasok->sum('total_harga');
        } else {
            $informasi['pengeluaran'] = 0;
        }

        //check if have relation with pelanggan
        if($barang->transaksiPelanggan->count() > 0){
            $informasi['pemasukan'] = $barang->transaksiPelanggan->sum('total_harga');
        } else {
            $informasi['pemasukan'] = 0;
        }


        //return response()->json($barang);
        return view('barang.show', compact('barang', 'informasi'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit(Barang $barang)
    {

        if(request()->ajax()){
            $data = Barang::with('produk', 'pemasok', 'merek')->where('id', $barang->id)->first();
            return response()->json($data);
        }

        $merek = Merek::all('id','nama_merek');
        $produk = Produk::all('id','nama_produk');
        $pemasok = Pemasok::all('id','nama_pemasok');
        return view('barang.edit', compact('barang', 'merek', 'produk', 'pemasok'));
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
        $validationData = $request->validate(
            [
                'merek_id' => 'required|numeric',
                'produk_id' => 'required|numeric',
                'pemasok_id' => 'required|numeric',
                'harga' => 'required|numeric',
                'sku' => 'required|numeric',
                'total_stok' => 'required|numeric',
                'total_terjual' => 'required|numeric',
                'total_masuk' => 'required|numeric'
            ],
            [
                'merek_id.required' => 'Merek harus diisi',
                'merek_id.numeric' => 'Masukkan merek dengan benar',
                'produk_id.required' => 'Produk harus diisi',
                'produk_id.numeric' => 'Masukkan produk dengan benar',
                'pemasok_id.required' => 'Pemasok harus diisi',
                'pemasok_id.numeric' => 'Masukkan pemasok dengan benar',
                'sku.required' => 'SKU harus diisi',
                'sku.numeric' => 'SKU harus berupa angka',
                'harga.required' => 'Harga harus diisi',
                'harga.numeric' => 'Harga harus berupa angka',
                'total_terjual.required' => 'Total Terjual harus diisi. Masukkan angka 0 jika tidak ada!',
                'total_terjual.numeric' => 'Total Terjual harus berupa angka',
                'total_masuk.required' => 'Total Masuk harus diisi. Masukkan angka 0 jika tidak ada!',
                'total_masuk.numeric' => 'Total Masuk harus berupa angka',
                'total_stok.required' => 'Stok harus diisi. Masukkan angka 0 jika tidak ada stok!',
                'total_stok.numeric' => 'Stok harus berupa angka'

            ]
        );
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

        //return jsone if success
        if($barang){
            return response()->json(['success' => 'Data berhasil diupdate!']);
        } else {
            return response()->json(['errors' => 'Data gagal diupdate!']);
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Barang $barang)
    {
        $barang = $barang->delete();
        //return message for ajax
        return response()->json(['success' => 'Data berhasil dihapus!']);



    }

    //fetch semua barang
    public function fetchAll()
    {
        $barang = Barang::with('produk', 'merek')->get();
        return response()->json($barang);
    }

    public function getTable(Request $request)
    {
        if ($request->ajax()) {
            $barang = Barang::with('produk', 'merek','pemasok')->get();
            return DataTables::of($barang)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="'. route('barang.show', $row->id) .'" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Detail" class="btn btn-sm btn-success mx-1 shadow detail"><i class="fas fa-sm fa-fw fa-eye"></i> Detail</a>';
                    $btn .= '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="btn btn-sm btn-primary mx-1 shadow edit"><i class="fas fa-sm fa-fw fa-edit"></i> Edit</a>';
                    $btn .= '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-sm btn-danger mx-1 shadow delete"><i class="fas fa-sm fa-fw fa-trash"></i> Delete</a>';

                    return $btn;
                })
                ->editColumn('harga', function ($row) {
                    return 'Rp. ' . number_format($row->harga, 0, ',', '.');
                })

                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function getBarangById($id)
    {
        if (request()->ajax()) {
            $barang = Barang::with('produk', 'merek', 'pemasok')->where('id', $id)->first();
            return response()->json($barang);
        }
    }

    //get tabel transaksi pelanggan
    public function getTransaksiPelanggan(Request $request)
    {
        $id = $request->id;
        $transaksi = TransaksiBarangPelanggan::with('transaksiPelanggan', 'barang')->where('barang_id', $id)->get();

        if ($request->ajax()) {
            return DataTables::of($transaksi)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="'. route('transaksiPelanggan.show', $row->transaksiPelanggan->id) .'" data-toggle="tooltip"  data-id="' . $row->transaksiPelanggan->id . '" data-original-title="Detail" class="btn btn-sm btn-success mx-1 shadow detail"><i class="fas fa-sm fa-fw fa-eye"></i> Detail</a>';
                    return $btn;
                })
                ->editColumn('total_harga', function ($row) {
                    return 'Rp. ' . number_format($row->total_harga, 0, ',', '.');
                })
                ->editColumn('created_at', function ($row) {
                    return $row->created_at->format('d-m-Y H:i:s');
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return response()->json($transaksi);
    }

    //get tabel transaksi pemasok
    public function getTransaksiPemasok(Request $request)
    {
        $id = $request->id;
        $transaksi = TransaksiBarangPemasok::with('transaksiPemasok', 'barang')->where('barang_id', $id)->get();

        if ($request->ajax()) {
            return DataTables::of($transaksi)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="' . route('transaksiPemasok.show', $row->transaksiPemasok->id) . '" data-toggle="tooltip"  data-id="' . $row->transaksiPemasok->id . '" data-original-title="Detail" class="btn btn-sm btn-success mx-1 shadow detail"><i class="fas fa-sm fa-fw fa-eye"></i> Detail</a>';
                    return $btn;
                })
                ->editColumn('total_harga', function ($row) {
                    return 'Rp. ' . number_format($row->total_harga, 0, ',', '.');
                })
                ->editColumn('created_at', function ($row) {
                    return $row->created_at->format('d-m-Y H:i:s');
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return response()->json($transaksi);
    }








}
