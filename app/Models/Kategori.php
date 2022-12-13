<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kategori extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = "kategori";
    protected $fillable = ['nama_kategori','keterangan'];
    public $timestamps = true;

    public function produk()
    {
        return $this->belongsToMany(Produk::class,'kategori_produk');
    }

    //set produk kategori to default when deleted
    public static function boot()
    {
        parent::boot();
        static::deleting(function($kategori) {
            $kategori->produk()->update(['kategori_id' => 1]);
        });
    }
}

