<?php

namespace Modules\Master\Http\Controllers;

use App\Helpers\Fungsi;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Modules\Master\Models\Warga;
use Modules\Tagihan\Models\Umum;
use Illuminate\Support\Facades\DB;
use Modules\Master\Models\Periode;
use Modules\Master\Models\Provinsi;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Maatwebsite\Excel\Facades\Excel;
use Modules\Master\Exports\WargaExport;
use RealRashid\SweetAlert\Facades\Alert;

class WargaController extends Controller
{
  public function index()
  {
    Fungsi::hakAkses('/master/warga');
    $alert = 'Delete Data!';
    $text = "Are you sure you want to delete?";
    confirmDelete($alert, $text);

    $title = 'Data Warga';
    $data = Warga::latest()->get();
    return view(
      'master::/warga/index',
      [
        'title' => $title,
        'data' => $data,
      ]
    );
  }
  public function create()
  {
    Fungsi::hakAkses('/master/warga');

    $title = "Warga Baru";
    return view(
      'master::warga/create',
      [
        'title' => $title,
      ]
    );
  }
  public function edit($id)
  {
    Fungsi::hakAkses('/master/warga');

    $title = "Update Warga";
    $data = Warga::findOrfail($id);
    return view(
      'master::warga/edit',
      [
        'title' => $title,
        'data' => $data,
      ]
    );
  }

  public function store(Request $request)
  {

    // Validasi input
    $validatedData = $request->validate([
      'status_perkawinan' => 'required|integer|in:1,2,3,4',
      'tgl_lahir' => 'required|date|before:today',
      'pendapatan' => 'required|numeric|min:0',
      'pendidikan' => 'required|integer|between:1,6',
      'pekerjaan' => 'required|integer|between:1,20'
    ]);

    $data_cek_bansos = [
      'status_perkawinan' => (int) $validatedData['status_perkawinan'],
      'tgl_lahir' => $validatedData['tgl_lahir'],
      'pendapatan' => (int) $validatedData['pendapatan'],
      'pendidikan' => (int) $validatedData['pendidikan'],
      'pekerjaan' => (int) $validatedData['pekerjaan']
    ];

    // Kirim data ke API Python
    $response = Http::post('http://localhost:5000/cek_bansos', $data_cek_bansos);

    $data = $request->all();

    // Ambil hasil prediksi
    if ($response->successful()) {
      $hasil = $response->json();
      $data['bantuan_sosial'] = $hasil['bantuan_sosial'];
    } else {
      $data['bantuan_sosial'] = 'API Gagal';
    }

    if (!empty($request->id)) {
      $updateData = Warga::findOrFail($request->id);
      $data['updated_by'] = Auth::user()->username;
      $updateData->update($data);
      Alert::success('Success', 'Data berhasil diupdate');
      return redirect()->route('warga.index');
    }

    $data['created_by'] = Auth::user()->username;
    Warga::create($data);
    Alert::success('Success', 'Data berhasil disimpan');
    return redirect()->route('warga.index');
  }

  public function destroy($id)
  {
    Fungsi::hakAkses('/master/warga');

    $data = Warga::findOrFail($id);
    $data->deleted_by = Auth::user()->username;
    // if ($data->karyawans()->count() > 0) {
    //   Alert::error('Oops....', 'Data tidak dapat dihapus karena memiliki data warga');
    //   return redirect()->route('warga.index');
    // }
    $data->delete();
    Alert::success('Success', 'Data berhasil dihapus');
    return redirect()->route('warga.index');
  }
  public function print()
  {
    $title = "List Data Warga ";
    $data = Warga::latest();
    return view(
      'master::warga/print',
      [
        'title' => $title,
        'data' => $data,
      ]
    );
  }
  public function export()
  {
    return Excel::download(new WargaExport, 'warga.xlsx');
  }
  public function pdf()
  {
    $title = "List Data Warga " . Carbon::now()->format('d-M-Y');
    $today = Carbon::now()->format('d M Y');
    $data = Warga::latest();

    // ========================untuk ngecek
    return view(
      'master::warga/pdf',
      [
        'title' => $title,
        'data' => $data,
        'today' => $today,
      ]
    );

    // $html = view('master::warga.pdf', [
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
