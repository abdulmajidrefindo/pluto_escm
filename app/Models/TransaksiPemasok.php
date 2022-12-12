<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransaksiPemasok extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "transaksi_pemasok";
    protected $fillable = ['pemasok_id','total_harga'];
    public $timestamps = true;

    public function barang()
    {
        return $this->belongsToMany(Barang::class,'transaksi_barang_pemasok')->with('produk','merek')->withPivot('kuantitas', 'total_harga', 'status_transaksi', 'created_at', 'updated_at');
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

    //delete with all relation to barang and update its stock
    public static function boot()
    {
        parent::boot();
        static::deleting(function ($transaksiPemasok) {
            foreach ($transaksiPemasok->barang as $barang) {
                $barang->update([
                    'total_stok' => $barang->total_stok - $barang->pivot->kuantitas,
                    'total_masuk' => $barang->total_masuk - $barang->pivot->kuantitas
                ]);
            }
            if($transaksiPemasok->forceDeleting){
                $transaksiPemasok->barang()->detach();
            }
        });

        static::updating(function ($transaksiPemasok) {
            foreach ($transaksiPemasok->barang as $barang) {
                $barang->update([
                    'total_stok' => $barang->total_stok - $barang->pivot->kuantitas,
                    'total_masuk' => $barang->total_masuk - $barang->pivot->kuantitas
                ]);
            }
        });





    }



}
