<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    protected $table = "produk";
    protected $fillable = ['nama_produk','keterangan'];
    public $timestamps = true;

    public function barang(): HasMany
    {
        return $this->hasMany(Barang::class);
    }

    public function kategoriProduk(): HasMany
    {
        return $this->hasMany(KategoriProduk::class);
    }

}
