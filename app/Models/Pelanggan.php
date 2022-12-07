<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;
    protected $table = "pelanggan";
    protected $fillable = ['nama_pelanggan','alamat_pelanggan','kontak_pelanggan','createdAt','updatedAt'];
    public $timestamps = true;
    public function transaksiPelanggan()
    {
        return $this->belongsTo(TransaksiPelanggan::class, 'transaksi_pelanggan_id', 'pelanggan_id');
    }
}
