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
                'nama_kategori' => 'Minuman',
                'keterangan' => 'Ini adalah minuman',
                'created_at' => '2022-12-01 04:37:51',
                'updated_at' => '2022-12-01 04:37:51',
            ),
            1 =>
            array (
                'id' => 2,
                'nama_kategori' => 'Makanan',
                'keterangan' => 'Ini adalah makanan',
                'created_at' => '2022-12-01 06:03:05',
                'updated_at' => '2022-12-01 06:03:05',
            ),
            2 =>
            array (
                'id' => 3,
                'nama_kategori' => 'Roti',
                'keterangan' => 'Sejenis makanan',
                'created_at' => '2022-12-01 14:48:40',
                'updated_at' => '2022-12-01 14:48:40',
            ),
            3 =>
            array (
                'id' => 4,
                'nama_kategori' => 'Jamu',
                'keterangan' => 'Obat Kuat',
                'created_at' => '2022-12-01 15:13:24',
                'updated_at' => '2022-12-01 15:18:43',
            ),
            4 =>
            array (
                'id' => 5,
                'nama_kategori' => 'Obat Kuat',
                'keterangan' => 'Jamu',
                'created_at' => '2022-12-01 15:16:44',
                'updated_at' => '2022-12-01 15:16:44',
            ),
        ));


    }
}
