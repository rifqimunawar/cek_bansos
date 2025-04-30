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
                'id' => 8,
                'ronda_id' => 4,
                'warga_id' => 4,
                'created_at' => '2025-01-21 02:22:29',
                'updated_at' => '2025-01-21 02:22:29',
            ),
            1 => 
            array (
                'id' => 9,
                'ronda_id' => 4,
                'warga_id' => 1,
                'created_at' => '2025-01-21 02:22:29',
                'updated_at' => '2025-01-21 02:22:29',
            ),
            2 => 
            array (
                'id' => 10,
                'ronda_id' => 5,
                'warga_id' => 7,
                'created_at' => '2025-01-21 02:23:05',
                'updated_at' => '2025-01-21 02:23:05',
            ),
            3 => 
            array (
                'id' => 11,
                'ronda_id' => 5,
                'warga_id' => 6,
                'created_at' => '2025-01-21 02:23:05',
                'updated_at' => '2025-01-21 02:23:05',
            ),
        ));
        
        
    }
}