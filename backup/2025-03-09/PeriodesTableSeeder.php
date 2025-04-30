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
                'id' => 11,
                'nama_periode' => 'Januari 2025',
                'tanggal_mulai' => '2025-01-01',
                'tanggal_akhir' => '2025-01-31',
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-02-21 22:29:05',
                'updated_at' => '2025-02-21 22:29:05',
            ),
            1 => 
            array (
                'id' => 12,
                'nama_periode' => 'Februari 2025',
                'tanggal_mulai' => '2025-02-01',
                'tanggal_akhir' => '2025-02-28',
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-02-21 22:34:08',
                'updated_at' => '2025-02-21 22:34:08',
            ),
            2 => 
            array (
                'id' => 14,
                'nama_periode' => 'Maret 2025',
                'tanggal_mulai' => '2025-03-01',
                'tanggal_akhir' => '2025-03-31',
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-03-03 23:29:37',
                'updated_at' => '2025-03-03 23:29:37',
            ),
        ));
        
        
    }
}