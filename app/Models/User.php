<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nama_user',
        'nomor_telepon',
        'email',
        'username',
        'password',
        'role_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
    public function transaksiPemasok()
    {
        return $this->belongsToMany(TransaksiPemasok::class, 'transaksi_barang_pemasok', 'id', 'transaksi_pemasok_id');
    }
    /*public function barang()
    {
        return $this->belongsToMany(Barang::class, 'transaksi_barang_pemasok', 'id', 'barang_id');
    }*/
    public function transaksiPelanggan()
    {
        return $this->belongsToMany(TransaksiPelanggan::class, 'transaksi_barang_pelanggan', 'id', 'transaksi_pelanggan_id');
    }
}
