<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pemasok extends Model
{
    use HasFactory, SoftDeletes;
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

    public function barang() {
        return $this->hasMany(Barang::class);
    }

    /**
     * Get all of the comments for the Pemasok
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class, 'foreign_key', 'local_key');
    }

}
