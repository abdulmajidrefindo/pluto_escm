<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nama_user' => 'Dio Refin Bintang Cahya Purnama',
                'nomor_telepon' => '8812377123',
                'email' => 'mutiarahitam@gmail.com',
                'username' => 'voyeurism',
                'password' => 'belum ada password',
                'remember_token' => 'belum tau',
                'created_at' => '2022-12-14 16:37:27',
                'updated_at' => '2022-12-31 16:37:27',
            ),
        ));
        
        
    }
}