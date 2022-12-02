<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TransaksiBarangPelangganTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('transaksi_barang_pelanggan')->delete();
        
        \DB::table('transaksi_barang_pelanggan')->insert(array (
            0 => 
            array (
                'id' => 1,
                'transaksi_pelanggan_id' => 1,
                'users_id' => 1,
                'barang_id' => 2,
                'status_transaksi' => 'Berhasil',
                'kuantitas' => 2,
                'created_at' => '2022-12-07 17:42:08',
                'updated_at' => '2022-12-16 17:42:08',
            ),
            1 => 
            array (
                'id' => 2,
                'transaksi_pelanggan_id' => 2,
                'users_id' => 1,
                'barang_id' => 5,
                'status_transaksi' => 'Berhasil',
                'kuantitas' => 10,
                'created_at' => '2022-12-22 17:50:14',
                'updated_at' => '2022-12-31 17:50:14',
            ),
        ));
        
        
    }
}