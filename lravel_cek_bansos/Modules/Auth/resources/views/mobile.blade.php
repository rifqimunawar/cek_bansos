<!doctype html>
<html lang="en">
@php
  $getLogo = App\Helpers\GetSettings::getLogo();
  $getWebName = App\Helpers\GetSettings::getNamaWeb();
  $getEmail = App\Helpers\GetSettings::getEmail();
  $getTelp = App\Helpers\GetSettings::getTelp();
  $getAlamat = App\Helpers\GetSettings::getAlamat();
@endphp

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport"
    content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
  <meta name="apple-mobile-web-app-capable" content="yes" />
  <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
  <meta name="theme-color" content="#000000">
  <title>Login</title>
  <meta name="description" content="Finapp HTML Mobile Template">
  <meta name="keywords"
    content="bootstrap, wallet, banking, fintech mobile template, cordova, phonegap, mobile, html, responsive" />
  <link rel="icon" type="image/png" href="{{ $getLogo }}" sizes="32x32">
  <link rel="apple-touch-icon" sizes="180x180" href="{{ $getLogo }}">
  <link rel="stylesheet" href="{{ asset('mobile/assets/css/style.css') }}">
  <link rel="manifest" href="__manifest.json">
</head>

<body>

  <!-- loader -->
  {{-- <div id="loader">
    <img src="{{ $getLogo }}" alt="icon" class="loading-icon">
  </div> --}}
  <!-- * loader -->

  <!-- App Header -->
  <div class="appHeader no-border transparent position-absolute">
    <div class="left">
      {{-- <a href="#" class="headerButton goBack">
        <ion-icon name="chevron-back-outline"></ion-icon>
      </a> --}}
    </div>
    <div class="pageTitle"></div>
    <div class="right">
    </div>
  </div>
  <!-- * App Header -->

  <!-- App Capsule -->
  <div id="appCapsule">

    <div class="section mt-2 text-center">
      <img src="{{ $getLogo }}" alt="logo"
        style="width: 5rem; height:auto; border-radius:20px; margin-bottom:3rem;">
      <h1>Log in</h1>
      <h4>Fill the form to log in</h4>
    </div>
    <div class="section mb-5 p-2">

      <form action="{{ route('mobile.authenticate') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card">
          <div class="card-body pb-1">
            <div class="form-group basic">
              <div class="input-wrapper">
                <label class="label" for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="username">
                <i class="clear-input">
                  <ion-icon name="close-circle"></ion-icon>
                </i>
              </div>
            </div>

            <div class="form-group basic">
              <div class="input-wrapper">
                <label class="label" for="password1">Password</label>
                <input type="password" class="form-control" id="password1" name="password" autocomplete="off"
                  placeholder="Your password">
                <i class="clear-input">
                  <ion-icon name="close-circle"></ion-icon>
                </i>
              </div>
            </div>
          </div>
        </div>


        <div class="form-links mt-2">
          <div>
            {{-- <a href="app-register.html">Register Now</a> --}}
          </div>
          {{-- <div><a href="app-forgot-password.html" class="text-muted">Forgot Password?</a></div> --}}
        </div>

        <div class="form-button-group  transparent">
          <button type="submit" class="btn btn-primary btn-block btn-lg">Log in</button>
        </div>

      </form>
    </div>

  </div>
  <!-- * App Capsule -->



  <!-- ========= JS Files =========  -->
  <!-- Bootstrap -->
  <script src="{{ asset('mobile/assets/js/lib/bootstrap.bundle.min.js') }}"></script>
  <!-- Ionicons -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  <!-- Splide -->
  <script src="{{ asset('mobile/assets/js/plugins/splide/splide.min.js') }}"></script>
  <!-- Base Js File -->
  <script src="{{ asset('mobile/assets/js/base.js') }}"></script>


</body>

</html>
