<?php

namespace Modules\Master\Exports;

use Modules\Master\Models\Warga;
use Modules\Master\Models\Posisi;
use Modules\Master\Models\Karyawan;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class WargaExport implements FromCollection, WithHeadings
{
  public function collection()
  {
    return Warga::select(['nama', 'nik',])
      ->get()
      ->map(function ($item, $key) {
        // Menambahkan nomor urut
        $item->no_urut = $key + 1;

        // Mengubah nama posisi dan jenis kendaraan menjadi string
        $item->posisi_nama = $item->posisi_id ? $item->posisi->posisi_nama : 'N/A';
        $item->jenis_kendaraan = $item->jenis_kendaraan_id ? $item->jenisKendaraan->jenis_kendaraan : 'N/A';

        // Menghapus data relasi untuk menghindari masalah saat diexport
        unset($item->posisi);
        unset($item->jenisKendaraan);

        // Mengembalikan hanya kolom yang diperlukan
        return [
          'no_urut' => $item->no_urut,
          'nama_lengkap' => $item->nama_lengkap,
          'nik' => $item->nik,
          'posisi_nama' => $item->posisi_nama,
          'jenis_kendaraan' => $item->jenis_kendaraan,
        ];
      });
  }

  public function headings() : array
  {
    return [
      'No',
      'Nama Lengkap',
      'NIK',
      'Posisi / Jabatan',
      'Jenis Kendaraan',
    ];
  }
}
