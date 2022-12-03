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


    public function merek(): BelongsTo
    {
        return $this->belongsTo(Merek::class);
    }

    public function pemasok(): BelongsTo
    {
        return $this->belongsTo(Pelanggan::class);
    }

    public function produk(): BelongsTo
    {
        return $this->belongsTo(Produk::class);
    }

    public function transaksiBarangPemasok(): hasMany
    {
        return $this->hasMany(TransaksiBarangPemasok::class);
    }

    public function transaksiBarangPelanggan(): hasMany
    {
        return $this->hasMany(TransaksiBarangPelanggan::class);
    }

}
