<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiPemasok extends Model
{
    use HasFactory;
    protected $table = "transaksi_pemasok";
    protected $fillable = ['pemasok_id','kuantitas','createdAt','updatedAt'];
    public $timestamps = true;

    public function barang()
    {
        return $this->belongsToMany(Barang::class,'transaksi_barang_pemasok','transaksi_pemasok_id','barang_id');
    }

    public function pemasok()
    {
        return $this->hasMany('App\Models\Pemasok', 'pemasok_id');
    }
    public function user()
    {
        return $this->belongsToMany(User::class, 'transaksi_barang_pemasok', 'transaksi_pemasok_id', 'user_id');
    }
}
