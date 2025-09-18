<?php

namespace Modules\Master\Exports;

use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Modules\Master\Models\Posisi;

class PosisiExport implements FromCollection, WithHeadings
{
  public function collection()
  {
    return Posisi::select('id', 'posisi_nama', 'created_at', 'updated_at')->get();
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
