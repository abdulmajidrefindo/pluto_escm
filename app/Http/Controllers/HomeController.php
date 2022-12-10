<?php

namespace App\Http\Controllers;


use App\Helpers\PendapatanHelper;
use App\Models\Produk;
use App\Models\TransaksiPemasok;
use App\Models\TransaksiPelanggan;
use App\Models\Pelanggan;
use App\Models\Pemasok;
use App\Models\Barang;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Charts\SalesChart;

use Carbon\Carbon;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function home(SalesChart $chart)
    {
        $informasi = array();
        $pendapatanHelper = new PendapatanHelper();
        // Kombinasi dua tabel untuk mendapat data transaksi terbaru

        $transaksiPemasok = TransaksiPemasok::join('pemasok', 'transaksi_pemasok.pemasok_id', '=', 'pemasok.id')
            ->select(DB::raw('transaksi_pemasok.id,pemasok.nama_pemasok as nama,transaksi_pemasok.total_harga,transaksi_pemasok.created_at, "Masuk" as jenis_transaksi'));
        $transaksiPelanggan = TransaksiPelanggan::join('pelanggan', 'transaksi_pelanggan.pelanggan_id', '=', 'pelanggan.id')
            ->select(DB::raw('transaksi_pelanggan.id,pelanggan.nama_pelanggan as nama,transaksi_pelanggan.total_harga,transaksi_pelanggan.created_at, "Keluar" as jenis_transaksi'));
        $informasi['transaksi_terbaru'] = $transaksiPelanggan->unionAll($transaksiPemasok)->orderBy('created_at', 'desc')->take(7)->get();

        //Hitung jumlah data


        $informasi['total_user'] = User::all()->count();
        $informasi['total_barang'] = Barang::all()->count();
        $informasi['total_pemasok'] = Pemasok::all()->count();
        $informasi['total_pelanggan'] = Pelanggan::all()->count();
        $informasi['total_transaksi_pemasok'] = TransaksiPemasok::all()->count();
        $informasi['total_transaksi_pelanggan'] = TransaksiPelanggan::all()->count();
        $informasi['total_pengeluaran'] = TransaksiPemasok::all()->sum('total_harga');
        $informasi['total_pendapatan'] = TransaksiPelanggan::all()->sum('total_harga');

        //get top 5 produk terlaris
        $informasi['produk_terlaris'] = TransaksiPelanggan::join('transaksi_barang_pelanggan', 'transaksi_pelanggan.id', '=', 'transaksi_barang_pelanggan.transaksi_pelanggan_id')
            ->join('barang', 'transaksi_barang_pelanggan.barang_id', '=', 'barang.id')
            ->join('produk', 'barang.produk_id', '=', 'produk.id')
            ->join('pemasok', 'barang.pemasok_id', '=', 'pemasok.id')
            ->join('merek', 'barang.merek_id', '=', 'merek.id')
            ->select(DB::raw('barang.id, produk.nama_produk,merek.nama_merek, pemasok.nama_pemasok, sum(transaksi_barang_pelanggan.kuantitas) as total'))
            ->groupBy('barang.id', 'produk.nama_produk', 'nama_merek', 'pemasok.nama_pemasok')
            ->orderBy('total', 'desc')
            ->take(5)
            ->get();


        //notifikasi
        $notifikasi = auth()->user()->unreadNotifications;


        $grafik['harian'] = $chart->harian($pendapatanHelper->getPendapatanHarian(), $pendapatanHelper->getPendapatanHarian(true));
        $grafik['mingguan'] = $chart->mingguan($pendapatanHelper->getPendapatanMingguan(), $pendapatanHelper->getPendapatanMingguan(true));
        $grafik['bulanan'] = $chart->bulanan();
        //return response()->json($this->getPendapatanMingguan(true));
        return view('index', compact('informasi', 'notifikasi', 'grafik'));

    }


}
