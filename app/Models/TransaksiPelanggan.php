<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransaksiPelanggan extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "transaksi_pelanggan";
    protected $fillable = ['pelanggan_id','total_harga'];
    public $timestamps = true;

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class);
    }
    public function barang()
    {
        //return $this->belongsToMany(Barang::class, 'transaksi_barang_pelanggan','transaksi_pelanggan_id','barang_id')->with('produk')->withPivot('total_harga');
        //sama hasilnya
        return $this->belongsToMany(Barang::class, 'transaksi_barang_pelanggan')->with('produk')->withPivot('kuantitas', 'total_harga', 'status_transaksi', 'created_at', 'updated_at');

    }

    public function user()
    {
        return $this->belongsToMany(User::class, 'transaksi_barang_pelanggan', 'transaksi_pelanggan_id', 'user_id');
    }

    public function transaksiBarangPelanggan()
    {
        return $this->hasMany(TransaksiBarangPelanggan::class);
    }


    //delete all related data on delete and update barang stock
    public static function boot()
    {
        parent::boot();
        static::deleting(function ($transaksiPelanggan) {
            foreach ($transaksiPelanggan->barang as $barang) {
                $barang->update([
                    'total_stok' => $barang->total_stok + $barang->pivot->kuantitas,
                    'total_terjual' => $barang->total_terjual - $barang->pivot->kuantitas
                ]);
            }

            if($transaksiPelanggan->forceDeleting){
                $transaksiPelanggan->barang()->detach();
            }

        });

        static::updating(function ($transaksiPelanggan) {
            foreach ($transaksiPelanggan->barang as $barang) {
                $barang->update([
                    'total_stok' => $barang->total_stok + $barang->pivot->kuantitas,
                    'total_terjual' => $barang->total_terjual - $barang->pivot->kuantitas
                ]);
            }
        });





    }

}
