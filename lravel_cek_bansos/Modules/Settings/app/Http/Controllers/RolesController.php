<?php

namespace Modules\Settings\Http\Controllers;

use App\Helpers\Fungsi;
use Illuminate\Http\Request;
use Modules\Settings\Models\Menu;
use Modules\Settings\Models\Roles;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;
use Modules\Settings\Exports\RolesExport;

class RolesController extends Controller
{
  public function index()
  {
    Fungsi::hakAkses('/settings/role');


    $alert = 'Delete Data!';
    $text = "Are you sure you want to delete?";
    confirmDelete($alert, $text);

    $title = "List Role Admin";
    $data = Roles::all();
    return view(
      'settings::role/index',
      [
        'title' => $title,
        'data' => $data,
      ]
    );
  }

  public function create()
  {
    Fungsi::hakAkses('/settings/role');

    $title = "Role Baru";
    // $dataSettings = Roles::first();
    // $data = Menu::all();
    // dd($dataSettings);
    return view(
      'settings::role/create',
      [
        'title' => $title,
        //   'dataMenu' => $data,
        //   'dataSettings' => $dataSettings

      ]
    );
  }

  public function store(Request $request)
  {
    Fungsi::hakAkses('/settings/role');

    $data = $request->all();
    // $baseUrl = Settings::first()->base_url;
    // $data['url'] = $baseUrl . $request->input('url');
    Roles::create($data);
    Alert::success('Success', 'Data berhasil disimpan');
    return redirect()->route('role.index');
  }


  public function edit($id)
  {
    Fungsi::hakAkses('/settings/role');

    $title = "Update Role Admin";
    $data = Roles::findOrFail($id);
    // $dataMenu = Menu::all();
    // $dataSettings = Settings::first();
    // $data_category = Category::all();
    return view(
      'settings::role.edit',
      [
        'data' => $data,
        'title' => $title,
        // 'dataMenu' => $dataMenu,
        // 'dataSettings' => $dataSettings
        // 'data_category' => $data_category
      ]
    );
  }

  public function update(Request $request, $id)
  {
    Fungsi::hakAkses('/settings/role');

    $data = $request->all();
    $updateData = Roles::findOrFail($id);
    $updateData->update($data);
    Alert::success('Success', 'Data berhasil diupdate');
    return redirect()->route('role.index');
  }


  public function destroy($id)
  {
    Fungsi::hakAkses('/settings/role');

    $data = Roles::findOrFail($id);
    // if ($data->siswa()->count() > 0) {
    //   Alert::error('Oops....', 'Data tidak dapat dihapus karena memiliki data siswa');
    //   return redirect()->route('kelas.index');
    // }
    $data->delete();
    Alert::success('Success', 'Data berhasil dihapus');
    return redirect()->route('role.index');
  }




  public function giveAkses($id)
  {
    $dataRole = Roles::findOrFail($id);
    $title = "Akses Untuk Role " . $dataRole->role_name;
    $data_menu = Menu::all();
    $current_menu_ids = $dataRole->menus->pluck('id')->toArray();
    // dd($data);
    return view(
      'settings::role/giveAkses',
      [
        'title' => $title,
        'dataRole' => $dataRole,
        'dataMenu' => $data_menu,
        'current_menu_ids' => $current_menu_ids,
      ]
    );
  }

  public function giveAksesStore(Request $request)
  {
    $menuIds = $request->input('menu_ids', []);
    $roleId = $request->input('role_id');

    $request->validate([
      'menu_ids' => 'required|array',
      'menu_ids.*' => 'exists:menus,id',
      'role_id' => 'required|exists:roles,id',
    ]);

    $role = Roles::findOrFail($roleId);
    $role->menus()->sync($menuIds);
    Alert::success('Success', 'Hak akses berhasil diperbarui');
    return redirect()->route('role.index');
  }


  public function print()
  {
    $title = "List Role Admin";
    $data = Roles::all();
    return view(
      'settings::role/print',
      [
        'title' => $title,
        'data' => $data,
      ]
    );
  }
  public function export()
  {
    return Excel::download(new RolesExport, 'roles.xlsx');
  }
  public function pdf()
  {
    $title = "List Role Admin";
    $data = Roles::all();

    $html = view('settings::role.pdf', [
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
