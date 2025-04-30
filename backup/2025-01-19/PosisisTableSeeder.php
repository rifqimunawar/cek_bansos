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
            3 => 
            array (
                'id' => 4,
                'posisi_nama' => 'Marketing Manager',
                'created_by' => 'admin',
                'modified_by' => 'admin',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2024-12-22 03:00:30',
                'updated_at' => '2024-12-22 03:00:30',
            ),
            4 => 
            array (
                'id' => 5,
                'posisi_nama' => 'HR Manager',
                'created_by' => 'admin',
                'modified_by' => 'admin',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2024-12-22 03:00:32',
                'updated_at' => '2024-12-22 03:00:32',
            ),
            5 => 
            array (
                'id' => 6,
                'posisi_nama' => 'IT Manager',
                'created_by' => 'admin',
                'modified_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2024-12-22 03:00:35',
                'updated_at' => '2024-12-22 03:00:35',
            ),
            6 => 
            array (
                'id' => 7,
                'posisi_nama' => 'Account Manager',
                'created_by' => 'admin',
                'modified_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2024-12-22 03:00:40',
                'updated_at' => '2024-12-22 03:00:40',
            ),
            7 => 
            array (
                'id' => 8,
                'posisi_nama' => 'Sales Manager',
                'created_by' => 'admin',
                'modified_by' => 'admin',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2024-12-22 03:00:45',
                'updated_at' => '2024-12-22 03:00:45',
            ),
            8 => 
            array (
                'id' => 9,
                'posisi_nama' => 'Operations Manager',
                'created_by' => 'admin',
                'modified_by' => 'admin',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2024-12-22 03:00:50',
                'updated_at' => '2024-12-22 03:00:50',
            ),
            9 => 
            array (
                'id' => 10,
                'posisi_nama' => 'Finance Manager',
                'created_by' => 'admin',
                'modified_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2024-12-22 03:00:55',
                'updated_at' => '2024-12-22 03:00:55',
            ),
        ));
        
        
    }
}