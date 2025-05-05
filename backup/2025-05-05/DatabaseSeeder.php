<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   */
  public function run() : void
  {
    $this->call(SettingsTableSeeder::class);
    $this->call(RolesTableSeeder::class);
    $this->call(MenusTableSeeder::class);
    $this->call(UsersTableSeeder::class);
    $this->call(RoleMenuTableSeeder::class);
    $this->call(WargasTableSeeder::class);
    $this->call(ParametersTableSeeder::class);
    $this->call(KlasifikasiSuratsTableSeeder::class);
    $this->call(SuratKeluarsTableSeeder::class);
    $this->call(SuratMasuksTableSeeder::class);
    $this->call(BerkasTableSeeder::class);
    $this->call(PenandatangansTableSeeder::class);
    $this->call(SuratDinasTableSeeder::class);
  }
}
