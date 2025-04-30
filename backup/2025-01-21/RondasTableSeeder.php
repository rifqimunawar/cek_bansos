<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RondasTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('rondas')->delete();
        
        \DB::table('rondas')->insert(array (
            0 => 
            array (
                'id' => 4,
                'tanggal_ronda' => '2025-01-21',
                'absen' => 0,
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-01-21 02:22:29',
                'updated_at' => '2025-01-21 02:22:29',
            ),
            1 => 
            array (
                'id' => 5,
                'tanggal_ronda' => '2025-01-22',
                'absen' => 0,
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-01-21 02:23:05',
                'updated_at' => '2025-01-21 02:23:05',
            ),
        ));
        
        
    }
}