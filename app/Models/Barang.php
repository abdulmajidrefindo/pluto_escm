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


    public function merek()
    {
        return $this->belongsTo(Merek::class);
    }

    /**
     * Get all of the comments for the Barang
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pemasok()
    {
        return $this->hasMany(Pemasok::class, 'id', 'barang_id');
    }

    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }

    public function transaksiPemasok()
    {
        return $this->belongsToMany(TransaksiPemasok::class, 'transaksi_barang_pemasok','barang_id','transaksi_pemasok_id');
    }

    public function transaksiBarangPelanggan()
    {
        return $this->hasMany(TransaksiBarangPelanggan::class);
    }

}
