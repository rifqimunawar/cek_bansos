<?php

namespace Modules\Pembayaran\Http\Controllers;

use App\Helpers\Fungsi;
use Illuminate\Http\Request;
use Modules\Tagihan\Models\Pam;
use Modules\Master\Models\Warga;
use Modules\Master\Models\Periode;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Master\Models\Parameter;
use Modules\Tagihan\Models\TagihanRonda;
use RealRashid\SweetAlert\Facades\Alert;
use Modules\Pembayaran\Models\Pembayaran;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class PembayaranController extends Controller
{
  public function index()
  {
    Fungsi::hakAkses('/pembayaran');
    $alert = 'Delete Data!';
    $text = "Are you sure you want to delete?";
    confirmDelete($alert, $text);

    $title = 'Data Pembayaran';

    $data = Warga::with(['absens.ronda', 'rondas', 'rondas', 'tagihans'])->latest()->get();

    $response = [];

    foreach ($data as $index => $item) {
      $totalTagihanUmum = 0;
      foreach ($item->tagihans as $umum) {
        $totalTagihanUmum += $umum->nominal;
      }
      $tagihanUmum = Fungsi::rupiah($totalTagihanUmum);

      $totalTagihanPam = 0;
      foreach ($item->tagihanPam as $tagihan) {
        $totalTagihanPam += $tagihan->nominal;
      }
      $tagihanPamTotalFormatted = Fungsi::rupiah($totalTagihanPam);
      $nominal_denda = Parameter::pluck('denda_ronda')->first();
      // ronda di ambil harus dari model TagihanRonda
      $jml_tdk_ronda = $item->tagihan_absen->where('status_absen', 0)->count();
      $nominal_denda_ronda = $jml_tdk_ronda * $nominal_denda;

      $totalTagihan = $totalTagihanUmum + $totalTagihanPam + $nominal_denda_ronda;

      $nominal_terbayar = Pembayaran::where('warga_id', $item->id)->sum('nominal_dibayar');

      $response[] = [
        'warga_id' => $item->id,
        'nama_warga' => $item->nama,
        'total_tagihan' => Fungsi::rupiah($totalTagihan),
        'nominal_terbayar' => Fungsi::rupiah($nominal_terbayar),
        'tagihan_umum' => $tagihanUmum,
        'tagihan_pam' => $tagihanPamTotalFormatted,
        'jml_tdk_ronda' => $jml_tdk_ronda,
        'nominal_denda_ronda' => Fungsi::rupiah($nominal_denda_ronda)
      ];
    }

    // dd($response);
    // return $data;
    return view(
      'pembayaran::/pembayaran/index',
      [
        'title' => $title,
        'data' => $response,
      ]
    );
  }

  public function periode_pembayaran($warga_id)
  {
    Fungsi::hakAkses('/pembayaran');
    $title = 'Pilih Periode Pembayaran Rutin';
    $data = Warga::with([
      'periodes' => function ($query) {
        $query->orderBy('created_at', 'desc');
      }
    ])->findOrFail($warga_id);



    // return $data;


    return view(
      'pembayaran::/pembayaran/periode_pembayaran_rutin',
      [
        'title' => $title,
        'data' => $data,
        'warga_id' => $warga_id,
      ]
    );
  }
  public function indexByPeriode($warga_id, $periode_id)
  {
    Fungsi::hakAkses('/pembayaran');
    $periode = Periode::findOrFail($periode_id);
    $title = 'Tagihan Rutin Pada Bulan ' . $periode->nama_periode;

    $data = Warga::with([
      'tagihans' => function ($query) use ($periode_id, $warga_id) {
        $query->wherePivot('periode_id', $periode_id)
          ->wherePivot('warga_id', $warga_id)
          ->with([
            'pembayaran' => function ($q) use ($periode_id, $warga_id) {
              $q->where('periode_id', $periode_id)
                ->where('warga_id', $warga_id);
            },
            'periodes' => function ($q) use ($periode_id, $warga_id) {
              $q->wherePivot('periode_id', $periode_id)
                ->wherePivot('warga_id', $warga_id);
            }
          ]);
      }
    ])->find($warga_id);
    // return $data;
    return view(
      'pembayaran::/pembayaran/indexByPeriode',
      [
        'title' => $title,
        'data' => $data,
      ]
    );
  }

  public function store(Request $request)
  {
    $data = $request->all();
    $warga_id = $request->warga_id;
    $periode_id = $request->periode_id;
    $nama_periode = Periode::where('id', $periode_id)->value('nama_periode');
    $data['periode_nama'] = $nama_periode;

    if ($request->hasFile('img')) {
      $extension = $request->img->getClientOriginalExtension();
      $newFileName = 'pembayaran' . '_' . now()->timestamp . '.' . $extension;
      $request->file('img')->move(public_path('/img'), $newFileName);
      $data['img'] = $newFileName;
    }

    if (!empty($request->id)) {
      $updateData = Pembayaran::findOrFail($request->id);
      $data['modified_by'] = Auth::user()->username;
      $updateData->update($data);
      Alert::success('Success', 'Data berhasil diupdate');
      return redirect()->route('indexByPeriode', ['warga_id' => $warga_id, 'periode_id' => $periode_id]);
    }
    $lastId = Pembayaran::max('id');
    $newId = $lastId ? $lastId + 1 : 1;
    $data['id_qrcode'] = substr(hash('sha256', $newId), 0, 16); //hash 16 carakter

    // Buat no_pembayaran dengan format 0XXXXX (total 9 digit)
    $data['no_pembayaran'] = sprintf('%05d', $newId);


    $data['created_by'] = Auth::user()->username;
    Pembayaran::create($data);
    Alert::success('Success', 'Data berhasil disimpan');
    return redirect()->route('indexByPeriode', ['warga_id' => $warga_id, 'periode_id' => $periode_id]);
  }

  public function pembayaran_pam($warga_id)
  {
    Fungsi::hakAkses('/pembayaran');
    $data = Pam::where('warga_id', $warga_id)
      ->with([
        'warga',
        'pembayaran' => function ($query) {
          $query->whereNotNull('pam_id');
        }
      ])
      ->latest()
      ->get();
    $title = 'Tagihan Pam ' . ($data->isNotEmpty() ? $data->first()->warga->nama : '-');
    return view(
      'pembayaran::/pembayaran/pembayaran-pam',
      [
        'title' => $title,
        'data' => $data,
      ]
    );
  }
  public function storePam(Request $request)
  {

    $data = $request->all();
    $warga_id = $request->warga_id;
    if ($request->hasFile('img')) {
      $extension = $request->img->getClientOriginalExtension();
      $newFileName = 'pembayaran' . '_' . now()->timestamp . '.' . $extension;
      $request->file('img')->move(public_path('/img'), $newFileName);
      $data['img'] = $newFileName;
    }

    if (!empty($request->id)) {
      $updateData = Pembayaran::findOrFail($request->id);
      $data['modified_by'] = Auth::user()->username;
      $updateData->update($data);
      Alert::success('Success', 'Data berhasil diupdate');
      return redirect()->route('pembayaran_pam', ['warga_id' => $warga_id]);
    }
    $lastId = Pembayaran::max('id');
    $newId = $lastId ? $lastId + 1 : 1;
    $data['id_qrcode'] = substr(hash('sha256', $newId), 0, 16); //hash 16 carakter
    // Buat no_pembayaran dengan format 0XXXXX (total 9 digit)
    $data['no_pembayaran'] = sprintf('%05d', $newId);

    $data['created_by'] = Auth::user()->username;
    Pembayaran::create($data);
    Alert::success('Success', 'Data berhasil disimpan');
    return redirect()->route('pembayaran_pam', ['warga_id' => $warga_id]);
  }

  public function pembayaran_denda($warga_id)
  {
    $title = 'Tagihan Denda Ronda';
    Fungsi::hakAkses('/pembayaran');
    $data = TagihanRonda::with(['warga', 'pembayaran'])
      ->where('warga_id', $warga_id)
      ->latest()
      ->get();

    // return $data;
    return view(
      'pembayaran::/pembayaran/pembayaran-denda',
      [
        'title' => $title,
        'data' => $data,
      ]
    );
  }

  public function storeDenda(Request $request)
  {
    $data = $request->all();
    $denda_ronda_id = $request->denda_ronda_id;
    $warga_id = $request->warga_id;

    // Handle file upload
    if ($request->hasFile('img')) {
      $extension = $request->img->getClientOriginalExtension();
      $newFileName = 'pembayaran_' . now()->timestamp . '.' . $extension;
      $request->file('img')->move(public_path('/img'), $newFileName);
      $data['img'] = $newFileName;
    }

    // Update jika ID sudah ada
    if (!empty($request->id)) {
      $updateData = Pembayaran::findOrFail($request->id);
      $data['modified_by'] = Auth::user()->username;
      $updateData->update($data);
      Alert::success('Success', 'Data berhasil diupdate');
      return redirect()->route('pembayaran_denda', ['warga_id' => $warga_id]);
    }

    // Generate ID dan no_pembayaran
    $lastId = Pembayaran::max('id');
    $newId = $lastId ? $lastId + 1 : 1;
    $data['id_qrcode'] = substr(hash('sha256', $newId), 0, 16); // hash 16 karakter
    $data['no_pembayaran'] = sprintf('%05d', $newId); // Format 00001

    // Ubah status denda di TagihanRonda
    $tagihan_ronda = TagihanRonda::find($denda_ronda_id);
    if ($tagihan_ronda) {
      $tagihan_ronda->status_denda = 1;
      $tagihan_ronda->save();
    }

    $data['created_by'] = Auth::user()->username;
    Pembayaran::create($data);

    Alert::success('Success', 'Data berhasil disimpan');
    return redirect()->route('pembayaran_denda', ['warga_id' => $warga_id]);
  }


  public function invoice($id)
  {
    $title = '';
    $data = Pembayaran::find($id);

    $route = route('invoiceVerifikasi', $data->id_qrcode);
    // return $route;
    $qrCode = QrCode::size(80)->generate($route);
    return view(
      'pembayaran::/pembayaran/invoice',
      [
        'title' => $title,
        'data' => $data,
        'qrCode' => $qrCode,
      ]
    );
  }

  public function invoiceVerifikasi($id_qrcode)
  {
    $title = '';
    $data = Pembayaran::where('id_qrcode', $id_qrcode)->first();
    // return $data;
    if ($data) {
      $periode = !empty($data->periode_nama) ? "untuk periode {$data->periode_nama}" : "";
      $pesan = "Verifikasi pembayaran berhasil! Nota pembayaran ini adalah bukti sah atas pembayaran '{$data->tagihan_nama}' {$periode}.
        Pembayaran ini dilakukan oleh Bapak/Ibu {$data->nama_warga} dengan nominal sebesar " . Fungsi::rupiah($data->nominal_dibayar) . "
        Kami telah menerima pembayaran ini pada " . Fungsi::format_tgl($data->created_at) . ".
        Terima kasih atas kontribusi Anda. Jika ada pertanyaan, silakan hubungi kami.";
    } else {
      $pesan = "Verifikasi gagal! Data pembayaran tidak ditemukan.";
    }

    Alert::success('Success', 'Verifikasi data berhasil');
    return view(
      'pembayaran::/pembayaran/verifikasi',
      [
        'title' => $title,
        'data' => $pesan,
      ]
    );
  }

}
