<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransaksiBarangPemasok extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "transaksi_barang_pemasok";
    public $timestamps = true;

    public function transaksiPemasok()
    {
        return $this->belongsTo(TransaksiPemasok::class)->with('pemasok');
    }

    public function barang()
    {
        return $this->belongsTo(Barang::class)->with('produk');
    }

}
