<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $table = "barang";
    protected $fillable = ["merek_id", 'produk_id','pemasok_id','sku','harga','total_terjual','total_masuk','total_stok','createdBy','updatedBy','createdAt','updatedAt'];
    public $timestamps = true;

    protected $attributes = [

        'total_terjual' => '0',
        'total_masuk' => '0',

    ];


    public function merek()
    {
        return $this->belongsTo(Merek::class);
    }


    public function pemasok()
    {
        return $this->belongsTo(Pemasok::class);
    }

    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }

    public function transaksiPemasok()
    {
        return $this->belongsToMany(TransaksiPemasok::class, 'transaksi_barang_pemasok','id','transaksi_pemasok_id');
    }

    public function transaksiPelanggan()
    {
        return $this->belongsToMany(TransaksiPelanggan::class, 'transaksi_barang_pelanggan', 'id', 'transaksi_pelanggan_id');
    }
    /*public function user()
    {
        return $this->belongsToMany(User::class, 'transaksi_barang_pemasok', 'id', 'user_id');
    }*/


}
