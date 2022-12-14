<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransaksiBarangPelanggan extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "transaksi_barang_pelanggan";
    public $timestamps = true;

    //pivot table relation for barang
    public function barang()
    {
        return $this->belongsTo(Barang::class)->with('produk');
    }

    //pivot table relation for transaksi pelanggan
    public function transaksiPelanggan()
    {
        return $this->belongsTo(TransaksiPelanggan::class)->with('pelanggan');
    }

}
