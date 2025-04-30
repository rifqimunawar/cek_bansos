<?php

namespace Modules\Master\Http\Controllers;

use App\Helpers\Fungsi;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Modules\Master\Models\Warga;
use Modules\Tagihan\Models\Umum;
use Illuminate\Support\Facades\DB;
use Modules\Master\Models\Periode;
use Modules\Master\Models\Provinsi;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Modules\Master\Exports\WargaExport;
use RealRashid\SweetAlert\Facades\Alert;

class WargaController extends Controller
{
  public function index()
  {
    Fungsi::hakAkses('/master/warga');
    $alert = 'Delete Data!';
    $text = "Are you sure you want to delete?";
    confirmDelete($alert, $text);

    $title = 'Data Warga';
    $data = Warga::latest()->get();
    return view(
      'master::/warga/index',
      [
        'title' => $title,
        'data' => $data,
      ]
    );
  }
  public function create()
  {
    Fungsi::hakAkses('/master/warga');

    $title = "Warga Baru";
    $data['provinsi'] = Provinsi::all();
    return view(
      'master::warga/create',
      [
        'title' => $title,
        'data' => $data,
      ]
    );
  }
  public function edit($id)
  {
    Fungsi::hakAkses('/master/warga');

    $title = "Update Warga";
    $data = Warga::findOrfail($id);
    return view(
      'master::warga/edit',
      [
        'title' => $title,
        'data' => $data,
      ]
    );
  }

  public function store(Request $request)
  {
    $data = $request->all();

    if ($request->hasFile('img')) {
      $extension = $request->img->getClientOriginalExtension();
      $newFileName = 'img' . '_' . now()->timestamp . '.' . $extension;
      $request->file('img')->move(public_path('/img'), $newFileName);
      $data['img'] = $newFileName;
    }

    if (!empty($request->id)) {
      $updateData = Warga::findOrFail($request->id);
      $data['updated_by'] = Auth::user()->username;
      $updateData->update($data);
      Alert::success('Success', 'Data berhasil diupdate');
      return redirect()->route('klasifikasi.index');
    }

    $data['created_by'] = Auth::user()->username;
    Warga::create($data);
    Alert::success('Success', 'Data berhasil disimpan');
    return redirect()->route('klasifikasi.index');
  }


  // public function store(Request $request)
  // {
  //   $data = $request->all();

  //   if ($request->hasFile('img')) {
  //     $extension = $request->img->getClientOriginalExtension();
  //     $newFileName = 'warga' . '_' . now()->timestamp . '.' . $extension;
  //     $request->file('img')->move(public_path('/img'), $newFileName);
  //     $data['img'] = $newFileName;
  //   }

  //   if (!empty($request->id)) {
  //     $updateData = Warga::findOrFail($request->id);
  //     $data['updated_by'] = Auth::user()->username;
  //     $updateData->update($data);

  //     // **Hapus Data Lama di Pivot**
  //     DB::table('warga_tagihan_periode')->where('warga_id', $updateData->id)->delete();

  //     $wargaId = $updateData->id;
  //   } else {
  //     $data['created_by'] = Auth::user()->username;
  //     $warga = Warga::create($data);
  //     $wargaId = $warga->id;
  //   }

  //   // **Ambil Periode Aktif dan Semua Tagihan Umum**
  //   $periodeList = Periode::where('tanggal_awal', '>=', now()->startOfMonth())->get();
  //   $tagihanList = Umum::all();

  //   // **Simpan ke Tabel Pivot**
  //   $pivotData = [];
  //   foreach ($periodeList as $periode) {
  //     foreach ($tagihanList as $tagihan) {
  //       $pivotData[] = [
  //         'warga_id' => $wargaId,
  //         'umum_id' => $tagihan->id,
  //         'periode_id' => $periode->id,
  //         'created_at' => now(),
  //         'updated_at' => now(),
  //       ];
  //     }
  //   }

  //   if (!empty($pivotData)) {
  //     // DB::table('warga_tagihan_periode')->insert($pivotData);
  //   }

  //   Alert::success('Success', 'Data warga berhasil ' . (!empty($request->id) ? 'diupdate' : 'disimpan'));
  //   return redirect()->route('warga.index');
  // }

  public function destroy($id)
  {
    Fungsi::hakAkses('/master/warga');

    $data = Warga::findOrFail($id);
    $data->deleted_by = Auth::user()->username;
    // if ($data->karyawans()->count() > 0) {
    //   Alert::error('Oops....', 'Data tidak dapat dihapus karena memiliki data warga');
    //   return redirect()->route('warga.index');
    // }
    $data->delete();
    Alert::success('Success', 'Data berhasil dihapus');
    return redirect()->route('warga.index');
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
