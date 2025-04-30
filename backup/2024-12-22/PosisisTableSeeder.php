<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PosisisTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('posisis')->delete();
        
        \DB::table('posisis')->insert(array (
            0 => 
            array (
                'id' => 1,
                'posisi_nama' => 'Direktur Utama',
                'created_by' => 'admin',
                'modified_by' => 'admin',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2024-12-22 02:59:26',
                'updated_at' => '2024-12-22 03:00:36',
            ),
            1 => 
            array (
                'id' => 2,
                'posisi_nama' => 'General Manager',
                'created_by' => 'admin',
                'modified_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2024-12-22 02:59:38',
                'updated_at' => '2024-12-22 02:59:38',
            ),
            2 => 
            array (
                'id' => 3,
                'posisi_nama' => 'Project Manager',
                'created_by' => 'admin',
                'modified_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2024-12-22 03:00:24',
                'updated_at' => '2024-12-22 03:00:24',
            ),
        ));
        
        
    }
}