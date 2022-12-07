<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiPelanggan extends Model
{
    use HasFactory;
    protected $table = "transaksi_pelanggan";
    protected $fillable = ['pelanggan_id','total_harga','createdAt','updatedAt'];
    public $timestamps = true;

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class);
    }
    public function barang()
    {
        //return $this->belongsToMany(Barang::class, 'transaksi_barang_pelanggan','transaksi_pelanggan_id','barang_id')->with('produk')->withPivot('kuantitas');
        //sama hasilnya
        return $this->belongsToMany(Barang::class, 'transaksi_barang_pelanggan')->with('produk')->withPivot('kuantitas');

    }

    public function user()
    {
        return $this->belongsToMany(User::class, 'transaksi_barang_pelanggan', 'transaksi_pelanggan_id', 'user_id');
    }

}
