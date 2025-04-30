<?php

namespace Modules\Dashboard\Http\Controllers;

use Carbon\Carbon;
use App\Helpers\Fungsi;
use Illuminate\Http\Request;
use Modules\Ronda\Models\Ronda;
use Modules\Master\Models\Warga;
use App\Http\Controllers\Controller;
use Modules\Master\Models\Parameter;
use Modules\Tagihan\Models\TagihanRonda;
use Modules\Pembayaran\Models\Pembayaran;

class DashboardController extends Controller
{

  public function index()
  {

    $data = "data";

    return view('dashboard::index', ['data' => $data]);
  }

  // public function statistik()
  // {
  //   $data['last_30_days'] = [];


  //   for ($i = 29; $i >= 0; $i--) {
  //     $date = Carbon::now()->subDays($i);

  //     $data['last_30_days'][] = [
  //       'date' => $date->toDateString(),
  //       'date_month' => $date->format('M-d'),
  //       'day' => $date->format('l'),
  //       'payment_rutin' => Pembayaran::where('pembayaran_tipe', 1)
  //         ->whereDate('created_at', $date)
  //         ->sum('nominal_dibayar'),
  //       'payment_pam' => Pembayaran::where('pembayaran_tipe', 2)
  //         ->whereDate('created_at', $date)
  //         ->sum('nominal_dibayar'),
  //       'payment_ronda' => Pembayaran::where('pembayaran_tipe', 3)
  //         ->whereDate('created_at', $date)
  //         ->sum('nominal_dibayar')
  //     ];
  //   }

  //   return $data;
  //   // Response JSON untuk DataTables
  //   // return response()->json([
  //   // 'draw' => $request->input('draw'),
  //   // 'recordsTotal' => $totalData,
  //   // 'recordsFiltered' => $totalData,
  //   // 'data' => $data
  //   // ]);
  // }
}
