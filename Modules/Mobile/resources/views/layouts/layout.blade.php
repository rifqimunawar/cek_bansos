<!doctype html>
<html lang="en">

@php
  use App\Helpers\Fungsi;
  use App\Helpers\GetSettings;
@endphp

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport"
    content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
  <meta name="apple-mobile-web-app-capable" content="yes" />
  <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
  <meta name="theme-color" content="#000000">
  <title>mobile</title>
  <meta name="description" content="==">
  <meta name="keywords"
    content="bootstrap, wallet, banking, fintech mobile template, cordova, phonegap, mobile, html, responsive" />
  <link rel="icon" type="image/png" href="{{ GetSettings::getLogo() }}" sizes="32x32">
  <link rel="apple-touch-icon" sizes="180x180" href="{{ GetSettings::getLogo() }}">
  <link rel="stylesheet" href="{{ asset('mobile/assets/css/style.css') }}">
  <link rel="manifest" href="__manifest.json">
  <script src="https://maps.googleapis.com/maps/api/js"></script>

  <style>
    .loader {
      width: 180px;
      height: 12px;
      border-radius: 20px;
      background: linear-gradient(orange 0 0) 0/0% no-repeat lightblue;
      animation: loadingAnimation 3s infinite steps(10);
    }

    @keyframes loadingAnimation {
      100% {
        background-size: 110%;
      }
    }

    /* Tambahan untuk posisi & visibilitas */
    #loading {
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      z-index: 9999;
      display: none;
      /* Awalnya tersembunyi */
    }
  </style>
</head>

<body>

  <!-- loader -->
  {{-- <div id="loader">
    <img src="{{ GetSettings::getLogo() }}" alt="icon" class="loading-icon">
  </div> --}}
  <!-- * loader -->

  <!-- App Header -->
  <div class="appHeader bg-primary text-light">
    <div class="pageTitle">
      <img src="{{ GetSettings::getLogo() }}" alt="logo" class="logo">

      {{-- <h3 class="text-warning">Selamat datang {{ Auth::user()->name }}</h3> --}}
    </div>
    <div class="right">
      {{-- <a href="app-notifications.html" class="headerButton premium-alert">
        <ion-icon class="icon" name="notifications-outline"></ion-icon>
        <span class="badge badge-danger">1</span>
      </a> --}}
      <a href="{{ route('mobile.settings') }}" class="headerButton">
        <img src="{{ asset('img/' . Auth::user()->img) }}" alt="image" class="imaged"
          style="width: 32px; height: 32px; object-fit: cover;">
        <span class="badge badge-danger"></span>
      </a>
    </div>
  </div>
  <!-- * App Header -->

  @yield('content-mobile')

  <!-- App Bottom Menu -->
  <div class="appBottomMenu">
    <a href="{{ route('mobile.home') }}" class="item {{ Request::is('mobile/home*') ? 'active' : '' }}">
      <div class="col">
        <ion-icon name="pie-chart-outline"></ion-icon>
        <strong>Home</strong>
      </div>
    </a>
    <a href="{{ route('mobile.tagihan') }}" class="item {{ Request::is('mobile/tagihan*') ? 'active' : '' }}">
      <div class="col">
        <ion-icon name="document-text-outline"></ion-icon>
        <strong>History</strong>
      </div>
    </a>
    <a href="{{ route('mobile.ronda') }}" class="item {{ Request::is('mobile/ronda*') ? 'active' : '' }}">
      <div class="col">
        <ion-icon name="apps-outline"></ion-icon>
        <strong>Ronda</strong>
      </div>
    </a>
    <a href="{{ route('mobile.keluarga') }}" class="item {{ Request::is('mobile/keluarga*') ? 'active' : '' }}">
      <div class="col">
        <ion-icon name="card-outline"></ion-icon>
        <strong>Personal</strong>
      </div>
    </a>
    <a href="{{ route('mobile.settings') }}" class="item {{ Request::is('mobile/settings*') ? 'active' : '' }}">
      <div class="col">
        <ion-icon name="settings-outline"></ion-icon>
        <strong>Settings</strong>
      </div>
    </a>
  </div>

  <!-- * App Bottom Menu -->


  <!-- iOS Add to Home Action Sheet -->
  {{-- <div class="modal inset fade action-sheet ios-add-to-home" id="ios-add-to-home-screen" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Add to Home Screen</h5>
          <a href="#" class="close-button" data-bs-dismiss="modal">
            <ion-icon name="close"></ion-icon>
          </a>
        </div>
        <div class="modal-body">
          <div class="action-sheet-content text-center">
            <div class="mb-1"><img src="{{ asset('mobile/assets/img/icon/192x192.png') }}" alt="image"
                class="imaged w64 mb-2">
            </div>
            <div>
              Install <strong>Finapp</strong> on your iPhone's home screen.
            </div>
            <div>
              Tap <ion-icon name="share-outline"></ion-icon> and Add to homescreen.
            </div>
            <div class="mt-2">
              <button class="btn btn-primary btn-block" data-bs-dismiss="modal">CLOSE</button>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div> --}}
  <!-- * iOS Add to Home Action Sheet -->


  <!-- Android Add to Home Action Sheet -->
  {{-- <div class="modal inset fade action-sheet android-add-to-home" id="android-add-to-home-screen" tabindex="-1"
    role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Add to Home Screen</h5>
          <a href="#" class="close-button" data-bs-dismiss="modal">
            <ion-icon name="close"></ion-icon>
          </a>
        </div>
        <div class="modal-body">
          <div class="action-sheet-content text-center">
            <div class="mb-1">
              <img src="{{ asset('mobile/assets/img/icon/192x192.png') }}" alt="image" class="imaged w64 mb-2">
            </div>
            <div>
              Install <strong>Finapp</strong> on your Android's home screen.
            </div>
            <div>
              Tap <ion-icon name="ellipsis-vertical"></ion-icon> and Add to homescreen.
            </div>
            <div class="mt-2">
              <button class="btn btn-primary btn-block" data-bs-dismiss="modal">CLOSE</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> --}}
  <!-- * Android Add to Home Action Sheet -->



  <!-- ========= JS Files =========  -->
  <!-- Bootstrap -->
  <script src="{{ asset('mobile/assets/js/lib/bootstrap.bundle.min.js') }}"></script>
  <!-- Ionicons -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  <!-- Splide -->
  <script src="{{ asset('mobile/assets/js/plugins/splide/splide.min.js') }}"></script>
  <!-- Base Js File -->
  <script src="{{ asset('mobile/assets/js/base.js') }}"></script>

  <script>
    // Add to Home with 2 seconds delay.
    AddtoHome("2000", "once");
  </script>
  <!-- ================== BEGIN page-js jadwal ronda ================== -->
  <script src="{{ asset('/assets/plugins/moment/min/moment.min.js') }}"></script>
  <script src="{{ asset('/assets/plugins/@fullcalendar/core/index.global.js') }}"></script>
  <script src="{{ asset('/assets/plugins/@fullcalendar/daygrid/index.global.js') }}"></script>
  <script src="{{ asset('/assets/plugins/@fullcalendar/timegrid/index.global.js') }}"></script>
  <script src="{{ asset('/assets/plugins/@fullcalendar/interaction/index.global.js') }}"></script>
  <script src="{{ asset('/assets/plugins/@fullcalendar/list/index.global.js') }}"></script>
  <script src="{{ asset('/assets/plugins/@fullcalendar/bootstrap/index.global.js') }}"></script>
  <script src="{{ asset('/assets/js/demo/calendar.ronda_mobile.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    document.querySelectorAll(".premium-alert").forEach(item => {
      item.addEventListener("click", function(event) {
        event.preventDefault();
        Swal.fire({
          title: 'Fitur Premium!',
          text: 'Fitur ini hanya tersedia di versi Premium. Upgrade sekarang untuk mengaksesnya!',
          icon: 'warning',
          confirmButtonText: 'Kembali'
        });
      });
    });
  </script>
</body>

</html>
