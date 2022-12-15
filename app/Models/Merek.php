<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Merek extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = "merek";
    protected $fillable=['nama_merek','keterangan'];

    //set default for keterangan
    protected $attributes = [
        'keterangan' => 'Tidak ada keterangan',
    ];

    /**
    * Get all of the comments for the Merek
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function barang()
    {
        return $this->hasMany(Barang::class)->with('produk','pemasok');
    }


}




