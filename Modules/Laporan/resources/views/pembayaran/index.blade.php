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
      {{-- <a href="{{ route('umum.create') }}" class="btn btn-primary btn-sm">Tambah &ensp;<i class="fa fa-plus-square"
          aria-hidden="true" style="font-size: 12px"></i></a> --}}
      <div style="display: flex; gap: 10px;">

        <div class="form-group row">
          <div class="col-lg-12">
            <div id="advance-daterange" class="btn btn-primary btn-sm d-flex text-start align-items-center">
              <span class="flex-1" id="selected-date">&emsp;</span>
              <i class="fa fa-caret-down" style="margin-left: 5px"></i>
            </div>
          </div>
          {{-- <input type="text" id="start-date" name="start_date">
          <input type="text" id="end-date" name="end_date"> --}}

          <input type="hidden" id="start-date" name="start_date">
          <input type="hidden" id="end-date" name="end_date">
        </div>
      </div>

      <div style="display: flex; gap: 10px;">
        <a href="{{ route('lap_pembayaran.export') }}" class="btn btn-warning btn-sm">
          <i class="fa fa-file-excel" style="font-size: 12px"></i> Export XLS
        </a>

        {{-- <a href="javascript:void(0)" class="btn btn-warning btn-sm"
                onclick="printPage('{{ route('role.print') }}', )">
                <i class="fa fa-print" aria-hidden="true"></i> Print
            </a>

            <a href="{{ route('role.print') }}" class="btn btn-danger btn-sm">
                <i class="fa fa-print" style="font-size: 12px"></i> Print
            </a> --}}

        <a href="{{ route('lap_pembayaran.pdf') }}" class="btn btn-warning btn-sm">
          <i class="fa fa-file-pdf" style="font-size: 12px"></i> Export PDF
        </a>
      </div>
    </div>

    <!-- END panel-heading -->
    <!-- BEGIN panel-body -->
    <div class="panel-body table-responsive">
      <table id="dt_table_pembayaran" width="100%" class="table table-striped table-bordered align-middle text-nowrap">
        <thead>
          <tr>
            <th>#</th>
            <th>Nama</th>
            <th>Kontak</th>
            <th>Tanggal Pembayaran</th>
            <th>Nominal</th>
            <th>Jenis Pembayaran</th>
            <th>Keterangan</th>
          </tr>
        </thead>
      </table>
    </div>
  </div>

  <input type="hidden" id="baseUrl" value="{{ $getBaseUrl }}">

  <script>
    $(document).ready(function() {
      let baseUrl = document.getElementById("baseUrl").value;
      let table = $('#dt_table_pembayaran').DataTable({
        processing: true,
        serverSide: false,
        responsive: true,
        destroy: true,
        ajax: {
          url: baseUrl + 'lap/get_data_pembayaran/',
          type: 'GET',
          data: function(d) {
            d.start_date = $('#start-date').val();
            d.end_date = $('#end-date').val();
            console.log("🚀 Data dikirim ke server:", d);
          }
        },
        columns: [{
            data: 'number',
            title: '#'
          },
          {
            data: 'nama_warga',
            title: 'Nama'
          },
          {
            data: 'telp_warga',
            title: 'Kontak'
          },
          {
            data: 'created_at',
            title: 'Tanggal Pembayaran',
            render: function(data) {
              return new Date(data).toLocaleDateString('id-ID', {
                day: '2-digit',
                month: '2-digit',
                year: 'numeric'
              });
            }
          },
          {
            data: 'nominal_dibayar',
            title: 'Nominal',
            render: $.fn.dataTable.render.number(',', '.', 0, 'Rp ')
          },
          {
            data: 'tagihan_nama',
            title: 'Jenis Pembayaran',
            defaultContent: '-'
          },
          {
            data: 'keterangan',
            title: 'Keterangan',
            defaultContent: '-'
          }
        ]
      });

      // 🎯 Gunakan MutationObserver untuk deteksi perubahan value pada input hidden
      let observer = new MutationObserver(() => {
        let startDate = $('#start-date').val();
        let endDate = $('#end-date').val();

        console.log("🎯 Tanggal berubah!");
        console.log("📅 Start Date:", startDate);
        console.log("📅 End Date:", endDate);

        // Hanya reload jika start_date & end_date sudah terisi
        if (startDate && endDate) {
          table.ajax.reload(null, false); // 🔄 Reload data tanpa reset halaman
        }
      });

      let config = {
        attributes: true,
        attributeFilter: ["value"]
      };
      observer.observe(document.getElementById("start-date"), config);
      observer.observe(document.getElementById("end-date"), config);

      // 🏆 Date Range Picker untuk pilih tanggal
      $('#advance-daterange').daterangepicker({
        locale: {
          format: 'YYYY-MM-DD'
        }
      }, function(start, end) {
        console.log("📌 Date Range Picker diubah!");
        console.log("📅 Start Date:", start.format('YYYY-MM-DD'));
        console.log("📅 End Date:", end.format('YYYY-MM-DD'));

        $('#selected-date').text(start.format('DD/MM/YYYY') + ' - ' + end.format('DD/MM/YYYY'));
        $('#start-date').val(start.format('YYYY-MM-DD'));
        $('#end-date').val(end.format('YYYY-MM-DD'));
      });
    });
  </script>
@endsection
