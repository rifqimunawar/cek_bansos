@extends('dashboard::layouts.master')
@php
  use App\Helpers\Fungsi;
@endphp
@section('content')
  <!-- BEGIN row -->
  <div class="row">
    <!-- BEGIN col-3 -->
    <div class="col-xl-3 col-md-6">
      <div class="widget widget-stats bg-blue">
        <div class="stats-icon"><i class="fa fa-desktop"></i></div>
        <div class="stats-info">
          <h4>TOTAL DATA WARGA</h4>
          <p> {{ $data_warga ?? 0 }} </p>
        </div>
        <div class="stats-link">
          <a href="javascript:;"><i class="fa fa-arrow-alt-circle-right"></i></a>
        </div>
      </div>
    </div>
    <!-- END col-3 -->
    <!-- BEGIN col-3 -->
    <div class="col-xl-3 col-md-6">
      <div class="widget widget-stats bg-info">
        <div class="stats-icon"><i class="fa fa-link"></i></div>
        <div class="stats-info">
          <h4>TOTAL WARGA PRIA</h4>
          <p> {{ $data_pria ?? 0 }} </p>
        </div>
        <div class="stats-link">
          <a href="javascript:;"> <i class="fa fa-arrow-alt-circle-right"></i></a>
        </div>
      </div>
    </div>
    <!-- END col-3 -->
    <!-- BEGIN col-3 -->
    <div class="col-xl-3 col-md-6">
      <div class="widget widget-stats bg-orange">
        <div class="stats-icon"><i class="fa fa-users"></i></div>
        <div class="stats-info">
          <h4>TOTAL WARGA PEREMPUAN</h4>
          <p> {{ $data_wanita ?? 0 }} </p>
        </div>
        <div class="stats-link">
          <a href="javascript:;"> <i class="fa fa-arrow-alt-circle-right"></i></a>
        </div>
      </div>
    </div>
    <!-- END col-3 -->
    <!-- BEGIN col-3 -->
    <div class="col-xl-3 col-md-6">
      <div class="widget widget-stats bg-red">
        <div class="stats-icon"><i class="fa fa-clock"></i></div>
        <div class="stats-info">
          <h4>TOTAL PENERIMA BANTUAN</h4>
          <p> {{ $data_penerima ?? 0 }}</p>
        </div>
        <div class="stats-link">
          <a href="javascript:;"> <i class="fa fa-arrow-alt-circle-right"></i></a>
        </div>
      </div>
    </div>
    <!-- END col-3 -->
  </div>
  <!-- END row -->

  <!-- BEGIN row -->
  <div class="row">
    <!-- BEGIN col-8 -->
    <div class="col-xl-12">
      <!-- BEGIN panel -->
      <div class="panel panel-inverse" data-sortable-id="index-1">
        <div class="panel-heading">
          <h4 class="panel-title">Grafik Perbandingan </h4>
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
        <div class="panel-body pe-1">
          <div id="interactive-chart" class="h-300px"></div>

        </div>
        <div class="m-3">
          <span style="font-style: italic, margin-top:25px;"></span>
        </div>
      </div>
      <!-- END panel -->
    </div>
  </div>
@endsection
<script>
  var handleInteractiveChart = function() {
    "use strict";
    $('#interactive-chart').empty();

    function showTooltip(x, y, contents) {
      $('<div id="tooltip" class="flot-tooltip">' + contents + '</div>').css({
        top: y - 45,
        left: x - 55
      }).appendTo("body").fadeIn(200);
    }

    if ($('#interactive-chart').length !== 0) {

      var data1 = @json($grafik_data_warga); // grafik biru = total warga
      var data2 = @json($grafik_data_penerima); // grafik kuning = penerima bansos
      var xLabel = @json($xLabel); // contoh: [[1,"Sep 2025"], [2,"Okt 2025"]]

      console.log("data1:", @json($grafik_data_warga));
      console.log("xLabel:", @json($xLabel));



      $.plot($("#interactive-chart"), [{
          data: data1,
          label: "Total Warga",
          color: app.color.blue,
          lines: {
            show: true,
            fill: false,
            lineWidth: 2
          },
          points: {
            show: true,
            radius: 3,
            fillColor: app.color.componentBg
          },
          shadowSize: 0
        },
        {
          data: data2,
          label: "Penerima Bansos",
          color: app.color.yellow,
          lines: {
            show: true,
            fill: false,
            lineWidth: 2
          },
          points: {
            show: true,
            radius: 3,
            fillColor: app.color.componentBg
          },
          shadowSize: 0
        }
      ], {
        xaxis: {
          ticks: xLabel,
          mode: "categories",
          tickDecimals: 0,
          tickColor: 'rgba(' + app.color.darkRgb + ', .2)'
        },
        yaxis: {
          min: 0,
          tickColor: 'rgba(' + app.color.darkRgb + ', .2)'
        },
        grid: {
          hoverable: true,
          clickable: true,
          borderWidth: 1,
          borderColor: 'rgba(' + app.color.darkRgb + ', .2)'
        },
        legend: {
          show: true,
          margin: 10,
          noColumns: 1
        }
      });

      // Tooltip
      var previousPoint = null;
      $("#interactive-chart").bind("plothover", function(event, pos, item) {
        if (item) {
          if (previousPoint !== item.dataIndex) {
            previousPoint = item.dataIndex;
            $("#tooltip").remove();

            var y = item.datapoint[1];
            var label = item.series.label;
            var monthLabel = xLabel[item.dataIndex][1]; // ambil label bulan dari xLabel

            var content = label + " (" + monthLabel + "): " + y;
            showTooltip(item.pageX, item.pageY, content);
          }
        } else {
          $("#tooltip").remove();
          previousPoint = null;
        }
      });
    }
  };
</script>
