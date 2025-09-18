@extends('master::layouts.master')

@section('module-content')
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="card-title">Form Elements</div>
        </div>
        <div class="card-body">
          <form action="{{ route('warga.store') }}" method="post" enctype="multipart/form-data">
            <div class="row">
              @csrf
              <div class="col-md-6 col-lg-6">
                <div class="form-group mb-2">
                  <label for="nama">Nama</label>
                  <input type="text" class="form-control" required name="nama" id="nama" placeholder="Nama" />
                </div>
                <div class="form-group mb-2">
                  <label for="nik">NIK</label>
                  <input type="text" class="form-control" name="nik" required id="nik" placeholder="NIK"
                    oninput="numberInput(this)" />
                </div>
                <div class="form-group mb-2">
                  <label for="alamat">Alamat / Blok</label>
                  <textarea class="form-control" name="alamat" required id="alamat" placeholder="Alamat/Blok"></textarea>
                </div>

                <div class="form-group mb-2">
                  <label for="status_perkawinan">Status Perkawinan</label>
                  <select class="form-select" name="status_perkawinan" aria-label="Default select example">
                    <option disabled selected> - pilih - </option>
                    <option value="1">Belum Menikah</option>
                    <option value="2">Menikah</option>
                    <option value="3">Cerai Hidup</option>
                    <option value="4">Cerai Mati</option>
                  </select>
                </div>
                <div class="form-group mb-2">
                  <label for="status_keluarga">Status Dalam Keluarga</label>
                  <select class="form-select" name="status_keluarga" aria-label="Default select example">
                    <option disabled selected> - pilih - </option>
                    <option value="1">Kepala Keluarga</option>
                    <option value="2">Suami</option>
                    <option value="3">Istri</option>
                    <option value="4">Anak</option>
                  </select>
                </div>

                <div class="form-group mb-2">
                  <label for="telp">Telpon WhatsApp</label>
                  <input type="text" class="form-control" required name="telp" id="telp" placeholder="085xxx"
                    oninput="numberInput(this)" />
                </div>

              </div>
              <div class="col-md-6 col-lg-6">
                <div class="form-group mb-2">
                  <label for="jk">Jenis Kelamin</label>
                  <select class="form-select" name="jk" aria-label="Default select example">
                    <option disabled selected> - pilih - </option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                  </select>
                </div>
                <div class="form-group mb-2">
                  <label for="kota_kelahiran">Kota Kelahiran</label>
                  <input type="text" class="form-control" name="kota_kelahiran" required id="kota_kelahiran"
                    placeholder="Kota kelahiran" />
                </div>
                <div class="form-group mb-2">
                  <label for="tgl_lahir">Tanggal Lahir</label>
                  <input type="date" class="form-control" required name="tgl_lahir" id="tgl_lahir"
                    placeholder="085xxx" />
                </div>
                <div class="form-group mb-2">
                  <label for="agama">Agama</label>
                  <select class="form-select" name="agama" aria-label="Default select example">
                    <option disabled selected> - pilih - </option>
                    <option value="1">Islam</option>
                    <option value="2">Kristen</option>
                    <option value="3">Hindu</option>
                    <option value="4">Budha</option>
                  </select>
                </div>
                <div class="form-group mb-2">
                  <label for="pendidikan">Pendidikan</label>
                  <select class="form-select" name="pendidikan" aria-label="Default select example">
                    <option disabled selected> - pilih - </option>
                    <option value="1">SD/Sederajat</option>
                    <option value="2">SMP/Sederajat</option>
                    <option value="3">SMA/Sederajat</option>
                    <option value="4">D3/Sederajat</option>
                    <option value="5">S1/Sederajat</option>
                    <option value="6">S2/Sederajat</option>
                    <option value="7">S3/Sederajat</option>
                  </select>
                </div>
                <div class="form-group mb-2">
                  <label for="pekerjaan">Pekerjaan</label>
                  <select class="form-select" name="pekerjaan" aria-label="Default select example">
                    <option disabled selected> - pilih - </option>
                    <option value="1">Pegawai Negeri Sipil (PNS)</option>
                    <option value="2">Karyawan Swasta</option>
                    <option value="3">Wiraswasta / Pengusaha</option>
                    <option value="4">Petani</option>
                    <option value="5">Nelayan</option>
                    <option value="6">Buruh / Pekerja Lepas</option>
                    <option value="7">Guru / Dosen</option>
                    <option value="8">Dokter / Tenaga Medis</option>
                    <option value="9">TNI / Polri</option>
                    <option value="10">Ojek Online / Sopir</option>
                    <option value="11">Ibu Rumah Tangga</option>
                    <option value="12">Mahasiswa / Pelajar</option>
                    <option value="13">Pensiunan</option>
                    <option value="14">Teknisi / Mekanik</option>
                    <option value="15">Seniman / Pekerja Kreatif</option>
                    <option value="16">Programmer / IT Specialist</option>
                    <option value="17">Pengacara / Notaris</option>
                    <option value="18">Akuntan / Konsultan Keuangan</option>
                    <option value="19">Pedagang / Penjual</option>
                    <option value="20">Lainnya</option>
                  </select>
                </div>

                <div class="form-group mb-2">
                  <label for="pendapatan">Nominal Pendapatan</label>
                  <input type="text" class="form-control" name="pendapatan" required id="nominalPendapatan"
                    placeholder="pendapatan" />
                </div>

                <div class="card-action">
                  <input type="hidden" name="id">
                  <button class="btn btn-success btn-sm" type="submit">Simpan</button>
                  <a href="{{ route('warga.index') }}" class="btn btn-warning btn-sm">Kembali</a>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script>
    function numberInput(input) {
      input.value = input.value.replace(/[^0-9]/g, '');
    }

    const inputNominal = document.getElementById('nominalPendapatan');
    inputNominal.addEventListener('input', function(e) {
      let value = this.value.replace(/[^0-9]/g, '');
      if (value) {
        this.value = formatRupiah(value);
      } else {
        this.value = '';
      }
    });

    inputNominal.form.addEventListener('submit', function() {
      let value = inputNominal.value.replace(/[^0-9]/g, '');
      inputNominal.value = value;
    });

    function formatRupiah(angka) {
      return 'Rp. ' + angka.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    }
  </script>
@endsection
