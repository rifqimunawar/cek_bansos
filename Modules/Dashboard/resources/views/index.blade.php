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
          <h4>TOTAL KK</h4>
          <p> </p>
        </div>
        <div class="stats-link">
          <a href="javascript:;">&emsp;<i class="fa fa-arrow-alt-circle-right"></i></a>
        </div>
      </div>
    </div>
    <!-- END col-3 -->
    <!-- BEGIN col-3 -->
    <div class="col-xl-3 col-md-6">
      <div class="widget widget-stats bg-info">
        <div class="stats-icon"><i class="fa fa-link"></i></div>
        <div class="stats-info">
          <h4>TOTAL PEMBAYARAN TAGIHAN RUTIN</h4>
          <p></p>
        </div>
        <div class="stats-link">
          <a href="javascript:;">30 Hari Terakhir <i class="fa fa-arrow-alt-circle-right"></i></a>
        </div>
      </div>
    </div>
    <!-- END col-3 -->
    <!-- BEGIN col-3 -->
    <div class="col-xl-3 col-md-6">
      <div class="widget widget-stats bg-orange">
        <div class="stats-icon"><i class="fa fa-users"></i></div>
        <div class="stats-info">
          <h4>TOTAL PEMBAYARAN TAGIHAN PAM</h4>
          <p></p>
        </div>
        <div class="stats-link">
          <a href="javascript:;">30 Hari Terakhir <i class="fa fa-arrow-alt-circle-right"></i></a>
        </div>
      </div>
    </div>
    <!-- END col-3 -->
    <!-- BEGIN col-3 -->
    <div class="col-xl-3 col-md-6">
      <div class="widget widget-stats bg-red">
        <div class="stats-icon"><i class="fa fa-clock"></i></div>
        <div class="stats-info">
          <h4>TOTAL PEMBAYARAN DENDA RONDA</h4>
          <p></p>
        </div>
        <div class="stats-link">
          <a href="javascript:;">30 Hari Terakhir <i class="fa fa-arrow-alt-circle-right"></i></a>
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
          <h4 class="panel-title">30 Hari Terakhir </h4>
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
          <span style="font-style: italic, margin-top:25px;">Baca dari kanan ke kiri</span>
        </div>
      </div>
      <!-- END panel -->
    </div>
  </div>
  {{-- {{ $data['last_30_days'] }} --}}
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



      var data1 = [
        [1, 40],
        [2, 50],
        [3, 60],
        [4, 60],
        [5, 60],
        [6, 65],
        [7, 75],
        [8, 90],
        [9, 100],
        [10, 105],
        [11, 110],
        [12, 110],
        [13, 120],
        [14, 130],
        [15, 135],
        [16, 145],
        [17, 132],
        [18, 123],
        [19, 135],
        [20, 150]
      ];
      var data2 = [
        [1, 10],
        [2, 6],
        [3, 10],
        [4, 12],
        [5, 18],
        [6, 20],
        [7, 25],
        [8, 23],
        [9, 24],
        [10, 25],
        [11, 18],
        [12, 30],
        [13, 25],
        [14, 25],
        [15, 30],
        [16, 27],
        [17, 20],
        [18, 18],
        [19, 31],
        [20, 23]
      ];
      var data3 = [
        [1, 15],
        [2, 5],
        [3, 15],
        [4, 15],
        [5, 20],
        [6, 25],
        [7, 25],
        [8, 25],
        [9, 25],
        [10, 25],
        [11, 20],
        [12, 30],
        [13, 25],
        [14, 25],
        [15, 30],
        [16, 25],
        [17, 20],
        [18, 20],
        [19, 30],
        [20, 25]
      ];
      var xLabel = [
        [1, ''],
        [2, ''],
        [3, 'May 15'],
        [4, ''],
        [5, ''],
        [6, 'May 19'],
        [7, ''],
        [8, ''],
        [9, 'May 22'],
        [10, ''],
        [11, ''],
        [12, 'May 25'],
        [13, ''],
        [14, ''],
        [15, 'May 28'],
        [16, ''],
        [17, ''],
        [18, 'May 31'],
        [19, ''],
        [20, '']
      ];
      $.plot($("#interactive-chart"), [{
        data: data1,
        label: "Rutin",
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
      }, {
        data: data2,
        label: 'Pam Swadaya',
        color: app.color.green,
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
      }, {
        data: data3,
        label: 'Denda Ronda',
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
      }], {
        xaxis: {
          ticks: xLabel,
          tickDecimals: 0,
          tickColor: 'rgba(' + app.color.darkRgb + ', .2)'
        },
        yaxis: {
          ticks: 10,
          tickColor: 'rgba(' + app.color.darkRgb + ', .2)',
          min: 0,
          max: 200
        },
        grid: {
          hoverable: true,
          clickable: true,
          tickColor: 'rgba(' + app.color.darkRgb + ', .2)',
          borderWidth: 1,
          backgroundColor: 'transparent',
          borderColor: 'rgba(' + app.color.darkRgb + ', .2)'
        },
        legend: {
          labelBoxBorderColor: 'rgba(' + app.color.darkRgb + ', .2)',
          margin: 10,
          noColumns: 1,
          show: true
        }
      });
      var previousPoint = null;
      $("#interactive-chart").bind("plothover", function(event, pos, item) {
        $("#x").text(pos.x.toFixed(2));
        $("#y").text(pos.y.toFixed(2));
        if (item) {
          if (previousPoint !== item.dataIndex) {
            previousPoint = item.dataIndex;
            $("#tooltip").remove();
            // var y = item.datapoint[1].toFixed(2);
            var y = 'Rp ' + item.datapoint[1].toLocaleString('id-ID', {
              minimumFractionDigits: 0,
              maximumFractionDigits: 0
            });

            var content = item.series.label + " " + y;
            showTooltip(item.pageX, item.pageY, content);
          }
        } else {
          $("#tooltip").remove();
          previousPoint = null;
        }
        event.preventDefault();
      });
    }
  };
</script>
