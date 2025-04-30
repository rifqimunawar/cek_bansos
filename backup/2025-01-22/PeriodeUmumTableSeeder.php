<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PeriodeUmumTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('periode_umum')->delete();
        
        \DB::table('periode_umum')->insert(array (
            0 => 
            array (
                'id' => 2,
                'periode_id' => 2,
                'umum_id' => 8,
                'created_at' => '2025-01-21 00:35:50',
                'updated_at' => '2025-01-21 00:35:50',
            ),
            1 => 
            array (
                'id' => 3,
                'periode_id' => 3,
                'umum_id' => 8,
                'created_at' => '2025-01-21 00:36:47',
                'updated_at' => '2025-01-21 00:36:47',
            ),
            2 => 
            array (
                'id' => 4,
                'periode_id' => 5,
                'umum_id' => 8,
                'created_at' => '2025-01-21 00:40:15',
                'updated_at' => '2025-01-21 00:40:15',
            ),
            3 => 
            array (
                'id' => 5,
                'periode_id' => 5,
                'umum_id' => 9,
                'created_at' => '2025-01-21 00:40:15',
                'updated_at' => '2025-01-21 00:40:15',
            ),
            4 => 
            array (
                'id' => 6,
                'periode_id' => 5,
                'umum_id' => 10,
                'created_at' => '2025-01-21 00:40:15',
                'updated_at' => '2025-01-21 00:40:15',
            ),
        ));
        
        
    }
}