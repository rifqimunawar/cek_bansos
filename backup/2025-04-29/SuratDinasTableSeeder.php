<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SuratDinasTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('surat_dinas')->delete();
        
        \DB::table('surat_dinas')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nama_surat' => 'surat perpanjangan kontrak update',
                'nomor_surat' => 'kon/123/2025',
                'tanggal_surat' => '2025-04-29',
                'tujuan' => 'mas rifqi',
                'sifat_surat' => NULL,
                'perihal' => 'surat kenaikan gaji',
                'klasifikasi_surat_id' => 1,
                'ringkasan' => NULL,
                'isi_surat' => 'permohonann',
                'penandatangan_id' => 1,
                'is_basah' => 'on',
                'action' => 'preview',
                'lampiran_1' => NULL,
                'lampiran_2' => NULL,
                'lampiran_3' => NULL,
                'lampiran_4' => NULL,
                'lampiran_5' => NULL,
                'status' => 'draft',
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-04-29 14:34:13',
                'updated_at' => '2025-04-29 14:34:13',
            ),
        ));
        
        
    }
}