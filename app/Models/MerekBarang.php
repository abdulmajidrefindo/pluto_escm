<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MerekBarang extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "merek_barang";
}
