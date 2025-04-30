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
                'tanggal_ronda' => '2025-01-22',
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-01-22 20:57:58',
                'updated_at' => '2025-01-22 20:57:58',
            ),
            1 => 
            array (
                'id' => 2,
                'tanggal_ronda' => '2025-01-25',
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-01-23 20:07:23',
                'updated_at' => '2025-01-23 20:07:23',
            ),
            2 => 
            array (
                'id' => 3,
                'tanggal_ronda' => '2025-02-02',
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-02-03 15:52:38',
                'updated_at' => '2025-02-03 15:52:38',
            ),
            3 => 
            array (
                'id' => 4,
                'tanggal_ronda' => '2025-01-28',
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-02-03 15:53:23',
                'updated_at' => '2025-02-03 15:53:23',
            ),
        ));
        
        
    }
}