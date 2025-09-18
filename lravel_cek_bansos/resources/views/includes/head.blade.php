@php
  $getWebName = App\Helpers\GetSettings::getNamaWeb();
  $getLogo = App\Helpers\GetSettings::getLogo();
@endphp
<meta charset="utf-8" />
<title>{{ $getWebName }} | @yield('title')</title>
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="icon" type="image/x-icon" href="{{ $getLogo }}">
<meta content="" name="description" />
<meta content="" name="author" />

<!-- ================== BEGIN BASE jQuery ================== -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- ================== BEGIN BASE CSS STYLE ================== -->
<link href="{{ asset('assets/css/vendor.min.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/css/default/app.min.css') }}" rel="stylesheet" />
<!-- ================== END BASE CSS STYLE ================== -->
<!-- ================== BEGIN page-css ================== -->
<link href="{{ asset('/assets/plugins/bootstrap-icons/font/bootstrap-icons.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/plugins/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/plugins/select2/dist/css/select2.min.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/plugins/ion-rangeslider/css/ion.rangeSlider.min.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/plugins/tag-it/css/jquery.tagit.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/plugins/spectrum-colorpicker2/dist/spectrum.min.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/plugins/select-picker/dist/picker.min.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/plugins/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/plugins/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css') }}"
  rel="stylesheet" />
{{-- daterange picker --}}
{{-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script> --}}

{{-- summernote --}}
<link href="{{ asset('assets/plugins/summernote/dist/summernote-lite.css') }}" rel="stylesheet" />
<style>
  #loadingOverlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(255, 255, 255, 0.85);
    z-index: 9999;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
  }

  .loading-content {
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
  }

  .spinner {
    width: 50px;
    height: 50px;
    border: 4px solid #ccc;
    border-top-color: #28a745;
    border-radius: 50%;
    animation: spin 1s linear infinite;
    margin-bottom: 10px;
  }

  @keyframes spin {
    to {
      transform: rotate(360deg);
    }
  }
</style>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.1/moment.min.js"></script>

@stack('css')
