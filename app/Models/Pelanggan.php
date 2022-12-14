<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pelanggan extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "pelanggan";
    protected $fillable = ['nama_pelanggan','alamat_pelanggan','kontak_pelanggan','createdAt','updatedAt'];
    public $timestamps = true;
    public function transaksiPelanggan()
    {
        return $this->hasMany(TransaksiPelanggan::class);
    }

    //delete all child on delete
    public static function boot()
    {
        parent::boot();
        static::deleting(function($pelanggan) {
            $pelanggan->transaksiPelanggan()->delete();
        });
    }
}
