<?php

namespace App\Http\Controllers;

use App\Models\TransaksiPemasok;
use App\Models\TransaksiPelanggan;
use App\Models\Pelanggan;
use App\Models\Barang;


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
        return view('home');
    }
}
