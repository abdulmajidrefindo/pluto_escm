<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    protected $table = "produk";
    protected $fillable = ['nama_produk','keterangan','unit'];
    public $timestamps = true;

    public function barang()
    {
        return $this->hasMany(Barang::class);
    }

    public function kategori()
    {
        return $this->belongsToMany(Kategori::class,'kategori_produk','kategori_id','produk_id');
    }
}
