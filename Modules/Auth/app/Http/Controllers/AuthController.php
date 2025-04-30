<?php

namespace Modules\Auth\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
  public function login(Request $request)
  {
    /** @var \Illuminate\Contracts\Auth\Guard $auth */
    $auth = auth();

    if ($auth->check()) {
      // Ambil intended URL dari session
      $intendedUrl = session('url.intended', '/');

      // Jika URL mengandung 'mobile/', arahkan ke mobile home
      if (str_contains($intendedUrl, '/mobile/')) {
        return redirect()->route('mobile.home');
      }

      // Jika bukan mobile, arahkan ke home biasa
      return redirect('/');
    }

    // Jika belum login, cek intended URL dari session untuk menentukan tampilan
    $intendedUrl = session('url.intended', '');
    $view = str_contains($intendedUrl, '/mobile/') ? 'auth::mobile' : 'auth::index';

    return view($view);
  }


  public function authenticate(Request $request)
  {
    $credentials = $request->only('username', 'password');

    if (Auth::attempt($credentials)) {
      // Authentication passed...
      Alert::success('Success', 'Selamat datang!!');
      return redirect()->intended('/');
    } else {
      // Authentication failed...
      $user = User::where('username', $credentials['username'])->first();

      if (!$user) {
        return redirect()->back()->with('error', 'Username atau Password Salah');
      } else {
        return redirect()->back()->with('error', 'Username atau Password Salah');
      }
    }
  }

  public function logout(Request $request)
  {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    // Ambil intended URL dari session sebelum logout
    $intendedUrl = session('url.intended', '/');

    // Tentukan apakah harus diarahkan ke mobile atau web login
    if (str_contains($intendedUrl, '/mobile/')) {
      return redirect()->route('mobile.home');
    }

    return redirect()->route('login');
  }
  public function mobileLogout(Request $request)
  {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    $intendedUrl = session('url.intended', '/');
    if (str_contains($intendedUrl, '/mobile/')) {
      return redirect()->route('mobile.home');
    }
    return redirect()->route('mobile.home');
  }

}
