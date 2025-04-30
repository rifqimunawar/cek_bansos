<?php

namespace Modules\Tagihan\Http\Controllers;

use Carbon\Carbon;
use App\Helpers\Fungsi;
use Illuminate\Http\Request;
use Modules\Master\Models\Warga;
use Modules\Tagihan\Models\Umum;
use Illuminate\Support\Facades\DB;
use Modules\Master\Models\Periode;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Modules\Master\Exports\UmumExport;
use RealRashid\SweetAlert\Facades\Alert;
use Modules\Pembayaran\Models\Pembayaran;

class UmumController extends Controller
{
  public function index()
  {
    Fungsi::hakAkses('/tagihan/umum');
    $alert = 'Delete Data!';
    $text = "Are you sure you want to delete?";
    confirmDelete($alert, $text);

    $title = 'Data Tagihan Rutin';
    $data = Umum::with('periodes', 'pembayaran')->withCount('wargas')
      ->latest()
      ->get();

    // $total_terbayar = Pembayaran::where('tagihan_id', $data->id)->get();

    // return $data;
    return view(
      'tagihan::/umum/index',
      [
        'title' => $title,
        'data' => $data,
      ]
    );
  }
  public function create()
  {
    Fungsi::hakAkses('/tagihan/umum');

    $title = "Tagihan Rutin Baru";
    return view(
      'tagihan::umum/create',
      [
        'title' => $title,
      ]
    );
  }
  public function store(Request $request)
  {
    $data = $request->all();
    $formatNominal = str_replace(['Rp', '.', ' ', "\u{A0}"], '', $request->nominal);
    $data['nominal'] = intval($formatNominal);

    if ($request->hasFile('img')) {
      $extension = $request->img->getClientOriginalExtension();
      $newFileName = 'umum' . '_' . now()->timestamp . '.' . $extension;
      $request->file('img')->move(public_path('/img'), $newFileName);
      $data['img'] = $newFileName;
    }

    if (!empty($request->id)) {
      $updateData = Umum::findOrFail($request->id);
      $data['updated_by'] = Auth::user()->username;
      $updateData->update($data);

      // **Hapus Data Lama di Pivot**
      // DB::table('warga_tagihan_periode')->where('umum_id', $updateData->id)->delete();

      $umumId = $updateData->id;
    } else {
      $data['created_by'] = Auth::user()->username;
      $umum = Umum::create($data);
      $umumId = $umum->id;
    }

    // **Dapatkan Semua Warga dan Periode Aktif**
    $wargaList = Warga::all();
    $periodeList = Periode::where('tanggal_awal', '>=', now()->startOfMonth())->get();

    // **Simpan ke Tabel Pivot**
    $pivotData = [];
    foreach ($wargaList as $warga) {
      foreach ($periodeList as $periode) {
        $pivotData[] = [
          'warga_id' => $warga->id,
          'umum_id' => $umumId,
          'periode_id' => $periode->id,
          'created_at' => now(),
          'updated_at' => now(),
        ];
      }
    }

    if (!empty($pivotData)) {
      // DB::table('warga_tagihan_periode')->insert($pivotData);
    }

    Alert::success('Success', 'Data berhasil ' . (!empty($request->id) ? 'diupdate' : 'disimpan'));
    return redirect()->route('umum.index');
  }

  public function view($id)
  {
    $title = "Tagihan Rutin";
    Fungsi::hakAkses('/tagihan/umum');
    $umum = Umum::tagihan_rutin_warga($id);


    // dd($umum);
    return view(
      'tagihan::umum.view',
      [
        'data' => $umum,
        'title' => $title,
      ]
    );
  }

  public function edit($id)
  {
    $title = "Update Data Rutin";
    Fungsi::hakAkses('/tagihan/umum');
    $umum = Umum::findOrFail($id);

    return view(
      'tagihan::umum.edit',
      [
        'data' => $umum,
        'title' => $title,
      ]
    );
  }
  public function destroy($id)
  {
    Fungsi::hakAkses('/tagihan/umum');

    $data = Umum::findOrFail($id);
    $data->deleted_by = Auth::user()->username;
    // if ($data->karyawans()->count() > 0) {
    //   Alert::error('Oops....', 'Data tidak dapat dihapus karena memiliki data umum');
    //   return redirect()->route('umum.index');
    // }
    // if ($data->karyawans()->count() > 0) {
    //   Alert::error('Oops....', 'Data tidak dapat dihapus karena memiliki data umum');
    //   return redirect()->route('umum.index');
    // }
    $data->delete();
    Alert::success('Success', 'Data berhasil dihapus');
    return redirect()->route('umum.index');
  }
  public function print()
  {
    $title = "List Data Rutin ";
    $data = Umum::latest();
    return view(
      'tagihan::umum/print',
      [
        'title' => $title,
        'data' => $data,
      ]
    );
  }
  public function export()
  {
    return Excel::download(new UmumExport, 'umum.xlsx');
  }
  public function pdf()
  {
    $title = "List Data Tagihan Rutin " . Carbon::now()->format('d-M-Y');
    $today = Carbon::now()->format('d M Y');
    $data = Umum::latest();

    // ========================untuk development
    return view(
      'tagihan::umum/pdf',
      [
        'title' => $title,
        'data' => $data,
        'today' => $today,
      ]
    );

    // ========================untuk production
    // $html = view('tagihan::umum.pdf', [
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
