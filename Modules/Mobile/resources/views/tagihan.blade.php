@extends('mobile::layouts.layout')

@php
  use App\Helpers\Fungsi;
@endphp
@section('content-mobile')
  <!-- App Capsule -->
  <div id="appCapsule">

    <!-- Transactions -->
    <div class="section mt-4 mb-4">
      <div class="section-heading">
        <h2 class="title">Transactions</h2>
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


    {{-- @include('mobile::layouts.footer') --}}
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
    </script>
  @endsection
