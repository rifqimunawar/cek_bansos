<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UmumsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('umums')->delete();
        
        \DB::table('umums')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nama_tagihan' => 'Kas Kebersihan Update',
                'periode_id' => NULL,
                'warga_id' => NULL,
                'nominal' => 'Rp  50.000',
                'status' => 'belum_lunas',
                'created_by' => 'admin',
                'updated_by' => 'admin',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-01-19 01:26:32',
                'updated_at' => '2025-01-19 01:38:16',
            ),
            1 => 
            array (
                'id' => 2,
                'nama_tagihan' => 'Uang Keamanan',
                'periode_id' => NULL,
                'warga_id' => NULL,
                'nominal' => 'Rp  50.000',
                'status' => 'belum_lunas',
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => '2025-01-19 01:38:43',
                'created_at' => '2025-01-19 01:38:36',
                'updated_at' => '2025-01-19 01:38:43',
            ),
        ));
        
        
    }
}