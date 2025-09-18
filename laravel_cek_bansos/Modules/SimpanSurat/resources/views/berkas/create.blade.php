@extends('simpansurat::layouts.master')

@section('module-content')
  <div class="row">
    {{-- Kolom Kiri --}}
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          <h6 class="card-title mb-0">Informasi Berkas</h6>
        </div>
        <div class="card-body">
          <form action="{{ route('berkas.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group mb-2">
              <label for="nama_berkas">Nama Berkas</label>
              <input type="text" class="form-control" required name="nama_berkas" id="nama_berkas"
                placeholder="Nama Berkas" value="{{ old('nama_berkas') }}" />
            </div>

            <div class="form-group mb-2">
              <label for="kode_berkas">Kode Berkas</label>
              <input type="text" class="form-control" required name="kode_berkas" id="kode_berkas"
                placeholder="Kode Berkas" value="{{ old('kode_berkas') }}" />
            </div>

            <div class="form-group mb-2">
              <label for="tanggal_upload">Tanggal</label>
              <input type="date" class="form-control" required name="tanggal_upload" id="tanggal_upload"
                value="{{ old('tanggal_upload') }}" />
            </div>

            <div class="form-group mb-2">
              <label for="deksripsi">Deskripsi</label>
              <textarea name="deskripsi" id="deskripsi" cols="30" rows="5" class="form-control">{{ old('deskripsi') }}</textarea>
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
            <a href="{{ route('berkas.index') }}" class="btn btn-warning btn-sm">Kembali</a>
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
