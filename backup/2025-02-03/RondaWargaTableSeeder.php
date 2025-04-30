<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RondaWargaTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('ronda_warga')->delete();
        
        \DB::table('ronda_warga')->insert(array (
            0 => 
            array (
                'id' => 1,
                'ronda_id' => 1,
                'warga_id' => 7,
                'created_at' => '2025-01-22 20:57:58',
                'updated_at' => '2025-01-22 20:57:58',
            ),
            1 => 
            array (
                'id' => 2,
                'ronda_id' => 1,
                'warga_id' => 6,
                'created_at' => '2025-01-22 20:57:58',
                'updated_at' => '2025-01-22 20:57:58',
            ),
            2 => 
            array (
                'id' => 3,
                'ronda_id' => 2,
                'warga_id' => 6,
                'created_at' => '2025-01-23 20:07:24',
                'updated_at' => '2025-01-23 20:07:24',
            ),
            3 => 
            array (
                'id' => 4,
                'ronda_id' => 2,
                'warga_id' => 1,
                'created_at' => '2025-01-23 20:07:24',
                'updated_at' => '2025-01-23 20:07:24',
            ),
        ));
        
        
    }
}