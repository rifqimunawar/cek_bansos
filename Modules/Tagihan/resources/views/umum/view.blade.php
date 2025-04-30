@extends('tagihan::layouts.master')

@php
  use App\Helpers\Fungsi;
@endphp

@section('module-content')
  <div class="row">
    <div class="col-md-12 mt-4">
      <div class="card">
        <div class="card-header">
          <div class="card-title">List Data {{ $title }}</div>
        </div>
        <div class="card-body">
          <div class="panel-body">
            <table id="data-table-default" width="100%"
              class="table table-striped table-bordered align-middle text-nowrap">
              <thead>
                <tr>
                  <th width="1%"></th>
                  <th class="text-nowrap">Warga</th>
                  <th class="text-nowrap">Telp</th>
                  <th class="text-nowrap">Tagihan</th>
                  <th class="text-nowrap">Periode</th>
                  <th class="text-nowrap">Nominal</th>
                  <th class="text-nowrap">Status</th>
                </tr>
              </thead>
              <tbody>

                @foreach ($data as $item)
                  <tr class="odd gradeX">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nama ?? 'Tidak Ditemukan' }}</td>
                    <td>{{ $item->telp ?? 'Tidak Ditemukan' }}</td>
                    <td>{{ $item->nama_tagihan ?? 'Tidak Ditemukan' }}</td>
                    <td>{{ $item->nama_periode ?? 'Tidak Ditemukan' }}</td>
                    <td>{{ Fungsi::rupiah($item->nominal) }}</td>
                    <td style="color: red">Belum Lunas</td>
                  </tr>
                @endforeach
              </tbody>

            </table>
          </div>
        </div>

      </div>
    </div>
  </div>
@endsection
<script>
  function numberInput(input) {
    input.value = input.value.replace(/[^0-9]/g, '');
  }


  function setTodayDate() {
    const inputTanggal = document.getElementById('tanggal');
    const today = new Date().toISOString().split('T')[0];
    inputTanggal.value = today;
  }

  window.onload = setTodayDate;
</script>
