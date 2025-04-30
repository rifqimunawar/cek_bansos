<?php

namespace Modules\Tagihanku\Http\Controllers;

use App\Helpers\Fungsi;
use Illuminate\Http\Request;
use Modules\Master\Models\Warga;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TagihankuController extends Controller
{
  public function rutin()
  {
    $userLogin = Auth::user();
    Fungsi::hakAkses('/tagihanku/rutin');
    $alert = 'Delete Data!';
    $text = "Are you sure you want to delete?";
    confirmDelete($alert, $text);

    $title = $userLogin->name;
    $data = Warga::rutinBelumDibayar($userLogin->warga_id);
    // return $data;
    return view(
      'tagihanku::/rutin',
      [
        'title' => $title,
        'data' => $data,
      ]
    );
  }
  public function pam()
  {
    $userLogin = Auth::user();
    Fungsi::hakAkses('/tagihanku/rutin');
    $alert = 'Delete Data!';
    $text = "Are you sure you want to delete?";
    confirmDelete($alert, $text);

    $title = $userLogin->name;
    $data = Warga::pamBelumDibayar($userLogin->warga_id);
    // return $data;
    return view(
      'tagihanku::/pam',
      [
        'title' => $title,
        'data' => $data,
      ]
    );
  }
  public function ronda()
  {
    $userLogin = Auth::user();
    Fungsi::hakAkses('/tagihanku/rutin');
    $alert = 'Delete Data!';
    $text = "Are you sure you want to delete?";
    confirmDelete($alert, $text);

    $title = $userLogin->name;
    $data = Warga::RondaBelumDibayar($userLogin->warga_id);
    // return $data;
    return view(
      'tagihanku::/ronda',
      [
        'title' => $title,
        'data' => $data,
      ]
    );
  }




  public function print()
  {
    $title = "List Data Warga ";
    $data = Warga::latest();
    return view(
      'master::warga/print',
      [
        'title' => $title,
        'data' => $data,
      ]
    );
  }
  public function export()
  {
    return Excel::download(new WargaExport, 'warga.xlsx');
  }
  public function pdf()
  {
    $title = "List Data Warga " . Carbon::now()->format('d-M-Y');
    $today = Carbon::now()->format('d M Y');
    $data = Warga::latest();

    // ========================untuk ngecek
    return view(
      'master::warga/pdf',
      [
        'title' => $title,
        'data' => $data,
        'today' => $today,
      ]
    );

    // $html = view('master::warga.pdf', [
    //   'title' => $title,
    //   'data' => $data,
    //   'today' => $today,
    // ])->render();

    // $mpdf = new \Mpdf\Mpdf();
    // $mpdf->WriteHTML($html);
    // $fileName = Carbon::now()->format('Y_m_d') . '_data_karyawan.pdf';
    // $mpdf->Output($fileName, 'D');
    // $mpdf->Output();
  }
}
