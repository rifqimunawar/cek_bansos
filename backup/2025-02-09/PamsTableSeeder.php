<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PamsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('pams')->delete();
        
        \DB::table('pams')->insert(array (
            0 => 
            array (
                'id' => 1,
                'warga_id' => 4,
                'tanggal_input' => '2025-01-20',
                'parameter' => 3,
                'total_parameter' => 3,
                'biaya_per_m3' => 5000,
                'nominal' => 15000,
                'deskripsi' => NULL,
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-01-20 23:55:44',
                'updated_at' => '2025-01-20 23:55:44',
            ),
            1 => 
            array (
                'id' => 2,
                'warga_id' => 4,
                'tanggal_input' => '2025-01-20',
                'parameter' => 2,
                'total_parameter' => 5,
                'biaya_per_m3' => 5000,
                'nominal' => 10000,
                'deskripsi' => NULL,
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-01-20 23:55:57',
                'updated_at' => '2025-01-20 23:55:57',
            ),
            2 => 
            array (
                'id' => 3,
                'warga_id' => 7,
                'tanggal_input' => '2025-01-30',
                'parameter' => 5,
                'total_parameter' => 5,
                'biaya_per_m3' => 5000,
                'nominal' => 25000,
                'deskripsi' => NULL,
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-01-30 13:38:17',
                'updated_at' => '2025-01-30 13:38:17',
            ),
            3 => 
            array (
                'id' => 4,
                'warga_id' => 1,
                'tanggal_input' => '2025-02-03',
                'parameter' => 3,
                'total_parameter' => 3,
                'biaya_per_m3' => 5000,
                'nominal' => 15000,
                'deskripsi' => NULL,
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-02-03 22:12:53',
                'updated_at' => '2025-02-03 22:12:53',
            ),
            4 => 
            array (
                'id' => 5,
                'warga_id' => 7,
                'tanggal_input' => '2025-02-07',
                'parameter' => 1,
                'total_parameter' => 6,
                'biaya_per_m3' => 6000,
                'nominal' => 6000,
                'deskripsi' => NULL,
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-02-07 14:15:32',
                'updated_at' => '2025-02-07 14:15:32',
            ),
        ));
        
        
    }
}