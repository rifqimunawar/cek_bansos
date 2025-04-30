<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UmumsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('umums')->delete();
        
        \DB::table('umums')->insert(array (
            0 => 
            array (
                'id' => 7,
                'nama_tagihan' => 'Kas Kebersihan',
                'nominal' => 5000,
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-02-09 21:08:57',
                'updated_at' => '2025-02-09 21:08:57',
            ),
            1 => 
            array (
                'id' => 8,
                'nama_tagihan' => 'Kas Keamanan',
                'nominal' => 10000,
                'created_by' => 'admin',
                'updated_by' => 'admin',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-02-09 21:09:10',
                'updated_at' => '2025-02-09 21:12:41',
            ),
            2 => 
            array (
                'id' => 9,
                'nama_tagihan' => 'Kas Mesjid',
                'nominal' => 5000,
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-02-09 21:09:23',
                'updated_at' => '2025-02-09 21:09:23',
            ),
        ));
        
        
    }
}