<?php

namespace Modules\BuatSurat\Http\Controllers;

use App\Helpers\Fungsi;
use App\Helpers\GetSettings;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\BuatSurat\Models\SuratDinas;
use Modules\Master\Models\KlasifikasiSurat;
use Modules\Master\Models\Parameter;
use Modules\Master\Models\Penandatangan;
use RealRashid\SweetAlert\Facades\Alert;

class SuratDinasController extends Controller
{
  public function create()
  {
    Fungsi::hakAkses('/buat/surat_dinas');
    $data = KlasifikasiSurat::latest()->get();
    $data_penandatangan = Penandatangan::latest()->get();

    $title = "SURAT PENUGASAN DINAS";
    return view(
      'buatsurat::surat_dinas/create',
      [
        'title' => $title,
        'data' => $data,
        'data_penandatangan' => $data_penandatangan,
      ]
    );
  }


  public function store(Request $request)
  {
    $data = $request->all();

    // Simpan file jika ada
    if ($request->hasFile('img')) {
      $extension = $request->img->getClientOriginalExtension();
      $newFileName = 'images_' . now()->timestamp . '.' . $extension;
      $request->file('img')->move(public_path('/img'), $newFileName);
      $data['img'] = $newFileName;
    }

    $data['action'] = $request->action ?? 'simpan';

    if (!empty($request->id)) {
      // Update
      $updateData = SuratDinas::findOrFail($request->id);
      $data['modified_by'] = Auth::user()->username;
      $updateData->update($data);
      if ($request->action === 'preview') {
        return redirect()->route('surat_dinas.preview', $request->id);
      }
      return redirect()->route('surat_dinas.create')->with('success', 'Data berhasil diupdate');
    }
    $data['created_by'] = Auth::user()->username;
    $created = SuratDinas::create($data);
    if ($request->action === 'preview') {
      return redirect()->route('surat_dinas.preview', $created->id);
    }

    return redirect()->route('surat_dinas.create')->with('success', 'Data berhasil disimpan');
  }



  public function preview($id)
  {
    $parameter = Parameter::first();

    return view(
      'buatsurat::surat_dinas/preview1',
      [
        'surat' => SuratDinas::with('penandatangan')->findOrFail($id),
        'kop_surat' => GetSettings::getBaseUrl() . 'surat/' . ($parameter->kop_surat ?? ''),
        'footer_surat' => GetSettings::getBaseUrl() . 'surat/' . ($parameter->footer_surat ?? ''),
      ]
    );
  }


}
