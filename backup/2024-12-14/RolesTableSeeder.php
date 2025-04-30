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
            'role_name' => 'System Adminstrator ( IT )',
                'menu_id' => '["1"]',
                'deleted_at' => NULL,
                'created_at' => '2024-12-13 22:03:33',
                'updated_at' => '2024-12-13 22:09:43',
            ),
        ));
        
        
    }
}