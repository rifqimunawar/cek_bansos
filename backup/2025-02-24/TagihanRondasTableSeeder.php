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
                'id' => 3,
                'ronda_id' => 2,
                'warga_id' => 7,
                'tgl_absen_ronda' => '2025-02-07 00:00:00',
                'nominal_tagihan' => 10000,
                'status_denda' => 0,
                'created_by' => 'unknown',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-02-09 01:29:12',
                'updated_at' => '2025-02-09 01:29:12',
            ),
            1 => 
            array (
                'id' => 4,
                'ronda_id' => 1,
                'warga_id' => 4,
                'tgl_absen_ronda' => '2025-02-09 00:00:00',
                'nominal_tagihan' => 10000,
                'status_denda' => 0,
                'created_by' => 'unknown',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-02-18 21:37:28',
                'updated_at' => '2025-02-18 21:37:28',
            ),
            2 => 
            array (
                'id' => 5,
                'ronda_id' => 3,
                'warga_id' => 9,
                'tgl_absen_ronda' => '2025-02-19 00:00:00',
                'nominal_tagihan' => 10000,
                'status_denda' => 0,
                'created_by' => 'unknown',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-02-21 20:42:04',
                'updated_at' => '2025-02-21 20:42:04',
            ),
            3 => 
            array (
                'id' => 6,
                'ronda_id' => 3,
                'warga_id' => 5,
                'tgl_absen_ronda' => '2025-02-19 00:00:00',
                'nominal_tagihan' => 10000,
                'status_denda' => 0,
                'created_by' => 'unknown',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-02-21 20:42:04',
                'updated_at' => '2025-02-21 20:42:04',
            ),
        ));
        
        
    }
}