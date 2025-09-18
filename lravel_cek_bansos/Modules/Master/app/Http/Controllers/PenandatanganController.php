<?php

namespace Modules\Master\Http\Controllers;

use App\Helpers\Fungsi;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\Master\Models\Penandatangan;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;

class PenandatanganController extends Controller
{
  public function index()
  {
    Fungsi::hakAkses('/master/penandatangan');
    $alert = 'Delete Data!';
    $text = "Are you sure you want to delete?";
    confirmDelete($alert, $text);

    $title = 'Pejabat Penandatangan';
    $data = Penandatangan::latest()->get();
    return view(
      'master::/penandatangan/index',
      [
        'title' => $title,
        'data' => $data,
      ]
    );
  }
  public function create()
  {
    Fungsi::hakAkses('/master/penandatangan');

    $title = "Tambah Penandatangan";
    return view(
      'master::penandatangan/create',
      [
        'title' => $title,
      ]
    );
  }
  public function store(Request $request)
  {
    $data = $request->all();

    // Simpan tanda tangan (base64 PNG)
    if (!empty($data['sign'])) {
      $signatureData = str_replace('data:image/png;base64,', '', $data['sign']);
      $signatureData = base64_decode($signatureData);
      $signatureFileName = 'img/signature/' . Str::uuid() . '.png';
      $signaturePath = public_path($signatureFileName);
      if (!file_exists(dirname($signaturePath))) {
        mkdir(dirname($signaturePath), 0755, true);
      }
      file_put_contents($signaturePath, $signatureData);
      $data['signature_file'] = $signatureFileName;
    }


    if ($request->hasFile('img')) {
      $extension = $request->img->getClientOriginalExtension();
      $newFileName = 'img_' . now()->timestamp . '.' . $extension;
      $request->file('img')->move(public_path('/img'), $newFileName);
      $data['img'] = $newFileName;
    }

    if (!empty($request->id)) {
      $updateData = Penandatangan::findOrFail($request->id);
      $data['modified_by'] = Auth::user()->username;
      $updateData->update($data);

      Alert::success('Success', 'Data berhasil diupdate');
      return redirect()->route('penandatangan.index');
    }

    $data['created_by'] = Auth::user()->username;
    Penandatangan::create($data);

    Alert::success('Success', 'Data berhasil disimpan');
    return redirect()->route('penandatangan.index');
  }

  public function edit($id)
  {
    $title = "Update Data Klasifikasi";
    Fungsi::hakAkses('/master/penandatangan');
    $data = Penandatangan::findOrFail($id);

    return view(
      'master::penandatangan.edit',
      [
        'data' => $data,
        'title' => $title,
      ]
    );
  }
  public function destroy($id)
  {
    Fungsi::hakAkses('/master/penandatangan');

    $data = Penandatangan::findOrFail($id);
    $data->deleted_by = Auth::user()->username;
    // if ($data->karyawans()->count() > 0) {
    //   Alert::error('Oops....', 'Data tidak dapat dihapus karena memiliki data surat');
    //   return redirect()->route('penandatangan.index');
    // }
    $data->save();
    $data->delete();
    Alert::success('Success', 'Data berhasil dihapus');
    return redirect()->route('penandatangan.index');
  }
}
