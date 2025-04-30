@extends('tagihan::layouts.master')
@php
  // Mengonversi periode_id yang berupa string JSON ke array
  $selectedPeriode = !empty($data->periode_id) ? json_decode($data->periode_id) : [];
@endphp
@section('module-content')
  <div class="row">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          <div class="card-title">Form Elements</div>
        </div>
        <div class="card-body">
          <div>
            <form action="{{ route('umum.store') }}" method="post" class="row" enctype="multipart/form-data">
              @csrf
              <div class="form-group mb-2">
                <label for="nama_tagihan">Nama Tagihan</label>
                <input type="text" class="form-control" required name="nama_tagihan" id="nama_tagihan"
                  placeholder="Kas kebersihan" value="{{ $data->nama_tagihan }}" />
              </div>

              <div class="form-group mb-2">
                <label for="nominal">Nominal</label>
                <input type="text" class="form-control" name="nominal" required id="nominal" placeholder="Nominal"
                  oninput="formatRupiah(this)" value="{{ $data->nominal }}" />
              </div>

              <div class="card-action d-flex justify-content-center mt-4">
                <input type="hidden" name="id" value="{{ $data->id }}">
                <button class="btn btn-success btn-sm" type="submit">Simpan</button>
                <a href="{{ route('umum.index') }}" class="btn btn-warning btn-sm">Kembali</a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
<script>
  function numberInput(input) {
    input.value = input.value.replace(/[^0-9]/g, '');
  }

  function formatRupiah(input) {
    let value = input.value.replace(/[^0-9]/g, '');
    let formatted = new Intl.NumberFormat('id-ID', {
      style: 'currency',
      currency: 'IDR',
      minimumFractionDigits: 0,
    }).format(value);
    input.value = formatted.replace('Rp', 'Rp ');
  }

  function cleanRupiah(value) {
    return value.replace(/[^0-9]/g, '');
  }
</script>
