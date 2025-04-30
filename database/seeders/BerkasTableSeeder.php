<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BerkasTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('berkas')->delete();
        
        \DB::table('berkas')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nama_berkas' => 'berkas penting',
                'kode_berkas' => '90DG/jk',
                'klasifikasi_surat_id' => NULL,
                'deskripsi' => 'Berkas penting update',
                'lampiran_1' => '_lampiran_1_1745850858.pdf',
                'lampiran_2' => '_lampiran_2_1745850858.pdf',
                'lampiran_3' => '_lampiran_3_1745850859.pdf',
                'lampiran_4' => NULL,
                'lampiran_5' => NULL,
                'tanggal_upload' => '2025-04-28',
                'created_by' => 'admin',
                'updated_by' => 'admin',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-04-28 21:34:19',
                'updated_at' => '2025-04-28 21:48:02',
            ),
        ));
        
        
    }
}