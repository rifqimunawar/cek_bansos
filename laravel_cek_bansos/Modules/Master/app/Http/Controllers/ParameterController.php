<?php

namespace Modules\Master\Http\Controllers;

use App\Helpers\Fungsi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Master\Models\Parameter;
use RealRashid\SweetAlert\Facades\Alert;

class ParameterController extends Controller
{
  public function create()
  {
    $title = "Parameter";
    Fungsi::hakAkses('/master/parameter');
    $parameter = Parameter::first();
    // $parameter->biaya_pam = Fungsi::rupiah($parameter->biaya_pam);
    // $parameter->denda_ronda = Fungsi::rupiah($parameter->denda_ronda);

    return view(
      'master::parameter.edit',
      [
        'data' => $parameter,
        'title' => $title,
      ]
    );
  }
  public function store(Request $request)
  {
    $data = $request->all();

    // dd($data);
    $data = $request->validate([
      'kop_surat' => 'required|file|mimes:jpeg,jpg,png|max:2048',
      'footer_surat' => 'nullable|file|mimes:jpeg,jpg,png|max:2048',
    ]);

    if ($request->hasFile('kop_surat')) {
      $file = $request->file('kop_surat');
      $extension = $file->getClientOriginalExtension();
      $newFileName = 'kop_surat_' . now()->timestamp . '.' . $extension;
      $file->move(public_path('/surat'), $newFileName);
      $data['kop_surat'] = $newFileName;
    }
    if ($request->hasFile('footer_surat')) {
      $file = $request->file('footer_surat');
      $extension = $file->getClientOriginalExtension();
      $newFileName = 'footer_surat_' . now()->timestamp . '.' . $extension;
      $file->move(public_path('/surat'), $newFileName);
      $data['footer_surat'] = $newFileName;
    }


    if (!empty($request->id)) {
      $updateData = Parameter::findOrFail($request->id);
      $data['updated_by'] = Auth::user()->username;
      $updateData->update($data);
      Alert::success('Success', 'Data berhasil diupdate');
      return redirect()->route('parameter.create');
    }

    $data['created_by'] = Auth::user()->username;
    Parameter::create($data);
    Alert::success('Success', 'Data berhasil disimpan');
    return redirect()->route('parameter.create');
  }

}
