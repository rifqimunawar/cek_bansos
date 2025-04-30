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
                'id' => 5,
                'tagihan_id' => 7,
                'periode_id' => 8,
                'warga_id' => 11,
                'nominal_dibayar' => 5000,
                'status' => 1,
                'nama_warga' => 'jhon',
                'alamat_warga' => 'jjj',
                'telp_warga' => '085151145097',
                'tagihan_nama' => 'Kas Kebersihan',
                'periode_nama' => NULL,
                'pam_id' => NULL,
                'parameter_pam' => NULL,
                'tgl_absen_ronda' => NULL,
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-02-16 19:06:10',
                'updated_at' => '2025-02-16 19:06:10',
            ),
            1 => 
            array (
                'id' => 6,
                'tagihan_id' => 9,
                'periode_id' => 8,
                'warga_id' => 7,
                'nominal_dibayar' => 5000,
                'status' => 1,
                'nama_warga' => 'Leonel Messi',
                'alamat_warga' => 'argentina',
                'telp_warga' => '085151145097',
                'tagihan_nama' => 'Kas Mesjid',
                'periode_nama' => NULL,
                'pam_id' => NULL,
                'parameter_pam' => NULL,
                'tgl_absen_ronda' => NULL,
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-02-16 19:07:07',
                'updated_at' => '2025-02-16 19:07:07',
            ),
            2 => 
            array (
                'id' => 7,
                'tagihan_id' => 8,
                'periode_id' => 7,
                'warga_id' => 7,
                'nominal_dibayar' => 10000,
                'status' => 1,
                'nama_warga' => 'Leonel Messi',
                'alamat_warga' => 'argentina',
                'telp_warga' => '085151145097',
                'tagihan_nama' => 'Kas Keamanan',
                'periode_nama' => NULL,
                'pam_id' => NULL,
                'parameter_pam' => NULL,
                'tgl_absen_ronda' => NULL,
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-02-16 19:07:21',
                'updated_at' => '2025-02-16 19:07:21',
            ),
            3 => 
            array (
                'id' => 8,
                'tagihan_id' => 9,
                'periode_id' => 7,
                'warga_id' => 11,
                'nominal_dibayar' => 5000,
                'status' => 1,
                'nama_warga' => 'jhon',
                'alamat_warga' => 'jjj',
                'telp_warga' => '085151145097',
                'tagihan_nama' => 'Kas Mesjid',
                'periode_nama' => 'Januari 2025',
                'pam_id' => NULL,
                'parameter_pam' => NULL,
                'tgl_absen_ronda' => NULL,
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-02-16 19:14:16',
                'updated_at' => '2025-02-16 19:14:16',
            ),
            4 => 
            array (
                'id' => 9,
                'tagihan_id' => NULL,
                'periode_id' => NULL,
                'warga_id' => 8,
                'nominal_dibayar' => 5000,
                'status' => 1,
                'nama_warga' => 'Antony El-Gasing',
                'alamat_warga' => 'Al hilal',
                'telp_warga' => '085151145097',
                'tagihan_nama' => 'Pam Swadaya',
                'periode_nama' => NULL,
                'pam_id' => NULL,
                'parameter_pam' => 1,
                'tgl_absen_ronda' => NULL,
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-02-18 20:06:07',
                'updated_at' => '2025-02-18 20:06:07',
            ),
            5 => 
            array (
                'id' => 10,
                'tagihan_id' => NULL,
                'periode_id' => NULL,
                'warga_id' => 8,
                'nominal_dibayar' => 15000,
                'status' => 1,
                'nama_warga' => 'Antony El-Gasing',
                'alamat_warga' => 'Al hilal',
                'telp_warga' => '085151145097',
                'tagihan_nama' => 'Pam Swadaya',
                'periode_nama' => NULL,
                'pam_id' => 5,
                'parameter_pam' => 3,
                'tgl_absen_ronda' => NULL,
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-02-18 20:20:43',
                'updated_at' => '2025-02-18 20:20:43',
            ),
            6 => 
            array (
                'id' => 11,
                'tagihan_id' => NULL,
                'periode_id' => NULL,
                'warga_id' => 8,
                'nominal_dibayar' => 5000,
                'status' => 1,
                'nama_warga' => 'Antony El-Gasing',
                'alamat_warga' => 'Al hilal',
                'telp_warga' => '085151145097',
                'tagihan_nama' => 'Pam Swadaya',
                'periode_nama' => NULL,
                'pam_id' => 2,
                'parameter_pam' => 1,
                'tgl_absen_ronda' => NULL,
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-02-18 20:32:09',
                'updated_at' => '2025-02-18 20:32:09',
            ),
        ));
        
        
    }
}