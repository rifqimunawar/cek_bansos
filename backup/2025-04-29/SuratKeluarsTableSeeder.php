<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SuratKeluarsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('surat_keluars')->delete();
        
        \DB::table('surat_keluars')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nama_surat' => 'surat perpanjangan kontrak update',
                'nomor_surat' => 'kon/123/2025',
                'tanggal_surat' => '2025-04-25',
                'tujuan' => 'mas rifqi',
                'perihal' => 'surat kenaikan gaji',
                'klasifikasi_surat_id' => 1,
                'ringkasan' => NULL,
                'lampiran_1' => 'surat perpanjangan kontrak_lampiran_1_1745515431.pdf',
                'lampiran_2' => NULL,
                'lampiran_3' => NULL,
                'lampiran_4' => NULL,
                'lampiran_5' => NULL,
                'penandatangan' => NULL,
                'status' => 'draft',
                'created_by' => 'admin',
                'updated_by' => 'admin',
                'deleted_by' => 'admin',
                'deleted_at' => '2025-04-25 00:27:56',
                'created_at' => '2025-04-25 00:23:51',
                'updated_at' => '2025-04-25 00:27:56',
            ),
            1 => 
            array (
                'id' => 2,
                'nama_surat' => 'tawaran kenaikan gaji',
                'nomor_surat' => '123',
                'tanggal_surat' => '2025-04-28',
                'tujuan' => 'mas rifqi',
                'perihal' => 'surat kenaikan gaji',
                'klasifikasi_surat_id' => 1,
                'ringkasan' => NULL,
                'lampiran_1' => 'tawaran kenaikan gaji_lampiran_1_1745849908.pdf',
                'lampiran_2' => NULL,
                'lampiran_3' => NULL,
                'lampiran_4' => NULL,
                'lampiran_5' => NULL,
                'penandatangan' => NULL,
                'status' => 'draft',
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-04-28 21:18:28',
                'updated_at' => '2025-04-28 21:18:28',
            ),
        ));
        
        
    }
}