<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Merek extends Model
{
    use HasFactory;
    protected $table = "merek";
    protected $fillable=['nama_merek','keterangan','createdAt','updatedAt'];

    /**
    * Get all of the comments for the Merek
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function barang(): HasMany
    {
        return $this->hasMany(Barang::class);
    }


}




