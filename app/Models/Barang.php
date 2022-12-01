<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $table = "barang";
    protected $fillable = ['produk_id','pemasok_id','sku','harga','total_terjual','total_masuk','total_stok','createdBy','updatedBy','createdAt','updatedAt'];
    public $timestamps = true;
}
