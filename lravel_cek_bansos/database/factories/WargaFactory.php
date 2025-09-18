<?php

namespace Database\Factories;

use Carbon\Carbon;
use Modules\Master\Models\Warga;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Warga>
 */

class WargaFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */

  protected $model = Warga::class;

  public function definition() : array
  {
    $namaIndonesia = [
      'Budi Santoso',
      'Agus Haryanto',
      'Andi Wijaya',
      'Hendra Gunawan',
      'Yusuf Maulana',
      'Fajar Nugroho',
      'Rahmat Hidayat',
      'Anton Firmansyah',
      'Dedi Kurniawan',
      'Imam Setiawan',
      'Joko Prabowo',
      'Slamet Riyadi',
      'Surya Dharma',
      'Taufik Ismail',
      'Rizky Ramadhan',
      'Eko Purnomo',
      'Bayu Saputra',
      'Ahmad Fauzi',
      'Arif Rahman',
      'Irwan Syahputra',
      'Fahmi Aditya',
      'Hafiz Syamsudin',
      'Irfan Maulana',
      'Adi Nugraha',
      'Reza Pratama',
      'Donny Wijaya',
      'Hari Santoso',
      'Ridho Alamsyah',
      'Dimas Kurniawan',
      'Rian Firmansyah',
      'Putra Mahendra',
      'Fikri Irawan',
      'Galih Saputra',
      'Ilham Ramadhan',
      'Agung Setiawan',
      'Rendi Prasetyo',
      'Zulfikar Rizki',
      'Yoga Permana',
      'Rangga Putra',
      'Wahyu Nugroho',

      'Siti Aminah',
      'Rina Marlina',
      'Dewi Sartika',
      'Fitriani',
      'Ratna Dewi',
      'Ayu Lestari',
      'Diana Permatasari',
      'Intan Nuraini',
      'Yuni Kartika',
      'Lina Marlina',
      'Nia Ramadhani',
      'Wulan Sari',
      'Rani Oktavia',
      'Mega Putri',
      'Citra Ayu',
      'Tari Wulandari',
      'Anisa Rahma',
      'Nurul Hidayati',
      'Diah Ayuningtyas',
      'Vina Aprilia',
      'Melati Cahyaningrum',
      'Sari Indah',
      'Putri Kartika',
      'Desi Natalia',
      'Farah Amalia',
      'Lestari Handayani',
      'Aulia Khairunnisa',
      'Salsabila Zahra',
      'Zahra Hanifah',
      'Amanda Putri',
      'Citra Ayuningrum',
      'Tiara Lestari',
      'Maya Indriyani',
      'Silvia Maulani',
      'Rosa Kurniasih',
      'Fitria Sari',
      'Hesti Wulandari',
      'Karina Nurhaliza',
      'Laila Rahmania',
      'Nabila Aprilia',

      'Alexandra Putra',
      'Revi Ardiansyah',
      'Dian Sastrowardoyo',
      'Novi Andriani',
      'Ari Wibowo',
      'Denny Indrawan',
      'Ricky Maulana',
      'Rizka Nuraini',
      'Novi Lestari',
      'Ferry Anugrah'
    ];


    return [
      'nama' => $this->faker->randomElement($namaIndonesia),
      'telp' => '+62' . $this->faker->numerify('8##########'), // No telepon khas Indonesia
      'alamat' => $this->faker->address(), // Alamat di Indonesia
      'nik' => $this->faker->numerify('################'), // 16 angka
      'jk' => $this->faker->randomElement(['Laki-laki', 'Perempuan']), // Jenis kelamin
      'kota_kelahiran' => $this->faker->city(), // Kota di Indonesia
      'tgl_lahir' => $this->faker->dateTimeBetween('-34 years', '-19 years')->format('Y-m-d'), // Tahun 1990-2005
      'agama' => $this->faker->numberBetween(1, 4), // 1 - 4
      'pendidikan' => $this->faker->numberBetween(1, 7), // 1 - 7
      'pekerjaan' => $this->faker->numberBetween(1, 20), // 1 - 20
      'status_perkawinan' => $this->faker->numberBetween(1, 4), // 1 - 4
      'status_keluarga' => $this->faker->numberBetween(1), // 1 - 4
      'created_by' => 'admin',
      'updated_by' => 'admin',
      'deleted_by' => null,
      'deleted_at' => null,
      'created_at' => Carbon::now(),
      'updated_at' => Carbon::now(),
    ];
  }
}
