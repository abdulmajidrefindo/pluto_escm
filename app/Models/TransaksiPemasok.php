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
}
