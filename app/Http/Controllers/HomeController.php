<?php

namespace App\Http\Controllers;


use App\Models\Produk;
use App\Models\TransaksiPemasok;
use App\Models\TransaksiPelanggan;
use App\Models\Pelanggan;
use App\Models\Pemasok;
use App\Models\Barang;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function home()
    {
        $informasi = array();
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
        return response()->json($informasi);
        //return view('index', compact('informasi', 'notifikasi'));

    }

    public function getPendapatanHarian()
    {
        //get start day a week before
        $start = Carbon::now()->subWeek()->addDay()->format('Y-m-d') . ' 00:00:01';
        //get today
        $end = Carbon::now()->format('Y-m-d') . ' 23:59:59';

        //mendapat total penjualan dalam rentang waktu seminggu
        $sales = TransaksiPelanggan::select(DB::raw('DATE(created_at) as date'), DB::raw('sum(total_harga) as total'))
            ->whereBetween('created_at', [$start, $end])
            ->groupBy('date')
            ->get()->pluck('total', 'date')->all();

        for($i = Carbon::now()->subWeek()->addDay(); $i <= Carbon::now(); $i->addDay()) {
            $date = $i->format('Y-m-d');
            if(!isset($sales[$date])) {
                $sales[$date] = 0;
            }
        }

        return response()->json($sales);

    }

    public function getPendapatanMingguan()
    {
        //get start day a month before
        $start = Carbon::now()->subMonth()->addDay()->format('Y-m-d') . ' 00:00:01';

        //get today
        $end = Carbon::now()->format('Y-m-d') . ' 23:59:59';

        //get weekly sales
        $sales = TransaksiPelanggan::select(DB::raw('WEEK(created_at) as week'), DB::raw('sum(total_harga) as total'))
            ->whereBetween('created_at', [$start, $end])
            ->groupBy('week')
            ->get()->pluck('total', 'week')->all();

        for($i = Carbon::now()->subMonth()->addDay(); $i <= Carbon::now(); $i->addWeek()) {
            $week = $i->weekOfYear;
            if(!isset($sales[$week])) {
                $sales[$week] = 0;
            }
        }


        return response()->json($sales);

    }

    public function getPendapatanBulanan()
    {
        //get start day a year before
        $start = Carbon::now()->subYear()->addDay()->format('Y-m-d') . ' 00:00:01';

        //get today
        $end = Carbon::now()->format('Y-m-d') . ' 23:59:59';

        //get monthly sales
        $sales = TransaksiPelanggan::select(DB::raw('MONTH(created_at) as month'), DB::raw('sum(total_harga) as total'))
            ->whereBetween('created_at', [$start, $end])
            ->groupBy('month')
            ->get()->pluck('total', 'month')->all();

        for($i = Carbon::now()->subYear()->addDay(); $i <= Carbon::now(); $i->addMonth()) {
            $month = $i->month;
            if(!isset($sales[$month])) {
                $sales[$month] = 0;
            }
        }

        return response()->json($sales);

    }

}
