<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Master\Models\Provinsi;
use Modules\Master\Models\Kabupaten;
use Modules\Master\Models\Kecamatan;
use Modules\Master\Models\Kelurahan;

class GlobalController extends Controller
{
  public function getProv()
  {
    $provinsi = Provinsi::all();
    return response()->json($provinsi);
  }

  public function getKab($prov_id)
  {
    $kabupaten = Kabupaten::where('prov_id', $prov_id)->get();
    return response()->json($kabupaten);
  }

  public function getKec($kab_id)
  {
    $kecamatan = Kecamatan::where('kab_kode', $kab_id)->get();
    return response()->json($kecamatan);
  }

  public function getKel($kec_id)
  {
    $kelurahan = Kelurahan::where('kec_kode', $kec_id)->get();
    return response()->json($kelurahan);
  }
}
