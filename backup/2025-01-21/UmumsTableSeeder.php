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
                'id' => 8,
                'nama_tagihan' => 'Kas RT',
                'nominal' => 10000,
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-01-21 00:33:12',
                'updated_at' => '2025-01-21 00:33:12',
            ),
            1 => 
            array (
                'id' => 9,
                'nama_tagihan' => 'Kas Mesjid',
                'nominal' => 10000,
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-01-21 00:37:45',
                'updated_at' => '2025-01-21 00:37:45',
            ),
            2 => 
            array (
                'id' => 10,
                'nama_tagihan' => 'Kas Keamanan',
                'nominal' => 10000,
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-01-21 00:38:00',
                'updated_at' => '2025-01-21 00:38:00',
            ),
        ));
        
        
    }
}