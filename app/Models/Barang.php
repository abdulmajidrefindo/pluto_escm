<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
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
        return $this->belongsTo(Produk::class)->with('kategori');
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

            event(new SisaStokEvent($model->id, 20));


            if ($model->transaksiPemasok()->count() > 0) {
                foreach ($model->transaksiPemasok as $transaksiPemasok) {
                    $total_harga = 0;
                    foreach ($model->TransaksiBarangPemasok as $transaksiBarangPemasok) {
                        if ($transaksiBarangPemasok->transaksi_pemasok_id == $transaksiPemasok->id) {
                            $total_harga += $transaksiBarangPemasok->total_harga;
                        }
                    }
                    $transaksiPemasok->total_harga -= $total_harga;
                    $transaksiPemasok->save();
                }
            }

            if ($model->transaksiPelanggan()->count() > 0) {
                foreach ($model->transaksiPelanggan as $transaksiPelanggan) {
                    $total_harga = 0;
                    foreach ($model->TransaksiBarangPelanggan as $transaksiBarangPelanggan) {
                        if ($transaksiBarangPelanggan->transaksi_pelanggan_id == $transaksiPelanggan->id) {
                            $total_harga += $transaksiBarangPelanggan->total_harga;
                        }
                    }
                    $transaksiPelanggan->total_harga -= $total_harga;
                    $transaksiPelanggan->save();
                }
            }




            $model->transaksiPemasok()->detach();
            $model->transaksiPelanggan()->detach();
        });

        static::deleted(function ($model) {

            DB::table('notifications')->where('type','App\Notifications\SisaStokNotification')->where('data','like','%'.$model->id.'%')->delete();

        });
    }

}
