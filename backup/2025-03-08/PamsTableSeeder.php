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
                'id' => 2,
                'warga_id' => 8,
                'tanggal_input' => '2025-02-08',
                'parameter' => 1,
                'total_parameter' => 1,
                'biaya_per_m3' => 5000,
                'nominal' => 5000,
                'deskripsi' => NULL,
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-02-09 01:17:41',
                'updated_at' => '2025-02-09 01:17:41',
            ),
            1 => 
            array (
                'id' => 3,
                'warga_id' => 8,
                'tanggal_input' => '2025-02-08',
                'parameter' => 1,
                'total_parameter' => 2,
                'biaya_per_m3' => 5000,
                'nominal' => 5000,
                'deskripsi' => NULL,
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-02-09 01:17:48',
                'updated_at' => '2025-02-09 01:17:48',
            ),
            2 => 
            array (
                'id' => 4,
                'warga_id' => 7,
                'tanggal_input' => '2025-02-08',
                'parameter' => 2,
                'total_parameter' => 2,
                'biaya_per_m3' => 5000,
                'nominal' => 10000,
                'deskripsi' => NULL,
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-02-09 01:18:16',
                'updated_at' => '2025-02-09 01:18:16',
            ),
            3 => 
            array (
                'id' => 5,
                'warga_id' => 8,
                'tanggal_input' => '2025-02-16',
                'parameter' => 3,
                'total_parameter' => 5,
                'biaya_per_m3' => 5000,
                'nominal' => 15000,
                'deskripsi' => NULL,
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-02-16 13:59:40',
                'updated_at' => '2025-02-16 13:59:40',
            ),
            4 => 
            array (
                'id' => 6,
                'warga_id' => 12,
                'tanggal_input' => '2025-02-24',
                'parameter' => 5,
                'total_parameter' => 5,
                'biaya_per_m3' => 5000,
                'nominal' => 25000,
                'deskripsi' => NULL,
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-02-24 21:53:01',
                'updated_at' => '2025-02-24 21:53:01',
            ),
            5 => 
            array (
                'id' => 7,
                'warga_id' => 12,
                'tanggal_input' => '2025-02-24',
                'parameter' => 2,
                'total_parameter' => 7,
                'biaya_per_m3' => 5000,
                'nominal' => 10000,
                'deskripsi' => NULL,
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-02-24 21:53:11',
                'updated_at' => '2025-02-24 21:53:11',
            ),
        ));
        
        
    }
}