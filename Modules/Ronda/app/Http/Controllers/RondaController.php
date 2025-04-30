<?php

namespace Modules\Ronda\Http\Controllers;

use Carbon\Carbon;
use App\Helpers\Fungsi;
use Illuminate\Http\Request;
use Modules\Ronda\Models\Ronda;
use Modules\Master\Models\Warga;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Ronda\Models\RondaAbsen;
use RealRashid\SweetAlert\Facades\Alert;

class RondaController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function jadwal()
  {
    Fungsi::hakAkses('/ronda/jadwal');
    $alert = 'Delete Data!';
    $text = "Are you sure you want to delete?";
    confirmDelete($alert, $text);

    $title = '';
    $data = Ronda::with(['wargas', 'absens'])->latest()->get();
    $ronda_hari_ini = $data->where('tanggal_ronda', Carbon::today()->toDateString());

    // dd($data);
    return view(
      'ronda::/ronda/jadwal',
      [
        'title' => $title,
        'data' => $data,
        'ronda_hari_ini' => $ronda_hari_ini,
      ]
    );
  }
  // ===========================================
  public function index()
  {
    Fungsi::hakAkses('/ronda/jadwalkan');
    $alert = 'Delete Data!';
    $text = "Are you sure you want to delete?";
    confirmDelete($alert, $text);

    $title = 'Jadwal Ronda Malam';
    $data = Ronda::with(['wargas', 'absens'])->latest()->get();

    // dd($data);
    return view(
      'ronda::/ronda/index',
      [
        'title' => $title,
        'data' => $data,
      ]
    );
  }
  public function create()
  {
    Fungsi::hakAkses('/ronda/jadwalkan');

    $data_warga = Warga::latest()->get();
    $title = "Jadwal Ronda";
    return view(
      'ronda::ronda/create',
      [
        'title' => $title,
        'data_warga' => $data_warga
      ]
    );
  }

  public function store(Request $request)
  {
    // Jika request mengandung ID (update case), abaikan validasi unique
    $rules = [
      'tanggal_ronda' => 'required|date',
    ];

    if (empty($request->id)) {
      $rules['tanggal_ronda'] .= '|unique:rondas,tanggal_ronda';
    }

    $request->validate($rules, [
      'tanggal_ronda.unique' => 'Tanggal sudah diisi, pilih tanggal lain.',
    ]);

    $data = $request->except('warga_id');

    // Proses upload gambar ke public/img
    if ($request->hasFile('img')) {
      $extension = $request->img->getClientOriginalExtension();
      $newFileName = 'Ronda_' . now()->timestamp . '.' . $extension;
      $request->file('img')->move(public_path('/img'), $newFileName);
      $data['img'] = $newFileName;
    }

    // Proses Update
    if (!empty($request->id)) {
      $updateData = Ronda::findOrFail($request->id);
      $data['updated_by'] = Auth::user()->username;
      $updateData->update($data);

      $wargaIds = $request->warga_id;
      if (!empty($wargaIds)) {
        $updateData->wargas()->sync($wargaIds);
        foreach ($wargaIds as $wargaId) {
          RondaAbsen::updateOrCreate(
            ['ronda_id' => $updateData->id, 'warga_id' => $wargaId],
            ['absen' => 0, 'created_by' => Auth::user()->username]
          );
        }
      }

      Alert::success('Success', 'Data berhasil diupdate');
      return redirect()->route('jadwalkan.index');
    }

    // Proses Create
    $data['created_by'] = Auth::user()->username;
    $newRonda = Ronda::create($data);

    $wargaIds = $request->warga_id;
    if (!empty($wargaIds)) {
      $newRonda->wargas()->sync($wargaIds);
      foreach ($wargaIds as $wargaId) {
        RondaAbsen::create([
          'ronda_id' => $newRonda->id,
          'warga_id' => $wargaId,
          'absen' => 1,
          'created_by' => Auth::user()->username,
        ]);
      }
    }

    Alert::success('Success', 'Data berhasil disimpan');
    return redirect()->route('jadwalkan.index');
  }

  public function generate(Request $request)
  {
    $request->validate([
      'tgl_awal' => 'required|date',
      'tgl_akhir' => 'required|date|after_or_equal:tgl_awal',
      'jumlah_warga' => 'required|integer|min:1',
    ]);

    $jumlahPerHari = $request->jumlah_warga;

    // Ambil semua data warga (gunakan model Warga sesuai tabelmu)
    $warga = Warga::all()->shuffle(); // ACAK!
    $totalWarga = $warga->count();

    // Buat rentang tanggal dari tgl_awal sampai tgl_akhir
    $tanggalRange = [];
    $start = Carbon::parse($request->tgl_awal);
    $end = Carbon::parse($request->tgl_akhir);
    while ($start <= $end) {
      $tanggalRange[] = $start->format('Y-m-d');
      $start->addDay();
    }

    $index = 0;
    foreach ($tanggalRange as $tanggal) {
      if ($index >= $totalWarga)
        break; // Stop jika warga habis

      // Cek apakah sudah ada ronda untuk tanggal ini
      if (Ronda::where('tanggal_ronda', $tanggal)->exists()) {
        continue; // Lewati jika tanggal sudah dipakai
      }

      // Buat data Ronda
      $ronda = Ronda::create([
        'tanggal_ronda' => $tanggal,
        'created_by' => Auth::user()->username,
      ]);

      $wargaHariIni = [];
      for ($i = 0; $i < $jumlahPerHari; $i++) {
        if (isset($warga[$index])) {
          $wargaHariIni[] = $warga[$index]->id;

          RondaAbsen::create([
            'ronda_id' => $ronda->id,
            'warga_id' => $warga[$index]->id,
            'absen' => 1,
            'created_by' => Auth::user()->username,
          ]);

          $index++;
        } else {
          break;
        }
      }

      $ronda->wargas()->sync($wargaHariIni); // Hubungkan ke warga hari ini
    }

    Alert::success('Success', 'Jadwal ronda berhasil digenerate secara acak!');
    return redirect()->route('jadwalkan.index');
  }
  public function preview(Request $request)
  {
    $request->validate([
      'tgl_awal' => 'required|date',
      'tgl_akhir' => 'required|date',
      'jumlah_warga' => 'required|integer|min:1',
    ]);

    $wargas = Warga::all()->shuffle(); // urutan acak
    $jumlahWarga = $request->jumlah_warga;

    $dates = collect();
    for ($date = Carbon::parse($request->tgl_awal); $date->lte(Carbon::parse($request->tgl_akhir)); $date->addDay()) {
      $dates->push($date->toDateString());
    }

    $jadwal = [];
    $index = 0;

    foreach ($dates as $tanggal) {
      if (Ronda::where('tanggal_ronda', $tanggal)->exists()) {
        continue; // Lewati tanggal yang sudah dipakai
      }

      $grup = [];
      for ($i = 0; $i < $jumlahWarga; $i++) {
        if (isset($wargas[$index])) {
          $grup[] = $wargas[$index];
          $index++;
        }
      }

      if (!empty($grup)) {
        $jadwal[$tanggal] = $grup;
      }
    }

    return view('ronda::/ronda/preview', [
      'title' => 'Preview Jadwal Ronda',
      'jadwal' => $jadwal,
    ]);
  }


  public function storeAfterPreview(Request $request)
  {
    $decoded = unserialize(base64_decode($request->data_jadwal));

    foreach ($decoded as $tanggal => $listWarga) {
      $ronda = Ronda::create([
        'tanggal_ronda' => $tanggal,
        'created_by' => Auth::user()->username,
      ]);

      foreach ($listWarga as $warga) {
        $ronda->wargas()->attach($warga->id);
        RondaAbsen::create([
          'ronda_id' => $ronda->id,
          'warga_id' => $warga->id,
          'absen' => 1,
          'created_by' => Auth::user()->username,
        ]);
      }
    }

    Alert::success('Sukses', 'Jadwal berhasil disimpan');
    return redirect()->route('jadwalkan.index');
  }


  public function edit($id)
  {
    $title = "Update Data Warga";
    Fungsi::hakAkses('/ronda/jadwalkan');
    $ronda = Ronda::with('wargas')->findOrFail($id);
    $warga = Warga::latest()->get();
    $selectedWargas = $ronda->wargas->pluck('id')->toArray();
    $data_jadwal_ronda = Ronda::with(['wargas', 'absens'])->latest()->get();
    $absen_ronda = RondaAbsen::where('ronda_id', $id)->latest()->get();
    $cek_absen = RondaAbsen::cekAbsen($id);
    // dd($cek_absen);
    return view(
      'ronda::ronda.edit',
      [
        'data' => $ronda,
        'data_warga' => $warga,
        'cek_absen' => $cek_absen,
        'data_jadwal_ronda' => $cek_absen,
        'selected_wargas' => $selectedWargas,
        'title' => $title,
      ]
    );
  }

  public function absen(Request $request)
  {
    // dd($request);
    $validated = $request->validate([
      'ronda_id' => 'required|exists:rondas,id',
      'absen' => 'required|array',
    ]);

    foreach ($request->absen as $warga_id => $absen) {
      $rondaAbsen = RondaAbsen::updateOrCreate(
        ['ronda_id' => $request->ronda_id, 'warga_id' => $warga_id],
        ['absen' => $absen]
      );
    }

    Alert::success('Success', 'Absen berhasil disimpan');
    return redirect()->route('jadwalkan.index');
  }


  public function destroy($id)
  {

    Fungsi::hakAkses('/ronda/jadwalkan');
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

}
