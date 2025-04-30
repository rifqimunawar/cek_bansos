<?php

namespace Modules\Tagihan\Http\Controllers;

use Carbon\Carbon;
use App\Helpers\Fungsi;
use Illuminate\Http\Request;
use Modules\Ronda\Models\Ronda;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Master\Models\Parameter;
use Modules\Tagihan\Models\TagihanRonda;
use RealRashid\SweetAlert\Facades\Alert;

class TagihanRondaController extends Controller
{
  public function index()
  {
    Fungsi::hakAkses('/tagihan/ronda');
    $alert = 'Delete Data!';
    $text = "Pastikan absen sudah di update sebelum dihapus?";
    confirmDelete($alert, $text);

    $title = 'Data Denda Ronda';

    $hari_ini = Carbon::today();
    $jadwal_ronda_warga = Ronda::with(['wargas', 'absens'])->get();
    $nominal_denda_ronda = Parameter::first()->denda_ronda;
    $hasil = [];

    foreach ($jadwal_ronda_warga as $ronda) {
      $tanggal_ronda = Carbon::parse($ronda->tanggal_ronda);
      $ronda_id = $ronda->id;

      foreach ($ronda->wargas as $warga) {
        $nama_warga = $warga->nama;
        $warga_id = $warga->id;
        $absen = $ronda->absens->where('warga_id', $warga->id)->first();
        $status_absen = $absen ? $absen->absen : null;

        $hasil[] = [
          'ronda_id' => $ronda_id,
          'warga_id' => $warga_id,
          'tanggal_ronda' => $tanggal_ronda,
          'nama_warga' => $nama_warga,
          'status_absen' => $status_absen,
        ];

        if ($hari_ini > $tanggal_ronda && $status_absen == 1) {
          $cek_tagihan = TagihanRonda::where('ronda_id', $ronda_id)
            ->where('warga_id', $warga_id)
            ->exists();

          if (!$cek_tagihan) {
            TagihanRonda::create([
              'ronda_id' => $ronda_id,
              'warga_id' => $warga_id,
              'tgl_absen_ronda' => $tanggal_ronda,
              'nominal_tagihan' => $nominal_denda_ronda,
            ]);
          }
        }
      }
    }

    $data = TagihanRonda::with('warga')->latest()->get();
    // return $data;

    return view(
      'tagihan::/ronda/index',
      [
        'title' => $title,
        'data' => $data,
      ]
    );
  }

  public function destroy($id)
  {
    Fungsi::hakAkses('/tagihan/ronda');

    $data = TagihanRonda::findOrFail($id);
    $data->deleted_by = Auth::user()->username;
    // if ($data->karyawans()->count() > 0) {
    //   Alert::error('Oops....', 'Data tidak dapat dihapus karena memiliki data umum');
    //   return redirect()->route('umum.index');
    // }
    // if ($data->karyawans()->count() > 0) {
    //   Alert::error('Oops....', 'Data tidak dapat dihapus karena memiliki data umum');
    //   return redirect()->route('umum.index');
    // }
    $data->delete();
    Alert::success('Success', 'Data berhasil dihapus');
    return redirect()->route('tagihan_ronda.index');
  }
}
