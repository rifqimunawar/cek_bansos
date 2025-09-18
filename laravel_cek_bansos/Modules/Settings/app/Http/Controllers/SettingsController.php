<?php

namespace Modules\Settings\Http\Controllers;

use App\Helpers\Fungsi;
use Illuminate\Http\Request;
use Modules\Settings\Models\Menu;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Settings\Models\Settings;
use RealRashid\SweetAlert\Facades\Alert;

class SettingsController extends Controller
{
  public function index()
  {
    Fungsi::hakAkses('/settings/general');
    $title = "General Settings";
    $data = Settings::first();
    return view(
      'settings::settings/index',
      [
        'title' => $title,
        'data' => $data
      ]
    );
  }

  public function create()
  {
    Fungsi::hakAkses('/settings/general');
    $title = "Update Kelas";
    $data = Settings::all();
    return view(
      'settings::settings/create',
      [
        'title' => $title,
        'dataSettings' => $data
      ]
    );
  }

  public function store(Request $request)
  {
    Fungsi::hakAkses('/settings/general');
    $data = $request->all();
    if ($request->logo) {
      $extension = $request->logo->getClientOriginalExtension();
      $newFileName = 'logo' . '_' . '-' . now()->timestamp . '.' . $extension;
      $request->file('logo')->move(public_path('/img'), $newFileName);
      $data['logo'] = $newFileName;
    }

    Settings::create($data);

    Alert::success('Success', 'Data berhasil disimpan');
    return redirect()->route('menu.index');
  }

  public function edit($id)
  {
    Fungsi::hakAkses('/settings/general');
    $title = "Update Data";
    $data = Settings::findOrFail($id);
    // $data_category = Category::all();
    return view(
      'settings::settings.edit',
      [
        'data' => $data,
        'title' => $title,
        // 'data_category' => $data_category
      ]
    );
  }

  public function update(Request $request, $id)
  {
    Fungsi::hakAkses('/settings/general');
    $updateData = Settings::findOrFail($id);
    $data = $request->all();
    if ($request->logo) {
      $extension = $request->logo->getClientOriginalExtension();
      $newFileName = 'logo' . '_' . '-' . now()->timestamp . '.' . $extension;
      $request->file('logo')->move(public_path('/img'), $newFileName);
      $data['logo'] = $newFileName;
    }
    $updateData->update($data);
    Alert::success('Success', 'Data berhasil diupdate');
    return redirect()->route('settings.index');
  }


  public function destroy($id)
  {
    Fungsi::hakAkses('/settings/general');
    $data = Settings::findOrFail($id);
    // if ($data->siswa()->count() > 0) {
    //   Alert::error('Oops....', 'Data tidak dapat dihapus karena memiliki data siswa');
    //   return redirect()->route('settings.index');
    // }
    $data->delete();
    Alert::success('Success', 'Data berhasil dihapus');
    return redirect()->route('settings.index');
  }
}
