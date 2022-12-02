<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BarangTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('barang')->delete();
        
        \DB::table('barang')->insert(array (
            0 => 
            array (
                'id' => 1,
                'produk_id' => 1,
                'pemasok_id' => 1,
                'merek_id' => 4,
                'harga' => 5000,
                'sku' => 123344515,
                'total_terjual' => 0,
                'total_masuk' => 5,
                'total_stok' => 5,
                'created_at' => '2022-12-07 16:13:21',
                'updated_at' => '2022-12-23 16:13:21',
            ),
            1 => 
            array (
                'id' => 2,
                'produk_id' => 2,
                'pemasok_id' => 1,
                'merek_id' => 4,
                'harga' => 2000,
                'sku' => 33445544,
                'total_terjual' => 2,
                'total_masuk' => 102,
                'total_stok' => 100,
                'created_at' => '2022-12-08 16:13:21',
                'updated_at' => '2022-12-09 16:13:21',
            ),
            2 => 
            array (
                'id' => 3,
                'produk_id' => 3,
                'pemasok_id' => 2,
                'merek_id' => 3,
                'harga' => 3100,
                'sku' => 445123,
                'total_terjual' => 0,
                'total_masuk' => 102,
                'total_stok' => 102,
                'created_at' => '2022-12-22 16:26:02',
                'updated_at' => '2022-12-23 16:26:02',
            ),
            3 => 
            array (
                'id' => 4,
                'produk_id' => 4,
                'pemasok_id' => 2,
                'merek_id' => 2,
                'harga' => 10000,
                'sku' => 12313,
                'total_terjual' => 0,
                'total_masuk' => 25,
                'total_stok' => 25,
                'created_at' => '2022-12-29 16:26:02',
                'updated_at' => '2022-12-23 16:26:02',
            ),
            4 => 
            array (
                'id' => 5,
                'produk_id' => 5,
                'pemasok_id' => 2,
                'merek_id' => 4,
                'harga' => 2500,
                'sku' => 44512331,
                'total_terjual' => 10,
                'total_masuk' => 100,
                'total_stok' => 90,
                'created_at' => '2022-12-29 16:31:06',
                'updated_at' => '2022-12-24 16:31:06',
            ),
            5 => 
            array (
                'id' => 6,
                'produk_id' => 6,
                'pemasok_id' => 2,
                'merek_id' => 5,
                'harga' => 15000,
                'sku' => 31234,
                'total_terjual' => 0,
                'total_masuk' => 4,
                'total_stok' => 4,
                'created_at' => '2022-12-22 16:31:06',
                'updated_at' => '2022-12-16 16:31:06',
            ),
        ));
        
        
    }
}