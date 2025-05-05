<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SuratMasuksTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('surat_masuks')->delete();
        
        \DB::table('surat_masuks')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nama_surat' => 'surat permintaan fitur',
                'nomor_surat' => '898989hhj/2025',
                'tanggal_surat' => NULL,
                'tanggal_diterima' => '2025-04-23',
                'pengirim' => 'rsu umc',
                'perihal' => 'permintaan fitur',
                'klasifikasi_surat_id' => 1,
                'ringkasan' => NULL,
                'lampiran_1' => 'surat permintaan fitur_lampiran_1_1745385606.pdf',
                'lampiran_2' => NULL,
                'lampiran_3' => NULL,
                'lampiran_4' => NULL,
                'lampiran_5' => NULL,
                'disposisi_ke' => NULL,
                'status' => 'terima',
                'created_by' => 'admin',
                'updated_by' => 'admin',
                'deleted_by' => 'admin',
                'deleted_at' => '2025-04-23 13:49:25',
                'created_at' => '2025-04-23 12:20:06',
                'updated_at' => '2025-04-23 13:49:25',
            ),
            1 => 
            array (
                'id' => 2,
                'nama_surat' => 'uts',
                'nomor_surat' => '098098',
                'tanggal_surat' => NULL,
                'tanggal_diterima' => '2025-04-22',
                'pengirim' => 'rsu umc',
                'perihal' => 'permintaan fitur',
                'klasifikasi_surat_id' => 1,
                'ringkasan' => NULL,
                'lampiran_1' => 'jawaban uts cloud_lampiran_1_1745387715.pdf',
                'lampiran_2' => 'uts_lampiran_2_1745390150.pdf',
                'lampiran_3' => 'uts_lampiran_3_1745390150.pdf',
                'lampiran_4' => 'uts_lampiran_4_1745390150.pdf',
                'lampiran_5' => 'uts_lampiran_5_1745390150.pdf',
                'disposisi_ke' => NULL,
                'status' => 'terima',
                'created_by' => 'admin',
                'updated_by' => 'admin',
                'deleted_by' => 'admin',
                'deleted_at' => '2025-04-23 14:03:26',
                'created_at' => '2025-04-23 12:55:15',
                'updated_at' => '2025-04-23 14:03:26',
            ),
            2 => 
            array (
                'id' => 3,
                'nama_surat' => 'surat permintaan fitur',
                'nomor_surat' => '01/D/QH',
                'tanggal_surat' => NULL,
                'tanggal_diterima' => '2025-04-25',
                'pengirim' => 'uninus',
                'perihal' => 'permintaan fitur',
                'klasifikasi_surat_id' => 1,
                'ringkasan' => NULL,
                'lampiran_1' => 'surat permintaan fitur_lampiran_1_1745514429.pdf',
                'lampiran_2' => NULL,
                'lampiran_3' => NULL,
                'lampiran_4' => NULL,
                'lampiran_5' => NULL,
                'disposisi_ke' => NULL,
                'status' => 'terima',
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-04-25 00:07:09',
                'updated_at' => '2025-04-25 00:07:09',
            ),
        ));
        
        
    }
}