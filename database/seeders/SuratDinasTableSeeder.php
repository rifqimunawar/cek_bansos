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
            1 => 
            array (
                'id' => 2,
                'nama_surat' => 'SURAT DINAS LUAR KOTA',
                'nomor_surat' => '1234',
                'tanggal_surat' => '2025-04-29',
                'tujuan' => 'Rifqi Munawar',
                'sifat_surat' => NULL,
                'perihal' => 'Perjalanan Dinas Luar Kota',
                'klasifikasi_surat_id' => 1,
                'ringkasan' => NULL,
                'isi_surat' => '<p>Surat keterangan perjalnan dinas luar kota&nbsp;</p>',
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
                'created_at' => '2025-04-29 15:23:52',
                'updated_at' => '2025-04-29 15:23:52',
            ),
            2 => 
            array (
                'id' => 3,
                'nama_surat' => 'SURAT DINAS LUAR KOTA',
                'nomor_surat' => '1234',
                'tanggal_surat' => '2025-04-29',
                'tujuan' => 'Rifqi Munawar',
                'sifat_surat' => NULL,
                'perihal' => 'Perjalanan Dinas Luar Kota',
                'klasifikasi_surat_id' => 1,
                'ringkasan' => NULL,
                'isi_surat' => '<p>testing no tanda tangan</p><ul><li>testing&nbsp;</li><li><b>bold</b></li></ul>',
                'penandatangan_id' => 1,
                'is_basah' => NULL,
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
                'created_at' => '2025-04-29 15:26:54',
                'updated_at' => '2025-04-29 15:26:54',
            ),
            3 => 
            array (
                'id' => 4,
                'nama_surat' => 'SURAT DINAS LUAR KOTA',
                'nomor_surat' => '1234',
                'tanggal_surat' => '2025-04-29',
                'tujuan' => 'Rifqi Munawar',
                'sifat_surat' => NULL,
                'perihal' => 'Perjalanan Dinas Luar Kota',
                'klasifikasi_surat_id' => 1,
                'ringkasan' => NULL,
                'isi_surat' => '<p>testing no tanda tangan</p><ul><li>testing&nbsp;</li><li><b>bold</b></li></ul>',
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
                'created_at' => '2025-04-29 15:27:09',
                'updated_at' => '2025-04-29 15:27:09',
            ),
            4 => 
            array (
                'id' => 5,
                'nama_surat' => 'SURAT DINAS LUAR KOTA',
                'nomor_surat' => '12345',
                'tanggal_surat' => '2025-04-29',
                'tujuan' => 'Teguh',
                'sifat_surat' => NULL,
                'perihal' => 'Pemberitahuan',
                'klasifikasi_surat_id' => 1,
                'ringkasan' => NULL,
                'isi_surat' => '<p>ssssssss</p>',
                'penandatangan_id' => 1,
                'is_basah' => NULL,
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
                'created_at' => '2025-04-29 15:30:06',
                'updated_at' => '2025-04-29 15:30:06',
            ),
            5 => 
            array (
                'id' => 6,
                'nama_surat' => 'SURAT DINAS LUAR KOTA',
                'nomor_surat' => '12345',
                'tanggal_surat' => '2025-04-29',
                'tujuan' => 'Teguh',
                'sifat_surat' => NULL,
                'perihal' => 'Pemberitahuan',
                'klasifikasi_surat_id' => 1,
                'ringkasan' => NULL,
                'isi_surat' => '<p>ssssssss</p>',
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
                'created_at' => '2025-04-29 15:30:20',
                'updated_at' => '2025-04-29 15:30:20',
            ),
        ));
        
        
    }
}