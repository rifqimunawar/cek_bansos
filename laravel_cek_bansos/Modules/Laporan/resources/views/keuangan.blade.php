@extends('keuangan::layouts.master')
@php
  use App\Helpers\Fungsi;
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
      {{-- <a href="{{ route('umum.create') }}" class="btn btn-primary btn-sm">Tambah &ensp;<i class="fa fa-plus-square"
          aria-hidden="true" style="font-size: 12px"></i></a> --}}
      <div style="display: flex; gap: 10px;">
        <a href="{{ route('umum.export') }}" class="btn btn-warning btn-sm">
          <i class="fa fa-file-excel" style="font-size: 12px"></i> Export XLS
        </a>

        {{-- <a href="javascript:void(0)" class="btn btn-warning btn-sm"
                onclick="printPage('{{ route('role.print') }}', )">
                <i class="fa fa-print" aria-hidden="true"></i> Print
            </a>

            <a href="{{ route('role.print') }}" class="btn btn-danger btn-sm">
                <i class="fa fa-print" style="font-size: 12px"></i> Print
            </a> --}}

        <a href="{{ route('umum.pdf') }}" class="btn btn-warning btn-sm">
          <i class="fa fa-file-pdf" style="font-size: 12px"></i> Export PDF
        </a>

      </div>
    </div>

    <!-- END panel-heading -->
    <!-- BEGIN panel-body -->
    <div class="panel-body">
      <table id="data-table-default" width="100%" class="table table-striped table-bordered align-middle text-nowrap">
        <thead>
          <tr>
            <th>#</th>
            <th>Nama</th>
            <th>Total Tagihan</th>
            <th>Total Terbayar</th>
            <th>Tagihan Rutin</th>
            <th>Tagihan Pam</th>
            <th>Denda Ronda</th>
            <th></th>
          </tr>
        </thead>
        <tbody>

          @foreach ($data as $item)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $item['nama_warga'] }}</td>
              <td>{{ $item['total_tagihan'] }}</td>
              <td>{{ $item['nominal_terbayar'] }}</td>
              <td>{{ $item['tagihan_umum'] }}</td>
              <td>{{ $item['tagihan_pam'] }}</td>
              <td>{{ $item['nominal_denda_ronda'] }}</td>
              <td>
                <a href="#modal-dialog" data-bs-toggle="modal" data-id="{{ $item['warga_id'] }}"
                  class="btn btn-sm btn-success w-100px open-modal"
                  style="font-size: 12px; text-decoration: none; border: solid 1px; border-radius: 3px;">
                  <i class="fas fa-xs fa-fw me-10px fa-eye"></i>Lihat
                </a>
              </td>
            </tr>
          @endforeach

        </tbody>
      </table>
    </div>
  </div>

  <!-- #modal-dialog -->
  <div class="modal fade" id="modal-dialog">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Pilih Pembayaran</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
        </div>
        <div class="modal-body">
          <div class="row gap-2 justify-content-center">
            <a id="link-rutin" href="#" class="btn btn-sm btn-success w-250px" style="display: inline">
              <i class="fa-regular fa-clock" style="font-size: 80px; margin: 10px;"></i><br>
              Pembayaran Rutin
            </a>
            <a id="link-pam" href="#" class="btn btn-sm btn-success w-250px">
              <i class="fa-solid fa-shower" style="font-size: 80px ; margin: 10px;"></i><br>
              Pembayaran Pam
            </a>
            <a id="link-denda" href="#" class="btn btn-sm btn-success w-250px">
              <i class="fa-solid fa-person-military-rifle" style="font-size: 80px ; margin: 10px;"></i><br>
              Pembayaran Denda Ronda
            </a>
          </div>
        </div>
        <div class="modal-footer">
          <a href="javascript:;" class="btn btn-white" data-bs-dismiss="modal">Close</a>
        </div>
      </div>
    </div>
  </div>

  <script>
    document.addEventListener("DOMContentLoaded", function() {
      document.querySelectorAll(".open-modal").forEach(function(button) {
        button.addEventListener("click", function() {
          let wargaId = this.getAttribute("data-id"); // Ambil ID dari tombol

          // Update link di dalam modal dengan ID yang sesuai
          document.getElementById("link-rutin").href = "/pembayaran/" + wargaId + "/periode";
          document.getElementById("link-pam").href = "/pembayaran/" + wargaId;
          document.getElementById("link-denda").href = "/pembayaran_denda/" + wargaId;
        });
      });
    });
  </script>
@endsection
