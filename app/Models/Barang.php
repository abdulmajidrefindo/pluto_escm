<?php

namespace App\Models;

use Log;

use App\Providers\SisaStokEvent;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Barang extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "barang";
    protected $fillable = ["merek_id", 'produk_id', 'pemasok_id', 'sku', 'harga', 'total_terjual', 'total_masuk', 'total_stok', 'createdBy', 'updatedBy', 'createdAt', 'updatedAt'];
    public $timestamps = true;


    protected $attributes = [
        'total_terjual' => '0',
        'total_masuk' => '0',

    ];

    public function merek()
    {
        return $this->belongsTo(Merek::class)->withDefault([
            'nama_merek' => 'Merek tidak ditemukan'
        ]);
    }


    public function pemasok()
    {
        return $this->belongsTo(Pemasok::class)->withDefault([
            'nama_pemasok' => 'Pemasok tidak ditemukan'
        ]);
    }

    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }

    public function transaksiPemasok()
    {
        return $this->belongsToMany(TransaksiPemasok::class, 'transaksi_barang_pemasok')->with('pemasok')->withPivot('kuantitas', 'total_harga', 'status_transaksi', 'created_at', 'updated_at');
    }

    public function transaksiPelanggan()
    {
        return $this->belongsToMany(TransaksiPelanggan::class, 'transaksi_barang_pelanggan')->with('pelanggan')->withPivot('kuantitas', 'total_harga', 'status_transaksi', 'created_at', 'updated_at');
    }

    //relation with pivot table transaksi_barang_pelanggan
    public function transaksiBarangPelanggan()
    {
        return $this->hasMany(TransaksiBarangPelanggan::class);
    }

    //relation
    public function transaksiBarangPemasok()
    {
        return $this->hasMany(TransaksiBarangPemasok::class);
    }

    public static function boot()
    {
        parent::boot();

        static::updated(function ($model) {
            //Cek sisa stok barang, kalo tinggal dikit kirim notifikasi

            event(new SisaStokEvent($model->id, 20));

        });

        static::created(function ($model) {
            //Cek sisa stok barang, kalo tinggal dikit kirim notifikasi

            event(new SisaStokEvent($model->id, 20));

        });

        //delete barang and its relationship
        static::deleting(function ($model) {

            //update transaksi pemasok total harga
            foreach ($model->transaksiPemasok as $transaksiPemasok) {
                $transaksiPemasok->update([
                    'total_harga' => $transaksiPemasok->total_harga - $model->pivot->total_harga
                ]);
            }
            $model->transaksiPemasok()->detach();
            $model->transaksiPelanggan()->detach();
        });

        //delete all relation on before force deleting
    }

}
