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