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
    protected $fillable = ['nama_produk', 'keterangan', 'unit'];
    public $timestamps = true;

    public function barang()
    {
        return $this->hasMany(Barang::class);
    }

    public function kategori(): BelongsToMany
    {
        return $this->belongsToMany(Kategori::class,'kategori_produk')->withPivot('jenis_produk');

    }
}
