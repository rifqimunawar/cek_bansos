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
                'deleted_at' => NULL,
                'created_at' => '2025-01-17 11:30:04',
                'updated_at' => '2025-01-18 20:09:09',
            ),
            1 => 
            array (
                'id' => 2,
                'nama' => 'BILQIS UFAIRAH KUSUMA DINATA',
                'telp' => '085151145097',
                'alamat' => 'aaaa',
                'nik' => '8888',
                'created_by' => 'admin',
                'updated_by' => 'admin',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-01-18 19:53:46',
                'updated_at' => '2025-01-18 22:25:11',
            ),
            2 => 
            array (
                'id' => 3,
                'nama' => 'LIYAN NAOMI',
                'telp' => '085151145097',
                'alamat' => 'aaaa',
                'nik' => '8888',
                'created_by' => 'admin',
                'updated_by' => 'admin',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-01-18 19:54:52',
                'updated_at' => '2025-01-18 22:24:52',
            ),
            3 => 
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
        ));
        
        
    }
}