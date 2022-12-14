<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class KategoriTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('kategori')->delete();

        \DB::table('kategori')->insert(array (
            0 =>
            array (
                'id' => 1,
                'nama_kategori' => 'Tanpa Kategori',
                'keterangan' => 'Tidak memiliki kategori',
                'created_at' => '2022-12-01 04:37:51',
                'updated_at' => '2022-12-01 04:37:51',
            ),
        ));


    }
}
