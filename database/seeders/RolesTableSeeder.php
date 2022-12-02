<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('roles')->delete();
        
        \DB::table('roles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'role_name' => 'Admin',
                'keterangan' => 'Memiliki akses seluruh sistem dalam aplikasi.',
                'created_at' => '2022-12-07 16:34:12',
                'updated_at' => '2022-12-01 16:34:12',
            ),
            1 => 
            array (
                'id' => 2,
                'role_name' => 'Kepala',
                'keterangan' => 'Memiliki akses untuk membaca seluruh aplikasi dan beberapa akses untuk mengubah data',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'role_name' => 'Gudang',
                'keterangan' => 'Akses masuk barang dan mengolah data barang',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'role_name' => 'Kasir',
                'keterangan' => 'Akses penjualan barang',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}