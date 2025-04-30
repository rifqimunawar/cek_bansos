@extends('keluarga::layouts.master')
@php
  use App\Helpers\Fungsi;
@endphp
@section('module-content')
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="card-title">Form Elements</div>
        </div>
        <div class="card-body">
          <form action="{{ route('keluarga.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
              <div class="col-md-6 col-lg-6">
                <div class="form-group mb-2">
                  <label for="nama">Nama</label>
                  <input type="text" class="form-control" required name="nama" id="nama" placeholder="Nama"
                    value="{{ $data->nama }}" />
                </div>

                <div class="form-group mb-2">
                  <label for="nik">NIK</label>
                  <input type="text" class="form-control" name="nik" required id="nik" placeholder="NIK"
                    oninput="numberInput(this)" value="{{ $data->nik }}" />
                </div>

                <div class="form-group mb-2">
                  <label for="alamat">Alamat / Blok</label>
                  <textarea class="form-control" name="alamat" required id="alamat" placeholder="Alamat/Blok">{{ $data->alamat }}</textarea>
                </div>

                <div class="form-group mb-2">
                  <label for="status_perkawinan">Status Perkawinan</label>
                  <select class="form-select" name="status_perkawinan" aria-label="Default select example">
                    <option disabled selected> - pilih - </option>
                    <option value="1" {{ $data->status_perkawinan == '1' ? 'selected' : '' }}>
                      Belum Menikah</option>
                    <option value="2" {{ $data->status_perkawinan == '2' ? 'selected' : '' }}>Menikah</option>
                    <option value="3" {{ $data->status_perkawinan == '3' ? 'selected' : '' }}>Cerai
                      Hidup</option>
                    <option value="4" {{ $data->status_perkawinan == '4' ? 'selected' : '' }}>Cerai Mati
                    </option>
                  </select>
                </div>

                <div class="form-group mb-2">
                  <label for="status_keluarga">Status Dalam Keluarga</label>
                  <select class="form-select" name="status_keluarga" aria-label="Default select example">
                    <option disabled selected> - pilih - </option>
                    <option value="1" {{ $data->status_keluarga == '1' ? 'selected' : '' }}>
                      Kepala Keluarga</option>
                    <option value="2" {{ $data->status_keluarga == '2' ? 'selected' : '' }}>Suami</option>
                    <option value="3" {{ $data->status_keluarga == '3' ? 'selected' : '' }}>Istri</option>
                    <option value="4" {{ $data->status_keluarga == '4' ? 'selected' : '' }}>Anak</option>
                  </select>
                </div>

                <div class="form-group mb-2">
                  <label for="telp">Telpon WhatsApp</label>
                  <input type="text" class="form-control" required name="telp" id="telp" placeholder="085xxx"
                    oninput="numberInput(this)" value="{{ $data->telp }}" />
                </div>
              </div>
              <div class="col-md-6 col-lg-6">

                <div class="form-group mb-2">
                  <label for="jk">Jenis Kelamin</label>
                  <select class="form-select" name="jk" aria-label="Default select example">
                    <option disabled selected> - pilih - </option>
                    <option value="Laki-laki" {{ $data->jk == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="Perempuan" {{ $data->jk == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                  </select>
                </div>

                <div class="form-group mb-2">
                  <label for="kota_kelahiran">Kota Kelahiran</label>
                  <input type="text" class="form-control" name="kota_kelahiran" required id="kota_kelahiran"
                    placeholder="Kota kelahiran" value="{{ $data->kota_kelahiran }}" />
                </div>

                <div class="form-group mb-2">
                  <label for="tgl_lahir">Tanggal Lahir</label>
                  <input type="date" class="form-control" required name="tgl_lahir" id="tgl_lahir"
                    value="{{ $data->tgl_lahir }}" />
                </div>

                <div class="form-group mb-2">
                  <label for="agama">Agama</label>
                  <select class="form-select" name="agama" aria-label="Default select example">
                    <option disabled selected> - pilih - </option>
                    <option value="1" {{ $data->agama == '1' ? 'selected' : '' }}>Islam</option>
                    <option value="2" {{ $data->agama == '2' ? 'selected' : '' }}>Kristen</option>
                    <option value="3" {{ $data->agama == '3' ? 'selected' : '' }}>Hindu</option>
                    <option value="4" {{ $data->agama == '4' ? 'selected' : '' }}>Budha</option>
                  </select>
                </div>

                <div class="form-group mb-2">
                  <label for="pendidikan">Pendidikan</label>
                  <select class="form-select" name="pendidikan" aria-label="Default select example">
                    <option disabled selected> - pilih - </option>
                    <option value="1" {{ $data->pendidikan == '1' ? 'selected' : '' }}>SD/Sederajat
                    </option>
                    <option value="2" {{ $data->pendidikan == '2' ? 'selected' : '' }}>
                      SMP/Sederajat</option>
                    <option value="3" {{ $data->pendidikan == '3' ? 'selected' : '' }}>
                      SMA/Sederajat</option>
                    <option value="4" {{ $data->pendidikan == '4' ? 'selected' : '' }}>
                      D3/Sederajat</option>
                    <option value="5" {{ $data->pendidikan == '5' ? 'selected' : '' }}>
                      S1/Sederajat</option>
                    <option value="6" {{ $data->pendidikan == '6' ? 'selected' : '' }}>
                      S2 dan Lebih Tinggi</option>
                  </select>
                </div>
                <div class="form-group mb-2">
                  <label for="pekerjaan">Pekerjaan</label>
                  <select class="form-select" name="pekerjaan" aria-label="Default select example">
                    <option disabled selected> - pilih - </option>
                    <option value="1" {{ $data->pekerjaan == '1' ? 'selected' : '' }}>Pegawai Negeri Sipil (PNS)
                    </option>
                    <option value="2" {{ $data->pekerjaan == '2' ? 'selected' : '' }}>
                      Karyawan Swasta</option>
                    <option value="3" {{ $data->pekerjaan == '3' ? 'selected' : '' }}>Wiraswasta / Pengusaha
                    </option>
                    <option value="4" {{ $data->pekerjaan == '4' ? 'selected' : '' }}>Petani</option>
                    <option value="5" {{ $data->pekerjaan == '5' ? 'selected' : '' }}>Nelayan</option>
                    <option value="6" {{ $data->pekerjaan == '6' ? 'selected' : '' }}>Buruh / Pekerja Lepas
                    </option>
                    <option value="7" {{ $data->pekerjaan == '7' ? 'selected' : '' }}>Guru / Dosen
                    </option>
                    <option value="8" {{ $data->pekerjaan == '8' ? 'selected' : '' }}>Dokter / Tenaga Medis
                    </option>
                    <option value="9" {{ $data->pekerjaan == '9' ? 'selected' : '' }}>TNI / Polri
                    </option>
                    <option value="10" {{ $data->pekerjaan == '10' ? 'selected' : '' }}>Ojek Online / Sopir</option>
                    <option value="11" {{ $data->pekerjaan == '11' ? 'selected' : '' }}>Ibu
                      Rumah Tangga</option>
                    <option value="12" {{ $data->pekerjaan == '12' ? 'selected' : '' }}>Mahasiswa / Pelajar</option>
                    <option value="13" {{ $data->pekerjaan == '13' ? 'selected' : '' }}>Pensiunan</option>
                    <option value="14" {{ $data->pekerjaan == '14' ? 'selected' : '' }}>
                      Teknisi / Mekanik</option>
                    <option value="15" {{ $data->pekerjaan == '15' ? 'selected' : '' }}>Seniman / Pekerja Kreatif
                    </option>
                    <option value="16" {{ $data->pekerjaan == '16' ? 'selected' : '' }}>Programmer / IT Specialist
                    </option>
                    <option value="17" {{ $data->pekerjaan == '17' ? 'selected' : '' }}>Pengacara / Notaris</option>
                    <option value="18" {{ $data->pekerjaan == '18' ? 'selected' : '' }}>Akuntan / Konsultan
                      Keuangan</option>
                    <option value="19" {{ $data->pekerjaan == '19' ? 'selected' : '' }}>
                      Pedagang / Penjual</option>
                    <option value="20" {{ $data->pekerjaan == '20' ? 'selected' : '' }}>Lainnya</option>
                  </select>
                </div>

                <div class="card-action">
                  <input type="hidden" name="id" value="{{ $data->id }}">
                  <button class="btn btn-success btn-sm" type="submit">Simpan</button>
                  <a href="{{ route('keluarga.index') }}" class="btn btn-warning btn-sm">Kembali</a>
                </div>
              </div>

            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
