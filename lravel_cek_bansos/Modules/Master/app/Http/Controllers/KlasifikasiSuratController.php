<?php

namespace Modules\Master\Http\Controllers;

use App\Helpers\Fungsi;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\Master\Models\KlasifikasiSurat;
use RealRashid\SweetAlert\Facades\Alert;

class KlasifikasiSuratController extends Controller
{
  public function index()
  {
    Fungsi::hakAkses('/master/klasifikasi');
    $alert = 'Delete Data!';
    $text = "Are you sure you want to delete?";
    confirmDelete($alert, $text);

    $title = 'Klasifikasi Surat';
    $data = KlasifikasiSurat::latest()->get();
    return view(
      'master::/klasifikasi/index',
      [
        'title' => $title,
        'data' => $data,
      ]
    );
  }
  public function create()
  {
    Fungsi::hakAkses('/master/klasifikasi');

    $title = "Klasifikasi";
    return view(
      'master::klasifikasi/create',
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
      $newFileName = 'img' . '_' . now()->timestamp . '.' . $extension;
      $request->file('img')->move(public_path('/img'), $newFileName);
      $data['img'] = $newFileName;
    }

    if (!empty($request->id)) {
      $updateData = KlasifikasiSurat::findOrFail($request->id);
      $data['modified_by'] = Auth::user()->username;
      $updateData->update($data);
      Alert::success('Success', 'Data berhasil diupdate');
      return redirect()->route('klasifikasi.index');
    }

    $data['created_by'] = Auth::user()->username;
    KlasifikasiSurat::create($data);
    Alert::success('Success', 'Data berhasil disimpan');
    return redirect()->route('klasifikasi.index');
  }
  public function edit($id)
  {
    $title = "Update Data Klasifikasi";
    Fungsi::hakAkses('/master/klasifikasi');
    $data = KlasifikasiSurat::findOrFail($id);

    return view(
      'master::klasifikasi.edit',
      [
        'data' => $data,
        'title' => $title,
      ]
    );
  }
  public function destroy($id)
  {
    Fungsi::hakAkses('/master/klasifikasi');

    $data = KlasifikasiSurat::findOrFail($id);
    $data->deleted_by = Auth::user()->username;
    // if ($data->karyawans()->count() > 0) {
    //   Alert::error('Oops....', 'Data tidak dapat dihapus karena memiliki data surat');
    //   return redirect()->route('klasifikasi.index');
    // }
    $data->save();
    $data->delete();
    Alert::success('Success', 'Data berhasil dihapus');
    return redirect()->route('klasifikasi.index');
  }
}
