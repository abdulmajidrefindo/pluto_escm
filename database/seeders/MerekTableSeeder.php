<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MerekTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('merek')->delete();
        
        \DB::table('merek')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nama_merek' => 'Indofood',
                'keterangan' => 'Dari bapak sudirman',
                'created_at' => '2022-12-02 08:56:30',
                'updated_at' => '2022-12-02 08:56:30',
            ),
            1 => 
            array (
                'id' => 2,
                'nama_merek' => 'Coca Cola Company',
                'keterangan' => 'CoCoCo',
                'created_at' => '2022-12-02 08:56:55',
                'updated_at' => '2022-12-02 08:56:55',
            ),
            2 => 
            array (
                'id' => 3,
                'nama_merek' => 'Nestle',
                'keterangan' => 'Kapitalis',
                'created_at' => '2022-12-15 16:12:16',
                'updated_at' => '2022-12-31 16:12:16',
            ),
            3 => 
            array (
                'id' => 4,
                'nama_merek' => 'Unilever',
                'keterangan' => 'Kapitalis',
                'created_at' => '2022-12-15 16:12:16',
                'updated_at' => '2022-12-14 16:12:16',
            ),
            4 => 
            array (
                'id' => 5,
                'nama_merek' => 'Baygon',
                'keterangan' => 'Memproduksi nyamuk untuk menjual produk racun nyamuk',
                'created_at' => '2022-12-02 16:29:09',
                'updated_at' => '2022-12-24 16:29:09',
            ),
        ));
        
        
    }
}