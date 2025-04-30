<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class WargasTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('wargas')->delete();
        
        \DB::table('wargas')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nama' => 'Rifqi Munawar Ridwan',
                'telp' => '085151145097',
                'alamat' => 'D7 No. 11',
                'nik' => '3203210512010003',
                'created_by' => 'admin',
                'updated_by' => 'admin',
                'deleted_by' => NULL,
                'deleted_at' => '2025-02-09 01:20:09',
                'created_at' => '2025-01-17 11:30:04',
                'updated_at' => '2025-02-09 01:20:09',
            ),
            1 => 
            array (
                'id' => 4,
                'nama' => 'HENDRA SUPRIADI',
                'telp' => '085151145097',
                'alamat' => 'Blok A',
                'nik' => '3203210512010003',
                'created_by' => 'admin',
                'updated_by' => 'admin',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-01-18 20:02:11',
                'updated_at' => '2025-01-18 22:25:27',
            ),
            2 => 
            array (
                'id' => 5,
                'nama' => 'Udin Petot',
                'telp' => '085151145097',
                'alamat' => 'bandung',
                'nik' => '123',
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-01-21 00:34:20',
                'updated_at' => '2025-01-21 00:34:20',
            ),
            3 => 
            array (
                'id' => 6,
                'nama' => 'Ronaldo',
                'telp' => '085151145097',
                'alamat' => 'portugal',
                'nik' => '07',
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-01-21 00:38:58',
                'updated_at' => '2025-01-21 00:38:58',
            ),
            4 => 
            array (
                'id' => 7,
                'nama' => 'Leonel Messi',
                'telp' => '085151145097',
                'alamat' => 'argentina',
                'nik' => '10',
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-01-21 00:39:18',
                'updated_at' => '2025-01-21 00:39:18',
            ),
            5 => 
            array (
                'id' => 8,
                'nama' => 'Antony El-Gasing',
                'telp' => '085151145097',
                'alamat' => 'Al hilal',
                'nik' => '3203210000000',
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-02-09 00:59:35',
                'updated_at' => '2025-02-09 00:59:35',
            ),
            6 => 
            array (
                'id' => 9,
                'nama' => 'Rifqi Munawar Ridwan',
                'telp' => '085151145097',
                'alamat' => 'Bandung',
                'nik' => '3203210512010003',
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-02-09 01:45:37',
                'updated_at' => '2025-02-09 01:45:37',
            ),
            7 => 
            array (
                'id' => 10,
                'nama' => 'uhud',
                'telp' => '085151145097',
                'alamat' => 'fff',
                'nik' => '0999999',
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => '2025-02-21 21:27:53',
                'created_at' => '2025-02-09 01:48:20',
                'updated_at' => '2025-02-21 21:27:53',
            ),
            8 => 
            array (
                'id' => 11,
                'nama' => 'jhon',
                'telp' => '085151145097',
                'alamat' => 'jjj',
                'nik' => '123',
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-02-09 21:09:55',
                'updated_at' => '2025-02-09 21:09:55',
            ),
        ));
        
        
    }
}