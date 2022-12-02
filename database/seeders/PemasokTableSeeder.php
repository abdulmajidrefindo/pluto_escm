<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PemasokTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('pemasok')->delete();
        
        \DB::table('pemasok')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nama_pemasok' => 'PT. Maju Mundur Sejahtera',
                'alamat_pemasok' => 'Lubang Sumur',
                'kontak_pemasok' => '312312412512',
                'created_at' => '2022-12-16 16:08:00',
                'updated_at' => '2022-12-23 16:08:00',
            ),
            1 => 
            array (
                'id' => 2,
                'nama_pemasok' => 'Raja Neptunus',
                'alamat_pemasok' => 'Bikini Bottom',
                'kontak_pemasok' => '800813',
                'created_at' => '2022-12-01 16:08:00',
                'updated_at' => '2022-12-03 16:08:00',
            ),
            2 => 
            array (
                'id' => 3,
                'nama_pemasok' => 'CepMek',
                'alamat_pemasok' => 'Kamu nanya',
                'kontak_pemasok' => '231313',
                'created_at' => '2022-12-22 17:45:23',
                'updated_at' => '2022-12-24 17:45:23',
            ),
        ));
        
        
    }
}