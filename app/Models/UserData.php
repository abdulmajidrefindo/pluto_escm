<?php

namespace App\Models;

use Carbon\Traits\Timestamp;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserData extends Model
{
    use HasFactory;

    use Timestamp;
    protected $table = 'users_data';
    protected $fillable = [
        'users_id',
        'nama_lengkap',
        'alamat',
        'no_telp',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir'
    ];
}
