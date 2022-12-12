<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KategoriProduk extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'kategori_produk';
    protected $fillable = [
        'kategori_id',
        'produk_id'
    ];

}
