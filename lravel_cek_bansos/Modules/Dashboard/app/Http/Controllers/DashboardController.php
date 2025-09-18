<?php

namespace Modules\Dashboard\Http\Controllers;

use Carbon\Carbon;
use App\Helpers\Fungsi;
use Illuminate\Http\Request;
use Modules\Ronda\Models\Ronda;
use Modules\Master\Models\Warga;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Modules\Master\Models\Parameter;
use Modules\Tagihan\Models\TagihanRonda;
use Modules\Pembayaran\Models\Pembayaran;

class DashboardController extends Controller
{
  public function index()
{
    $data_warga = Warga::count();
    $data_pria = Warga::where('jk', 'Laki-laki')->count();
    $data_wanita = Warga::where('jk', 'Perempuan')->count();
    $data_penerima = Warga::where('bantuan_sosial', 'Ya')->count();

    $warga = Warga::select(
        DB::raw("strftime('%Y-%m-%d', created_at) as tanggal"),
        DB::raw("COUNT(*) as total_warga"),
        DB::raw("SUM(CASE WHEN bantuan_sosial = 'Ya' THEN 1 ELSE 0 END) as total_penerima")
    )
    ->groupBy('tanggal')
    ->orderBy('tanggal', 'asc')
    ->get();

    $grafik_data_warga = [];
    $grafik_data_penerima = [];
    $xLabel = [];

    $index = 0;
    $cumulative_warga = 0;
    $cumulative_penerima = 0;

    foreach ($warga as $row) {
        $date = Carbon::createFromFormat('Y-m-d', $row->tanggal);
        $formattedDate = $date->translatedFormat('d M Y');

        $cumulative_warga += (int) $row->total_warga;
        $cumulative_penerima += (int) $row->total_penerima;

        $grafik_data_warga[] = [$index, $cumulative_warga];
        $grafik_data_penerima[] = [$index, $cumulative_penerima];
        $xLabel[] = [$index, $formattedDate];

        $index++;
    }

    return view('dashboard::index', [
        'data_warga' => $data_warga,
        'data_pria' => $data_pria,
        'data_wanita' => $data_wanita,
        'data_penerima' => $data_penerima,

        'grafik_data_warga' => $grafik_data_warga,
        'grafik_data_penerima' => $grafik_data_penerima,
        'xLabel' => $xLabel
    ]);
}


}
