<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiPemasok extends Model
{
    use HasFactory;
    protected $table = "transaksi_pemasok";
    protected $fillable = ['pemasok_id','total_harga','createdAt','updatedAt'];
    public $timestamps = true;

    public function barang()
    {
        return $this->belongsToMany(Barang::class,'transaksi_barang_pemasok')->with('produk')->withPivot('kuantitas');
        //return $this->belongsToMany(Barang::class,'transaksi_barang_pemasok','transaksi_pemasok_id','barang_id')->with('produk')->withPivot('kuantitas');
    }



    public function pemasok()
    {
        return $this->belongsTo(Pemasok::class);
    }


    public function user()
    {
        return $this->belongsToMany(User::class, 'transaksi_barang_pemasok', 'transaksi_pemasok_id', 'user_id');
    }
}
