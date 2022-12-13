<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class KategoriProdukTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('kategori_produk')->delete();

        \DB::table('kategori_produk')->insert(array (
            0 =>
            array (
                'kategori_id' => 1,
                'produk_id' => 4,
                'created_at' => '2022-12-01 16:10:13',
                'updated_at' => '2022-12-07 16:10:13',
            ),
            1 =>
            array (
                'kategori_id' => 5,
                'produk_id' => 1,
                'created_at' => '2022-12-01 16:10:13',
                'updated_at' => '2022-12-02 16:10:13',
            ),
            2 =>
            array (
                'kategori_id' => 1,
                'produk_id' => 3,
                'created_at' => '2022-12-01 16:11:21',
                'updated_at' => '2022-12-16 16:11:21',
            ),
            3 =>
            array (
                'kategori_id' => 4,
                'produk_id' => 2,
                'created_at' => '2022-12-22 16:11:21',
                'updated_at' => '2022-12-31 16:11:21',
            ),
            4 =>
            array (
                'kategori_id' => 5,
                'produk_id' => 5,
                'created_at' => '2022-12-01 16:30:07',
                'updated_at' => '2022-12-10 16:30:07',
            ),
            5 =>
            array (
                'kategori_id' => 1,
                'produk_id' => 6,
                'created_at' => '2022-12-13 16:30:07',
                'updated_at' => '2022-12-07 16:30:07',
            ),
        ));


    }
}
