<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ParametersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('parameters')->delete();
        
        \DB::table('parameters')->insert(array (
            0 => 
            array (
                'id' => 1,
                'kop_surat' => 'kop_surat_1745912493.png',
                'footer_surat' => 'footer_surat_1745912493.png',
                'nama_rt' => NULL,
                'biaya_pam' => NULL,
                'denda_ronda' => NULL,
                'latitude_ronda' => NULL,
                'longitude_ronda' => NULL,
                'jam_awal_ronda' => NULL,
                'jarak_lokasi_absen' => NULL,
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-04-29 14:41:33',
                'updated_at' => '2025-04-29 14:41:33',
            ),
        ));
        
        
    }
}