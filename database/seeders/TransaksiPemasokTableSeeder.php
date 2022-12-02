<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TransaksiPemasokTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('transaksi_pemasok')->delete();
        
        \DB::table('transaksi_pemasok')->insert(array (
            0 => 
            array (
                'id' => 1,
                'pemasok_id' => 2,
                'total_harga' => 375200,
                'created_at' => '2022-12-08 16:57:44',
                'updated_at' => '2022-12-03 16:57:44',
            ),
            1 => 
            array (
                'id' => 2,
                'pemasok_id' => 1,
                'total_harga' => 230000,
                'created_at' => '2022-12-08 17:24:59',
                'updated_at' => '2022-12-03 17:24:59',
            ),
            2 => 
            array (
                'id' => 3,
                'pemasok_id' => 3,
                'total_harga' => 500000,
                'created_at' => '2022-12-08 17:45:53',
                'updated_at' => '2022-12-03 17:45:53',
            ),
        ));
        
        
    }
}