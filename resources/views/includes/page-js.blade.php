<!-- ================== BEGIN select2-js ================== -->
<script src="{{ asset('/assets/plugins/select2/dist/js/select2.min.js') }}"></script>

<!-- ================== BEGIN core-js ================== -->
<script src="{{ asset('assets/js/vendor.min.js') }}"></script>
<script src="{{ asset('assets/js/app.min.js') }}"></script>
<!-- ================== END core-js ================== -->

{{-- <script src="{{ asset('assets/plugins/@highlightjs/cdn-assets/highlight.min.js') }}"></script> --}}
{{-- <script src="{{ asset('assets/js/demo/render.highlight.js') }}"></script> --}}

<!-- ================== BEGIN page-js ================== -->
<script src="{{ asset('assets/plugins/flot/source/jquery.canvaswrapper.js') }}"></script>
<script src="{{ asset('assets/plugins/flot/source/jquery.colorhelpers.js') }}"></script>
<script src="{{ asset('assets/plugins/flot/source/jquery.flot.js') }}"></script>
<script src="{{ asset('assets/plugins/flot/source/jquery.flot.saturated.js') }}"></script>
<script src="{{ asset('assets/plugins/flot/source/jquery.flot.browser.js') }}"></script>
<script src="{{ asset('assets/plugins/flot/source/jquery.flot.drawSeries.js') }}"></script>
<script src="{{ asset('assets/plugins/flot/source/jquery.flot.uiConstants.js') }}"></script>
<script src="{{ asset('assets/plugins/flot/source/jquery.flot.time.js') }}"></script>
<script src="{{ asset('assets/plugins/flot/source/jquery.flot.resize.js') }}"></script>
<script src="{{ asset('assets/plugins/flot/source/jquery.flot.pie.js') }}"></script>
<script src="{{ asset('assets/plugins/flot/source/jquery.flot.crosshair.js') }}"></script>
<script src="{{ asset('assets/plugins/flot/source/jquery.flot.categories.js') }}"></script>
<script src="{{ asset('assets/plugins/flot/source/jquery.flot.navigate.js') }}"></script>
<script src="{{ asset('assets/plugins/flot/source/jquery.flot.touchNavigate.js') }}"></script>
<script src="{{ asset('assets/plugins/flot/source/jquery.flot.hover.js') }}"></script>
<script src="{{ asset('assets/plugins/flot/source/jquery.flot.touch.js') }}"></script>
<script src="{{ asset('assets/plugins/flot/source/jquery.flot.selection.js') }}"></script>
<script src="{{ asset('assets/plugins/flot/source/jquery.flot.symbol.js') }}"></script>
<script src="{{ asset('assets/plugins/flot/source/jquery.flot.legend.js') }}"></script>
<script src="{{ asset('assets/plugins/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
<script src="{{ asset('assets/plugins/jvectormap-next/jquery-jvectormap.min.js') }}"></script>
<script src="{{ asset('assets/plugins/jvectormap-content/world-mill.js') }}"></script>
<script src="{{ asset('assets/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.js') }}"></script>

<!-- ================== BEGIN page-js ================== -->
<script src="{{ asset('assets/plugins/moment/min/moment.min.js') }}"></script>
<script src="{{ asset('assets/plugins/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<script src="{{ asset('assets/plugins/select2/dist/js/select2.min.js') }}"></script>
<script src="{{ asset('assets/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.js') }}"></script>
<script src="{{ asset('assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}"></script>
<script src="{{ asset('assets/plugins/ion-rangeslider/js/ion.rangeSlider.min.js') }}"></script>
<script src="{{ asset('assets/plugins/jquery.maskedinput/src/jquery.maskedinput.js') }}"></script>
<script src="{{ asset('assets/plugins/jquery-migrate/dist/jquery-migrate.min.js') }}"></script>
<script src="{{ asset('assets/plugins/tag-it/js/tag-it.min.js') }}"></script>
<script src="{{ asset('assets/plugins/clipboard/dist/clipboard.min.js') }}"></script>
<script src="{{ asset('assets/plugins/spectrum-colorpicker2/dist/spectrum.min.js') }}"></script>
<script src="{{ asset('assets/plugins/select-picker/dist/picker.min.js') }}"></script>
<script src="{{ asset('assets/js/demo/form-plugins.production.js') }}"></script>
<script src="{{ asset('assets/plugins/@highlightjs/cdn-assets/highlight.min.js') }}"></script>
<script src="{{ asset('assets/js/demo/render.highlight.js') }}"></script>


<!-- ================== BEGIN page-js jadwal ronda ================== -->
<script src="{{ asset('/assets/plugins/moment/min/moment.min.js') }}"></script>
<script src="{{ asset('/assets/plugins/@fullcalendar/core/index.global.js') }}"></script>
<script src="{{ asset('/assets/plugins/@fullcalendar/daygrid/index.global.js') }}"></script>
<script src="{{ asset('/assets/plugins/@fullcalendar/timegrid/index.global.js') }}"></script>
<script src="{{ asset('/assets/plugins/@fullcalendar/interaction/index.global.js') }}"></script>
<script src="{{ asset('/assets/plugins/@fullcalendar/list/index.global.js') }}"></script>
<script src="{{ asset('/assets/plugins/@fullcalendar/bootstrap/index.global.js') }}"></script>
<script src="{{ asset('/assets/js/demo/calendar.ronda.js') }}"></script>

<!-- ================== BEGIN page-js ================== -->
<script src="{{ asset('assets/plugins/datatables.net/js/dataTables.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js') }}"></script>
<script src="{{ asset('assets/js/demo/table-manage-default.demo.js') }}"></script>
@stack('scripts')




<script>
  // Untuk Print
  function printInvoice(url) {
    var iframe = document.getElementById('printFrame');
    iframe.src = url;
    iframe.onload = function() {
      iframe.contentWindow.print();
    };
  }
  var handleDashboardSparkline = function() {
    "use strict";
    var options = {
      height: '50px',
      width: '100%',
      fillColor: 'transparent',
      lineWidth: 2,
      spotRadius: '4',
      highlightLineColor: app.color.blue,
      highlightSpotColor: app.color.blue,
      spotColor: false,
      minSpotColor: false,
      maxSpotColor: false
    };

    function renderDashboardSparkline() {
      $('#sparkline-unique-visitor').empty();
      $('#sparkline-bounce-rate').empty();
      $('#sparkline-total-page-views').empty();
      $('#sparkline-avg-time-on-site').empty();
      $('#sparkline-new-visits').empty();
      $('#sparkline-return-visitors').empty();

      var value = [50, 30, 45, 40, 50, 20, 35, 40, 50, 70, 90, 40];
      options.type = 'line';
      options.height = '23px';
      options.lineColor = app.color.red;
      options.highlightLineColor = app.color.red;
      options.highlightSpotColor = app.color.red;

      var countWidth = $('#sparkline-unique-visitor').width();
      if (countWidth >= 200) {
        options.width = '200px';
      } else {
        options.width = '100%';
      }

      $('#sparkline-unique-visitor').sparkline(value, options);
      options.lineColor = app.color.orange;
      options.highlightLineColor = app.color.orange;
      options.highlightSpotColor = app.color.orange;
      $('#sparkline-bounce-rate').sparkline(value, options);
      options.lineColor = app.color.green;
      options.highlightLineColor = app.color.green;
      options.highlightSpotColor = app.color.green;
      $('#sparkline-total-page-views').sparkline(value, options);
      options.lineColor = app.color.blue;
      options.highlightLineColor = app.color.blue;
      options.highlightSpotColor = app.color.blue;
      $('#sparkline-avg-time-on-site').sparkline(value, options);
      options.lineColor = app.color.gray;
      options.highlightLineColor = app.color.gray;
      options.highlightSpotColor = app.color.gray;
      $('#sparkline-new-visits').sparkline(value, options);
      options.lineColor = app.color.black;
      options.highlightLineColor = app.color.black;
      options.highlightSpotColor = app.color.black;
      $('#sparkline-return-visitors').sparkline(value, options);
    }

    renderDashboardSparkline();

    $(window).on('resize', function() {
      renderDashboardSparkline();
    });
  };


  var gritterTriggered = false;
  var handleDashboardGritterNotification = function() {
    if (gritterTriggered) return;
    gritterTriggered = true;
    setTimeout(function() {
      $.gritter.add({
        title: 'Welcome back, Admin!',
        text: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tempus lacus ut lectus rutrum placerat.',
        image: '../assets/img/user/user-2.jpg',
        sticky: true,
        time: '',
        class_name: 'my-sticky-class'
      });
    }, 1000);
  };

  var Dashboard = function() {
    "use strict";
    return {
      //main function
      init: function() {
        handleDashboardGritterNotification();
        handleDashboardSparkline();
        handleInteractiveChart();
        handleDonutChart();
        handleDashboardTodolist();
        handleVectorMap();
        handleDashboardDatepicker();

        $(document).on('theme-reload', function() {
          handleInteractiveChart();
          handleDonutChart();
        });
      }
    };
  }();

  $(document).ready(function() {
    Dashboard.init();

    $(document).on(app.darkMode.eventName, function() {
      Dashboard.init();
    });
  });
</script>
