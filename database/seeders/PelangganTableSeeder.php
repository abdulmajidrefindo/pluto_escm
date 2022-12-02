<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PelangganTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('pelanggan')->delete();
        
        \DB::table('pelanggan')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nama_pelanggan' => 'Ismail Bintang',
                'alamat_pelanggan' => 'Jl. Lodan Timur No.7, RW.10, Ancol, Kec. Pademangan, Kota Jkt Utara, Daerah Khusus Ibukota Jakarta 14430, Indonesia',
                'kontak_pelanggan' => '087733883311',
                'created_at' => '2022-12-28 15:57:04',
                'updated_at' => '2022-12-09 15:57:04',
            ),
            1 => 
            array (
                'id' => 2,
                'nama_pelanggan' => 'Doinandya Cahya Redho ',
                'alamat_pelanggan' => 'Jl. HR. Rasuna Said Kav. X-7 No.6, Plaza 89, Lt. 5, RT.6/RW.7, Kuningan, Karet Kuningan, Kecamatan Setiabudi, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12940, Indonesia',
                'kontak_pelanggan' => '09876543212',
                'created_at' => '2022-12-28 15:57:04',
                'updated_at' => '2022-12-24 15:57:04',
            ),
            2 => 
            array (
                'id' => 3,
                'nama_pelanggan' => 'Paman Gober',
                'alamat_pelanggan' => 'Disneyland',
                'kontak_pelanggan' => '666666666666',
                'created_at' => '2022-12-20 16:06:59',
                'updated_at' => '2022-12-07 16:06:59',
            ),
            3 => 
            array (
                'id' => 4,
                'nama_pelanggan' => 'Walter White',
                'alamat_pelanggan' => 'Floridina',
                'kontak_pelanggan' => '13131313131313',
                'created_at' => '2022-12-07 16:06:59',
                'updated_at' => '2022-12-15 16:06:59',
            ),
            4 => 
            array (
                'id' => 5,
                'nama_pelanggan' => 'Abdul Majid Refindo',
                'alamat_pelanggan' => 'Kontrakan Jajat',
                'kontak_pelanggan' => '98712345123',
                'created_at' => '2022-12-05 16:32:29',
                'updated_at' => '2022-12-21 16:32:29',
            ),
            5 => 
            array (
                'id' => 6,
                'nama_pelanggan' => 'Munandar Purnama Ivan',
                'alamat_pelanggan' => 'Diambil Jaki',
                'kontak_pelanggan' => '3123123123',
                'created_at' => '2022-12-08 16:32:29',
                'updated_at' => '2022-12-08 16:32:29',
            ),
        ));
        
        
    }
}