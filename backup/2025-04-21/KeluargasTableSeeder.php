<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class KeluargasTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('keluargas')->delete();
        
        \DB::table('keluargas')->insert(array (
            0 => 
            array (
                'id' => 1,
                'warga_id' => 1,
                'nama' => 'Nisa Azka Fauziah',
                'telp' => '085151145097',
                'alamat' => 'Bandung',
                'nik' => '3203210512010001',
                'jk' => 'Perempuan',
                'kota_kelahiran' => 'Cianjur',
                'tgl_lahir' => '2002-11-05',
                'agama' => '1',
                'pendidikan' => '4',
                'pekerjaan' => '8',
                'status_perkawinan' => '2',
                'status_keluarga' => '3',
                'created_by' => 'munawar',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-03-09 03:09:40',
                'updated_at' => '2025-03-09 03:09:40',
            ),
            1 => 
            array (
                'id' => 2,
                'warga_id' => 1,
                'nama' => 'Annisa Mukrimah',
                'telp' => '085151145097',
                'alamat' => 'Majalaya',
                'nik' => '3203210512010004',
                'jk' => 'Perempuan',
                'kota_kelahiran' => 'Bandung',
                'tgl_lahir' => '2003-12-01',
                'agama' => '1',
                'pendidikan' => '4',
                'pekerjaan' => '8',
                'status_perkawinan' => '2',
                'status_keluarga' => '3',
                'created_by' => 'munawar',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-03-09 03:10:32',
                'updated_at' => '2025-03-09 03:10:32',
            ),
        ));
        
        
    }
}