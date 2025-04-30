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
                'name' => 'SwadayaPlus',
                'alamat' => 'Perum Graha Mustika Media RT 003 RW 006, Ds. Lubang buaya, Kec. Setu, Kab. Bekasi',
                'email' => 'info@technoart.id',
                'phone' => '085161145097',
                'base_url' => 'http://127.0.0.1:8000/',
                'logo' => 'logo_-1744864372.png',
                'favicon' => NULL,
                'description' => NULL,
                'social_facebook' => NULL,
                'social_twitter' => NULL,
                'social_instagram' => NULL,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => '2025-04-17 11:32:52',
            ),
        ));
        
        
    }
}