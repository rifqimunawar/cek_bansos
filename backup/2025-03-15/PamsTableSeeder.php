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
                'warga_id' => 1,
                'tanggal_input' => '2025-03-08',
                'parameter' => 3,
                'total_parameter' => 3,
                'biaya_per_m3' => 5000,
                'nominal' => 15000,
                'deskripsi' => NULL,
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-03-09 02:20:20',
                'updated_at' => '2025-03-09 02:20:20',
            ),
            1 => 
            array (
                'id' => 2,
                'warga_id' => 1,
                'tanggal_input' => '2025-03-08',
                'parameter' => 2,
                'total_parameter' => 5,
                'biaya_per_m3' => 5000,
                'nominal' => 10000,
                'deskripsi' => NULL,
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-03-09 02:30:09',
                'updated_at' => '2025-03-09 02:30:09',
            ),
            2 => 
            array (
                'id' => 3,
                'warga_id' => 1011,
                'tanggal_input' => '2025-03-14',
                'parameter' => 2,
                'total_parameter' => 2,
                'biaya_per_m3' => 5000,
                'nominal' => 10000,
                'deskripsi' => NULL,
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-03-15 02:22:36',
                'updated_at' => '2025-03-15 02:22:36',
            ),
        ));
        
        
    }
}