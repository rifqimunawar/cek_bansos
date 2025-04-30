<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProvinsisTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('provinsis')->delete();
        
        \DB::table('provinsis')->insert(array (
            0 => 
            array (
                'id' => 1,
                'prov_id' => 11,
                'prov_name' => 'ACEH',
                'prov_kode' => 11,
                'created_at' => '2024-12-25 01:01:31',
                'updated_at' => '2024-12-25 01:01:31',
            ),
            1 => 
            array (
                'id' => 2,
                'prov_id' => 12,
                'prov_name' => 'SUMATERA UTARA',
                'prov_kode' => 12,
                'created_at' => '2024-12-25 01:01:31',
                'updated_at' => '2024-12-25 01:01:31',
            ),
            2 => 
            array (
                'id' => 3,
                'prov_id' => 13,
                'prov_name' => 'SUMATERA BARAT',
                'prov_kode' => 13,
                'created_at' => '2024-12-25 01:01:31',
                'updated_at' => '2024-12-25 01:01:31',
            ),
            3 => 
            array (
                'id' => 4,
                'prov_id' => 14,
                'prov_name' => 'RIAU',
                'prov_kode' => 14,
                'created_at' => '2024-12-25 01:01:31',
                'updated_at' => '2024-12-25 01:01:31',
            ),
            4 => 
            array (
                'id' => 5,
                'prov_id' => 15,
                'prov_name' => 'JAMBI',
                'prov_kode' => 15,
                'created_at' => '2024-12-25 01:01:31',
                'updated_at' => '2024-12-25 01:01:31',
            ),
            5 => 
            array (
                'id' => 6,
                'prov_id' => 16,
                'prov_name' => 'SUMATERA SELATAN',
                'prov_kode' => 16,
                'created_at' => '2024-12-25 01:01:31',
                'updated_at' => '2024-12-25 01:01:31',
            ),
            6 => 
            array (
                'id' => 7,
                'prov_id' => 17,
                'prov_name' => 'BENGKULU',
                'prov_kode' => 17,
                'created_at' => '2024-12-25 01:01:31',
                'updated_at' => '2024-12-25 01:01:31',
            ),
            7 => 
            array (
                'id' => 8,
                'prov_id' => 18,
                'prov_name' => 'LAMPUNG',
                'prov_kode' => 18,
                'created_at' => '2024-12-25 01:01:31',
                'updated_at' => '2024-12-25 01:01:31',
            ),
            8 => 
            array (
                'id' => 9,
                'prov_id' => 19,
                'prov_name' => 'KEPULAUAN BANGKA BELITUNG',
                'prov_kode' => 19,
                'created_at' => '2024-12-25 01:01:31',
                'updated_at' => '2024-12-25 01:01:31',
            ),
            9 => 
            array (
                'id' => 10,
                'prov_id' => 21,
                'prov_name' => 'KEPULAUAN RIAU',
                'prov_kode' => 21,
                'created_at' => '2024-12-25 01:01:31',
                'updated_at' => '2024-12-25 01:01:31',
            ),
            10 => 
            array (
                'id' => 11,
                'prov_id' => 31,
                'prov_name' => 'DKI JAKARTA',
                'prov_kode' => 31,
                'created_at' => '2024-12-25 01:01:31',
                'updated_at' => '2024-12-25 01:01:31',
            ),
            11 => 
            array (
                'id' => 12,
                'prov_id' => 32,
                'prov_name' => 'JAWA BARAT',
                'prov_kode' => 32,
                'created_at' => '2024-12-25 01:01:31',
                'updated_at' => '2024-12-25 01:01:31',
            ),
            12 => 
            array (
                'id' => 13,
                'prov_id' => 33,
                'prov_name' => 'JAWA TENGAH',
                'prov_kode' => 33,
                'created_at' => '2024-12-25 01:01:31',
                'updated_at' => '2024-12-25 01:01:31',
            ),
            13 => 
            array (
                'id' => 14,
                'prov_id' => 34,
                'prov_name' => 'DI YOGYAKARTA',
                'prov_kode' => 34,
                'created_at' => '2024-12-25 01:01:31',
                'updated_at' => '2024-12-25 01:01:31',
            ),
            14 => 
            array (
                'id' => 15,
                'prov_id' => 35,
                'prov_name' => 'JAWA TIMUR',
                'prov_kode' => 35,
                'created_at' => '2024-12-25 01:01:31',
                'updated_at' => '2024-12-25 01:01:31',
            ),
            15 => 
            array (
                'id' => 16,
                'prov_id' => 36,
                'prov_name' => 'BANTEN',
                'prov_kode' => 36,
                'created_at' => '2024-12-25 01:01:31',
                'updated_at' => '2024-12-25 01:01:31',
            ),
            16 => 
            array (
                'id' => 17,
                'prov_id' => 51,
                'prov_name' => 'BALI',
                'prov_kode' => 51,
                'created_at' => '2024-12-25 01:01:31',
                'updated_at' => '2024-12-25 01:01:31',
            ),
            17 => 
            array (
                'id' => 18,
                'prov_id' => 52,
                'prov_name' => 'NUSA TENGGARA BARAT',
                'prov_kode' => 52,
                'created_at' => '2024-12-25 01:01:31',
                'updated_at' => '2024-12-25 01:01:31',
            ),
            18 => 
            array (
                'id' => 19,
                'prov_id' => 53,
                'prov_name' => 'NUSA TENGGARA TIMUR',
                'prov_kode' => 53,
                'created_at' => '2024-12-25 01:01:31',
                'updated_at' => '2024-12-25 01:01:31',
            ),
            19 => 
            array (
                'id' => 20,
                'prov_id' => 61,
                'prov_name' => 'KALIMANTAN BARAT',
                'prov_kode' => 61,
                'created_at' => '2024-12-25 01:01:31',
                'updated_at' => '2024-12-25 01:01:31',
            ),
            20 => 
            array (
                'id' => 21,
                'prov_id' => 62,
                'prov_name' => 'KALIMANTAN TENGAH',
                'prov_kode' => 62,
                'created_at' => '2024-12-25 01:01:31',
                'updated_at' => '2024-12-25 01:01:31',
            ),
            21 => 
            array (
                'id' => 22,
                'prov_id' => 63,
                'prov_name' => 'KALIMANTAN SELATAN',
                'prov_kode' => 63,
                'created_at' => '2024-12-25 01:01:31',
                'updated_at' => '2024-12-25 01:01:31',
            ),
            22 => 
            array (
                'id' => 23,
                'prov_id' => 64,
                'prov_name' => 'KALIMANTAN TIMUR',
                'prov_kode' => 64,
                'created_at' => '2024-12-25 01:01:31',
                'updated_at' => '2024-12-25 01:01:31',
            ),
            23 => 
            array (
                'id' => 24,
                'prov_id' => 65,
                'prov_name' => 'KALIMANTAN UTARA',
                'prov_kode' => 65,
                'created_at' => '2024-12-25 01:01:31',
                'updated_at' => '2024-12-25 01:01:31',
            ),
            24 => 
            array (
                'id' => 25,
                'prov_id' => 71,
                'prov_name' => 'SULAWESI UTARA',
                'prov_kode' => 71,
                'created_at' => '2024-12-25 01:01:31',
                'updated_at' => '2024-12-25 01:01:31',
            ),
            25 => 
            array (
                'id' => 26,
                'prov_id' => 72,
                'prov_name' => 'SULAWESI TENGAH',
                'prov_kode' => 72,
                'created_at' => '2024-12-25 01:01:31',
                'updated_at' => '2024-12-25 01:01:31',
            ),
            26 => 
            array (
                'id' => 27,
                'prov_id' => 73,
                'prov_name' => 'SULAWESI SELATAN',
                'prov_kode' => 73,
                'created_at' => '2024-12-25 01:01:31',
                'updated_at' => '2024-12-25 01:01:31',
            ),
            27 => 
            array (
                'id' => 28,
                'prov_id' => 74,
                'prov_name' => 'SULAWESI TENGGARA',
                'prov_kode' => 74,
                'created_at' => '2024-12-25 01:01:31',
                'updated_at' => '2024-12-25 01:01:31',
            ),
            28 => 
            array (
                'id' => 29,
                'prov_id' => 75,
                'prov_name' => 'GORONTALO',
                'prov_kode' => 75,
                'created_at' => '2024-12-25 01:01:31',
                'updated_at' => '2024-12-25 01:01:31',
            ),
            29 => 
            array (
                'id' => 30,
                'prov_id' => 76,
                'prov_name' => 'SULAWESI BARAT',
                'prov_kode' => 76,
                'created_at' => '2024-12-25 01:01:31',
                'updated_at' => '2024-12-25 01:01:31',
            ),
            30 => 
            array (
                'id' => 31,
                'prov_id' => 81,
                'prov_name' => 'MALUKU',
                'prov_kode' => 81,
                'created_at' => '2024-12-25 01:01:31',
                'updated_at' => '2024-12-25 01:01:31',
            ),
            31 => 
            array (
                'id' => 32,
                'prov_id' => 82,
                'prov_name' => 'MALUKU UTARA',
                'prov_kode' => 82,
                'created_at' => '2024-12-25 01:01:31',
                'updated_at' => '2024-12-25 01:01:31',
            ),
            32 => 
            array (
                'id' => 33,
                'prov_id' => 91,
                'prov_name' => 'PAPUA BARAT',
                'prov_kode' => 91,
                'created_at' => '2024-12-25 01:01:31',
                'updated_at' => '2024-12-25 01:01:31',
            ),
            33 => 
            array (
                'id' => 34,
                'prov_id' => 92,
                'prov_name' => 'PAPUA BARAT DAYA',
                'prov_kode' => 92,
                'created_at' => '2024-12-25 01:01:31',
                'updated_at' => '2024-12-25 01:01:31',
            ),
            34 => 
            array (
                'id' => 35,
                'prov_id' => 94,
                'prov_name' => 'PAPUA',
                'prov_kode' => 94,
                'created_at' => '2024-12-25 01:01:31',
                'updated_at' => '2024-12-25 01:01:31',
            ),
            35 => 
            array (
                'id' => 36,
                'prov_id' => 95,
                'prov_name' => 'PAPUA SELATAN',
                'prov_kode' => 95,
                'created_at' => '2024-12-25 01:01:31',
                'updated_at' => '2024-12-25 01:01:31',
            ),
            36 => 
            array (
                'id' => 37,
                'prov_id' => 96,
                'prov_name' => 'PAPUA TENGAH',
                'prov_kode' => 96,
                'created_at' => '2024-12-25 01:01:31',
                'updated_at' => '2024-12-25 01:01:31',
            ),
            37 => 
            array (
                'id' => 38,
                'prov_id' => 97,
                'prov_name' => 'PAPUA PEGUNUNGAN',
                'prov_kode' => 97,
                'created_at' => '2024-12-25 01:01:31',
                'updated_at' => '2024-12-25 01:01:31',
            ),
        ));
        
        
    }
}