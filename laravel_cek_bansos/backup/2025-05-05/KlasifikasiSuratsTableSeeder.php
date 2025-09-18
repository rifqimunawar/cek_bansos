<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class KlasifikasiSuratsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('klasifikasi_surats')->delete();
        
        \DB::table('klasifikasi_surats')->insert(array (
            0 => 
            array (
                'id' => 1,
                'kode' => 'CKD',
                'nama' => 'Cikidang',
                'keterangan' => NULL,
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-04-23 08:58:00',
                'updated_at' => '2025-04-23 08:58:00',
            ),
        ));
        
        
    }
}