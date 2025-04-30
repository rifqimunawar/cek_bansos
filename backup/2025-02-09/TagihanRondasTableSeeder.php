<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TagihanRondasTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('tagihan_rondas')->delete();
        
        \DB::table('tagihan_rondas')->insert(array (
            0 => 
            array (
                'id' => 1,
                'ronda_id' => 1,
                'warga_id' => 7,
                'tgl_absen_ronda' => '2025-01-22 00:00:00',
                'nominal_tagihan' => 20000,
                'status_denda' => 0,
                'created_by' => 'unknown',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => '2025-01-24 15:57:17',
                'created_at' => '2025-01-23 21:14:17',
                'updated_at' => '2025-01-24 15:57:17',
            ),
            1 => 
            array (
                'id' => 2,
                'ronda_id' => 1,
                'warga_id' => 6,
                'tgl_absen_ronda' => '2025-01-22 00:00:00',
                'nominal_tagihan' => 20000,
                'status_denda' => 0,
                'created_by' => 'unknown',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => '2025-01-24 15:57:09',
                'created_at' => '2025-01-23 21:14:17',
                'updated_at' => '2025-01-24 15:57:09',
            ),
            2 => 
            array (
                'id' => 3,
                'ronda_id' => 1,
                'warga_id' => 7,
                'tgl_absen_ronda' => '2025-01-22 00:00:00',
                'nominal_tagihan' => 20000,
                'status_denda' => 0,
                'created_by' => 'unknown',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => '2025-01-30 13:37:25',
                'created_at' => '2025-01-24 15:57:17',
                'updated_at' => '2025-01-30 13:37:25',
            ),
            3 => 
            array (
                'id' => 4,
                'ronda_id' => 2,
                'warga_id' => 6,
                'tgl_absen_ronda' => '2025-01-25 00:00:00',
                'nominal_tagihan' => 20000,
                'status_denda' => 0,
                'created_by' => 'unknown',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => '2025-01-30 13:37:32',
                'created_at' => '2025-01-30 13:37:13',
                'updated_at' => '2025-01-30 13:37:32',
            ),
            4 => 
            array (
                'id' => 5,
                'ronda_id' => 2,
                'warga_id' => 1,
                'tgl_absen_ronda' => '2025-01-25 00:00:00',
                'nominal_tagihan' => 20000,
                'status_denda' => 0,
                'created_by' => 'unknown',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-01-30 13:37:13',
                'updated_at' => '2025-01-30 13:37:13',
            ),
            5 => 
            array (
                'id' => 6,
                'ronda_id' => 1,
                'warga_id' => 7,
                'tgl_absen_ronda' => '2025-01-22 00:00:00',
                'nominal_tagihan' => 20000,
                'status_denda' => 0,
                'created_by' => 'unknown',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-01-30 13:37:26',
                'updated_at' => '2025-01-30 13:37:26',
            ),
            6 => 
            array (
                'id' => 7,
                'ronda_id' => 2,
                'warga_id' => 6,
                'tgl_absen_ronda' => '2025-01-25 00:00:00',
                'nominal_tagihan' => 20000,
                'status_denda' => 0,
                'created_by' => 'unknown',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => '2025-01-30 13:37:39',
                'created_at' => '2025-01-30 13:37:33',
                'updated_at' => '2025-01-30 13:37:39',
            ),
            7 => 
            array (
                'id' => 8,
                'ronda_id' => 2,
                'warga_id' => 6,
                'tgl_absen_ronda' => '2025-01-25 00:00:00',
                'nominal_tagihan' => 20000,
                'status_denda' => 0,
                'created_by' => 'unknown',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-01-30 13:37:39',
                'updated_at' => '2025-01-30 13:37:39',
            ),
            8 => 
            array (
                'id' => 9,
                'ronda_id' => 3,
                'warga_id' => 7,
                'tgl_absen_ronda' => '2025-02-02 00:00:00',
                'nominal_tagihan' => 20000,
                'status_denda' => 0,
                'created_by' => 'unknown',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => '2025-02-03 15:54:45',
                'created_at' => '2025-02-03 15:53:42',
                'updated_at' => '2025-02-03 15:54:45',
            ),
            9 => 
            array (
                'id' => 10,
                'ronda_id' => 3,
                'warga_id' => 1,
                'tgl_absen_ronda' => '2025-02-02 00:00:00',
                'nominal_tagihan' => 20000,
                'status_denda' => 0,
                'created_by' => 'unknown',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => '2025-02-03 15:53:57',
                'created_at' => '2025-02-03 15:53:42',
                'updated_at' => '2025-02-03 15:53:57',
            ),
            10 => 
            array (
                'id' => 11,
                'ronda_id' => 4,
                'warga_id' => 7,
                'tgl_absen_ronda' => '2025-01-28 00:00:00',
                'nominal_tagihan' => 20000,
                'status_denda' => 0,
                'created_by' => 'unknown',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => '2025-02-03 15:54:17',
                'created_at' => '2025-02-03 15:53:42',
                'updated_at' => '2025-02-03 15:54:17',
            ),
            11 => 
            array (
                'id' => 12,
                'ronda_id' => 3,
                'warga_id' => 1,
                'tgl_absen_ronda' => '2025-02-02 00:00:00',
                'nominal_tagihan' => 20000,
                'status_denda' => 0,
                'created_by' => 'unknown',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => '2025-02-03 15:54:07',
                'created_at' => '2025-02-03 15:53:57',
                'updated_at' => '2025-02-03 15:54:07',
            ),
            12 => 
            array (
                'id' => 13,
                'ronda_id' => 3,
                'warga_id' => 1,
                'tgl_absen_ronda' => '2025-02-02 00:00:00',
                'nominal_tagihan' => 20000,
                'status_denda' => 0,
                'created_by' => 'unknown',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => '2025-02-03 15:54:35',
                'created_at' => '2025-02-03 15:54:07',
                'updated_at' => '2025-02-03 15:54:35',
            ),
            13 => 
            array (
                'id' => 14,
                'ronda_id' => 4,
                'warga_id' => 7,
                'tgl_absen_ronda' => '2025-01-28 00:00:00',
                'nominal_tagihan' => 20000,
                'status_denda' => 0,
                'created_by' => 'unknown',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-02-03 15:54:17',
                'updated_at' => '2025-02-03 15:54:17',
            ),
            14 => 
            array (
                'id' => 15,
                'ronda_id' => 3,
                'warga_id' => 1,
                'tgl_absen_ronda' => '2025-02-02 00:00:00',
                'nominal_tagihan' => 20000,
                'status_denda' => 0,
                'created_by' => 'unknown',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-02-03 15:54:36',
                'updated_at' => '2025-02-03 15:54:36',
            ),
            15 => 
            array (
                'id' => 16,
                'ronda_id' => 3,
                'warga_id' => 7,
                'tgl_absen_ronda' => '2025-02-02 00:00:00',
                'nominal_tagihan' => 20000,
                'status_denda' => 0,
                'created_by' => 'unknown',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-02-03 15:54:45',
                'updated_at' => '2025-02-03 15:54:45',
            ),
        ));
        
        
    }
}