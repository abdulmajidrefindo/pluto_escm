<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiBarangPelanggan extends Model
{
    use HasFactory;
    protected $table = "transaksi_barang_pelanggan";

    public function transaksiPelanggan()
    {
        return $this->belongsTo(TransaksiPelanggan::class);
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
