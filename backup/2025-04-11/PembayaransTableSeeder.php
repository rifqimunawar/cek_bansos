<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PembayaransTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('pembayarans')->delete();
        
        \DB::table('pembayarans')->insert(array (
            0 => 
            array (
                'id' => 1,
                'tagihan_id' => NULL,
                'periode_id' => NULL,
                'warga_id' => 1,
                'nominal_dibayar' => 15000,
                'status' => 1,
                'pembayaran_tipe' => 2,
                'nama_warga' => 'Rifqi Munawar Ridwan',
                'alamat_warga' => 'D7 No. 11',
                'telp_warga' => '085151145097',
                'tagihan_nama' => 'Pam Swadaya',
                'periode_nama' => NULL,
                'pam_id' => 1,
                'denda_ronda_id' => NULL,
                'parameter_pam' => 3,
                'tgl_absen_ronda' => NULL,
                'id_qrcode' => '6b86b273ff34fce1',
                'no_pembayaran' => '00001',
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-03-09 02:30:38',
                'updated_at' => '2025-03-09 02:30:38',
            ),
            1 => 
            array (
                'id' => 2,
                'tagihan_id' => 8,
                'periode_id' => 14,
                'warga_id' => 1,
                'nominal_dibayar' => 10000,
                'status' => 1,
                'pembayaran_tipe' => 1,
                'nama_warga' => 'Rifqi Munawar Ridwan',
                'alamat_warga' => 'D7 No. 11',
                'telp_warga' => '085151145097',
                'tagihan_nama' => 'Kas Keamanan',
                'periode_nama' => 'Maret 2025',
                'pam_id' => NULL,
                'denda_ronda_id' => NULL,
                'parameter_pam' => NULL,
                'tgl_absen_ronda' => NULL,
                'id_qrcode' => 'd4735e3a265e16ee',
                'no_pembayaran' => '00002',
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-03-09 03:14:24',
                'updated_at' => '2025-03-09 03:14:24',
            ),
            2 => 
            array (
                'id' => 3,
                'tagihan_id' => 9,
                'periode_id' => 14,
                'warga_id' => 1029,
                'nominal_dibayar' => 5000,
                'status' => 1,
                'pembayaran_tipe' => 1,
                'nama_warga' => 'Dr. Roosevelt Feil',
                'alamat_warga' => '312 Peyton LoafNew Krystinaton, KS 01697',
                'telp_warga' => '+6286043254243',
                'tagihan_nama' => 'Kas Mesjid',
                'periode_nama' => 'Maret 2025',
                'pam_id' => NULL,
                'denda_ronda_id' => NULL,
                'parameter_pam' => NULL,
                'tgl_absen_ronda' => NULL,
                'id_qrcode' => '4e07408562bedb8b',
                'no_pembayaran' => '00003',
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-03-15 01:40:43',
                'updated_at' => '2025-03-15 01:40:43',
            ),
            3 => 
            array (
                'id' => 4,
                'tagihan_id' => 7,
                'periode_id' => 14,
                'warga_id' => 1,
                'nominal_dibayar' => 5000,
                'status' => 1,
                'pembayaran_tipe' => 1,
                'nama_warga' => 'Rifqi Munawar Ridwan',
                'alamat_warga' => 'D7 No. 11',
                'telp_warga' => '085151145097',
                'tagihan_nama' => 'Kas Kebersihan',
                'periode_nama' => 'Maret 2025',
                'pam_id' => NULL,
                'denda_ronda_id' => NULL,
                'parameter_pam' => NULL,
                'tgl_absen_ronda' => NULL,
                'id_qrcode' => '4b227777d4dd1fc6',
                'no_pembayaran' => '00004',
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-03-15 01:42:03',
                'updated_at' => '2025-03-15 01:42:03',
            ),
            4 => 
            array (
                'id' => 5,
                'tagihan_id' => 9,
                'periode_id' => 14,
                'warga_id' => 11,
                'nominal_dibayar' => 5000,
                'status' => 1,
                'pembayaran_tipe' => 1,
                'nama_warga' => 'SAMANI BIN TUKIMIN',
                'alamat_warga' => 'BLOK PON',
                'telp_warga' => '085151145097',
                'tagihan_nama' => 'Kas Mesjid',
                'periode_nama' => 'Maret 2025',
                'pam_id' => NULL,
                'denda_ronda_id' => NULL,
                'parameter_pam' => NULL,
                'tgl_absen_ronda' => NULL,
                'id_qrcode' => 'ef2d127de37b942b',
                'no_pembayaran' => '00005',
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-03-15 01:59:55',
                'updated_at' => '2025-03-15 01:59:55',
            ),
        ));
        
        
    }
}