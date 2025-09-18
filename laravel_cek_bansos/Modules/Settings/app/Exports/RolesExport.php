<?php

namespace Modules\Settings\Exports;

use Modules\Settings\Models\Roles;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class RolesExport implements FromCollection, WithHeadings
{
  public function collection()
  {
    return Roles::select('id', 'name', 'created_at', 'updated_at')->get();
  }

  /**
   * Tambahkan header untuk file Excel
   */
  public function headings() : array
  {
    return [
      'ID',
      'Name',
      'Created At',
      'Updated At',
    ];
  }
}
