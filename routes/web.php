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

Route::get('/', [HomeController::class, 'index'])->name('homo');

Route::get('/testing', function () {
    return view('test');
});

//route halaman about
route::get('/about', function () {
    return view('about');
});

// menentukan route untuk download file PDF
Route::get('download/pdf', function() {
    // menentukan path lokasi file PDF
    $file = public_path('doc/User Manual E-SCM Kedaireka.pdf');

    // mengirim file PDF ke browser untuk didownload
    return Response::download($file);
});

Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile.index');

Route::patch('/profile/{id}', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');

//Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/transaksi', [HomeController::class, 'transaksi'])->name('transaksi');

Route::get('/fetchBarang',[BarangController::class, 'fetchAll'])->name('barang.fetchAll');
Route::get('/fetchPelanggan',[PelangganController::class, 'fetchAll'])->name('pelanggan.fetchAll');
Route::get('/fetchPemasok',[PemasokController::class, 'fetchAll'])->name('pemasok.fetchAll');



Route::resource('barang', BarangController::class);
Route::resource('kategori', KategoriController::class);
Route::resource('merek', MerekController::class);
Route::resource('pelanggan', PelangganController::class);
Route::resource('pemasok', PemasokController::class);
Route::resource('produk', ProdukController::class);
Route::resource('transaksiPelanggan', TransaksiPelangganController::class);
Route::resource('transaksiPemasok', TransaksiPemasokController::class);

Route::get('/getTableTransaksiPemasok', [TransaksiPemasokController::class, 'getTable'])->name('transaksiPemasok.getTable');
Route::get('/getTableTransaksiPelanggan', [TransaksiPelangganController::class, 'getTable'])->name('transaksiPelanggan.getTable');
Route::get('/getTableBarang', [BarangController::class, 'getTable'])->name('barang.getTable');
Route::get('/getTablePelanggan', [PelangganController::class, 'getTable'])->name('pelanggan.getTable');
Route::get('/getTablePemasok', [PemasokController::class, 'getTable'])->name('pemasok.getTable');
Route::get('/getTableKategori', [KategoriController::class, 'getTable'])->name('kategori.getTable');
Route::get('/getTableMerek', [MerekController::class, 'getTable'])->name('merek.getTable');
Route::get('/getTableProduk', [ProdukController::class, 'getTable'])->name('produk.getTable');

Route::get('/barang/transaksiPelanggan/{id}', [BarangController::class, 'getTransaksiPelanggan'])->name('barang.getTransaksiPelanggan');
Route::get('/barang/transaksiPemasok/{id}', [BarangController::class, 'getTransaksiPemasok'])->name('barang.getTransaksiPemasok');



Route::get('/getTransaksiPemasokById/{id}', [TransaksiPemasokController::class, 'getById'])->name('transaksiPemasok.getById');
Route::get('/getTransaksiPelangganById/{id}', [TransaksiPelangganController::class, 'getById'])->name('transaksiPelanggan.getById');
Route::get('/getBarangById/{id}', [BarangController::class, 'getById'])->name('barang.getById');
Route::get('/getPelangganById/{id}', [PelangganController::class, 'getById'])->name('pelanggan.getById');
Route::get('/getPemasokById/{id}', [PemasokController::class, 'getById'])->name('pemasok.getById');
Route::get('/getKategoriById/{id}', [KategoriController::class, 'getById'])->name('kategori.getById');
Route::get('/getMerekById/{id}', [MerekController::class, 'getById'])->name('merek.getId');
Route::get('/getProdukById/{id}', [ProdukController::class, 'getById'])->name('produk.getById');


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

