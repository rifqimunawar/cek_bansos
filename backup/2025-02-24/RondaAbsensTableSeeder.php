<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RondaAbsensTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('ronda_absens')->delete();
        
        \DB::table('ronda_absens')->insert(array (
            0 => 
            array (
                'id' => 1,
                'ronda_id' => 1,
                'warga_id' => 5,
                'absen' => 2,
                'waktu_absen' => NULL,
                'catatan' => NULL,
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-02-09 01:19:35',
                'updated_at' => '2025-02-09 01:19:51',
            ),
            1 => 
            array (
                'id' => 2,
                'ronda_id' => 1,
                'warga_id' => 4,
                'absen' => 1,
                'waktu_absen' => NULL,
                'catatan' => NULL,
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-02-09 01:19:35',
                'updated_at' => '2025-02-09 01:19:35',
            ),
            2 => 
            array (
                'id' => 3,
                'ronda_id' => 2,
                'warga_id' => 7,
                'absen' => 1,
                'waktu_absen' => NULL,
                'catatan' => NULL,
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-02-09 01:21:25',
                'updated_at' => '2025-02-09 01:21:25',
            ),
            3 => 
            array (
                'id' => 4,
                'ronda_id' => 2,
                'warga_id' => 6,
                'absen' => 2,
                'waktu_absen' => NULL,
                'catatan' => NULL,
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-02-09 01:21:25',
                'updated_at' => '2025-02-09 01:21:35',
            ),
            4 => 
            array (
                'id' => 5,
                'ronda_id' => 3,
                'warga_id' => 9,
                'absen' => 1,
                'waktu_absen' => NULL,
                'catatan' => NULL,
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-02-18 20:37:25',
                'updated_at' => '2025-02-18 20:37:25',
            ),
            5 => 
            array (
                'id' => 6,
                'ronda_id' => 3,
                'warga_id' => 5,
                'absen' => 1,
                'waktu_absen' => NULL,
                'catatan' => NULL,
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-02-18 20:37:25',
                'updated_at' => '2025-02-18 20:37:25',
            ),
        ));
        
        
    }
}