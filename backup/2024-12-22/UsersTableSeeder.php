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
                'name' => 'Rifqi Munawar R.',
                'username' => 'admin',
                'img' => 'profile_admin_1734787375.JPG',
                'email' => 'admin@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$12$03MdGVNvxcw9WlnK2HE84u.lpIXNoa6NYnq4PLdlz34brz8V2.uae',
                'role_id' => 2,
                'remember_token' => NULL,
                'created_at' => NULL,
                'updated_at' => '2024-12-21 13:36:47',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'admin2',
                'username' => 'admin2',
                'img' => 'profile.png',
                'email' => 'admin2@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$12$zvwndlOCAYBY8uufpORX.uznDBIf6h1i/2GLVrfMFYIarD95zD7yS',
                'role_id' => 3,
                'remember_token' => NULL,
                'created_at' => '2024-12-21 13:40:54',
                'updated_at' => '2024-12-21 15:36:17',
            ),
        ));
        
        
    }
}