<?php

namespace Modules\Users\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class UsersExport implements FromCollection, WithHeadings
{
  public function collection()
  {
    $users = User::select('name', 'username', 'email')->get();

    return $users->map(function ($user, $index) {
      return [
        'no' => $index + 1,
        'name' => $user->name,
        'username' => $user->username,
        'email' => $user->email,
      ];
    });
  }


  public function headings() : array
  {
    return [
      'No',
      'Nama Lengkap',
      'Username Akun',
      'Email',
    ];
  }

}
