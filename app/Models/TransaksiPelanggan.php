<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiPelanggan extends Model
{
    use HasFactory;
    protected $table = "transaksi_pelanggan";
    protected $fillable = ['pelanggan_id','total_harga','createdAt','updatedAt'];
    public $timestamps = true;

    public function transaksiBarangPelanggan()
    {
        return $this->hasMany(TransaksiBarangPelanggan::class);
    }

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class);
    }
}
