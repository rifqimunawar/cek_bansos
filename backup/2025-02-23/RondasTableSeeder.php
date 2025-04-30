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
                'id' => 1,
                'tanggal_ronda' => '2025-02-09',
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-02-09 01:19:35',
                'updated_at' => '2025-02-09 01:19:35',
            ),
            1 => 
            array (
                'id' => 2,
                'tanggal_ronda' => '2025-02-07',
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-02-09 01:21:25',
                'updated_at' => '2025-02-09 01:21:25',
            ),
            2 => 
            array (
                'id' => 3,
                'tanggal_ronda' => '2025-02-19',
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-02-18 20:37:24',
                'updated_at' => '2025-02-18 20:37:24',
            ),
        ));
        
        
    }
}