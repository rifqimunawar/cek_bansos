<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PeriodesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('periodes')->delete();
        
        \DB::table('periodes')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nama_periode' => 'Februari 2025',
                'tanggal_mulai' => '2025-01-01',
                'tanggal_akhir' => '2025-01-31',
                'created_by' => 'admin',
                'updated_by' => 'admin',
                'deleted_by' => NULL,
                'deleted_at' => '2025-01-18 23:41:54',
                'created_at' => '2025-01-18 23:39:18',
                'updated_at' => '2025-01-18 23:41:54',
            ),
            1 => 
            array (
                'id' => 2,
                'nama_periode' => 'Januari 2025',
                'tanggal_mulai' => '2025-01-01',
                'tanggal_akhir' => '2025-01-31',
                'created_by' => 'admin',
                'updated_by' => 'admin',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-01-18 23:42:11',
                'updated_at' => '2025-01-21 00:35:50',
            ),
            2 => 
            array (
                'id' => 3,
                'nama_periode' => 'Februari 2025',
                'tanggal_mulai' => '2025-02-01',
                'tanggal_akhir' => '2025-01-31',
                'created_by' => 'admin',
                'updated_by' => 'admin',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-01-18 23:42:29',
                'updated_at' => '2025-01-21 00:36:47',
            ),
            3 => 
            array (
                'id' => 4,
                'nama_periode' => 'Maret 2025',
                'tanggal_mulai' => '2025-03-01',
                'tanggal_akhir' => '2025-03-31',
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-01-21 00:31:17',
                'updated_at' => '2025-01-21 00:31:17',
            ),
            4 => 
            array (
                'id' => 5,
                'nama_periode' => 'April 2025',
                'tanggal_mulai' => '2025-04-01',
                'tanggal_akhir' => '2025-04-30',
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-01-21 00:40:15',
                'updated_at' => '2025-01-21 00:40:15',
            ),
        ));
        
        
    }
}