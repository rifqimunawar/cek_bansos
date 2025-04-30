<?php

namespace Modules\Tagihan\Http\Controllers;

use Carbon\Carbon;
use App\Helpers\Fungsi;
use Illuminate\Http\Request;
use Modules\Tagihan\Models\Pam;
use Modules\Master\Models\Warga;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Modules\Master\Models\Parameter;
use Modules\Master\Exports\UmumExport;
use RealRashid\SweetAlert\Facades\Alert;

class PamController extends Controller
{
  public function index()
  {
    Fungsi::hakAkses('/tagihan/pam');
    $alert = 'Delete Data!';
    $text = "Are you sure you want to delete?";
    confirmDelete($alert, $text);

    $title = 'Data Tagihan Pam';
    $data = Warga::with('tagihanPam')->latest()->get();
    return view(
      'tagihan::/pam/index',
      [
        'title' => $title,
        'data' => $data,
      ]
    );
  }
  public function create()
  {
    Fungsi::hakAkses('/tagihan/pam');

    $title = "Tagihan Pam Baru";
    return view(
      'tagihan::pam/create',
      [
        'title' => $title,
      ]
    );
  }

  public function store(Request $request)
  {

    $warga_id = $request->warga_id;
    $tanggal_input = $request->tanggal_input;
    $biaya = Parameter::pluck('biaya_pam')->first();

    $total_parameter = $request->total_parameter;
    $total_parameter_sebelumnya = $request->total_parameter_sebelumnya ?? 0;

    $parameter = $total_parameter - $total_parameter_sebelumnya;
    $nominal = $parameter * $request->biaya;


    if (!empty($request->id)) {
      $updateData = Pam::findOrFail($request->id);
      $updateData->update([
        'warga_id' => $warga_id,
        'tanggal_input' => $tanggal_input,
        'total_parameter' => $total_parameter,
        'parameter' => $parameter,
        'nominal' => $nominal,
        'biaya_per_m3' => $biaya,
        'updated_by' => Auth::user()->username,
      ]);
      Alert::success('Success', 'Data berhasil diupdate');
    } else {
      Pam::create([
        'warga_id' => $warga_id,
        'tanggal_input' => $tanggal_input,
        'total_parameter' => $total_parameter,
        'parameter' => $parameter,
        'nominal' => $nominal,
        'biaya_per_m3' => $biaya,
        'created_by' => Auth::user()->username,
      ]);
      Alert::success('Success', 'Data berhasil disimpan');
    }
    return redirect()->route('pam.view', [$warga_id]);
  }

  public function edit($id)
  {
    $title = "Update Data Pam";
    Fungsi::hakAkses('/tagihan/pam');
    $pam = Pam::findOrFail($id);

    return view(
      'tagihan::pam.edit',
      [
        'data' => $pam,
        'title' => $title,
      ]
    );
  }

  public function view($id)
  {
    $title = "Detail Tagihan Pam Swadaya";
    Fungsi::hakAkses('/tagihan/pam');
    $warga = Warga::where('id', $id)->with('tagihanPam')->first();
    $pamSebelumnya = Pam::where('warga_id', $id)->latest()->first();
    $tagihanPam = Pam::where('warga_id', $id)->latest()->get();
    $biaya = Parameter::pluck('biaya_pam')->first();

    // dd($warga);
    return view(
      'tagihan::pam.view',
      [
        'data' => $warga,
        'data_pam_sebelumnya' => $pamSebelumnya,
        'tagihanPam' => $tagihanPam,
        'data_biaya' => $biaya,
        'title' => $title,
      ]
    );
  }

  public function print()
  {
    $title = "List Data Pam";
    $data = Pam::latest();
    return view(
      'tagihan::pam/print',
      [
        'title' => $title,
        'data' => $data,
      ]
    );
  }
  public function export()
  {
    return Excel::download(new UmumExport, 'pam.xlsx');
  }
  public function pdf()
  {
    $title = "List Data Tagihan Pam " . Carbon::now()->format('d-M-Y');
    $today = Carbon::now()->format('d M Y');
    $data = Pam::latest();

    // ========================untuk development
    return view(
      'tagihan::pam/pdf',
      [
        'title' => $title,
        'data' => $data,
        'today' => $today,
      ]
    );

    // ========================untuk production
    // $html = view('tagihan::pam.pdf', [
    //   'title' => $title,
    //   'data' => $data,
    //   'today' => $today,
    // ])->render();

    // $mpdf = new \Mpdf\Mpdf();
    // $mpdf->WriteHTML($html);
    // $fileName = Carbon::now()->format('Y_m_d') . '_data_karyawan.pdf';
    // $mpdf->Output($fileName, 'D');
    // $mpdf->Output();
  }
}
