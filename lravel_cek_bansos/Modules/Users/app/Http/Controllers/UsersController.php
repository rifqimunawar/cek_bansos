<?php

namespace Modules\Users\Http\Controllers;

use App\Models\User;
use App\Helpers\Fungsi;
use Illuminate\Http\Request;
use Modules\Master\Models\Warga;
use Modules\Settings\Models\Roles;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Modules\Users\Exports\UsersExport;
use RealRashid\SweetAlert\Facades\Alert;

class UsersController extends Controller
{
  public function index()
  {
    Fungsi::hakAkses('/users');

    $alert = 'Delete Data!';
    $text = "Are you sure you want to delete?";
    confirmDelete($alert, $text);

    $title = "Data Users";
    $data = User::latest()->get();
    return view(
      'users::users/index',
      [
        'title' => $title,
        'data' => $data
      ]
    );
  }

  public function create()
  {
    Fungsi::hakAkses('/users');
    $title = "User Baru";
    $dataWarga = Warga::all();
    $dataRoles = Roles::all();

    return view(
      'users::users/create',
      [
        'title' => $title,
        'dataRoles' => $dataRoles,
        'dataWarga' => $dataWarga,
      ]
    );
  }

  public function store(Request $request)
  {
    Fungsi::hakAkses('/users');
    $request->validate([
      'warga_id' => 'required|exists:wargas,id|unique:users,warga_id',
      'role_id' => 'required|exists:roles,id',
      'name' => 'required',
      'username' => 'required|unique:users,username',
      'email' => 'required|email|unique:users,email',
      'password' => 'required|min:5',
    ]);

    $data = $request->all();
    $data['password'] = bcrypt($request->password);

    User::create($data);

    Alert::success('Success', 'Data berhasil disimpan');
    return redirect()->route('users.index');
  }

  public function edit($id)
  {
    Fungsi::hakAkses('/users');
    // Alert konfirmasi reset password
    $alert = 'Reset Password!';
    $text = "Password akan di reset ke 'Admin123'";

    // Kirim alert konfirmasi reset ke session
    session()->flash('alert.config', json_encode([
      'title' => $alert,
      'text' => $text,
      'icon' => 'warning',
      'showCancelButton' => true,
      'confirmButtonText' => 'Ya, Reset',
      'cancelButtonText' => 'Batal',
      'reverseButtons' => true
    ]));

    $title = "Update Users";
    $data = User::with('warga')->findOrFail($id);
    $dataWarga = Warga::all();
    $dataRoles = Roles::all();
    return view(
      'users::users.edit',
      [
        'data' => $data,
        'title' => $title,
        'dataRoles' => $dataRoles,
        'dataWarga' => $dataWarga,
      ]
    );
  }

  public function update(Request $request, $id)
  {
    Fungsi::hakAkses('/users');
    $request->validate([
      'warga_id' => 'required|exists:wargas,id|unique:users,warga_id,' . $id,
      'name' => 'required|string|max:255',
      'username' => 'required|string|max:255|unique:users,username,' . $id,
      'email' => 'required|email|unique:users,email,' . $id,
      'password' => 'nullable|min:5',
      'role_id' => 'required|exists:roles,id',
    ]);

    $user = User::findOrFail($id);

    $user->name = $request->name;
    $user->username = $request->username;
    $user->email = $request->email;
    $user->warga_id = $request->warga_id;
    if ($request->password) {
      $user->password = bcrypt($request->password);
    }
    $user->role_id = $request->role_id;
    $user->save();

    Alert::success('Success', 'Data berhasil diperbarui');
    return redirect()->route('users.index');
  }

  public function resetPass(Request $request, $id)
  {
    Fungsi::hakAkses('/users');
    $user = User::findOrFail($id);
    if ($request->password) {
      $user->password = bcrypt($request->password);
    }
    $user->save();

    Alert::success('Success', 'Data berhasil diperbarui');
    return redirect()->route('users.index');
  }



  public function destroy($id)
  {
    Fungsi::hakAkses('/users');
    $data = User::findOrFail($id);
    // if ($data->siswa()->count() > 0) {
    //   Alert::error('Oops....', 'Data tidak dapat dihapus karena memiliki data siswa');
    //   return redirect()->route('kelas.index');
    // }
    $data->delete();
    Alert::success('Success', 'Data berhasil dihapus');
    return redirect()->route('users.index');
  }


  public function print()
  {
    Fungsi::hakAkses('/users');
    $title = "List Data Admin";
    $data = User::latest()->get();
    return view(
      'users::users/print',
      [
        'title' => $title,
        'data' => $data,
      ]
    );
  }
  public function export()
  {
    return Excel::download(new UsersExport, 'data_admin.xlsx');
  }
  public function pdf()
  {
    Fungsi::hakAkses('/users');

    $title = "List Data Admin";
    $data = User::latest()->get();

    $html = view('users::users.pdf', [
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
