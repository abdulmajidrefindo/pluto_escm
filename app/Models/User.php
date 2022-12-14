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
        'name',
        'email',
        'username',
        'password',
        'photo',
        'role_id'
    ];

    protected $attributes = [


    ];

    protected $table = 'users';


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
        return $this->belongsToMany(TransaksiPemasok::class, 'transaksi_barang_pemasok');
    }
    /*public function barang()
    {
        return $this->belongsToMany(Barang::class, 'transaksi_barang_pemasok', 'id', 'barang_id');
    }*/
    public function transaksiPelanggan()
    {
        return $this->belongsToMany(TransaksiPelanggan::class, 'transaksi_barang_pelanggan');
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    //has one user data
    public function userData()
    {
        return $this->hasOne(UserData::class, 'users_id', 'id');
    }

    //create user data when created
    public static function boot()
    {
        parent::boot();
        static::created(function ($user) {
            $user->userData()->create([
                'users_id' => $user->id,
                'nama_lengkap' => $user->name
            ]);

        });
    }

}
