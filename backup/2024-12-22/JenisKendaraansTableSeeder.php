<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class JenisKendaraansTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('jenis_kendaraans')->delete();
        
        \DB::table('jenis_kendaraans')->insert(array (
            0 => 
            array (
                'id' => 1,
                'jenis_kendaraan' => 'Motor',
                'created_by' => 'unknown',
                'modified_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2024-12-21 18:32:40',
                'updated_at' => '2024-12-21 18:32:40',
            ),
            1 => 
            array (
                'id' => 2,
                'jenis_kendaraan' => 'Mobil',
                'created_by' => 'unknown',
                'modified_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2024-12-21 18:33:15',
                'updated_at' => '2024-12-21 18:33:15',
            ),
            2 => 
            array (
                'id' => 3,
                'jenis_kendaraan' => 'Mobil Update',
                'created_by' => 'unknown',
                'modified_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => '2024-12-21 18:41:02',
                'created_at' => '2024-12-21 18:38:39',
                'updated_at' => '2024-12-21 18:41:02',
            ),
            3 => 
            array (
                'id' => 4,
                'jenis_kendaraan' => 'Motor update keren',
                'created_by' => 'unknown',
                'modified_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => '2024-12-21 18:41:43',
                'created_at' => '2024-12-21 18:39:12',
                'updated_at' => '2024-12-21 18:41:43',
            ),
            4 => 
            array (
                'id' => 5,
                'jenis_kendaraan' => 'Mobil Update terbaru',
                'created_by' => 'unknown',
                'modified_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => '2024-12-21 18:41:38',
                'created_at' => '2024-12-21 18:40:12',
                'updated_at' => '2024-12-21 18:41:38',
            ),
            5 => 
            array (
                'id' => 6,
                'jenis_kendaraan' => 'Truck Kontainer',
                'created_by' => 'unknown',
                'modified_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => '2024-12-21 18:42:34',
                'created_at' => '2024-12-21 18:42:17',
                'updated_at' => '2024-12-21 18:42:34',
            ),
            6 => 
            array (
                'id' => 7,
                'jenis_kendaraan' => 'Truck',
                'created_by' => 'unknown',
                'modified_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2024-12-21 18:42:43',
                'updated_at' => '2024-12-21 18:42:43',
            ),
        ));
        
        
    }
}