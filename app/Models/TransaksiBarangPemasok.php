<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiBarangPemasok extends Model
{
    use HasFactory;
    protected $table = "transaksi_barang_pemasok";

    public function transaksiPemasok()
    {
        return $this->belongsTo(TransaksiPemasok::class);
    }

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
