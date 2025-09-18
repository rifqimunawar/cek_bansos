<?php

namespace Modules\Laporan\Http\Controllers;

use Log;
use Carbon\Carbon;
use App\Helpers\Fungsi;
use App\Helpers\GetSettings;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Modules\Laporan\Exports\PembayaranExport;
use Modules\Pembayaran\Models\Pembayaran;
use Modules\Ronda\Models\RondaAbsen;

class LaporanController extends Controller
{
  public function keuangan()
  {
    return "hello world";
  }
  public function pembayaran()
  {
    Fungsi::hakAkses('/lap/pembayaran');
    $title = 'Pembayaran';

    return view(
      'laporan::/pembayaran/index',
      [
        'title' => $title,
      ]
    );
  }
  public function get_ajx_pembayaran(Request $request)
  {
    // Jika request kosong, gunakan tanggal hari ini dengan waktu 00:00:00 - 23:59:59
    $start_date = $request->input('start_date')
      ? Carbon::parse($request->input('start_date'))->startOfDay()->format('Y-m-d H:i:s')
      : now()->startOfDay()->format('Y-m-d H:i:s');

    $end_date = $request->input('end_date')
      ? Carbon::parse($request->input('end_date'))->endOfDay()->format('Y-m-d H:i:s')
      : now()->endOfDay()->format('Y-m-d H:i:s');

    // Ambil parameter DataTables
    $start = $request->input('start', 0);
    $length = $request->input('length', 10);
    $searchValue = $request->input('search.value', '');

    // Query utama
    $query = Pembayaran::whereBetween('created_at', [$start_date, $end_date]);

    // Jika ada pencarian, tambahkan filter LIKE pada nama_warga
    if (!empty($searchValue)) {
      $query->where('nama_warga', 'LIKE', "%{$searchValue}%");
    }

    // Hitung total data setelah filter
    $totalData = $query->count();

    // Ambil data dengan paginasi
    $data = $query->orderBy('created_at', 'desc')
      ->skip($start)->take($length)
      ->get();

    // Tambahkan nomor urut dan keterangan ke dalam data
    foreach ($data as $index => $item) {
      $item->number = $start + $index + 1;
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
    }

    // Response JSON untuk DataTables
    return response()->json([
      'draw' => $request->input('draw'),
      'recordsTotal' => $totalData,
      'recordsFiltered' => $totalData,
      'data' => $data
    ]);
  }

  public function export()
  {
    return Excel::download(new PembayaranExport, 'pembayaran.xlsx');
  }
  public function pdf()
  {
    $title = "List Data Pembayaran per :" . Carbon::now()->format('d-M-Y');
    $today = Carbon::now()->format('d M Y');
    $data = Pembayaran::latest()->get();

    // dd($data);
    // ========================untuk development
    // return view(
    //   'laporan::pembayaran/pdf',
    //   [
    //     'title' => $title,
    //     'data' => $data,
    //     'today' => $today,
    //   ]
    // );

    // ========================untuk production
    $html = view('laporan::pembayaran/pdf', [
      'title' => $title,
      'data' => $data,
      'today' => $today,
    ])->render();

    $mpdf = new \Mpdf\Mpdf();
    $mpdf->WriteHTML($html);
    $fileName = Carbon::now()->format('Y_m_d') . '_data_pembayaran.pdf';
    $mpdf->Output($fileName, 'D');
    $mpdf->Output();
  }


  public function absen()
  {
    Fungsi::hakAkses('/lap/absen');
    $title = 'Absen';
    $data = RondaAbsen::where('absen', 2)->with('warga')->paginate(25);

    return view(
      'laporan::/absen/index',
      [
        'title' => $title,
        'data' => $data,
      ]
    );
  }
  public function view($id)
  {
    $data = RondaAbsen::where('absen', 2)->with('warga')->findOrFail($id);
    // $url = config('app.url');
    $url = GetSettings::getBaseUrl();

    $image = $url . 'img/absen/' . $data->img;

    return response()->json([
      'image' => $image,
    ]);
  }

}
