@extends('ronda::layouts.master')
@php
  use App\Helpers\Fungsi;
@endphp
@section('module-content')
  @foreach ($jadwal as $tanggal => $list)
    <h5>{{ Fungsi::format_tgl($tanggal) }}</h5>
    <ul>
      @foreach ($list as $warga)
        <li>{{ $warga->nama }}</li>
      @endforeach
    </ul>
  @endforeach
  <form method="POST" action="{{ route('jadwalkan.generate.final') }}">
    @csrf
    <input type="hidden" name="data_jadwal" value="{{ base64_encode(serialize($jadwal)) }}">
    <button type="submit" onclick="showLoading()" class="btn btn-success btn-sm">Simpan Jadwal Ini</button>
    <a href="{{ route('jadwalkan.create') }}" class="btn btn-warning btn-sm">Kembali</a>
  </form>

  <!-- Loading Overlay -->
  <div id="loadingOverlay" style="display: none;">
    <div class="loading-content">
      <div class="spinner"></div>
      <p>Menyimpan jadwal... Mohon tunggu</p>
    </div>
  </div>
@endsection
<script>
  function showLoading() {
    document.getElementById("loadingOverlay").style.display = "flex";
  }
</script>
