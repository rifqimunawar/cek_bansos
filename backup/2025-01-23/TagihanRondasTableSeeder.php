<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TagihanRondasTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('tagihan_rondas')->delete();
        
        \DB::table('tagihan_rondas')->insert(array (
            0 => 
            array (
                'id' => 1,
                'ronda_id' => 1,
                'warga_id' => 7,
                'tgl_absen_ronda' => '2025-01-22 00:00:00',
                'nominal_tagihan' => 20000,
                'status_denda' => 0,
                'created_by' => 'unknown',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-01-23 21:14:17',
                'updated_at' => '2025-01-23 21:14:17',
            ),
            1 => 
            array (
                'id' => 2,
                'ronda_id' => 1,
                'warga_id' => 6,
                'tgl_absen_ronda' => '2025-01-22 00:00:00',
                'nominal_tagihan' => 20000,
                'status_denda' => 0,
                'created_by' => 'unknown',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-01-23 21:14:17',
                'updated_at' => '2025-01-23 21:14:17',
            ),
        ));
        
        
    }
}