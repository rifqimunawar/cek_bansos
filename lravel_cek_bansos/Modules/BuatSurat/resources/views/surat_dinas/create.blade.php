@extends('buatsurat::layouts.master')

@section('module-content')
  <div class="row">
    {{-- Kolom Kiri --}}
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          <h6 class="card-title mb-0">Informasi Surat</h6>
        </div>
        <div class="card-body">
          <form action="{{ route('surat_dinas.store') }}" method="POST" target="_blank" enctype="multipart/form-data">
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
              <label for="tanggal_surat">Tanggal</label>
              <input type="date" class="form-control" required name="tanggal_surat" id="tanggal_surat"
                value="{{ old('tanggal_surat') }}" />
            </div>

            <div class="form-group mb-2">
              <label for="tujuan">Tujuan</label>
              <input type="text" class="form-control" required name="tujuan" id="tujuan" placeholder="tujuan"
                value="{{ old('tujuan') }}" />
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

            <div class="form-group mb-2">
              <label for="penandatangan_id">Penandatangan</label>
              <select class="form-control" required name="penandatangan_id" id="penandatangan_id">
                <option value="">-- Pilih Pendandatangan --</option>
                @foreach ($data_penandatangan as $item)
                  <option value="{{ $item->id }}">{{ $item->kode }} - {{ $item->nama }} ( {{ $item->jabatan }}
                    )</option>
                @endforeach
              </select>
            </div>
            <div class="form-check form-switch">
              <input class="form-check-input" type="checkbox" role="switch" name="is_basah" id="is_basah">
              <label class="form-check-label" for="is_basah">Tanda Tangan Otomatis</label>
            </div>
        </div>
      </div>
    </div>

    {{-- Kolom Kanan --}}
    <div class="col-md-6">
      <div class="card">



        <div class="panel panel-inverse">
          <div class="panel-heading">
            <h4 class="panel-title">Isi Surat</h4>
            <div class="panel-heading-btn">
              <a href="javascript:;" class="btn btn-xs btn-icon btn-default" data-toggle="panel-expand"><i
                  class="fa fa-expand"></i></a>
              <a href="javascript:;" class="btn btn-xs btn-icon btn-success" data-toggle="panel-reload"><i
                  class="fa fa-redo"></i></a>
              <a href="javascript:;" class="btn btn-xs btn-icon btn-warning" data-toggle="panel-collapse"><i
                  class="fa fa-minus"></i></a>
              <a href="javascript:;" class="btn btn-xs btn-icon btn-danger" data-toggle="panel-remove"><i
                  class="fa fa-times"></i></a>
            </div>
          </div>
          <div class="panel-body panel-body p-0">
            <textarea class="summernote" name="isi_surat"></textarea>
          </div>
          <!-- BEGIN hljs-wrapper -->
          <div class="hljs-wrapper">
            <pre><code class="html" data-url="../assets/data/form-summernote/code-1.json"></code></pre>
          </div>
          <!-- END hljs-wrapper -->
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


        <div class="card-action d-flex justify-content-center gap-2 mb-4">
          <a href="{{ route('surat_dinas.index') }}" class="btn btn-warning btn-sm">Kembali</a>
          <button type="submit" name="action" value="preview" class="btn btn-secondary">Preview</button>
          <button type="submit" name="action" value="submit" class="btn btn-success">Simpan</button>
        </div>

        </form>
      </div>
    </div>
  </div>

  @push('scripts')
    <script src="{{ asset('assets/plugins/summernote/dist/rifqi_summernote-lite.min.js') }}"></script>
    <script src="{{ asset('assets/js/demo/form-summernote.rifqi.js') }}"></script>
    <script src="{{ asset('assets/plugins/@highlightjs/cdn-assets/highlight.min.js') }}"></script>
    <script src="{{ asset('assets/js/demo/render.highlight.js') }}"></script>
  @endpush

@endsection
