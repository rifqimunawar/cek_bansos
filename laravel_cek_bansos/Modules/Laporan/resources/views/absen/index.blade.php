@extends('laporan::layouts.master')
@php
  use App\Helpers\Fungsi;
  use App\Helpers\GetSettings;
  $getBaseUrl = App\Helpers\GetSettings::getBaseUrl();
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
      <div style="display: flex; gap: 10px;">
      </div>

      <!-- END panel-heading -->
      <!-- BEGIN panel-body -->
      <div class="panel-body table-responsive">
        <table id="dt_table_absen" width="100%" class="table table-striped table-bordered align-middle text-nowrap">
          <thead>
            <tr>
              <th>#</th>
              <th>Nama</th>
              <th>Kontak</th>
              <th>Hari/Tgl</th>
              <th>Jam</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($data as $index => $item)
              <tr>
                <td>{{ $index + $data->firstItem() }}</td>
                <td>{{ $item->warga->nama }}</td>
                <td>{{ $item->warga->telp }}</td>
                <td>{{ Fungsi::format_tgl($item->waktu_absen) }}</td>
                <td>{{ \Carbon\Carbon::parse($item->waktu_absen)->format('H:i') }} WIB</td>
                <td class="text-center">
                  <a href="https://www.google.com/maps?q={{ $item->latitude }},{{ $item->longitude }}" target="_blank"
                    class="btn btn-warning btn-sm">
                    <i class="bi bi-geo-alt"></i>
                  </a>
                  <a href="#" class="btn btn-info btn-sm view-image" data-id="{{ $item->id }}"
                    data-bs-toggle="modal" data-bs-target="#modalGambar">
                    <i class="bi bi-images"></i>
                  </a>

                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
        {{ $data->links() }}

      </div>
    </div>

    {{-- modal --}}
    <div class="modal fade" id="modalGambar" tabindex="-1" aria-labelledby="modalGambarLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="modalGambarLabel">Gambar Absen</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body d-flex justify-content-center align-items-center text-center">
            <img src="" id="image" class="img-fluid" alt="Gambar tidak tersedia">
          </div>

          <div class="modal-footer">
          </div>
        </div>
      </div>
    </div>
    <script>
      $(document).ready(function() {
        $('.view-image').on('click', function() {
          var id = $(this).data('id'); // Ambil ID dari tombol

          $.ajax({
            url: "{{ route('laporan.view', '') }}/" + id,
            type: "GET",
            success: function(response) {
              $('#image').attr('src', response.image); // Set gambar di modal
            },
            error: function() {
              alert("Gagal mengambil data!");
            }
          });
        });
      });
    </script>
  @endsection
