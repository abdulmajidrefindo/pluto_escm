<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserRolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('user_roles')->delete();
        
        \DB::table('user_roles')->insert(array (
            0 => 
            array (
                'users_id' => 1,
                'roles_id' => 1,
                'created_at' => '2022-12-01 16:39:17',
                'updated_at' => '2022-12-01 16:39:17',
            ),
        ));
        
        
    }
}