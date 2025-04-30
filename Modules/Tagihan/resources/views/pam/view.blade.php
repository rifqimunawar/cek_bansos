@extends('tagihan::layouts.master')

@php
  use App\Helpers\Fungsi;
@endphp

@section('module-content')
  <div class="row">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          <div class="card-title">Biodata Warga</div>
        </div>
        <div class="card-body">
          <div class="row">
            <table>
              <tr>
                <td style="padding-bottom: 10px">Nama</td>
                <td>:</td>
                <td>{{ $data->nama }}</td>
              </tr>
              <tr>
                <td style="padding-bottom: 10px">NIK</td>
                <td>:</td>
                <td>{{ $data->nik }}</td>
              </tr>
              <tr>
                <td style="padding-bottom: 10px">Usia</td>
                <td>:</td>
                <td>{{ Fungsi::usia($data->tgl_lahir) }}</td>
              </tr>
              <tr>
                <td style="padding-bottom: 10px">Jenis Kelamin</td>
                <td>:</td>
                <td>{{ $data->jk }}</td>
              </tr>
              <tr>
                <td style="padding-bottom: 10px">Kota Kelahiran</td>
                <td>:</td>
                <td>{{ $data->kota_kelahiran }}</td>
              </tr>
              <tr>
                <td style="padding-bottom: 10px">Agama</td>
                <td>:</td>
                <td>
                  @if ($data->agama == 1)
                    Islam
                  @elseif($data->agama == 2)
                    Kristen
                  @elseif($data->agama == 3)
                    Hindu
                  @elseif($data->agama == 4)
                    Budha
                  @else
                    -
                  @endif
                </td>
              </tr>

              <tr>
                <td style="padding-bottom: 10px">Pendidikan</td>
                <td>:</td>
                <td>
                  @if ($data->pendidikan == 1)
                    SD/Sederajat
                  @elseif($data->pendidikan == 2)
                    SMP/Sederajat
                  @elseif($data->pendidikan == 3)
                    SMA/Sederajat
                  @elseif($data->pendidikan == 4)
                    D3/Sederajat
                  @elseif($data->pendidikan == 5)
                    S1/Sederajat
                  @elseif($data->pendidikan == 6)
                    S2/Sederajat
                  @elseif($data->pendidikan == 7)
                    S3/Sederajat
                  @else
                    -
                  @endif
                </td>
              </tr>

              <tr>
                <td style="padding-bottom: 10px">Pekerjaan</td>
                <td>:</td>
                <td>
                  @if ($data->pekerjaan == 1)
                    Pegawai Negeri Sipil (PNS)
                  @elseif($data->pekerjaan == 2)
                    Karyawan Swasta
                  @elseif($data->pekerjaan == 3)
                    Wiraswasta / Pengusaha
                  @elseif($data->pekerjaan == 4)
                    Petani
                  @elseif($data->pekerjaan == 5)
                    Nelayan
                  @elseif($data->pekerjaan == 6)
                    Buruh / Pekerja Lepas
                  @elseif($data->pekerjaan == 7)
                    Guru / Dosen
                  @elseif($data->pekerjaan == 8)
                    Dokter / Tenaga Medis
                  @elseif($data->pekerjaan == 9)
                    TNI / Polri
                  @elseif($data->pekerjaan == 10)
                    Ojek Online / Sopir
                  @elseif($data->pekerjaan == 11)
                    Ibu Rumah Tangga
                  @elseif($data->pekerjaan == 12)
                    Mahasiswa / Pelajar
                  @elseif($data->pekerjaan == 13)
                    Pensiunan
                  @elseif($data->pekerjaan == 14)
                    Teknisi / Mekanik
                  @elseif($data->pekerjaan == 15)
                    Seniman / Pekerja Kreatif
                  @elseif($data->pekerjaan == 16)
                    Programmer / IT Specialist
                  @elseif($data->pekerjaan == 17)
                    Pengacara / Notaris
                  @elseif($data->pekerjaan == 18)
                    Akuntan / Konsultan Keuangan
                  @elseif($data->pekerjaan == 19)
                    Pedagang / Penjual
                  @elseif($data->pekerjaan == 20)
                    Lainnya
                  @else
                    -
                  @endif
                </td>
              </tr>

              <tr>
                <td style="padding-bottom: 10px">Status Perkawinan</td>
                <td>:</td>
                <td>
                  @if ($data->status_perkawinan == 1)
                    Belum Menikah
                  @elseif($data->status_perkawinan == 2)
                    Menikah
                  @elseif($data->status_perkawinan == 3)
                    Cerai Hidup
                  @elseif($data->status_perkawinan == 4)
                    Cerai Mati
                  @else
                    -
                  @endif
                </td>
              </tr>

              <tr>
                <td style="padding-bottom: 10px">Status Keluarga</td>
                <td>:</td>
                <td>
                  @if ($data->status_keluarga == 1)
                    Kepala Keluarga
                  @elseif($data->status_keluarga == 2)
                    Suami
                  @elseif($data->status_keluarga == 3)
                    Istri
                  @elseif($data->status_keluarga == 4)
                    Anak
                  @else
                    -
                  @endif
                </td>
              </tr>

              <tr>
                <td style="padding-bottom: 10px">Alamat</td>
                <td>:</td>
                <td>{{ $data->alamat }}</td>
              </tr>
              <tr>
                <td style="padding-bottom: 10px">Telpon/Wa</td>
                <td>:</td>
                <td>{{ $data->telp }}</td>
              </tr>
            </table>

          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          <div class="card-title">Form Elements</div>
        </div>
        <div class="card-body">
          <div class="row">
            <form action="{{ route('pam.store') }}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="col-md-12 col-lg-12">

                <div class="form-group mb-2">
                  <label for="tanggal_input">Tanggal Pengukuran Terakhir</label>
                  <div class="input-group mb-3">
                    <input type="date" class="form-control" readonly placeholder="tanggal_input"
                      value="{{ $data_pam_sebelumnya->tanggal_input ?? '' }}" />
                  </div>
                </div>
                <label for="">Parameter Pengukuran Terakhir</label>
                <div class="input-group mb-3">
                  <input oninput="numberInput(this)" readonly name="total_parameter_sebelumnya"
                    value="{{ $data_pam_sebelumnya->total_parameter ?? '0' }}" type="text" class="form-control" />
                  <span class="input-group-text"> m3</span>
                </div>
                <hr>
                <div class="form-group mb-2">
                  <label for="tanggal">Tanggal</label>
                  <input type="date" readonly class="form-control" name="tanggal_input" required id="tanggal"
                    placeholder="tanggal" />
                </div>

                <label for="parameter_hari_ini">Parameter Hari Ini</label> <br>
                <div class="input-group">
                  <input oninput="numberInput(this)" type="text" required name="total_parameter"
                    class="form-control" />
                  <span class="input-group-text"> m3</span>
                </div>
                <p class="text-danger italic" style="font-style: italic">
                  Parameter hari ini harus lebih besar dari parameter sebelumnya *
                </p>

                <label for="">Biaya /m3</label>
                <div class="input-group mb-3">
                  <input id="biaya_m3" type="text" name="biaya" class="form-control" value="{{ $data_biaya }}"
                    readonly />
                  <span class="input-group-text"> /m3</span>
                </div>


                <div class="card-action">
                  <input type="hidden" name="warga_id" value="{{ $data->id }}">
                  {{-- <input type="hidden" name="id" value="{{ $data_pam_sebelumnya->id ?? '' }}"> --}}
                  <button class="btn btn-success btn-sm" type="submit">Simpan</button>
                  <a href="{{ route('pam.index') }}" class="btn btn-warning btn-sm">Kembali</a>
                </div>
              </div>
            </form>

          </div>
        </div>
      </div>
    </div>

    <div class="col-md-12 mt-4">
      <div class="card">
        <div class="card-header">
          <div class="card-title">History Tagihan Pam {{ $data->nama }}</div>
        </div>
        <div class="card-body">
          <div class="panel-body">
            <table id="data-table-default" width="100%"
              class="table table-striped table-bordered align-middle text-nowrap">
              <thead>
                <tr>
                  <th width="1%"></th>
                  <th class="text-nowrap">Tanggal</th>
                  <th class="text-nowrap">Parameter</th>
                  <th class="text-nowrap">Total Penggunaan</th>
                  <th class="text-nowrap">Nominal</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($tagihanPam as $item)
                  <tr class="odd gradeX">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->tanggal_input }}</td>
                    <td>{{ $item->total_parameter }}</td>
                    <td>{{ $item->parameter }}/m3</td>
                    <td>{{ Fungsi::rupiah($item->nominal) }}</td>
                  </tr>
                @endforeach

              </tbody>
            </table>
          </div>
        </div>

      </div>
    </div>
  </div>
@endsection
<script>
  function numberInput(input) {
    input.value = input.value.replace(/[^0-9]/g, '');
  }


  function setTodayDate() {
    const inputTanggal = document.getElementById('tanggal');
    const today = new Date().toISOString().split('T')[0];
    inputTanggal.value = today;
  }

  window.onload = setTodayDate;
</script>
