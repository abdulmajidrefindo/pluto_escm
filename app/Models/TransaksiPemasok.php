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

    public function transaksiBarangPemasok()
    {
        return $this->hasMany(TransaksiBarangPemasok::class);
    }

    public function pemasok()
    {
        return $this->belongsTo('App\Models\Pemasok', 'pemasok_id');
    }

}
