<?php

namespace Modules\Master\Http\Controllers;

use App\Helpers\Fungsi;
use Illuminate\Http\Request;
use Modules\Master\Models\Posisi;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Modules\Master\Exports\PosisiExport;
use RealRashid\SweetAlert\Facades\Alert;

class PosisiController extends Controller
{
  public function index()
  {
    Fungsi::hakAkses('/master/posisi');
    $alert = 'Delete Data!';
    $text = "Are you sure you want to delete?";
    confirmDelete($alert, $text);

    $title = 'Posisi / Jabatan';
    $data = Posisi::latest()->get();
    return view(
      'master::/posisi/index',
      [
        'title' => $title,
        'data' => $data,
      ]
    );
  }
  public function create()
  {
    Fungsi::hakAkses('/master/posisi');

    $title = "Posisi / Jabatan Baru";
    return view(
      'master::posisi/create',
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
      $newFileName = 'posisi' . '_' . now()->timestamp . '.' . $extension;
      $request->file('img')->move(public_path('/img'), $newFileName);
      $data['img'] = $newFileName;
    }

    if (!empty($request->id)) {
      $updateData = Posisi::findOrFail($request->id);
      $data['modified_by'] = Auth::user()->username;
      $updateData->update($data);
      Alert::success('Success', 'Data berhasil diupdate');
      return redirect()->route('posisi.index');
    }

    $data['created_by'] = Auth::user()->username;
    Posisi::create($data);
    Alert::success('Success', 'Data berhasil disimpan');
    return redirect()->route('posisi.index');
  }
  public function edit($id)
  {
    Fungsi::hakAkses('/master/posisi');

    $title = "Update Posisi / Jabatan";
    $data = Posisi::findOrFail($id);
    return view(
      'master::posisi.edit',
      [
        'data' => $data,
        'title' => $title,
      ]
    );
  }
  public function destroy($id)
  {
    Fungsi::hakAkses('/master/posisi');

    $data = Posisi::findOrFail($id);
    $data->deleted_by = Auth::user()->username;
    if ($data->karyawans()->count() > 0) {
      Alert::error('Oops....', 'Data tidak dapat dihapus karena memiliki data karyawan');
      return redirect()->route('posisi.index');
    }
    $data->delete();
    Alert::success('Success', 'Data berhasil dihapus');
    return redirect()->route('posisi.index');
  }
  public function print()
  {
    $title = "List Data Posisi / Jabatan";
    $data = Posisi::all();
    return view(
      'master::posisi/print',
      [
        'title' => $title,
        'data' => $data,
      ]
    );
  }
  public function export()
  {
    return Excel::download(new PosisiExport, 'posisi.xlsx');
  }
  public function pdf()
  {
    $title = "List Data Posisi / Jabatan";
    $data = Posisi::all();

    $html = view('master::posisi.pdf', [
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
