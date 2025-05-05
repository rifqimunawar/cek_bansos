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
                'id' => 2,
            'role_name' => 'System Administrator (IT)',
                'deleted_at' => NULL,
                'created_at' => '2024-12-13 22:03:33',
                'updated_at' => '2024-12-13 22:09:43',
            ),
            1 => 
            array (
                'id' => 3,
                'role_name' => 'User',
                'deleted_at' => NULL,
                'created_at' => '2024-12-08 16:18:32',
                'updated_at' => '2024-12-21 15:36:32',
            ),
        ));
        
        
    }
}