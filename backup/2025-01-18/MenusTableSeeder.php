<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MenusTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('menus')->delete();
        
        \DB::table('menus')->insert(array (
            0 => 
            array (
                'id' => 1,
                'title' => 'Dashboard',
                'url' => '/',
                'route-name' => NULL,
                'icon' => 'fa fa-sitemap',
                'caret' => 0,
                'aktif' => 1,
                'parent_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2024-12-13 19:29:15',
                'updated_at' => '2024-12-19 17:07:27',
            ),
            1 => 
            array (
                'id' => 2,
                'title' => 'Settings',
                'url' => '/settings',
                'route-name' => NULL,
                'icon' => 'fa fa-cogs',
                'caret' => 1,
                'aktif' => 1,
                'parent_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2024-12-13 19:29:33',
                'updated_at' => '2024-12-13 19:29:33',
            ),
            2 => 
            array (
                'id' => 3,
                'title' => 'Menu',
                'url' => '/settings/menu',
                'route-name' => NULL,
                'icon' => NULL,
                'caret' => 0,
                'aktif' => 1,
                'parent_id' => 2,
                'deleted_at' => NULL,
                'created_at' => '2024-12-19 16:29:24',
                'updated_at' => '2024-12-19 16:34:30',
            ),
            3 => 
            array (
                'id' => 4,
                'title' => 'Role Akses',
                'url' => '/settings/role',
                'route-name' => NULL,
                'icon' => NULL,
                'caret' => 0,
                'aktif' => 1,
                'parent_id' => 2,
                'deleted_at' => NULL,
                'created_at' => '2024-12-19 16:29:51',
                'updated_at' => '2024-12-19 16:29:51',
            ),
            4 => 
            array (
                'id' => 5,
                'title' => 'General Settings',
                'url' => '/settings/general',
                'route-name' => NULL,
                'icon' => NULL,
                'caret' => 0,
                'aktif' => 1,
                'parent_id' => 2,
                'deleted_at' => NULL,
                'created_at' => '2024-12-19 16:30:26',
                'updated_at' => '2024-12-19 16:34:41',
            ),
            5 => 
            array (
                'id' => 6,
                'title' => 'Users',
                'url' => '/users',
                'route-name' => NULL,
                'icon' => 'fa fa-users',
                'caret' => 0,
                'aktif' => 1,
                'parent_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2024-12-19 16:31:27',
                'updated_at' => '2024-12-19 16:34:14',
            ),
            6 => 
            array (
                'id' => 7,
                'title' => 'Master Data',
                'url' => '/master',
                'route-name' => NULL,
                'icon' => 'fa fa-database',
                'caret' => 1,
                'aktif' => 1,
                'parent_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2024-12-21 15:45:55',
                'updated_at' => '2024-12-21 15:45:55',
            ),
            7 => 
            array (
                'id' => 8,
                'title' => 'Laporan',
                'url' => '/laporan',
                'route-name' => NULL,
                'icon' => 'fa fa-book',
                'caret' => 1,
                'aktif' => 1,
                'parent_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2024-12-21 15:47:19',
                'updated_at' => '2024-12-21 15:47:19',
            ),
            8 => 
            array (
                'id' => 9,
                'title' => 'Register Tamu',
                'url' => '/tamu',
                'route-name' => NULL,
                'icon' => 'fa fa-user',
                'caret' => 0,
                'aktif' => 1,
                'parent_id' => NULL,
                'deleted_at' => '2025-01-18 19:50:22',
                'created_at' => '2024-12-21 15:48:01',
                'updated_at' => '2025-01-18 19:50:22',
            ),
            9 => 
            array (
                'id' => 10,
                'title' => 'Register Karyawan',
                'url' => '/karyawan',
                'route-name' => NULL,
                'icon' => 'fa fa-address-card',
                'caret' => 0,
                'aktif' => 1,
                'parent_id' => NULL,
                'deleted_at' => '2025-01-18 19:50:08',
                'created_at' => '2024-12-21 17:09:35',
                'updated_at' => '2025-01-18 19:50:08',
            ),
            10 => 
            array (
                'id' => 11,
                'title' => 'Jenis kendaraan',
                'url' => '/master/jenis_kendaraan',
                'route-name' => NULL,
                'icon' => NULL,
                'caret' => 0,
                'aktif' => 1,
                'parent_id' => 7,
                'deleted_at' => '2025-01-18 19:51:01',
                'created_at' => '2024-12-21 17:24:36',
                'updated_at' => '2025-01-18 19:51:01',
            ),
            11 => 
            array (
                'id' => 12,
                'title' => 'Laporan Keuangan',
                'url' => '/lap/keuangan',
                'route-name' => NULL,
                'icon' => NULL,
                'caret' => 0,
                'aktif' => 1,
                'parent_id' => 8,
                'deleted_at' => NULL,
                'created_at' => '2024-12-21 17:29:39',
                'updated_at' => '2025-01-18 22:52:20',
            ),
            12 => 
            array (
                'id' => 13,
                'title' => 'Posisi / Jabatan',
                'url' => '/master/posisi',
                'route-name' => NULL,
                'icon' => NULL,
                'caret' => 0,
                'aktif' => 1,
                'parent_id' => 7,
                'deleted_at' => '2025-01-18 19:50:54',
                'created_at' => '2024-12-22 02:23:36',
                'updated_at' => '2025-01-18 19:50:54',
            ),
            13 => 
            array (
                'id' => 14,
                'title' => 'Karyawan',
                'url' => '/master/karyawan',
                'route-name' => NULL,
                'icon' => NULL,
                'caret' => 0,
                'aktif' => 1,
                'parent_id' => 7,
                'deleted_at' => '2025-01-18 19:50:38',
                'created_at' => '2024-12-22 03:15:36',
                'updated_at' => '2025-01-18 19:50:38',
            ),
            14 => 
            array (
                'id' => 15,
                'title' => 'Data Warga',
                'url' => '/master/warga',
                'route-name' => NULL,
                'icon' => 'fa fa-users',
                'caret' => 0,
                'aktif' => 1,
                'parent_id' => 7,
                'deleted_at' => NULL,
                'created_at' => '2025-01-17 11:11:15',
                'updated_at' => '2025-01-17 11:15:32',
            ),
            15 => 
            array (
                'id' => 16,
                'title' => 'Data Tagihan delete',
                'url' => '/tgh',
                'route-name' => NULL,
                'icon' => 'fa fa-credit-card',
                'caret' => 1,
                'aktif' => 1,
                'parent_id' => NULL,
                'deleted_at' => '2025-01-18 19:50:38',
                'created_at' => '2025-01-18 19:47:22',
                'updated_at' => '2025-01-18 22:43:11',
            ),
            16 => 
            array (
                'id' => 17,
                'title' => 'Data Blok',
                'url' => '/master/blok',
                'route-name' => NULL,
                'icon' => NULL,
                'caret' => 1,
                'aktif' => 1,
                'parent_id' => 7,
                'deleted_at' => NULL,
                'created_at' => '2025-01-18 19:48:07',
                'updated_at' => '2025-01-18 22:51:28',
            ),
            17 => 
            array (
                'id' => 18,
                'title' => 'Ronda',
                'url' => '/ronda',
                'route-name' => NULL,
                'icon' => 'fa fa-shield',
                'caret' => 0,
                'aktif' => 1,
                'parent_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-01-18 19:49:04',
                'updated_at' => '2025-01-18 19:49:04',
            ),
            18 => 
            array (
                'id' => 19,
                'title' => 'Tagihan Umum',
                'url' => '/tagihan/umum',
                'route-name' => NULL,
                'icon' => NULL,
                'caret' => 0,
                'aktif' => 1,
                'parent_id' => 22,
                'deleted_at' => NULL,
                'created_at' => '2025-01-18 22:32:42',
                'updated_at' => '2025-01-18 22:47:55',
            ),
            19 => 
            array (
                'id' => 20,
                'title' => 'Kas Pam Swadaya',
                'url' => '/tagihan/pam',
                'route-name' => NULL,
                'icon' => NULL,
                'caret' => 0,
                'aktif' => 1,
                'parent_id' => 22,
                'deleted_at' => NULL,
                'created_at' => '2025-01-18 22:33:33',
                'updated_at' => '2025-01-18 22:48:10',
            ),
            20 => 
            array (
                'id' => 21,
                'title' => 'Pembayaran',
                'url' => '/pembayaran',
                'route-name' => NULL,
                'icon' => 'fa fa-shopping-basket',
                'caret' => 0,
                'aktif' => 1,
                'parent_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-01-18 22:36:20',
                'updated_at' => '2025-01-18 22:36:20',
            ),
            21 => 
            array (
                'id' => 22,
                'title' => 'Tagihan',
                'url' => '/tagihan',
                'route-name' => NULL,
                'icon' => 'fa fa-credit-card',
                'caret' => 1,
                'aktif' => 1,
                'parent_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-01-18 22:36:20',
                'updated_at' => '2025-01-18 22:36:20',
            ),
            22 => 
            array (
                'id' => 23,
                'title' => 'Laporan Ronda',
                'url' => '/lap/ronda',
                'route-name' => NULL,
                'icon' => NULL,
                'caret' => 0,
                'aktif' => 1,
                'parent_id' => 8,
                'deleted_at' => NULL,
                'created_at' => '2025-01-18 22:52:49',
                'updated_at' => '2025-01-18 22:52:49',
            ),
            23 => 
            array (
                'id' => 24,
                'title' => 'Laporan Warga',
                'url' => '/lap/warga',
                'route-name' => NULL,
                'icon' => NULL,
                'caret' => 0,
                'aktif' => 1,
                'parent_id' => 8,
                'deleted_at' => NULL,
                'created_at' => '2025-01-18 22:53:21',
                'updated_at' => '2025-01-18 22:53:21',
            ),
            24 => 
            array (
                'id' => 25,
                'title' => 'Pengumuman',
                'url' => '/pengumuman',
                'route-name' => NULL,
                'icon' => 'fa fa-microphone',
                'caret' => 0,
                'aktif' => 1,
                'parent_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-01-18 22:56:56',
                'updated_at' => '2025-01-18 22:58:15',
            ),
        ));
        
        
    }
}