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
    $this->call(JenisKendaraansTableSeeder::class);
    $this->call(PosisisTableSeeder::class);
    $this->call(KaryawansTableSeeder::class);
    $this->call(WargasTableSeeder::class);
    $this->call(PeriodesTableSeeder::class);
    $this->call(UmumsTableSeeder::class);
    $this->call(PamsTableSeeder::class);
    $this->call(RondasTableSeeder::class);
    $this->call(UmumWargaTableSeeder::class);
    $this->call(PembayaransTableSeeder::class);
    $this->call(PeriodeUmumTableSeeder::class);
    $this->call(RondaWargaTableSeeder::class);
    $this->call(RondaAbsensTableSeeder::class);
    $this->call(TagihanRondasTableSeeder::class);
    $this->call(ParametersTableSeeder::class);
  }
}
