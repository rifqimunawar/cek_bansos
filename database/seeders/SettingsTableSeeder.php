<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('settings')->delete();
        
        \DB::table('settings')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Desa Terpadu',
                'alamat' => 'Desa Terpadu',
                'email' => 'desaterpadu@gmail.com',
                'phone' => '085161145097',
                'base_url' => 'http://127.0.0.1:8000/',
                'logo' => 'logo_-1746439630.png',
                'favicon' => NULL,
                'description' => NULL,
                'social_facebook' => NULL,
                'social_twitter' => NULL,
                'social_instagram' => NULL,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => '2025-05-05 17:07:10',
            ),
        ));
        
        
    }
}