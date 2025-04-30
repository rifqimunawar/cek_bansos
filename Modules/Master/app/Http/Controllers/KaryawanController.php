<?php

namespace Modules\Master\Http\Controllers;

use App\Helpers\Fungsi;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Modules\Master\Models\Posisi;
use Modules\Master\Models\Karyawan;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;
use Modules\Master\Models\JenisKendaraan;
use Modules\Master\Exports\KaryawanExport;

class KaryawanController extends Controller
{
  public function index()
  {
    Fungsi::hakAkses('/master/karyawan');
    $alert = 'Delete Data!';
    $text = "Are you sure you want to delete?";
    confirmDelete($alert, $text);

    $title = 'Data Karyawan';
    $data = Karyawan::with(['posisi', 'jenisKendaraan'])->latest()->get();
    return view(
      'master::/karyawan/index',
      [
        'title' => $title,
        'data' => $data,
      ]
    );
  }
  public function create()
  {
    Fungsi::hakAkses('/master/karyawan');

    $posisi = Posisi::all();
    $jenisKendaraan = JenisKendaraan::all();
    $data = [
      'posisi' => $posisi,
      'jenisKendaraan' => $jenisKendaraan,
    ];

    $title = "Karyawan Baru";
    return view(
      'master::karyawan/create',
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
      $newFileName = 'karyawan' . '_' . now()->timestamp . '.' . $extension;
      $request->file('img')->move(public_path('/img'), $newFileName);
      $data['img'] = $newFileName;
    }

    if (!empty($request->id)) {
      $updateData = Karyawan::findOrFail($request->id);
      $data['modified_by'] = Auth::user()->username;
      $updateData->update($data);
      Alert::success('Success', 'Data berhasil diupdate');
      return redirect()->route('karyawan.index');
    }

    $data['created_by'] = Auth::user()->username;
    Karyawan::create($data);
    Alert::success('Success', 'Data berhasil disimpan');
    return redirect()->route('karyawan.index');
  }
  public function edit($id)
  {
    $title = "Update Karyawan";
    Fungsi::hakAkses('/master/karyawan');

    $karyawan = Karyawan::findOrFail($id);
    $posisi = Posisi::all();
    $jenisKendaraan = JenisKendaraan::all();
    $data = [
      'posisi' => $posisi,
      'jenisKendaraan' => $jenisKendaraan,
      'karyawan' => $karyawan,
    ];

    return view(
      'master::karyawan.edit',
      [
        'data' => $data,
        'title' => $title,
      ]
    );
  }
  public function destroy($id)
  {
    Fungsi::hakAkses('/master/karyawan');

    $data = Karyawan::findOrFail($id);
    $data->deleted_by = Auth::user()->username;
    // if ($data->karyawans()->count() > 0) {
    //   Alert::error('Oops....', 'Data tidak dapat dihapus karena memiliki data karyawan');
    //   return redirect()->route('karyawan.index');
    // }
    $data->delete();
    Alert::success('Success', 'Data berhasil dihapus');
    return redirect()->route('karyawan.index');
  }
  public function print()
  {
    $title = "List Data Karyawan / Jabatan";
    $data = Karyawan::all();
    return view(
      'master::karyawan/print',
      [
        'title' => $title,
        'data' => $data,
      ]
    );
  }
  public function export()
  {
    return Excel::download(new KaryawanExport, 'karyawan.xlsx');
  }
  public function pdf()
  {
    $title = "List Data Karyawan " . Carbon::now()->format('d-M-Y');
    $today = Carbon::now()->format('d M Y');
    $data = Karyawan::all();

    // return view(
    //   'master::karyawan/pdf',
    //   [
    //     'title' => $title,
    //     'data' => $data,
    //     'today' => $today,
    //   ]
    // );

    $html = view('master::karyawan.pdf', [
      'title' => $title,
      'data' => $data,
      'today' => $today,
    ])->render();

    $mpdf = new \Mpdf\Mpdf();
    $mpdf->WriteHTML($html);
    $fileName = Carbon::now()->format('Y_m_d') . '_data_karyawan.pdf';
    $mpdf->Output($fileName, 'D');
    $mpdf->Output();
  }
}
