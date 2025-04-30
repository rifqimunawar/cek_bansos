@extends('ronda::layouts.master')
@php
  use App\Helpers\Fungsi;
@endphp
@section('module-content')
  <div class="panel panel-inverse">
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
    <div>
      <div class="row mt-3">
        <div class="col-lg">
          <div id="calendar" class="calendar" data-base-url="{{ App\Helpers\GetSettings::getBaseUrl() }}"
            style="margin: 10px"></div>
        </div>
      </div>
    </div>
  </div>
  <div class="card" style="width: 100%;">
    <div class="card-body">
      <h5 class="card-title">
        Jadwal Ronda Hari Ini: {{ $ronda_hari_ini->first()->tanggal_ronda ?? 'Tidak Ada' }}
      </h5>

      @forelse ($ronda_hari_ini as $ronda)
        @foreach ($ronda->wargas as $item)
          <li>{{ $item->nama }}</li>
        @endforeach
      @empty
        <li>Tidak ada jadwal ronda hari ini</li>
      @endforelse
    </div>
  </div>
@endsection
