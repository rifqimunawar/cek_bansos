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
                'warga_id' => 5,
                'created_at' => '2025-02-09 01:19:35',
                'updated_at' => '2025-02-09 01:19:35',
            ),
            1 => 
            array (
                'id' => 2,
                'ronda_id' => 1,
                'warga_id' => 4,
                'created_at' => '2025-02-09 01:19:35',
                'updated_at' => '2025-02-09 01:19:35',
            ),
            2 => 
            array (
                'id' => 3,
                'ronda_id' => 2,
                'warga_id' => 7,
                'created_at' => '2025-02-09 01:21:25',
                'updated_at' => '2025-02-09 01:21:25',
            ),
            3 => 
            array (
                'id' => 4,
                'ronda_id' => 2,
                'warga_id' => 6,
                'created_at' => '2025-02-09 01:21:25',
                'updated_at' => '2025-02-09 01:21:25',
            ),
            4 => 
            array (
                'id' => 5,
                'ronda_id' => 3,
                'warga_id' => 9,
                'created_at' => '2025-02-18 20:37:25',
                'updated_at' => '2025-02-18 20:37:25',
            ),
            5 => 
            array (
                'id' => 6,
                'ronda_id' => 3,
                'warga_id' => 5,
                'created_at' => '2025-02-18 20:37:25',
                'updated_at' => '2025-02-18 20:37:25',
            ),
            6 => 
            array (
                'id' => 7,
                'ronda_id' => 4,
                'warga_id' => 12,
                'created_at' => '2025-02-24 21:52:12',
                'updated_at' => '2025-02-24 21:52:12',
            ),
        ));
        
        
    }
}