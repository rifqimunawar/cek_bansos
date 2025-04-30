<?php

namespace Modules\Keluarga\Http\Controllers;

use App\Helpers\Fungsi;
use Illuminate\Http\Request;
use Modules\Master\Models\Warga;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Keluarga\Models\Keluarga;
use RealRashid\SweetAlert\Facades\Alert;

class KeluargaController extends Controller
{

  public function test()
  {
    return response()->json(['message' => 'Route dengan controller berhasil!']);
  }

  public function index()
  {
    Fungsi::hakAkses('/keluarga');
    $alert = 'Delete Data!';
    $text = "Are you sure you want to delete?";
    confirmDelete($alert, $text);
    $userLogin = Auth::user();

    $title = $userLogin->name;
    // $data['kepala'] = Warga::findOrFail($userLogin->warga_id);
    $data['kepala'] = Warga::cari_warga($userLogin->warga_id);
    $data['anggota'] = Keluarga::with('warga')->where('warga_id', $userLogin->warga_id)->get();

    // return $data;
    return view(
      'keluarga::/keluarga/index',
      [
        'title' => $title,
        'data' => $data,
      ]
    );
  }
  public function create()
  {
    Fungsi::hakAkses('/keluarga');

    $title = "Anggota Baru";
    return view(
      'keluarga::keluarga/create',
      [
        'title' => $title,
      ]
    );
  }
  public function store(Request $request)
  {

    // return $request;
    $userLogin = Auth::user();

    if (!$userLogin->warga_id) {
      Alert::error('Error', 'Anda tidak dapat menambahkan anggota keluarga karena belum terdaftar sebagai warga. ');
      return back();
    }

    $data = $request->all();
    $data['warga_id'] = $userLogin->warga_id;

    if ($request->hasFile('img')) {
      $extension = $request->img->getClientOriginalExtension();
      $newFileName = 'keluarga' . '_' . now()->timestamp . '.' . $extension;
      $request->file('img')->move(public_path('/img'), $newFileName);
      $data['img'] = $newFileName;
    }

    // return $data;

    if (!empty($request->id)) {
      $updateData = Keluarga::findOrFail($request->id);
      $data['updated_by'] = $userLogin->username;
      $updateData->update($data);

      Alert::success('Success', 'Data keluarga berhasil diperbarui');
      return redirect()->route('keluarga.index');
    } else {
      $data['created_by'] = $userLogin->username;
      Keluarga::create($data);

      Alert::success('Success', 'Data keluarga berhasil disimpan');
      return redirect()->route('keluarga.index');
    }
  }


  public function edit($id)
  {
    $title = "Update Data Periode";
    Fungsi::hakAkses('/keluarga');
    $periode = Keluarga::findOrFail($id);

    return view(
      'keluarga::keluarga.edit',
      [
        'data' => $periode,
        'title' => $title,
      ]
    );
  }
  public function destroy($id)
  {
    Fungsi::hakAkses('/keluarga');

    $data = Keluarga::findOrFail($id);
    $data->deleted_by = Auth::user()->username;
    // if ($data->karyawans()->count() > 0) {
    //   Alert::error('Oops....', 'Data tidak dapat dihapus karena memiliki data periode');
    //   return redirect()->route('keluarga.index');
    // }
    $data->delete();
    Alert::success('Success', 'Data berhasil dihapus');
    return redirect()->route('keluarga.index');
  }
}
