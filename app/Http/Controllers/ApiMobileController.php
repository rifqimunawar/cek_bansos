<?php

namespace App\Http\Controllers;

use App\Helpers\GetSettings;
use App\Models\User;
use Illuminate\Http\Request;
use Modules\Master\Models\Warga;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\PersonalAccessToken;
use Illuminate\Support\Facades\Validator;
use Modules\Pembayaran\Models\Pembayaran;

class ApiMobileController extends Controller
{

use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\PersonalAccessToken;

public function login(Request $request)
{
    $request->validate([
        'username' => 'required|string',
        'password' => 'required|string',
    ]);

    if (!Auth::attempt($request->only('username', 'password'))) {
        return response()->json([
            'status' => false,
            'message' => 'Username atau password tidak sesuai',
        ], 401);
    }

    $user = Auth::user(); // Gunakan user yang sudah diautentikasi
    $token = $user->createToken('token-login')->plainTextToken;

    $lastToken = PersonalAccessToken::where('tokenable_id', $user->id)
        ->where('tokenable_type', User::class)
        ->latest()
        ->first();

    if ($lastToken) {
        $lastToken->update(['username' => $user->username]);
    }

    return response()->json([
        'status' => true,
        'message' => 'Berhasil login',
        'user' => [
            'id' => $user->id,
            'username' => $user->username,
            'email' => $user->email,
        ],
        'token' => $token
    ]);
}

  public function index()
  {
    $userLogin = Auth::user();

    if (!$userLogin) {
      return response()->json([
        'status' => false,
        'message' => 'User tidak ditemukan atau belum login',
      ], 401);
    }

    $userLogin['img'] = 'https://paymenapp.technoart.id/img/' . $userLogin['img'];

    // Ambil data tagihan yang belum dibayar
    $tagihan_rutin_belum_dibayar = Warga::rutinBelumDibayar($userLogin->warga_id);
    $pam_belum_dibayar = Warga::pamBelumDibayar($userLogin->warga_id);
    $ronda_belum_dibayar = Warga::RondaBelumDibayar($userLogin->warga_id);

    // Hitung total tagihan
    $total_tagihan_rutin = collect($tagihan_rutin_belum_dibayar)->sum('nominal');
    $total_pam = collect($pam_belum_dibayar)->sum('nominal');
    $total_ronda = collect($ronda_belum_dibayar)->sum('nominal_tagihan');

    // Total keseluruhan
    $total_semua = $total_tagihan_rutin + $total_pam + $total_ronda;

    // Ambil history pembayaran
    $history = Pembayaran::where('warga_id', $userLogin->warga_id)->latest()->get();

    return response()->json([
      'status' => true,
      'message' => 'Data berhasil diambil',
      'data' => [
        'user' => $userLogin,
        'tagihan_rutin_belum_dibayar' => $tagihan_rutin_belum_dibayar,
        'pam_belum_dibayar' => $pam_belum_dibayar,
        'ronda_belum_dibayar' => $ronda_belum_dibayar,
        'total_tagihan_rutin' => $total_tagihan_rutin,
        'total_pam' => $total_pam,
        'total_ronda' => $total_ronda,
        'total_semua' => $total_semua,
        'history' => $history
      ]
    ], 200);
  }

  // ========================== HALAMAN HOME
  public function home()
  {
    $data = "halaman Home";
    return response()->json([
      'status' => true,
      'message' => 'success',
      'data' => $data,
    ], 200);
  }



  // ========================== HALAMAN TAGIHAN
  public function tagihan()
  {
    $data = "halaman Home";

    return response()->json([
      'status' => true,
      'message' => 'success',
      'data' => $data,
    ], 200);
  }

  // ========================== HALAMAN HISTORY

  public function history()
  {
    $userLogin = Auth::user();
    $data = Pembayaran::where('warga_id', $userLogin->warga_id)->latest()->get();
    // $data->transform(function ($item) {
    //   $item->id_qrcode = GetSettings::getBaseUrl() . $item->id_qrcode;
    //   return $item;
    // });

    return response()->json([
      'status' => true,
      'message' => 'success',
      'data' => $data,
    ], 200);
  }


  // ========================== HALAMAN PROFILE
  public function profile()
  {
    $data = "halaman Home";
    return response()->json([
      'status' => true,
      'message' => 'success',
      'data' => $data,
    ], 200);
  }
}
