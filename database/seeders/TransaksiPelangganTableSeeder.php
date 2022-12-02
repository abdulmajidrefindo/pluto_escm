<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TransaksiPelangganTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('transaksi_pelanggan')->delete();
        
        \DB::table('transaksi_pelanggan')->insert(array (
            0 => 
            array (
                'id' => 1,
                'pelanggan_id' => 1,
                'total_harga' => 4000,
                'created_at' => '2022-12-01 17:41:31',
                'updated_at' => '2022-12-03 17:41:31',
            ),
            1 => 
            array (
                'id' => 2,
                'pelanggan_id' => 6,
                'total_harga' => 25000,
                'created_at' => '2022-12-01 17:49:27',
                'updated_at' => '2022-12-03 17:49:27',
            ),
        ));
        
        
    }
}