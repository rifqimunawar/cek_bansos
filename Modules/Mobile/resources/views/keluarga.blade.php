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



        <div class="row">
          @if ($data['kepala'])
            @php
              $statusKeluargaLabels = [
                  1 => 'Kepala Keluarga',
                  2 => 'Suami',
                  3 => 'Istri',
                  4 => 'Anak',
              ];
            @endphp
            <div class="section full">

              <ul class="listview image-listview flush">
                <li class="active">
                  <a href="#" class="item">
                    <div class="icon-box bg-primary">
                      <ion-icon name="arrow-down-outline"></ion-icon>
                    </div>
                    <div class="in">
                      <div>
                        <div class="mb-05"><strong>{{ $data['kepala']->nama ?? '-' }}</strong></div>
                        <div class="text-small mb-05">{{ $data['kepala']->nik ?? '-' }}</div>
                        <div class="text-xsmall">{{ Fungsi::usia($data['kepala']->tgl_lahir) ?? '-' }}</div>
                      </div>
                      <span class="badge badge-primary badge-empty"></span>
                    </div>
                  </a>
                </li>

                @foreach ($data['anggota'] as $index => $item)
                  @php
                    $statusKeluargaLabels = [
                        1 => 'Kepala Keluarga',
                        2 => 'Suami',
                        3 => 'Istri',
                        4 => 'Anak',
                    ];
                  @endphp
                  <li class="active">
                    <a href="#" class="item">
                      <div class="icon-box bg-primary">
                        <ion-icon name="arrow-down-outline"></ion-icon>
                      </div>
                      <div class="in">
                        <div>
                          <div class="mb-05"><strong>{{ $item->nama }}</strong></div>
                          <div class="text-small mb-05">{{ $item->nik ?? '-' }}</div>
                          <div class="text-xsmall">{{ Fungsi::usia($item->tgl_lahir) ?? '-' }}</div>
                        </div>
                        <span class="badge badge-primary badge-empty"></span>
                      </div>
                    </a>
                  </li>
                @endforeach

              </ul>

            </div>
          @endif
        </div>


      </div>
      <!-- * Wallet Footer -->
    </div>
  </div>
  <!-- Wallet Card -->



  {{-- @include('mobile::layouts.footer') --}}

  </div>
  <!-- * App Capsule -->
@endsection
