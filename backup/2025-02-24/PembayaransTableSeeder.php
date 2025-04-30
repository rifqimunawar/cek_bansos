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
                'id' => 16,
                'tagihan_id' => 9,
                'periode_id' => 11,
                'warga_id' => 7,
                'nominal_dibayar' => 5000,
                'status' => 1,
                'pembayaran_tipe' => 1,
                'nama_warga' => 'Leonel Messi',
                'alamat_warga' => 'argentina',
                'telp_warga' => '085151145097',
                'tagihan_nama' => 'Kas Mesjid',
                'periode_nama' => 'Januari 2025',
                'pam_id' => NULL,
                'denda_ronda_id' => NULL,
                'parameter_pam' => NULL,
                'tgl_absen_ronda' => NULL,
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-02-21 22:32:54',
                'updated_at' => '2025-02-21 22:32:54',
            ),
            1 => 
            array (
                'id' => 17,
                'tagihan_id' => 8,
                'periode_id' => 11,
                'warga_id' => 7,
                'nominal_dibayar' => 10000,
                'status' => 1,
                'pembayaran_tipe' => 1,
                'nama_warga' => 'Leonel Messi',
                'alamat_warga' => 'argentina',
                'telp_warga' => '085151145097',
                'tagihan_nama' => 'Kas Keamanan',
                'periode_nama' => 'Januari 2025',
                'pam_id' => NULL,
                'denda_ronda_id' => NULL,
                'parameter_pam' => NULL,
                'tgl_absen_ronda' => NULL,
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-02-23 12:17:55',
                'updated_at' => '2025-02-23 12:17:55',
            ),
            2 => 
            array (
                'id' => 18,
                'tagihan_id' => NULL,
                'periode_id' => NULL,
                'warga_id' => 7,
                'nominal_dibayar' => 10000,
                'status' => 1,
                'pembayaran_tipe' => 2,
                'nama_warga' => 'Leonel Messi',
                'alamat_warga' => 'argentina',
                'telp_warga' => '085151145097',
                'tagihan_nama' => 'Pam Swadaya',
                'periode_nama' => NULL,
                'pam_id' => 4,
                'denda_ronda_id' => NULL,
                'parameter_pam' => 2,
                'tgl_absen_ronda' => NULL,
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-02-23 12:41:22',
                'updated_at' => '2025-02-23 12:41:22',
            ),
        ));
        
        
    }
}