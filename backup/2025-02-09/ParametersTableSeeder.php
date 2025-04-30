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
                'nama_rt' => 'Pak Haji Umuh Mukhtar update',
                'biaya_pam' => 6000,
                'denda_ronda' => 70000,
                'created_by' => 'admin',
                'updated_by' => 'admin',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-02-03 22:20:02',
                'updated_at' => '2025-02-07 14:14:22',
            ),
        ));
        
        
    }
}