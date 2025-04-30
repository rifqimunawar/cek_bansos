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
                'tagihan_id' => 7,
                'periode_id' => 15,
                'warga_id' => 15,
                'nominal_dibayar' => 3000,
                'status' => 1,
                'pembayaran_tipe' => 1,
                'nama_warga' => 'Maya Indriyani',
                'alamat_warga' => '136 Dovie DrivePort Jedediahberg, AK 34507-3064',
                'telp_warga' => '+6287346168005',
                'tagihan_nama' => 'Kas Kebersihan',
                'periode_nama' => 'April 2025',
                'pam_id' => NULL,
                'denda_ronda_id' => NULL,
                'parameter_pam' => NULL,
                'tgl_absen_ronda' => NULL,
                'id_qrcode' => '6b86b273ff34fce1',
                'no_pembayaran' => '00001',
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-04-11 14:38:15',
                'updated_at' => '2025-04-11 14:38:15',
            ),
            1 => 
            array (
                'id' => 2,
                'tagihan_id' => 8,
                'periode_id' => 15,
                'warga_id' => 15,
                'nominal_dibayar' => 2000,
                'status' => 1,
                'pembayaran_tipe' => 1,
                'nama_warga' => 'Maya Indriyani',
                'alamat_warga' => '136 Dovie DrivePort Jedediahberg, AK 34507-3064',
                'telp_warga' => '+6287346168005',
                'tagihan_nama' => 'Kas Keamanan',
                'periode_nama' => 'April 2025',
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
                'created_at' => '2025-04-11 14:40:20',
                'updated_at' => '2025-04-11 14:40:20',
            ),
            2 => 
            array (
                'id' => 3,
                'tagihan_id' => NULL,
                'periode_id' => NULL,
                'warga_id' => 15,
                'nominal_dibayar' => 15000,
                'status' => 1,
                'pembayaran_tipe' => 2,
                'nama_warga' => 'Maya Indriyani',
                'alamat_warga' => '136 Dovie DrivePort Jedediahberg, AK 34507-3064',
                'telp_warga' => '+6287346168005',
                'tagihan_nama' => 'Pam Swadaya',
                'periode_nama' => NULL,
                'pam_id' => 1,
                'denda_ronda_id' => NULL,
                'parameter_pam' => 3,
                'tgl_absen_ronda' => NULL,
                'id_qrcode' => '4e07408562bedb8b',
                'no_pembayaran' => '00003',
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-04-11 14:40:33',
                'updated_at' => '2025-04-11 14:40:33',
            ),
            3 => 
            array (
                'id' => 4,
                'tagihan_id' => NULL,
                'periode_id' => NULL,
                'warga_id' => 15,
                'nominal_dibayar' => 10000,
                'status' => 1,
                'pembayaran_tipe' => 3,
                'nama_warga' => 'Maya Indriyani',
                'alamat_warga' => '136 Dovie DrivePort Jedediahberg, AK 34507-3064',
                'telp_warga' => '+6287346168005',
                'tagihan_nama' => 'Denda Ronda',
                'periode_nama' => NULL,
                'pam_id' => NULL,
                'denda_ronda_id' => 43,
                'parameter_pam' => NULL,
                'tgl_absen_ronda' => 'Rabu, 9 April 2025',
                'id_qrcode' => '4b227777d4dd1fc6',
                'no_pembayaran' => '00004',
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-04-11 14:40:53',
                'updated_at' => '2025-04-11 14:40:53',
            ),
            4 => 
            array (
                'id' => 5,
                'tagihan_id' => NULL,
                'periode_id' => NULL,
                'warga_id' => 24,
                'nominal_dibayar' => 10000,
                'status' => 1,
                'pembayaran_tipe' => 3,
                'nama_warga' => 'Joko Prabowo',
                'alamat_warga' => '60726 Deja Hill Suite 673West Hettie, VA 34461',
                'telp_warga' => '+6285241930210',
                'tagihan_nama' => 'Denda Ronda',
                'periode_nama' => NULL,
                'pam_id' => NULL,
                'denda_ronda_id' => 9,
                'parameter_pam' => NULL,
                'tgl_absen_ronda' => 'Rabu, 2 April 2025',
                'id_qrcode' => 'ef2d127de37b942b',
                'no_pembayaran' => '00005',
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-04-17 11:33:57',
                'updated_at' => '2025-04-17 11:33:57',
            ),
        ));
        
        
    }
}