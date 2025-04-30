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
            5 => 
            array (
                'id' => 7,
                'periode_id' => 2,
                'umum_id' => 9,
                'created_at' => '2025-01-23 23:22:21',
                'updated_at' => '2025-01-23 23:22:21',
            ),
            6 => 
            array (
                'id' => 8,
                'periode_id' => 2,
                'umum_id' => 10,
                'created_at' => '2025-01-23 23:22:21',
                'updated_at' => '2025-01-23 23:22:21',
            ),
            7 => 
            array (
                'id' => 9,
                'periode_id' => 2,
                'umum_id' => 11,
                'created_at' => '2025-01-23 23:22:21',
                'updated_at' => '2025-01-23 23:22:21',
            ),
            8 => 
            array (
                'id' => 10,
                'periode_id' => 3,
                'umum_id' => 9,
                'created_at' => '2025-01-23 23:22:30',
                'updated_at' => '2025-01-23 23:22:30',
            ),
            9 => 
            array (
                'id' => 11,
                'periode_id' => 3,
                'umum_id' => 10,
                'created_at' => '2025-01-23 23:22:30',
                'updated_at' => '2025-01-23 23:22:30',
            ),
            10 => 
            array (
                'id' => 12,
                'periode_id' => 3,
                'umum_id' => 11,
                'created_at' => '2025-01-23 23:22:30',
                'updated_at' => '2025-01-23 23:22:30',
            ),
            11 => 
            array (
                'id' => 13,
                'periode_id' => 4,
                'umum_id' => 8,
                'created_at' => '2025-01-23 23:22:41',
                'updated_at' => '2025-01-23 23:22:41',
            ),
            12 => 
            array (
                'id' => 14,
                'periode_id' => 4,
                'umum_id' => 9,
                'created_at' => '2025-01-23 23:22:41',
                'updated_at' => '2025-01-23 23:22:41',
            ),
            13 => 
            array (
                'id' => 15,
                'periode_id' => 4,
                'umum_id' => 10,
                'created_at' => '2025-01-23 23:22:41',
                'updated_at' => '2025-01-23 23:22:41',
            ),
            14 => 
            array (
                'id' => 16,
                'periode_id' => 4,
                'umum_id' => 11,
                'created_at' => '2025-01-23 23:22:41',
                'updated_at' => '2025-01-23 23:22:41',
            ),
            15 => 
            array (
                'id' => 17,
                'periode_id' => 5,
                'umum_id' => 11,
                'created_at' => '2025-01-23 23:22:51',
                'updated_at' => '2025-01-23 23:22:51',
            ),
        ));
        
        
    }
}