<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class WargaTagihanPeriodeTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('warga_tagihan_periode')->delete();

        \DB::table('warga_tagihan_periode')->insert(array (

        ));


    }
}
