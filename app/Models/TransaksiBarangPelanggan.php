<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiBarangPelanggan extends Model
{
    use HasFactory;
    protected $table = "transaksi_barang_pelanggan";

    public function transaksiPelanggan(): BelongsTo
    {
        return $this->belongsTo(TransaksiPelanggan::class);
    }

    public function barang(): BelongsTo
    {
        return $this->belongsTo(Barang::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
