<?php

namespace Modules\Profile\Http\Controllers;

use App\Helpers\Fungsi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class ProfileController extends Controller
{
  public function index()
  {
    // Fungsi::hakAkses('/settings/role');
    $alert = 'Delete Data!';
    $text = "Are you sure you want to delete?";
    confirmDelete($alert, $text);

    $title = Auth::user()->name;
    $data = Auth::user();
    return view(
      'profile::index',
      [
        'title' => $title,
        'data' => $data,
      ]
    );
  }

  public function store(Request $request)
  {
    // Validasi input
    $request->validate([
      'username' => 'required|string|max:255|unique:users,username,' . $request->id,
      'email' => 'required|email|max:255|unique:users,email,' . $request->id,
      'img' => 'nullable|image|mimes:jpg,png,jpeg|max:2048', // Hanya gambar dengan ukuran max 2MB
      'password' => $request->id ? 'nullable|min:6' : 'required|min:6', // Wajib jika buat baru, opsional jika edit
    ]);

    $data = $request->except('password', 'img');

    if ($request->filled('password')) {
      $data['password'] = bcrypt($request->password);
    } else {
      if (!empty($request->id)) {
        $user = User::findOrFail($request->id);
        $data['password'] = $user->password;
      }
    }

    if ($request->hasFile('img')) {
      $extension = $request->img->getClientOriginalExtension();
      $newFileName = 'profile_' . $request->username . '_' . now()->timestamp . '.' . $extension;
      $request->file('img')->move(public_path('/img'), $newFileName);
      $data['img'] = $newFileName;
    }

    if (!empty($request->id)) {
      $updateData = User::findOrFail($request->id);
      $updateData->update($data);
      Alert::success('Success', 'Data berhasil diupdate');
    } else {
      User::create($data);
      Alert::success('Success', 'Data berhasil disimpan');
    }

    return redirect()->route('profile.index');
  }

}
