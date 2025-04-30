<?php

namespace Modules\Master\Http\Controllers;

use App\Helpers\Fungsi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;
use Modules\Master\Models\JenisKendaraan;
use Modules\Master\Exports\JenisKendaraanExport;

class JenisKendaraanController extends Controller
{
  public function index()
  {
    Fungsi::hakAkses('/master/jenis_kendaraan');
    $alert = 'Delete Data!';
    $text = "Are you sure you want to delete?";
    confirmDelete($alert, $text);

    $title = 'Jenis Kendaraan';
    $data = JenisKendaraan::latest()->get();
    return view(
      'master::/jenis_kendaraan/index',
      [
        'title' => $title,
        'data' => $data,
      ]
    );
  }
  public function create()
  {
    Fungsi::hakAkses('/master/jenis_kendaraan');

    $title = "Kendaraan Baru";
    return view(
      'master::jenis_kendaraan/create',
      [
        'title' => $title,
      ]
    );
  }
  public function store(Request $request)
  {
    $data = $request->all();

    if ($request->hasFile('img')) {
      $extension = $request->img->getClientOriginalExtension();
      $newFileName = 'jenis_kendaraan' . '_' . now()->timestamp . '.' . $extension;
      $request->file('img')->move(public_path('/img'), $newFileName);
      $data['img'] = $newFileName;
    }

    if (!empty($request->id)) {
      $updateData = JenisKendaraan::findOrFail($request->id);
      $data['modified_by'] = Auth::user()->username;
      $updateData->update($data);
      Alert::success('Success', 'Data berhasil diupdate');
      return redirect()->route('jenis_kendaraan.index');
    }
    $data['created_by'] = Auth::user()->username;
    JenisKendaraan::create($data);
    Alert::success('Success', 'Data berhasil disimpan');
    return redirect()->route('jenis_kendaraan.index');
  }
  public function edit($id)
  {
    Fungsi::hakAkses('/master/jenis_kendaraan');

    $title = "Update Jenis Kendaraan";
    $data = JenisKendaraan::findOrFail($id);
    return view(
      'master::jenis_kendaraan.edit',
      [
        'data' => $data,
        'title' => $title,
      ]
    );
  }
  public function destroy($id)
  {
    Fungsi::hakAkses('/master/jenis_kendaraan');

    $data = JenisKendaraan::findOrFail($id);
    $data->deleted_by = Auth::user()->username;
    // if ($data->siswa()->count() > 0) {
    //   Alert::error('Oops....', 'Data tidak dapat dihapus karena memiliki data siswa');
    //   return redirect()->route('kelas.index');
    // }
    $data->delete();
    Alert::success('Success', 'Data berhasil dihapus');
    return redirect()->route('jenis_kendaraan.index');
  }
  public function print()
  {
    $title = "List Data Jenis Kendaraan";
    $data = JenisKendaraan::all();
    return view(
      'master::jenis_kendaraan/print',
      [
        'title' => $title,
        'data' => $data,
      ]
    );
  }
  public function export()
  {
    return Excel::download(new JenisKendaraanExport, 'jenis_kendaraan.xlsx');
  }
  public function pdf()
  {
    $title = "List Data Jenis Kendaraan";
    $data = JenisKendaraan::all();

    $html = view('master::jenis_kendaraan.pdf', [
      'title' => $title,
      'data' => $data,
    ])->render();

    $mpdf = new \Mpdf\Mpdf();
    $mpdf->WriteHTML($html);
    $fileName = str_replace(' ', '_', $title) . '.pdf';
    $mpdf->Output($fileName, 'D');
    $mpdf->Output();
  }
}
