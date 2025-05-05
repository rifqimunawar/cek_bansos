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
                'name' => 'admin',
                'username' => 'admin',
                'warga_id' => NULL,
                'img' => 'profile_admin_1745370200.jpg',
                'email' => 'admin@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$12$03MdGVNvxcw9WlnK2HE84u.lpIXNoa6NYnq4PLdlz34brz8V2.uae',
                'role_id' => 2,
                'remember_token' => NULL,
                'created_at' => NULL,
                'updated_at' => '2025-04-23 08:03:20',
            ),
        ));
        
        
    }
}