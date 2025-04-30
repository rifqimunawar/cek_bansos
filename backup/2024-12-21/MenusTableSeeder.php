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
        ));
        
        
    }
}