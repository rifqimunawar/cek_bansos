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
                'nama_rt' => 'Pak Haji Umuh Mukhtar',
                'biaya_pam' => 5000,
                'denda_ronda' => 10000,
                'latitude_ronda' => '-6.7219578',
                'longitude_ronda' => '108.5507806',
                'jam_awal_ronda' => '13:00',
                'jarak_lokasi_absen' => '70',
                'created_by' => 'unknown',
                'updated_by' => 'admin',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => '2025-04-21 16:44:43',
            ),
        ));
        
        
    }
}