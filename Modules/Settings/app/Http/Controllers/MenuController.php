<?php

namespace Modules\Settings\Http\Controllers;

use App\Helpers\Fungsi;
use Illuminate\Http\Request;
use Modules\Settings\Models\Menu;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Settings\Models\Settings;
use RealRashid\SweetAlert\Facades\Alert;

class MenuController extends Controller
{

  public function index()
  {
    Fungsi::hakAkses('/settings/menu');
    $alert = 'Delete Data!';
    $text = "Are you sure you want to delete?";
    confirmDelete($alert, $text);

    $title = "List Data Menu";
    $data = Menu::all();
    // dd($data);
    return view(
      'settings::menu/index',
      [
        'title' => $title,
        'data' => $data,
      ]
    );
  }

  public function create()
  {
    Fungsi::hakAkses('/settings/menu');
    $title = "Menu Baru";
    $dataSettings = Settings::first();
    $data = Menu::all();
    // dd($dataSettings);
    return view(
      'settings::menu/create',
      [
        'title' => $title,
        'dataMenu' => $data,
        'dataSettings' => $dataSettings

      ]
    );
  }

  public function store(Request $request)
  {
    Fungsi::hakAkses('/settings/menu');

    $data = $request->all();
    // $baseUrl = Settings::first()->base_url;
    // $data['url'] = $baseUrl . $request->input('url');
    Menu::create($data);
    Alert::success('Success', 'Data berhasil disimpan');
    return redirect()->route('menu.index');
  }


  public function edit($id)
  {
    Fungsi::hakAkses('/settings/menu');
    $title = "Update Menu";
    $data = Menu::findOrFail($id);
    $dataMenu = Menu::all();
    $dataSettings = Settings::first();
    // $data_category = Category::all();
    return view(
      'settings::menu.edit',
      [
        'data' => $data,
        'title' => $title,
        'dataMenu' => $dataMenu,
        'dataSettings' => $dataSettings
        // 'data_category' => $data_category
      ]
    );
  }

  public function update(Request $request, $id)
  {
    Fungsi::hakAkses('/settings/menu');
    $data = $request->all();
    $updateData = Menu::findOrFail($id);
    $updateData->update($data);
    Alert::success('Success', 'Data berhasil diupdate');
    return redirect()->route('menu.index');
  }


  public function destroy($id)
  {
    Fungsi::hakAkses('/settings/menu');
    $data = Menu::findOrFail($id);
    // if ($data->siswa()->count() > 0) {
    //   Alert::error('Oops....', 'Data tidak dapat dihapus karena memiliki data siswa');
    //   return redirect()->route('kelas.index');
    // }
    $data->delete();
    Alert::success('Success', 'Data berhasil dihapus');
    return redirect()->route('menu.index');
  }
}
