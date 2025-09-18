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
                'icon' => NULL,
                'caret' => 0,
                'aktif' => 1,
                'parent_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2024-12-13 19:29:15',
                'updated_at' => '2024-12-13 19:29:15',
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
                'title' => 'Modules',
                'url' => '/settings/menu',
                'route-name' => NULL,
                'icon' => NULL,
                'caret' => 0,
                'aktif' => 1,
                'parent_id' => 2,
                'deleted_at' => NULL,
                'created_at' => '2024-12-13 19:30:16',
                'updated_at' => '2024-12-13 19:30:16',
            ),
            3 => 
            array (
                'id' => 4,
                'title' => 'General Settings',
                'url' => '/settings/general',
                'route-name' => NULL,
                'icon' => NULL,
                'caret' => 0,
                'aktif' => 1,
                'parent_id' => 2,
                'deleted_at' => NULL,
                'created_at' => '2024-12-13 19:30:50',
                'updated_at' => '2024-12-13 19:30:50',
            ),
            4 => 
            array (
                'id' => 5,
                'title' => 'Role Admin',
                'url' => '/settings/role',
                'route-name' => NULL,
                'icon' => NULL,
                'caret' => 0,
                'aktif' => 1,
                'parent_id' => 2,
                'deleted_at' => NULL,
                'created_at' => '2024-12-13 19:31:49',
                'updated_at' => '2024-12-13 19:31:49',
            ),
            5 => 
            array (
                'id' => 6,
                'title' => 'Role Akses',
                'url' => '/settings/roleAkses',
                'route-name' => NULL,
                'icon' => NULL,
                'caret' => 0,
                'aktif' => 1,
                'parent_id' => 2,
                'deleted_at' => '2024-12-13 19:37:34',
                'created_at' => '2024-12-13 19:32:21',
                'updated_at' => '2024-12-13 19:37:34',
            ),
            6 => 
            array (
                'id' => 7,
                'title' => 'Role Akses',
                'url' => '/settings/roleAkses',
                'route-name' => NULL,
                'icon' => NULL,
                'caret' => 0,
                'aktif' => 1,
                'parent_id' => 2,
                'deleted_at' => '2024-12-13 19:38:50',
                'created_at' => '2024-12-13 19:38:37',
                'updated_at' => '2024-12-13 19:38:50',
            ),
            7 => 
            array (
                'id' => 8,
                'title' => 'Users',
                'url' => '/users',
                'route-name' => NULL,
                'icon' => 'fa fa-users',
                'caret' => 0,
                'aktif' => 1,
                'parent_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2024-12-13 22:10:50',
                'updated_at' => '2024-12-14 06:43:01',
            ),
        ));
        
        
    }
}