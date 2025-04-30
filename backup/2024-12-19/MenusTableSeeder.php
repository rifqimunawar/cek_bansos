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

    \DB::table('menus')->insert(array(
      0 =>
        array(
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
        array(
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
    ));
  }
}
