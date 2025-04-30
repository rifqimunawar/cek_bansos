<?php

namespace Modules\Mobile\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Modules\Ronda\Models\Ronda;
use Modules\Master\Models\Warga;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Master\Models\Parameter;
use Modules\Ronda\Models\RondaAbsen;
use Modules\Keluarga\Models\Keluarga;
use Modules\Pembayaran\Models\Pembayaran;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class MobileController extends Controller
{
  public function home()
  {
    $userLogin = Auth::user();

    $tagihan_rutin_belum_dibayar = Warga::rutinBelumDibayar($userLogin->warga_id);
    $pam_belum_dibayar = Warga::pamBelumDibayar($userLogin->warga_id);
    $ronda_belum_dibayar = Warga::RondaBelumDibayar($userLogin->warga_id);


    $tagihan_rutin = 0;
    $pam = 0;
    $ronda = 0;

    foreach ($tagihan_rutin_belum_dibayar as $item) {
      $tagihan_rutin += $item->nominal;
    }

    foreach ($pam_belum_dibayar as $item) {
      $pam += $item->nominal;
    }

    foreach ($ronda_belum_dibayar as $item) {
      $ronda += $item->nominal_tagihan;
    }

    $total_tagihan_rutin = $tagihan_rutin;
    $total_pam = $pam;
    $total_ronda = $ronda;
    // Total keseluruhan
    $total_semua = $tagihan_rutin + $pam + $ronda;

    $history = Pembayaran::where('warga_id', $userLogin->warga_id)->latest()->get();

    // return $history;
    return view('mobile::home', [
      'data' => $userLogin,
      'tagihan_rutin_belum_dibayar' => $tagihan_rutin_belum_dibayar,
      'pam_belum_dibayar' => $pam_belum_dibayar,
      'ronda_belum_dibayar' => $ronda_belum_dibayar,
      'total_tagihan_rutin' => $total_tagihan_rutin,
      'total_ronda' => $total_ronda,
      'total_semua' => $total_semua,
      'total_pam' => $total_pam,
      'history' => $history
    ]);
  }

  public function tagihan()
  {
    $userLogin = Auth::user();
    $history = Pembayaran::where('warga_id', $userLogin->warga_id)->latest()->get();
    return view('mobile::tagihan', [
      'history' => $history
    ]);
  }
  public function ronda()
  {
    $data = Ronda::with('wargas')->get();
    // Filter data hanya untuk tanggal hari ini
    $ronda_hari_ini = $data->where('tanggal_ronda', Carbon::today()->toDateString());

    $sudah_absen = RondaAbsen::with('warga')->where('absen', 2)->whereDate('waktu_absen', Carbon::today())->get();

    // ->where('absen', 2)
    // return $ronda_hari_ini;
    return view('mobile::ronda', [
      'ronda_hari_ini' => $ronda_hari_ini,
      'sudah_absen' => $sudah_absen
    ]);
  }
  public function keluarga()
  {
    $userLogin = Auth::user();
    $data['kepala'] = Warga::cari_warga($userLogin->warga_id);
    $data['anggota'] = Keluarga::with('warga')->where('warga_id', $userLogin->warga_id)->get();
    return view('mobile::keluarga', [
      'data' => $data
    ]);
  }
  public function settings()
  {
    return view('mobile::settings');
  }

  private function haversineDistance($lat1, $lon1, $lat2, $lon2)
  {
    $earthRadius = 6371000; // Radius bumi dalam meter

    // Konversi derajat ke radian
    $lat1 = deg2rad($lat1);
    $lon1 = deg2rad($lon1);
    $lat2 = deg2rad($lat2);
    $lon2 = deg2rad($lon2);

    // Selisih koordinat
    $deltaLat = $lat2 - $lat1;
    $deltaLon = $lon2 - $lon1;

    // Rumus Haversine
    $a = sin($deltaLat / 2) * sin($deltaLat / 2) +
      cos($lat1) * cos($lat2) *
      sin($deltaLon / 2) * sin($deltaLon / 2);
    $c = 2 * atan2(sqrt($a), sqrt(1 - $a));

    // Jarak dalam meter
    return $earthRadius * $c;
  }
  public function absen(Request $request)
  {
    $userLogin = Auth::user();
    $warga_id = $userLogin->warga_id;
    $today = Carbon::today()->toDateString();
    $latitudeRef = Parameter::pluck('latitude_ronda')->first();
    $longitudeRef = Parameter::pluck('longitude_ronda')->first();
    $waktu_awal_absen = Parameter::pluck('jam_awal_ronda')->first();
    $jarak_lokasi_absen = Parameter::pluck('jarak_lokasi_absen')->first();

    // Cari ronda berdasarkan tanggal hari ini
    $ronda_hari_ini = Ronda::where('tanggal_ronda', $today)->first();
    if (!$ronda_hari_ini) {
      return response()->json([
        'title' => 'Maaf!',
        'icon' => 'error',
        'message' => 'Jadwal ronda tidak ditemukan untuk hari ini.',
      ]);
    }

    // Cek apakah user memiliki jadwal ronda hari ini
    $id_ronda_hari_ini = $ronda_hari_ini->id;
    $rondaAbsen = RondaAbsen::where('ronda_id', $id_ronda_hari_ini)
      ->where('warga_id', $warga_id)
      ->first();
    if (!$rondaAbsen) {
      return response()->json([
        'title' => 'Maaf!',
        'message' => 'Jadwal ronda Anda bukan hari ini.',
        'icon' => 'error',
      ]);
    }

    // waktu absen
    $waktu_absen = Carbon::now()->format('H:i');
    $waktu_akhir_absen = "23:59";
    if (!($waktu_absen >= $waktu_awal_absen && $waktu_absen <= $waktu_akhir_absen)) {
      return response()->json([
        'title' => 'Maaf!',
        'message' => 'Belum masuk waktu absen.',
        'icon' => 'error',
      ]);
    }

    // Hitung jarak dengan Haversine Formula
    $latitudeUser = $request->latitude;
    $longitudeUser = $request->longitude;
    $distance = $this->haversineDistance($latitudeRef, $longitudeRef, $latitudeUser, $longitudeUser);
    if ($distance > $jarak_lokasi_absen) {
      return response()->json([
        'title' => 'Maaf!',
        'icon' => 'error',
        'message' => "Anda berada di luar zona absen (lebih dari {$jarak_lokasi_absen} meter).",
      ]);
    }

    // pengolahan gambar
    $img = null;
    if ($request->hasFile('img')) {
      $file = $request->file('img');
      if (!$file->isValid()) {
        return response()->json([
          'title' => 'Error!',
          'message' => 'Gagal mengunggah gambar.',
          'icon' => 'error',
        ]);
      }
      $extension = $file->getClientOriginalExtension();
      $newFileName = $userLogin->username . '_' . now()->timestamp . '.' . $extension;
      $file->move(public_path('img/absen'), $newFileName);
      $img = $newFileName;
    }

    // simpan data ke db
    $rondaAbsen->absen = 2;
    $rondaAbsen->waktu_absen = Carbon::now();
    $rondaAbsen->latitude = $latitudeUser;
    $rondaAbsen->longitude = $longitudeUser;
    $rondaAbsen->img = $img;
    $rondaAbsen->save();

    return response()->json([
      'title' => 'Success!',
      'message' => 'Absen berhasil, Anda tercatat hadir.',
      'icon' => 'success',
    ]);
  }
  public function invoice($id)
  {
    $title = '';
    $data = Pembayaran::find($id);

    $route = route('invoiceVerifikasi', $data->id_qrcode);
    // return $route;
    $qrCode = QrCode::size(80)->generate($route);
    return view(
      'mobile::invoice',
      [
        'title' => $title,
        'data' => $data,
        'qrCode' => $qrCode,
      ]
    );
  }

  public function blog1()
  {
    return view('mobile::blog1');
  }
  public function blog2()
  {
    return view('mobile::blog2');
  }

}
