@extends('simpansurat::layouts.master')

@section('module-content')
  <div class="row">
    {{-- Kolom Kiri --}}
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          <h6 class="card-title mb-0">Informasi Surat</h6>
        </div>
        <div class="card-body">
          <form action="{{ route('s_masuk.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group mb-2">
              <label for="nama_surat">Nama Surat</label>
              <input type="text" class="form-control" required name="nama_surat" id="nama_surat"
                placeholder="Nama Surat" value="{{ old('nama_surat') }}" />
            </div>

            <div class="form-group mb-2">
              <label for="nomor_surat">Nomor Surat</label>
              <input type="text" class="form-control" required name="nomor_surat" id="nomor_surat"
                placeholder="Nomor Surat" value="{{ old('nomor_surat') }}" />
            </div>

            <div class="form-group mb-2">
              <label for="tanggal_diterima">Tanggal Diterima</label>
              <input type="date" class="form-control" required name="tanggal_diterima" id="tanggal_diterima"
                value="{{ old('tanggal_diterima') }}" />
            </div>

            <div class="form-group mb-2">
              <label for="pengirim">Pengirim</label>
              <input type="text" class="form-control" required name="pengirim" id="pengirim"
                placeholder="Instansi Pengirim" value="{{ old('pengirim') }}" />
            </div>

            <div class="form-group mb-2">
              <label for="perihal">Perihal</label>
              <input type="text" class="form-control" required name="perihal" id="perihal" placeholder="Perihal"
                value="{{ old('perihal') }}" />
            </div>

            <div class="form-group mb-2">
              <label for="klasifikasi_surat_id">Klasifikasi</label>
              <select class="form-control" required name="klasifikasi_surat_id" id="klasifikasi_surat_id">
                <option value="">-- Pilih Klasifikasi --</option>
                @foreach ($data as $item)
                  <option value="{{ $item->id }}">{{ $item->kode }} - {{ $item->nama }}</option>
                @endforeach
              </select>
            </div>
        </div>
      </div>
    </div>

    {{-- Kolom Kanan --}}
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          <h6 class="card-title mb-0">Lampiran</h6>
        </div>
        <div class="card-body">

          <div class="form-group mb-2">
            <label for="lampiran_1">Lampiran 1</label>
            <input type="file" class="form-control" required name="lampiran_1" id="lampiran_1" />
          </div>

          @for ($i = 2; $i <= 5; $i++)
            <div class="form-group mb-2" id="lampiran_{{ $i }}_wrapper" style="display: none;">
              <label for="lampiran_{{ $i }}">Lampiran {{ $i }}</label>
              <input type="file" class="form-control" name="lampiran_{{ $i }}"
                id="lampiran_{{ $i }}" />
            </div>
          @endfor

          <div class="form-group mb-2 d-flex justify-content-center gap-2">
            <button class="btn btn-info btn-sm btn-tambah-lampiran" type="button">
              Tambah Lampiran <i class="bi bi-plus-square" style="font-size: 14px"></i>
            </button>
          </div>

          <div class="form-group mb-2 d-flex justify-content-center gap-2">
            @if ($errors->any())
              <div class="alert alert-danger">
                <ul class="mb-0">
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif
          </div>


          <div class="card-action d-flex justify-content-center gap-2">
            <a href="{{ route('s_masuk.index') }}" class="btn btn-warning btn-sm">Kembali</a>
            <button class="btn btn-success btn-sm" type="submit">Simpan</button>
          </div>

          </form>
        </div>
      </div>
    </div>
  </div>
  <script>
    $(document).ready(function() {
      let currentLampiran = 1;
      const maxLampiran = 5;

      $('.btn-tambah-lampiran').on('click', function(e) {
        e.preventDefault();
        currentLampiran++;

        if (currentLampiran <= maxLampiran) {
          $(`#lampiran_${currentLampiran}_wrapper`).show();
        }

        if (currentLampiran === maxLampiran) {
          $(this).prop('disabled', true).text('Maksimal Lampiran 5');
        }
      });
    });
  </script>
@endsection
