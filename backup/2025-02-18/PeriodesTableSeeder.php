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
                'id' => 7,
                'nama_periode' => 'Januari 2025',
                'tanggal_mulai' => '2025-01-01',
                'tanggal_akhir' => '2025-01-31',
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-02-09 21:10:16',
                'updated_at' => '2025-02-09 21:10:16',
            ),
            1 => 
            array (
                'id' => 8,
                'nama_periode' => 'Februari 2025',
                'tanggal_mulai' => '2025-02-01',
                'tanggal_akhir' => '2025-02-28',
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-02-09 21:10:33',
                'updated_at' => '2025-02-09 21:10:33',
            ),
        ));
        
        
    }
}