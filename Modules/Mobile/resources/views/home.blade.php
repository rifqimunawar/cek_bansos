@extends('mobile::layouts.layout')

@php
  use App\Helpers\Fungsi;
@endphp

@section('content-mobile')
  <!-- App Capsule -->
  <div id="appCapsule">

    <!-- Wallet Card -->
    <div class="section wallet-card-section pt-1">
      <div class="wallet-card">
        <!-- Balance -->
        <div class="balance">
          <div class="left">
            <span class="title">Total Tagihan</span>
            <h1 class="total">{{ Fungsi::rupiah($total_semua) }}</h1>
          </div>
          <div class="right">
            {{-- <a href="#" class="button" data-bs-toggle="modal" data-bs-target="#ronda">
              <ion-icon name="add-outline"></ion-icon>
            </a> --}}
          </div>
        </div>
        <!-- * Balance -->
        <!-- Wallet Footer -->
        <div class="wallet-footer">
          <div class="item">
            <a href="#" data-bs-toggle="modal" data-bs-target="#modalBulanan">
              <div class="icon-wrapper bg-danger">
                <ion-icon name="time-outline"></ion-icon>
              </div>
              <strong>Bulanan</strong>
            </a>
          </div>
          <div class="item">
            <a href="#" data-bs-toggle="modal" data-bs-target="#modalPamSwadaya">
              <div class="icon-wrapper">
                <ion-icon name="water-outline"></ion-icon>
              </div>
              <strong>Pam Swadaya</strong>
            </a>
          </div>
          <div class="item">
            <a href="#" data-bs-toggle="modal" data-bs-target="#modalRonda">
              <div class="icon-wrapper bg-warning">
                <ion-icon name="walk-outline"></ion-icon>
              </div>
              <strong>Ronda</strong>
            </a>
          </div>
          <div class="item">
            <a href="#" data-bs-toggle="modal" data-bs-target="#modalBayar">
              <div class="icon-wrapper bg-success">
                <ion-icon name="cash-outline"></ion-icon>
              </div>
              <strong>Bayar</strong>
            </a>
          </div>

        </div>
        <!-- * Wallet Footer -->
      </div>
    </div>
    <!-- Wallet Card -->

    <!-- modalBulanan -->
    <div class="modal fade action-sheet" id="modalBulanan" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Tagihan Rutin</h5>
          </div>
          <div class="modal-body">
            <div class="action-sheet-content">
              <table width="100%" style="border-collapse: collapse; text-align: left;">
                <thead>
                  <tr>
                    <th style="padding: 10px;">Nama Tagihan</th>
                    <th style="padding: 10px;">Periode</th>
                    <th style="padding: 10px;">Nominal</th>
                  </tr>
                </thead>
                <tbody>
                  @php $total = 0; @endphp
                  @forelse ($tagihan_rutin_belum_dibayar as $item)
                    @php $total += $item->nominal; @endphp
                    <tr>
                      <td style="padding: 10px;">{{ $item->nama_tagihan }}</td>
                      <td style="padding: 10px;">{{ $item->nama_periode }}</td>
                      <td style="padding: 10px;">{{ Fungsi::rupiah($item->nominal) }}</td>
                    </tr>
                  @empty
                    <tr>
                      <td colspan="3" style="padding: 10px; text-align: center;">Tidak ada data</td>
                    </tr>
                  @endforelse
                </tbody>
                @if (count($tagihan_rutin_belum_dibayar) > 0)
                  <tfoot>
                    <tr>
                      <td colspan="2" style="padding: 10px; text-align: right;"><strong>Total:</strong></td>
                      <td style="padding: 10px;"><strong>{{ Fungsi::rupiah($total) }}</strong></td>
                    </tr>
                  </tfoot>
                @endif
              </table>

              <div class="form-group basic mt-3">
                <button type="button" class="btn btn-primary btn-block btn-lg" data-bs-dismiss="modal">Close</button>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
    <!-- * modalBulanan -->

    <!-- modalPamSwadaya -->
    <div class="modal fade action-sheet" id="modalPamSwadaya" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Tagihan Pam Swadaya</h5>
          </div>
          <div class="modal-body">
            <div class="action-sheet-content">
              <table width="100%" style="border-collapse: collapse; text-align: left;">
                <thead>
                  <tr>
                    <th style="padding: 10px;">Tanggal Pengecekan</th>
                    <th style="padding: 10px;">Penggunaan (m³)</th>
                    <th style="padding: 10px;">Nominal</th>
                  </tr>
                </thead>
                <tbody>
                  @php
                    $total_parameter = 0;
                    $total_nominal = 0;
                  @endphp
                  @forelse ($pam_belum_dibayar as $item)
                    @php
                      $total_parameter += $item->parameter;
                      $total_nominal += $item->nominal;
                    @endphp
                    <tr>
                      <td style="padding: 10px;">{{ Fungsi::format_tgl($item->tanggal_input) }}</td>
                      <td style="padding: 10px;">{{ $item->parameter }} (m³)</td>
                      <td style="padding: 10px;">{{ Fungsi::rupiah($item->nominal) }}</td>
                    </tr>
                  @empty
                    <tr>
                      <td colspan="3" style="padding: 10px; text-align: center;">Tidak ada data</td>
                    </tr>
                  @endforelse
                </tbody>
                @if (count($pam_belum_dibayar) > 0)
                  <tfoot>
                    <tr>
                      <td style="padding: 10px; text-align: right;"><strong>Total:</strong></td>
                      <td style="padding: 10px;"><strong>{{ $total_parameter }} (m³)</strong></td>
                      <td style="padding: 10px;"><strong>{{ Fungsi::rupiah($total_nominal) }}</strong></td>
                    </tr>
                  </tfoot>
                @endif
              </table>
              <div class="form-group basic mt-3">
                <button type="button" class="btn btn-primary btn-block btn-lg" data-bs-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- * modalPamSwadaya -->

    <!-- modalRonda -->
    <div class="modal fade action-sheet" id="modalRonda" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Denda Ronda</h5>
          </div>
          <div class="modal-body">
            <div class="action-sheet-content">
              <table width="100%" style="border-collapse: collapse; text-align: left;">
                <thead>
                  <tr>
                    <th style="padding: 10px;">Tanggal Ronda</th>
                    <th style="padding: 10px;">Nominal Tagihan</th>
                  </tr>
                </thead>
                <tbody>
                  @php
                    $total_nominal = 0;
                  @endphp
                  @forelse ($ronda_belum_dibayar as $item)
                    @php
                      $total_nominal += $item->nominal_tagihan;
                    @endphp
                    <tr>
                      <td style="padding: 10px;">{{ Fungsi::format_tgl($item->tanggal_ronda) }}</td>
                      <td style="padding: 10px;">{{ Fungsi::rupiah($item->nominal_tagihan) }}</td>
                    </tr>
                  @empty
                    <tr>
                      <td colspan="2" style="padding: 10px; text-align: center;">Tidak ada data</td>
                    </tr>
                  @endforelse
                </tbody>
                @if (count($ronda_belum_dibayar) > 0)
                  <tfoot>
                    <tr>
                      <td style="padding: 10px; text-align: right;"><strong>Total:</strong></td>
                      <td style="padding: 10px;"><strong>{{ Fungsi::rupiah($total_nominal) }}</strong></td>
                    </tr>
                  </tfoot>
                @endif
              </table>
              <div class="form-group basic mt-3">
                <button type="button" class="btn btn-primary btn-block btn-lg" data-bs-dismiss="modal">Close</button>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
    <!-- * modalRonda -->

    <!-- modalBayar -->
    <div class="modal fade action-sheet" id="modalBayar" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Bayar Sekarang</h5>
          </div>
          <div class="modal-body">
            <div class="action-sheet-content">

              <table width="100%" style="border-collapse: collapse; text-align: left;">
                <thead>
                  <tr>
                    <th style="padding: 10px;">Tagihan</th>
                    <th style="padding: 10px;">Nominal</th>
                    <th style="padding: 10px;">Pilih</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td style="padding: 10px;">Tagihan Rutin</td>
                    <td style="padding: 10px;">{{ Fungsi::rupiah($total_tagihan_rutin) }}</td>
                    <td style="padding: 10px;">
                      <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="checkRutin"
                          data-nominal="{{ $total_tagihan_rutin }}">
                        <label class="form-check-label" for="checkRutin"></label>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td style="padding: 10px;">Tagihan Pam</td>
                    <td style="padding: 10px;">{{ Fungsi::rupiah($total_pam) }}</td>
                    <td style="padding: 10px;">
                      <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="checkPam"
                          data-nominal="{{ $total_pam }}">
                        <label class="form-check-label" for="checkPam"></label>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td style="padding: 10px;">Denda Ronda</td>
                    <td style="padding: 10px;">{{ Fungsi::rupiah($total_ronda) }}</td>
                    <td style="padding: 10px;">
                      <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="checkRonda"
                          data-nominal="{{ $total_ronda }}">
                        <label class="form-check-label" for="checkRonda"></label>
                      </div>
                    </td>
                  </tr>
                </tbody>
                <tfoot>
                  <tr>
                    <td style="padding: 10px; text-align: right;"><strong>Total:</strong></td>
                    <td style="padding: 10px;"><strong id="totalNominal">{{ Fungsi::rupiah(0) }}</strong></td>
                    <td></td>
                  </tr>
                </tfoot>
              </table>
              <div class="form-group basic mt-3">
                <button type="button" class="btn btn-primary btn-block btn-lg premium-alert"
                  data-bs-dismiss="modal">Metode
                  Pembayaran</button>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
    <!-- * modalBayar -->

    <!-- Stats -->
    {{-- <div class="section">
      <div class="row mt-2">
        <div class="col-6">
          <div class="stat-box">
            <div class="title">Terbayar</div>
            <div class="value text-success">$ 552.95</div>
          </div>
        </div>
        <div class="col-6">
          <div class="stat-box">
            <div class="title">Belum Terbayar</div>
            <div class="value text-danger">$ 86.45</div>
          </div>
        </div>
      </div>
       <div class="row mt-2">
        <div class="col-6">
          <div class="stat-box">
            <div class="title">Total Bills</div>
            <div class="value">$ 53.25</div>
          </div>
        </div>
        <div class="col-6">
          <div class="stat-box">
            <div class="title">Savings</div>
            <div class="value">$ 120.99</div>
          </div>
        </div>
      </div>
    </div> --}}
    <!-- * Stats -->

    <!-- Transactions -->
    <div class="section mt-4">
      <div class="section-heading">
        <h2 class="title">Transactions</h2>
        <a href="{{ route('mobile.tagihan') }}" class="link">View All</a>
      </div>
      <div class="transactions">
        <!-- item -->

        @forelse ($history->take(3) as $item)
          <a href="{{ route('mobile.invoice', $item->id) }}" class="item">
            <div class="detail">
              <img src="assets/img/sample/brand/bayar.png" alt="img" class="image-block imaged w48">
              <div>
                <strong>Bayar {{ $item->tagihan_nama }}</strong>
                <p>{{ $item->tagihan_nama }}</p>
              </div>
            </div>
            <div class="right">
              <div class="price text-info"> {{ Fungsi::rupiah($item->nominal_dibayar) }}</div>
            </div>
          </a>
        @empty
          <div class="detail"><strong>Tidak ada data</strong></div>
        @endforelse

        <!-- * item -->

      </div>
    </div>
    <!-- * Transactions -->
    {{--
    <!-- my cards -->
    <div class="section full mt-4">
      <div class="section-heading padding">
        <h2 class="title">My Cards</h2>
        <a href="app-cards.html" class="link">View All</a>
      </div>

      <!-- carousel single -->
      <div class="carousel-single splide">
        <div class="splide__track">
          <ul class="splide__list">

            <li class="splide__slide">
              <!-- card block -->
              <div class="card-block bg-primary">
                <div class="card-main">
                  <div class="card-button dropdown">
                    <button type="button" class="btn btn-link btn-icon" data-bs-toggle="dropdown">
                      <ion-icon name="ellipsis-horizontal"></ion-icon>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end">
                      <a class="dropdown-item" href="#">
                        <ion-icon name="pencil-outline"></ion-icon>Edit
                      </a>
                      <a class="dropdown-item" href="#">
                        <ion-icon name="close-outline"></ion-icon>Remove
                      </a>
                      <a class="dropdown-item" href="#">
                        <ion-icon name="arrow-up-circle-outline"></ion-icon>Upgrade
                      </a>
                    </div>
                  </div>
                  <div class="balance">
                    <span class="label">BALANCE</span>
                    <h1 class="title">$ 1,256,90</h1>
                  </div>
                  <div class="in">
                    <div class="card-number">
                      <span class="label">Card Number</span>
                      •••• 9905
                    </div>
                    <div class="bottom">
                      <div class="card-expiry">
                        <span class="label">Expiry</span>
                        12 / 25
                      </div>
                      <div class="card-ccv">
                        <span class="label">CCV</span>
                        553
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- * card block -->
            </li>

            <li class="splide__slide">
              <!-- card block -->
              <div class="card-block bg-dark">
                <div class="card-main">
                  <div class="card-button dropdown">
                    <button type="button" class="btn btn-link btn-icon" data-bs-toggle="dropdown">
                      <ion-icon name="ellipsis-horizontal"></ion-icon>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end">
                      <a class="dropdown-item" href="#">
                        <ion-icon name="pencil-outline"></ion-icon>Edit
                      </a>
                      <a class="dropdown-item" href="#">
                        <ion-icon name="close-outline"></ion-icon>Remove
                      </a>
                      <a class="dropdown-item" href="#">
                        <ion-icon name="arrow-up-circle-outline"></ion-icon>Upgrade
                      </a>
                    </div>
                  </div>
                  <div class="balance">
                    <span class="label">BALANCE</span>
                    <h1 class="title">$ 1,256,90</h1>
                  </div>
                  <div class="in">
                    <div class="card-number">
                      <span class="label">Card Number</span>
                      •••• 9905
                    </div>
                    <div class="bottom">
                      <div class="card-expiry">
                        <span class="label">Expiry</span>
                        12 / 25
                      </div>
                      <div class="card-ccv">
                        <span class="label">CCV</span>
                        553
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- * card block -->
            </li>

            <li class="splide__slide">
              <!-- card block -->
              <div class="card-block bg-secondary">
                <div class="card-main">
                  <div class="card-button dropdown">
                    <button type="button" class="btn btn-link btn-icon" data-bs-toggle="dropdown">
                      <ion-icon name="ellipsis-horizontal"></ion-icon>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end">
                      <a class="dropdown-item" href="#">
                        <ion-icon name="pencil-outline"></ion-icon>Edit
                      </a>
                      <a class="dropdown-item" href="#">
                        <ion-icon name="close-outline"></ion-icon>Remove
                      </a>
                      <a class="dropdown-item" href="#">
                        <ion-icon name="arrow-up-circle-outline"></ion-icon>Upgrade
                      </a>
                    </div>
                  </div>
                  <div class="balance">
                    <span class="label">BALANCE</span>
                    <h1 class="title">$ 1,256,90</h1>
                  </div>
                  <div class="in">
                    <div class="card-number">
                      <span class="label">Card Number</span>
                      •••• 9905
                    </div>
                    <div class="bottom">
                      <div class="card-expiry">
                        <span class="label">Expiry</span>
                        12 / 25
                      </div>
                      <div class="card-ccv">
                        <span class="label">CCV</span>
                        553
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- * card block -->
            </li>

          </ul>
        </div>
      </div>
      <!-- * carousel single -->

    </div>
    <!-- * my cards -->

    <!-- Send Money -->
    <div class="section full mt-4">
      <div class="section-heading padding">
        <h2 class="title">Send Money</h2>
        <a href="#" class="link">Add New</a>
      </div>
      <!-- carousel small -->
      <div class="carousel-small splide">
        <div class="splide__track">
          <ul class="splide__list">
            <li class="splide__slide">
              <a href="#">
                <div class="user-card">
                  <img src="assets/img/sample/avatar/avatar2.jpg" alt="img" class="imaged w-100">
                  <strong>Jurrien</strong>
                </div>
              </a>
            </li>
            <li class="splide__slide">
              <a href="#">
                <div class="user-card">
                  <img src="assets/img/sample/avatar/avatar3.jpg" alt="img" class="imaged w-100">
                  <strong>Elwin</strong>
                </div>
              </a>
            </li>
            <li class="splide__slide">
              <a href="#">
                <div class="user-card">
                  <img src="assets/img/sample/avatar/avatar4.jpg" alt="img" class="imaged w-100">
                  <strong>Alma</strong>
                </div>
              </a>
            </li>
            <li class="splide__slide">
              <a href="#">
                <div class="user-card">
                  <img src="assets/img/sample/avatar/avatar5.jpg" alt="img" class="imaged w-100">
                  <strong>Justine</strong>
                </div>
              </a>
            </li>
            <li class="splide__slide">
              <a href="#">
                <div class="user-card">
                  <img src="assets/img/sample/avatar/avatar6.jpg" alt="img" class="imaged w-100">
                  <strong>Maria</strong>
                </div>
              </a>
            </li>
            <li class="splide__slide">
              <a href="#">
                <div class="user-card">
                  <img src="assets/img/sample/avatar/avatar7.jpg" alt="img" class="imaged w-100">
                  <strong>Pamela</strong>
                </div>
              </a>
            </li>
            <li class="splide__slide">
              <a href="#">
                <div class="user-card">
                  <img src="assets/img/sample/avatar/avatar8.jpg" alt="img" class="imaged w-100">
                  <strong>Neville</strong>
                </div>
              </a>
            </li>
            <li class="splide__slide">
              <a href="#">
                <div class="user-card">
                  <img src="assets/img/sample/avatar/avatar9.jpg" alt="img" class="imaged w-100">
                  <strong>Alex</strong>
                </div>
              </a>
            </li>
            <li class="splide__slide">
              <a href="#">
                <div class="user-card">
                  <img src="assets/img/sample/avatar/avatar10.jpg" alt="img" class="imaged w-100">
                  <strong>Stina</strong>
                </div>
              </a>
            </li>
          </ul>
        </div>
      </div>
      <!-- * carousel small -->
    </div>
    <!-- * Send Money -->

    <!-- Monthly Bills -->
    <div class="section full mt-4">
      <div class="section-heading padding">
        <h2 class="title">Monthly Bills</h2>
        <a href="app-bills.html" class="link">View All</a>
      </div>
      <!-- carousel multiple -->
      <div class="carousel-multiple splide">
        <div class="splide__track">
          <ul class="splide__list">

            <li class="splide__slide">
              <div class="bill-box">
                <div class="img-wrapper">
                  <img src="assets/img/sample/brand/1.jpg" alt="img" class="image-block imaged w48">
                </div>
                <div class="price">$ 14</div>
                <p>Prime Monthly Subscription</p>
                <a href="#" class="btn btn-primary btn-block btn-sm">PAY NOW</a>
              </div>
            </li>

            <li class="splide__slide">
              <div class="bill-box">
                <div class="img-wrapper">
                  <img src="assets/img/sample/brand/2.jpg" alt="img" class="image-block imaged w48">
                </div>
                <div class="price">$ 9</div>
                <p>Music Monthly Subscription</p>
                <a href="#" class="btn btn-primary btn-block btn-sm">PAY NOW</a>
              </div>
            </li>

            <li class="splide__slide">
              <div class="bill-box">
                <div class="img-wrapper">
                  <div class="iconbox bg-danger">
                    <ion-icon name="medkit-outline"></ion-icon>
                  </div>
                </div>
                <div class="price">$ 299</div>
                <p>Monthly Health Insurance</p>
                <a href="#" class="btn btn-primary btn-block btn-sm">PAY NOW</a>
              </div>
            </li>

            <li class="splide__slide">
              <div class="bill-box">
                <div class="img-wrapper">
                  <div class="iconbox">
                    <ion-icon name="card-outline"></ion-icon>
                  </div>
                </div>
                <div class="price">$ 962</div>
                <p>Credit Card Statement
                </p>
                <a href="#" class="btn btn-primary btn-block btn-sm">PAY NOW</a>
              </div>
            </li>

          </ul>
        </div>
      </div>
      <!-- * carousel multiple -->
    </div>
    <!-- * Monthly Bills -->


    <!-- Saving Goals -->
    <div class="section mt-4">
      <div class="section-heading">
        <h2 class="title">Saving Goals</h2>
        <a href="app-savings.html" class="link">View All</a>
      </div>
      <div class="goals">
        <!-- item -->
        <div class="item">
          <div class="in">
            <div>
              <h4>Gaming Console</h4>
              <p>Gaming</p>
            </div>
            <div class="price">$ 499</div>
          </div>
          <div class="progress">
            <div class="progress-bar" role="progressbar" style="width: 85%;" aria-valuenow="85" aria-valuemin="0"
              aria-valuemax="100">85%</div>
          </div>
        </div>
        <!-- * item -->
        <!-- item -->
        <div class="item">
          <div class="in">
            <div>
              <h4>New House</h4>
              <p>Living</p>
            </div>
            <div class="price">$ 100,000</div>
          </div>
          <div class="progress">
            <div class="progress-bar" role="progressbar" style="width: 55%;" aria-valuenow="55" aria-valuemin="0"
              aria-valuemax="100">55%</div>
          </div>
        </div>
        <!-- * item -->
        <!-- item -->
        <div class="item">
          <div class="in">
            <div>
              <h4>Sport Car</h4>
              <p>Lifestyle</p>
            </div>
            <div class="price">$ 42,500</div>
          </div>
          <div class="progress">
            <div class="progress-bar" role="progressbar" style="width: 15%;" aria-valuenow="15" aria-valuemin="0"
              aria-valuemax="100">15%</div>
          </div>
        </div>
        <!-- * item -->
      </div>
    </div>
    <!-- * Saving Goals -->
 --}}

    <!-- News -->
    <div class="section full mt-4 mb-3">
      {{-- <div class="section-heading padding">
        <h2 class="title">Lastest News</h2>
        <a href="#" class="link">View All</a>
      </div> --}}

      <!-- carousel multiple -->
      {{-- <div class="carousel-multiple splide">
        <div class="splide__track">
          <ul class="splide__list">

            <li class="splide__slide">
              <a href="/mobile/blog1">
                <div class="blog-card">
                  <img src="{{ asset('img/keuangan_yayasan.jpg') }}" alt="image" class="imaged w-100">
                  <div class="text">
                    <h4 class="title"> Aplikasi Pencatatan Keuangan Sekolah, 📲💡solusi modern untuk mengelola
                      pembayaran
                      SPP, uang kegiatan, dan administrasi lainnya dengan mudah, cepat, dan akurat.🚀🏡 </h4>
                  </div>
                </div>
              </a>
            </li>

            <li class="splide__slide">
              <a href="/mobile/blog2">
                <div class="blog-card">
                  <img src="{{ asset('img/rtonline.jpg') }}" alt="image" class="imaged w-100">
                  <div class="text">
                    <h4 class="title">Mudahkan pengelolaan data warga, pencatatan iuran, jadwal ronda, hingga pengumuman
                      RT dalam satu aplikasi digital! 📲💡 Dengan SIMRT, administrasi RT jadi lebih efisien, transparan,
                      dan terorganisir. Saatnya beralih ke manajemen RT yang modern dan praktis! 🚀🏡</h4>
                  </div>
                </div>
              </a>
            </li>
          </ul>
        </div>
      </div> --}}
      <!-- * carousel multiple -->

    </div>
    <!-- * News -->
    {{-- @include('mobile::layouts.footer') --}}
  </div>
  <!-- * App Capsule -->
  <iframe id="printFrame" style="display:none;"></iframe>
  <script>
    // Untuk Print
    function printInvoice(url) {
      var iframe = document.getElementById('printFrame');
      iframe.src = url;
      iframe.onload = function() {
        iframe.contentWindow.print();
      };
    }

    // function downloadInvoice(url) {
    //   const link = document.createElement('a');
    //   link.href = url;
    //   link.download = 'invoice.pdf';
    //   document.body.appendChild(link);
    //   link.click();
    //   document.body.removeChild(link);
    // }


    document.addEventListener("DOMContentLoaded", function() {
      const checkboxes = document.querySelectorAll(".form-check-input");
      const totalNominalElement = document.getElementById("totalNominal");

      function formatRupiah(angka) {
        return "Rp " + angka.toLocaleString("id-ID");
      }

      function updateTotal() {
        let total = 0;
        checkboxes.forEach(checkbox => {
          if (checkbox.checked) {
            total += parseInt(checkbox.getAttribute("data-nominal"));
          }
        });
        totalNominalElement.textContent = formatRupiah(total);
      }

      checkboxes.forEach(checkbox => {
        checkbox.addEventListener("change", updateTotal);
      });
    });
  </script>
@endsection
