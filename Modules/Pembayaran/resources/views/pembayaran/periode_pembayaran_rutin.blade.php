@extends('pembayaran::layouts.master')
@php
  use App\Helpers\Fungsi;
@endphp
@section('module-content')
  <!-- BEGIN panel -->
  <div class="row">
    <!-- BEGIN col-3 -->
    @foreach ($data->periodes->unique('id') as $item)
    <div class="col-xl-3 col-md-6">
      <div class="widget widget-stats bg-danger">
        <div class="stats-icon"><i class="fa fa-desktop"></i></div>
        <div class="stats-info">
          <h4>{{ Fungsi::format_tgl($item->tanggal_mulai) }} <br> {{ Fungsi::format_tgl($item->tanggal_akhir) }}</h4>
          <p>{{ $item->nama_periode }}</p>
        </div>
        <div class="stats-link">
          <a href="/pembayaran/{{ $warga_id }}/{{ $item->id }}">View Detail <i class="fa fa-arrow-alt-circle-right"></i></a>
        </div>
      </div>
    </div>
  @endforeach


  </div>
  <!-- END panel -->
@endsection
