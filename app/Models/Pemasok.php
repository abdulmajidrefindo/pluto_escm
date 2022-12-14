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


    public function transaksiPemasok()
    {
        return $this->hasMany(TransaksiPemasok::class);
    }

    public function barang() {
        return $this->hasMany(Barang::class);
    }

    //delete all child on delete
    public static function boot()
    {
        parent::boot();
        static::deleting(function($pemasok) {
            $pemasok->transaksiPemasok()->delete();
            //$pemasok->barang()->delete();
        });
    }




}
