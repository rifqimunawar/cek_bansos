@extends('simpansurat::layouts.master')
@php
  use App\Helpers\Fungsi;
  use App\Helpers\GetSettings;
@endphp
@section('module-content')
  <!-- BEGIN panel -->
  <div class="panel panel-inverse">
    <!-- BEGIN panel-heading -->
    <div class="panel-heading">
      <h4 class="panel-title">{{ $title }}</h4>
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
    <div
      style="display: flex; justify-content: space-between; align-items: center; margin-right: 15px;margin-top:10px;margin-left:15px">
      <a href="{{ route('s_keluar.create') }}" class="btn btn-primary btn-sm">Tambah &ensp;<i class="fa fa-plus-square"
          aria-hidden="true" style="font-size: 12px"></i></a>
      <div style="display: flex; gap: 10px;">
        {{-- <a href="{{ route('s_keluar.export') }}" class="btn btn-warning btn-sm">
          <i class="fa fa-file-excel" style="font-size: 12px"></i> Export XLS
        </a> --}}

        {{-- <a href="javascript:void(0)" class="btn btn-warning btn-sm"
                onclick="printPage('{{ route('role.print') }}', )">
                <i class="fa fa-print" aria-hidden="true"></i> Print
            </a>

            <a href="{{ route('role.print') }}" class="btn btn-danger btn-sm">
                <i class="fa fa-print" style="font-size: 12px"></i> Print
            </a> --}}

        {{-- <a href="{{ route('s_keluar.pdf') }}" class="btn btn-warning btn-sm">
          <i class="fa fa-file-pdf" style="font-size: 12px"></i> Export PDF
        </a> --}}

      </div>
    </div>

    <!-- END panel-heading -->
    <!-- BEGIN panel-body -->
    <div class="panel-body">
      <table id="data-table-default" width="100%" class="table table-striped table-bordered align-middle text-nowrap">
        <thead>
          <tr>
            <th width="1%"></th>
            <th class="text-nowrap">Nama Surat</th>
            <th class="text-nowrap">Nomor Surat</th>
            <th class="text-nowrap">Tanggal</th>
            <th class="text-nowrap">Tujuan</th>
            <th class="text-nowrap">Perihal</th>
            <th class="text-nowrap"></th>
          </tr>
        </thead>
        <tbody>
          {{-- @dd($data) --}}
          @foreach ($data as $item)
            <tr class="odd gradeX">
              <td width="1%" class="fw-bold">{{ $loop->iteration }}</td>
              <td>{{ $item->nama_surat }}</td>
              <td>{{ $item->nomor_surat }}</td>
              <td>{{ Fungsi::format_tgl($item->tanggal_surat) }}</td>
              <td>{{ $item->tujuan }}</td>
              <td>{{ $item->perihal }}</td>
              <td class="d-flex justify-content-center">
                <a href="{{ route('s_keluar.edit', $item->id) }}">
                  <i class="fa fa-pencil-square" style="font-size: 14px; margin-right:5px"></i>
                </a>
                <a href="{{ route('s_keluar.destroy', $item->id) }}" data-confirm-delete="true">
                  <i class="fa fa-trash mx-2" style="font-size: 14px"></i>
                </a>
                <a type="button" class="btn-modal-lampiran" data-bs-toggle="modal" data-bs-target="#lampiranModal"
                  data-id="{{ $item->id }}">
                  <i class="fa fa-eye mx-2" style="font-size: 14px"></i>
                </a>

              </td>
            </tr>
          @endforeach

        </tbody>
      </table>
    </div>
    <!-- END panel-body -->
  </div>
  <!-- END panel -->
  <!-- Modal -->
  <div class="modal fade" id="lampiranModal" tabindex="-1" aria-labelledby="lampiranModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog modal-xl modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="lampiranModalLabel"></h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <iframe id="lampiran_1" src="" width="100%" height="600px" frameborder="0"></iframe>
          <iframe id="lampiran_2" src="" width="100%" height="600px" frameborder="0"></iframe>
          <iframe id="lampiran_3" src="" width="100%" height="600px" frameborder="0"></iframe>
          <iframe id="lampiran_4" src="" width="100%" height="600px" frameborder="0"></iframe>
          <iframe id="lampiran_5" src="" width="100%" height="600px" frameborder="0"></iframe>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <input type="hidden" id="base_url" value="{{ GetSettings::getbaseUrl() }}">
  <script>
    $(document).on('click', '.btn-modal-lampiran', function() {
      var id = $(this).data('id');
      var base_url = document.getElementById('base_url').value;
      var url = base_url + 'simpan/keluar/' + id + '/view';

      // console.log('ID:', id);
      // console.log('Base URL:', base_url);
      // console.log('Request URL:', url);
      $.ajax({
        url: url,
        type: 'GET',
        success: function(response) {
          console.log('response dari server:', response);
          $('#lampiranModal .modal-title').text(response.nama);

          $('#lampiran_1').attr('src', response.lampiran1 || '');
          $('#lampiran_2').attr('src', response.lampiran2 || '');
          $('#lampiran_3').attr('src', response.lampiran3 || '');
          $('#lampiran_4').attr('src', response.lampiran4 || '');
          $('#lampiran_5').attr('src', response.lampiran5 || '');
        },
        error: function(xhr, status, error) {
          console.error('AJAX Error:', xhr.responseText);
          $('#lampiranModal .modal-title').text('Gagal Memuat Lampiran');

          // Kosongkan semua iframe kalau gagal
          for (let i = 1; i <= 5; i++) {
            $('#lampiran_' + i).attr('src', '');
          }
        }
      });

    });
  </script>
@endsection
