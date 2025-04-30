<?php

namespace Modules\Laporan\Exports;

use App\Helpers\Fungsi;
use Modules\Master\Models\Posisi;
use Modules\Master\Models\Karyawan;
use Modules\Pembayaran\Models\Pembayaran;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class PembayaranExport implements FromCollection, WithHeadings
{
  public function collection()
  {
    return Pembayaran::select(['nama_warga', 'telp_warga', 'tagihan_nama', 'periode_nama', 'parameter_pam', 'tgl_absen_ronda', 'nominal_dibayar'])
      ->get()
      ->map(function ($item, $key) {
        // Menambahkan nomor urut
        $item->no_urut = $key + 1;
        $item->keterangan = '';

        if (!empty($item->periode_nama)) {
          $item->keterangan .= 'Periode ' . $item->periode_nama;
        }
        if (!empty($item->tgl_absen_ronda)) {
          $item->keterangan .= ($item->keterangan ? ' | ' : '') . 'Absen Ronda ' . $item->tgl_absen_ronda;
        }
        if (!empty($item->parameter_pam)) {
          $item->keterangan .= ($item->keterangan ? ' | ' : '') . 'Pam ' . $item->parameter_pam . ' m³';
        }

        // Format nominal dalam bentuk rupiah
        $item->nominal_dibayar = Fungsi::rupiah($item->nominal_dibayar);

        // dd($item);
  
        // Pastikan hanya field yang sesuai dikembalikan
        return [
          'no_urut' => $item->no_urut,
          'nama_warga' => $item->nama_warga,
          'telp_warga' => $item->telp_warga,
          'tagihan_nama' => $item->tagihan_nama,
          'nominal_dibayar' => $item->nominal_dibayar,
          'keterangan' => $item->keterangan,
        ];
      });
  }


  public function headings() : array
  {
    return [
      'No',
      'Nama Lengkap',
      'Kontak Warga',
      'Jenis Pembayaran',
      'Nominal',
      'Keterangan',
    ];
  }
}
