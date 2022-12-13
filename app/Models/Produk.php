<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produk extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "produk";
    protected $fillable = ['nama_produk', 'keterangan', 'unit','jenis_produk'];
    public $timestamps = true;

    //default value for keterangan if null
    protected $attributes = [
        'keterangan' => 'Tidak ada keterangan',
        'jenis_produk' => 'Bahan Jadi'
    ];

    public function barang()
    {
        return $this->hasMany(Barang::class);
    }

    public function kategori(): BelongsToMany
    {
        return $this->belongsToMany(Kategori::class,'kategori_produk');

    }

    //on deleted set barang
    public static function boot()
    {
        parent::boot();
        static::deleting(function($produk) {
            $produk->barang()->delete();
        });
    }

    //on restored

}
