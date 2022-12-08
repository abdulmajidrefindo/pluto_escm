<?php

namespace App\Http\Controllers;

use App\Models\TransaksiPemasok;
use App\Models\TransaksiPelanggan;
use App\Models\Pelanggan;
use App\Models\Pemasok;
use App\Models\Barang;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        // Kombinasi dua tabel untuk mendapat data transaksi terbaru
        $transaksiPemasok = TransaksiPemasok::join('pemasok','transaksi_pemasok.pemasok_id','=','pemasok.id')
                                ->select(DB::raw('transaksi_pemasok.id,pemasok.nama_pemasok as nama,transaksi_pemasok.total_harga,transaksi_pemasok.created_at, "Masuk" as jenis_transaksi'));
        $transaksiPelanggan = TransaksiPelanggan::join('pelanggan','transaksi_pelanggan.pelanggan_id','=','pelanggan.id')
                                ->select(DB::raw('transaksi_pelanggan.id,pelanggan.nama_pelanggan as nama,transaksi_pelanggan.total_harga,transaksi_pelanggan.created_at, "Keluar" as jenis_transaksi'));
        $transaksiTerbaru = $transaksiPelanggan->unionAll($transaksiPemasok)->orderBy('created_at', 'desc')->take(7)->get();

        //Hitung jumlah data


        return response()->json($transaksiTerbaru);
        //return view('index');


    }
}
