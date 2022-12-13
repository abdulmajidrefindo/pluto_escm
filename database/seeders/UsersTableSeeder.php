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
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'username' => 'kedaireka',
                'password' => bcrypt('adminkedaireka'),
            ),
        ));


    }
}
