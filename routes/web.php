<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\MerekController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PemasokController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\TransaksiPelangganController;
use App\Http\Controllers\TransaksiPemasokController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'home'])->name('homo');

Route::get('/testing', function () {
    return view('test');
});


//Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/transaksi', [HomeController::class, 'transaksi'])->name('transaksi');

Route::get('/fetchBarang',[BarangController::class, 'fetchAllBarang'])->name('fetchAllBarang');
Route::get('/fetchPelanggan',[PelangganController::class, 'fetchAllPelanggan'])->name('fetchAllPelanggan');
Route::get('/fetchPemasok',[PemasokController::class, 'fetchAllPemasok'])->name('fetchAllPemasok');



Route::resource('barang', BarangController::class);
Route::resource('kategori', KategoriController::class);
Route::resource('merek', MerekController::class);
Route::resource('pelanggan', PelangganController::class);
Route::resource('pemasok', PemasokController::class);
Route::resource('produk', ProdukController::class);
Route::resource('transaksiPelanggan', TransaksiPelangganController::class);
Route::resource('transaksiPemasok', TransaksiPemasokController::class);

Route::get('/getTableTransaksiPemasok', [TransaksiPemasokController::class, 'getTableTransaksiPemasok'])->name('transaksiPemasok.getTableTransaksiPemasok');
Route::get('/getTableTransaksiPelanggan', [TransaksiPelangganController::class, 'getTableTransaksiPelanggan'])->name('transaksiPelanggan.getTableTransaksiPelanggan');
Route::get('/getTableBarang', [BarangController::class, 'getTableBarang'])->name('barang.getTableBarang');
Route::get('/getTablePelanggan', [PelangganController::class, 'getTablePelanggan'])->name('pelanggan.getTablePelanggan');
Route::get('/getTablePemasok', [PemasokController::class, 'getTablePemasok'])->name('pemasok.getTablePemasok');
Route::get('/getTableKategori', [KategoriController::class, 'getTableKategori'])->name('kategori.getTableKategori');
Route::get('/getTableMerek', [MerekController::class, 'getTableMerek'])->name('merek.getTableMerek');
Route::get('/getTableProduk', [ProdukController::class, 'getTableProduk'])->name('produk.getTableProduk');



Route::get('/getTransaksiPemasokById/{id}', [TransaksiPemasokController::class, 'getTransaksiPemasokById'])->name('transaksiPemasok.getTransaksiPemasokById');
Route::get('/getTransaksiPelangganById/{id}', [TransaksiPelangganController::class, 'getTransaksiPelangganById'])->name('transaksiPelanggan.getTransaksiPelangganById');
Route::get('/getBarangById/{id}', [BarangController::class, 'getBarangById'])->name('barang.getBarangById');
Route::get('/getPelangganById/{id}', [PelangganController::class, 'getPelangganById'])->name('pelanggan.getPelangganById');
Route::get('/getPemasokById/{id}', [PemasokController::class, 'getPemasokById'])->name('pemasok.getPemasokById');
Route::get('/getKategoriById/{id}', [KategoriController::class, 'getKategoriById'])->name('kategori.getKategoriById');
Route::get('/getMerekById/{id}', [MerekController::class, 'getMerekById'])->name('merek.getMerekById');
Route::get('/getProdukById/{id}', [ProdukController::class, 'getProdukById'])->name('produk.getProdukById');


Route::get('users/{id}', function ($id) {
    return response()->json(['id'=>$id]);
});

Route::get('/token', function () {
    return csrf_token();
});




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin/profile', function(){
    return view('admin.profile');
});

