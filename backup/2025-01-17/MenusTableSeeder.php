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
                'deleted_at' => NULL,
                'created_at' => '2024-12-21 15:48:01',
                'updated_at' => '2024-12-21 17:08:34',
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
                'deleted_at' => NULL,
                'created_at' => '2024-12-21 17:09:35',
                'updated_at' => '2024-12-21 17:10:07',
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
                'deleted_at' => NULL,
                'created_at' => '2024-12-21 17:24:36',
                'updated_at' => '2024-12-21 17:24:36',
            ),
            11 => 
            array (
                'id' => 12,
                'title' => 'Data Pengunjung',
                'url' => '/lap/pengunjung',
                'route-name' => NULL,
                'icon' => NULL,
                'caret' => 0,
                'aktif' => 1,
                'parent_id' => 8,
                'deleted_at' => NULL,
                'created_at' => '2024-12-21 17:29:39',
                'updated_at' => '2024-12-21 17:32:38',
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
                'deleted_at' => NULL,
                'created_at' => '2024-12-22 02:23:36',
                'updated_at' => '2024-12-22 02:23:36',
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
                'deleted_at' => NULL,
                'created_at' => '2024-12-22 03:15:36',
                'updated_at' => '2024-12-22 03:15:36',
            ),
        ));
        
        
    }
}