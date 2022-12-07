<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemasok extends Model
{
    use HasFactory;
    protected $table = "pemasok";
    protected $fillable = ['nama_pemasok','alamat_pemasok','kontak_pemasok','createdAt','updatedAt'];
    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo(Barang::class, 'barang_id', 'pemasok_id');
    }

    public function transaksiPemasok()
    {
        return $this->belongsTo(TransaksiPemasok::class,'transaksi_pemasok_id', 'pemasok_id');
    }

}
