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

    public function barang()
    {
        return $this->hasMany(Barang::class);
    }

    public function transaksiPemasok()
    {
        return $this->belongsTo('App\Models\Pemasok', 'pemasok_id');
    }

}
