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
    public function pelanggan()
    {
        return $this->hasMany(Pelanggan::class, 'pelanggan_id', 'transaksi_pelanggan_id');
    }
}
