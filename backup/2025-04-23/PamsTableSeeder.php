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
                'warga_id' => 15,
                'tanggal_input' => '2025-04-11',
                'parameter' => 3,
                'total_parameter' => 3,
                'biaya_per_m3' => 5000,
                'nominal' => 15000,
                'deskripsi' => NULL,
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-04-11 14:37:35',
                'updated_at' => '2025-04-11 14:37:35',
            ),
            1 => 
            array (
                'id' => 2,
                'warga_id' => 16,
                'tanggal_input' => '2025-04-11',
                'parameter' => 1,
                'total_parameter' => 1,
                'biaya_per_m3' => 5000,
                'nominal' => 5000,
                'deskripsi' => NULL,
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-04-11 14:39:56',
                'updated_at' => '2025-04-11 14:39:56',
            ),
        ));
        
        
    }
}