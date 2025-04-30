@extends('tagihan::layouts.master')
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
        {{-- <a href="{{ route('umum.export') }}" class="btn btn-warning btn-sm">
          <i class="fa fa-file-excel" style="font-size: 12px"></i> Export XLS
        </a> --}}

        {{-- <a href="javascript:void(0)" class="btn btn-warning btn-sm"
                onclick="printPage('{{ route('role.print') }}', )">
                <i class="fa fa-print" aria-hidden="true"></i> Print
            </a>

            <a href="{{ route('role.print') }}" class="btn btn-danger btn-sm">
                <i class="fa fa-print" style="font-size: 12px"></i> Print
            </a> --}}

        {{-- <a href="{{ route('umum.pdf') }}" class="btn btn-warning btn-sm">
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
            <th class="text-nowrap">Nama</th>
            <th class="text-nowrap">Tgl Tidak Ronda</th>
            <th class="text-nowrap">Denda</th>
            <th class="text-nowrap">Status</th>
            <th class="text-nowrap"></th>
          </tr>
        </thead>
        <tbody>
          @foreach ($data as $item)
            <tr class="odd gradeX">
              <td width="1%" class="fw-bold">{{ $loop->iteration }}</td>
              <td>{{ $item->warga->nama }}</td>
              <td>{{ Fungsi::format_tgl($item->tgl_absen_ronda) }}</td>
              <td>{{ Fungsi::rupiah($item->nominal_tagihan) }}</td>
              <td>
                @if ($item->status_denda == 0)
                  <span style="color: red;">Belum lunas</span>
                @elseif ($item->status_denda == 1)
                  <span style="color: blue;">Sudah lunas</span>
                @else
                  <span>Status tidak diketahui</span>
                @endif
              </td>
              <td>
                <a href="{{ route('tagihan_ronda.destroy', $item->id) }}" data-confirm-delete="true">
                  <i class="fa fa-trash mx-2" style="font-size: 14px"></i>
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
@endsection
