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

    public function transaksiBarangPemasok(): hasMany
    {
        return $this->hasMany(TransaksiBarangPemasok::class);
    }

    public function pemasok(): BelongsTo
    {
        return $this->belongsTo(Pemasok::class);
    }

}
